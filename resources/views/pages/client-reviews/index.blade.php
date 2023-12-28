@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Client Review
@endsection

@section('breadcrumb-title')
    Client Review
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex justify-between items-center sm:flex-nowrap items-center mt-2">
            <h2 class="intro-y text-lg font-medium">
                Client Reviews
            </h2>
            <a href="{{ route('client-reviews.create') }}" class="btn btn-primary shadow-md mr-2">Create</a>
        </div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">IMAGE</th>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="whitespace-nowrap">RATING</th>
                        <th class="whitespace-nowrap">REVIEW</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientReviews as $clientReview)  
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="w-20 h-20 image-fit zoom-in">
                                    <img class="tooltip rounded-full" src="{{ url(Storage::url($clientReview->image)) }}" title="{{ $clientReview->title }}">
                                </div>
                            </td>
                            <td>
                                <span class="font-medium whitespace-nowrap">{{ $clientReview->name }}</span>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center">
                                    <div class="flex items-center"> 
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($i <=  $clientReview->rating)
                                                <i data-lucide="star" class="text-pending fill-pending/30 w-4 h-4 mr-1"></i> 
                                            @else
                                                @if(str_contains($clientReview->rating, "."))
                                                    <i data-lucide="star-half" class="text-pending fill-pending/30 w-4 h-4 mr-1"></i>
                                                @else
                                                    <i data-lucide="star" class="text-slate-400 fill-slate/30 w-4 h-4 mr-1"></i> 
                                                @endif    
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="text-xs text-slate-500 ml-1">({{ $clientReview->rating }})</div>
                                </div>
                            </td>
                            <td>
                                {{ $clientReview->review }}
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center {{ $clientReview->is_active == 1 ? 'text-success' : 'text-danger' }}"> 
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $clientReview->is_active == 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('client-reviews.edit', $clientReview) }}"> 
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> 
                                        Edit 
                                    </a>
                                    <button type="button" class="flex items-center text-danger" onclick="deleteRow({{ $clientReview->id }})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> 
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> 
                                        Delete 
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Records Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($clientReviews->hasPages())
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{ $clientReviews->links() }}
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
            $('#delete-confirmation-modal form').attr('action', `${site_url}/admin/client-reviews/${id}`);
        }
    </script>
@endpush