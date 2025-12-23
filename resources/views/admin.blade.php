<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Skill</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
        }

        .admin-wrapper {
            min-height: 100vh;
        }

        .sidebar {
            background: #343a40;
            color: #fff;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        .content-header {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container-fluid admin-wrapper">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar py-3">
                <div class="px-3 mb-4">
                    <h4 class="text-white mb-0">Admin Panel</h4>
                    <small class="text-muted">Static page</small>
                </div>
                <ul class="nav flex-column px-2">
                    <li class="nav-item mb-1">
                        <a class="nav-link active" href="#">
                            Add Skill
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link" href="{{ url('/') }}">
                            Back to Portfolio
                        </a>
                    </li>
                </ul>
            </nav>

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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Add Skill Form -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Skill Information</h5>

                                <form action="{{ route('admin.skills.store') }}" method="POST"
                                      enctype="multipart/form-data" id="skill-form">
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
                </div>
            </main>
        </div>
    </div>

    <script>
        // Example jQuery usage: scroll to top when form is submitted
        $(function () {
            $('#skill-form').on('submit', function () {
                $('html, body').animate({ scrollTop: 0 }, 300);
            });
        });
    </script>
</body>

</html>


