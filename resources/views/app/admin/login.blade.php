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
    <title>Login Admin</title>
    <!-- Application vendor css url -->
    <!-- project css file  -->
    @vite('resources/assets/css/luno-style.css')
    <!-- Jquery Core Js -->
    @vite('resources/assets/js/plugins.js')
</head>

<body id="layout-1" data-luno="theme-blue">
    <!-- start: body area -->
    <div class="wrapper">
        <!-- Sign In version 1 -->
        <!-- start: page body -->
        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-lg-12 d-flex justify-content-center align-items-center">
                        <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
                            <!-- Form -->
                            <div class="toast active" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="assets/images/xs/avatar1.jpg" class="avatar sm rounded me-2"
                                        alt="" />
                                    <strong class="me-auto">Bootstrap</strong>
                                    <small>11 mins ago</small>
                                    <button type="button" class="btn-close" data-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                            <form class="row g-3" method="POST" action="{{ route('admin.login.post') }}">
                                @csrf
                                <div class="col-12 text-center mb-5">
                                    <h1 class="text-primary">LOGIN ADMIN</h1>
                                    <h5 class="text-primary text-uppercase">Solusi Sampah - Super Depo Sutorejo</h5>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" required name="email"
                                            class="form-control form-control-lg" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center"> Password <a
                                                    class="text-primary" href="auth-password-reset.html">Forgot
                                                    Password?</a>
                                            </span>
                                        </div>
                                        <input id="password" name="password" required
                                            class="form-control form-control-lg" type="password" maxlength="10"
                                            placeholder="Enter the password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember_me" type="checkbox"
                                            id="flexCheckDefault">
                                        <label class="form-check-label text-sm-start" for="flexCheckDefault">tetap masuk
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4 d-flex">
                                    <button
                                        class="btn btn-lg btn-primary text-white w-100 text-uppercase">Masuk</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
        <a class="page-setting" href="#" title="Settings" data-bs-toggle="modal"
            data-bs-target="#SettingsModal"><i class="fa fa-gear text-light"></i></a>

        <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
        <script>
            $(function() {
                $('#password').password()
            })
        </script>
    </div>
    @include('app.admin.includes.settings')

    @vite('assets/bundles/libscripts.bundle.js')
    @vite('resources/assets/js/theme.js')
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script>
        @if (session('error'))
            vt.error("{{ session('error') }}", {
                title: "Peringatan!",
                position: "top-center",
                // position: toastPosition.TopCenter,
                duration: 8000,
                closable: false,
                focusable: false,
                callback: undefined
            })
        @endif
    </script>
</body>

</html>
