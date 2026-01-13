@extends('app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="pt-4 pb-2 mb-3">
         @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <div class="d-flex justify-content-between align-items-center">
           
            <h2>CMS Pages</h2>
            
            <a href="{{ route('admin.cms.create') }}" class="btn btn-primary">Create New</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- if no records --}}
                        @if($pages->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">No CMS pages found.</td>
                            </tr>
                        @else
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->page_slug }}</td>
                                    <td>{{ $page->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.cms.show', ['cm' => $page->id]) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.cms.edit', ['cm' => $page->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.cms.destroy', ['cm' => $page->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>  
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
