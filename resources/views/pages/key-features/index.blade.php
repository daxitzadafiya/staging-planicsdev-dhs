@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Key Feature
@endsection

@section('breadcrumb-title')
    Key Feature
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Key Features
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap justify-end sm:flex-nowrap items-center mt-2">
            <a href="{{ route('key-features.create') }}" class="btn btn-primary shadow-md mr-2">Create</a>
        </div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">IMAGE</th>
                        <th class="whitespace-nowrap">TITLE</th>
                        <th class="whitespace-nowrap">DESCRIPTION</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($keyFeatures as $keyFeature)  
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="w-20 h-20 image-fit zoom-in">
                                    <img class="tooltip rounded-full" src="{{ url(Storage::url($keyFeature->image)) }}" title="{{ $keyFeature->title }}">
                                </div>
                            </td>
                            <td>
                                <span class="font-medium whitespace-nowrap">{{ $keyFeature->title }}</span>
                            </td>
                            <td>
                                {{ $keyFeature->description }}
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center {{ $keyFeature->is_active == 1 ? 'text-success' : 'text-danger' }}"> 
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $keyFeature->is_active == 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('key-features.edit', $keyFeature) }}"> 
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> 
                                        Edit 
                                    </a>
                                    <button type="button" class="flex items-center text-danger" onclick="deleteRow({{ $keyFeature->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> 
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> 
                                        Delete 
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Records Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($keyFeatures->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{ $keyFeatures->links() }}
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
            $('#delete-confirmation-modal form').attr('action', `${site_url}/admin/key-features/${id}`);
        }
    </script>
@endpush