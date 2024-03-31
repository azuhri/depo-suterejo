<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <title>Dashboard | @yield('title')</title>
    <!-- project css file  -->
    @vite('resources/assets/css/luno-style.css')
    <!-- Jquery Core Js -->
    @vite('resources/assets/js/plugins.js')
    @yield('css')
</head>

<body class="layout-1" data-luno="theme-blue">
    <!-- start: body area -->
    @include('app.admin.includes.sidebar')

    <!-- start: body area -->
    <div class="wrapper">

        <!-- start: page header -->
        @include('app.admin.includes.header')

        <!-- start: page toolbar -->
        @yield("content_header")

        <!-- start: page body -->
        @yield("content_body")

        <!-- start: page footer -->
        @include('app.admin.includes.footer')

    </div>

    <!-- Modal: Setting -->
    @include('app.admin.includes.settings')

    @vite('resources/assets/js/theme.j')
    @vite('assets/bundles/libscripts.bundle.js')
    <script>
        const openModal = (id) => {
            $("#"+id).modal("show");
        }

        const hideModal = (id) => {
            $("#"+id).modal("hide");
        }
    </script>
    @yield('js')

</body>

</html>
