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
    <!-- Top navbar for admin links -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/admin/skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/cms">CMS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid admin-wrapper">
        <div class="row">
            @include('sidebar')
            @yield('content')

        </div>
    </div>
    <script>
        // Example jQuery usage: scroll to top when form is submitted
        $(function() {
            $('#skill-form').on('submit', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 300);
            });
        });
    </script>
</body>

</html>
