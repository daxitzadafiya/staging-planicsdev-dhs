@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Enquiry
@endsection

@section('breadcrumb-title')
    Enquiry
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <h2 class="intro-y text-lg font-medium">
            Enquiries
        </h2>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="whitespace-nowrap">EMAIL</th>
                        <th class="whitespace-nowrap">CONTACT</th>
                        <th class="whitespace-nowrap">SUBJECT</th>
                        <th class="whitespace-nowrap">MESSAGE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enquiries as $enquiry)  
                        <tr class="intro-x">
                            <td>
                                <span class="whitespace-nowrap">{{ $enquiry->id }}</span>
                            </td>
                            <td>
                                <span class="font-medium whitespace-nowrap">{{ $enquiry->name }}</span>
                            </td>
                            <td>
                                {{ $enquiry->email }}
                            </td>
                            <td>
                                {{ $enquiry->contact }}
                            </td>
                            <td>
                                {{ $enquiry->subject }}
                            </td>
                            <td>
                                {{ $enquiry->message }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <button type="button" class="flex items-center text-danger" onclick="deleteRow({{ $enquiry->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> 
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> 
                                        Delete 
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Records Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($enquiries->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{ $enquiries->links() }}
            </div>
        @endif
    </div>
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <form method="post">
                        @csrf
                        @method('delete')
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete this record?
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        const site_url = $('#site_url').val();

        function deleteRow(id) {
            $('#delete-confirmation-modal form').attr('action', `${site_url}/admin/enquiries/${id}`);
        }
    </script>
@endpush