<x-app-layout>
    <div class="main-wrapper">

        <!-- Start Sidebar Component -->
        @include('components.sidebar')
        <!-- End Sidebar Component -->

        <div class="page-wrapper">

            <!-- Start Top Navbar -->
            @include('components.top-nav')
            <!-- End Top Navbar -->

            <div class="page-content">

                <!-- Start Dashboard Components -->
                @include('components.dashboard-com')

                <!-- End Dashboard Components -->

                <!-- Start card components -->
                @include('components.card-com')
                <!-- End card components -->

            </div>

            @include('components.d-footer')

        </div>
    </div>
</x-app-layout>
