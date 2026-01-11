@extends('app')
@section('content')


    <!-- Main content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <div class="content-header mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h4 mb-0">Add Skill</h2>
                <small class="text-muted">Simple admin form built with Bootstrap &amp; jQuery</small>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-xl-6">
                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Add Skill Form -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Skill Information</h5>

                        <form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data"
                            id="skill-form">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter skill name">
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sub_skills" class="form-label">Sub Skills
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="sub_skills" name="sub_skills"
                                    placeholder="e.g. HTML, CSS, JavaScript">
                                @error('sub_skills')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="form-text">PNG, JPG, SVG up to 2MB.</div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Add Skill
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Skills Table (Static) -->
            <div class="col-12 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Skills List (Static)</h5>
                            <small class="text-muted">You can make it dynamic later</small>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th style="width:60px">#</th>
                                        <th>Name</th>
                                        <th>Sub Skills</th>
                                        <th style="width:90px">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Frontend</td>
                                        <td>HTML, CSS, JavaScript</td>
                                        <td><img src="https://via.placeholder.com/60x40?text=FE" alt="Frontend" class="img-fluid rounded"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Backend</td>
                                        <td>PHP, Laravel, MySQL</td>
                                        <td><img src="https://via.placeholder.com/60x40?text=BE" alt="Backend" class="img-fluid rounded"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>JavaScript Framework</td>
                                        <td>Vue.js, React</td>
                                        <td><img src="https://via.placeholder.com/60x40?text=JS" alt="JavaScript" class="img-fluid rounded"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>DevOps</td>
                                        <td>Git, Docker</td>
                                        <td><img src="https://via.placeholder.com/60x40?text=OPS" alt="DevOps" class="img-fluid rounded"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Design</td>
                                        <td>Figma, Photoshop</td>
                                        <td><img src="https://via.placeholder.com/60x40?text=UX" alt="Design" class="img-fluid rounded"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


@endsection
