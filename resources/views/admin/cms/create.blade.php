@extends('app')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="pt-4 pb-2 mb-3">
            <h2>Create CMS Page</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.cms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- subtitle , description , sub__description, image,  --}}
                    <div class="mb-3">
                        <label class="form-label">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter sub title" value="{{ old('sub_title') }}">
                        @error('sub_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sub Description</label>
                        <textarea name="sub_description" rows="4" class="form-control @error('sub_description') is-invalid @enderror" placeholder="Enter sub description">{{ old('sub_description') }}</textarea>
                        @error('sub_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Page Slug</label>
                        {{-- option for page  --}}
                        <select name="page_slug" class="form-select @error('page_slug') is-invalid @enderror" >
                            <option value="home" {{ old('page_slug') == 'home' ? 'selected' : '' }}>Home</option>
                            <option value="about" {{ old('page_slug') == 'about' ? 'selected' : '' }}>About</option>
                            <option value="services" {{ old('page_slug') == 'services' ? 'selected' : '' }}>Services</option>
                            <option value="contact" {{ old('page_slug') == 'contact' ? 'selected' : '' }}>Contact</option>
                        </select>
                        @error('page_slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Section</label>
                        <select name="section" class="form-select @error('section') is-invalid @enderror">
                            <option value="header" {{ old('section') == 'header' ? 'selected' : '' }}>Header</option>
                            <option value="footer" {{ old('section') == 'footer' ? 'selected' : '' }}>Footer</option>
                            <option value="about" {{ old('section') == 'about' ? 'selected' : '' }}>About</option>
                        </select>
                          @error('section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Status</label>
                        <select name="status" class="form-select  @error('status') is-invalid @enderror">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                          @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
