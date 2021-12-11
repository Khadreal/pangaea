<!doctype html>
<html lang="en">
@include( 'layouts.partials.header')
<body class="sidebar-fixed header-fixed">

    <div class="page-wrapper">
        @include('layouts.partials.top-nav')
        <div class="main-container">
            @include('layouts.partials.sidebar')
            <div class="content">
                @include('flash')
                @yield('content')
            </div>
        </div>
    </div>

    @yield('script')
</body>
</html>