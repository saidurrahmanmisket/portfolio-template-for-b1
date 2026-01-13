@extends('app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="pt-4 pb-2 mb-3">
        <h2>{{ $cms->title ?? 'CMS Page' }}</h2>
        <p class="text-muted">Page Slug: {{ $cms->page_slug ?? '-' }} | Status: {{ $cms->is_active ? 'Active' : 'Inactive' }}</p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <h5>Sub Title</h5>
                <p>{{ $cms->sub_title ?? '-' }}</p>
            </div>
            <div class="mb-3">
                <h5>Description</h5>
                <p>{{ $cms->description ?? '-' }}</p>
            </div>
            <div class="mb-3">
                <h5>Sub Description</h5>
                <p>{{ $cms->sub_description ?? '-' }}</p>
            </div>
            <div class="mb-3">
                <h5>Image</h5>
                @if($cms->image)
                    <img src="{{ asset( $cms->image) }}" alt="CMS Image" class="img-fluid">
                @else
                    <p>No image available.</p>
                @endif
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.cms.edit', ['cm' => $cms->id ?? 0]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</main>
@endsection
