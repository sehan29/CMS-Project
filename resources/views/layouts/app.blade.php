<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <link rel="stylesheet" href="../assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo_1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Styles -->
    <link rel="stylesheet" href="../styles/Login_Page_Styles.css">

</head>

<body class="sidebar-dark">

    <div class="main-wrapper">

        <!-- Start Sidebar Component -->
        @include('components.sidebar')
        <!-- End Sidebar Component -->

        <div class="page-wrapper">

            <!-- Start Top Navbar -->
            @include('components.top-nav')
            <!-- End Top Navbar -->

            <div class="page-content">

                <div class="page-content">
                    @yield('content')
                </div>
            </div>

            @include('components.d-footer')

        </div>
    </div>

    <script src="../assets/vendors/core/core.js"></script>
    <!-- plugin js for this page -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="../assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/vendors/feather-icons/feather.min.js"></script>
    <script src="../assets/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <!-- end custom js for this page -->

    <script src="../assets/js/dropzone.js"></script>
    <script src="../assets/vendors/dropzone/dropzone.min.js"></script>

{{--     <script src="../assets/js/cal/main.js"></script>
    <script src="../assets/js/cal/bootstrap.min.js"></script>
    <script src="../assets/js/cal/jquery.min.js"></script>
    <script src="../assets/js/cal/popper.js"></script> --}}



    <script>
        document.querySelectorAll('.star-rating:not(.readonly) label').forEach(star => {
        star.addEventListener('click', function() {
            this.style.transform = 'scale(1.2)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
        });
    });
    </script>


</body>

</html>
