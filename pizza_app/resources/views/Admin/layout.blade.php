<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">


    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">


</head>

<body>


    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">


        <div class="nav-header">
            <a href="{{ route('admindashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('admin/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('admin/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('admin/images/logo-text.png') }}" alt="">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="{{ route('adminlogout') }}" role="button" >
                                    <i class="mdi mdi-account"></i>Logout
                                </a>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">


                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ route('admindashboard') }}"><i class="icon icon-single-04"></i><span
                                class="nav-text">Dashboard</span></a></li>
                    <li class="nav-label">Orders</li>
                    <li><a href="{{ route('orders') }}"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Manage
                                Orders</span></a></li>
                    <li class="nav-label">Pizzas</li>
                    <li><a href="{{ route('managepizzas') }}"><i class="icon icon-chart-bar-33"></i><span
                                class="nav-text">Manage
                                Pizzas</span></a></li>
                    <li><a href="{{ route('addpizza') }}"><i class="icon icon-chart-bar-33"></i><span
                                class="nav-text">Add
                                New Pizza</span></a></li>
                    <li class="nav-label">Add Ones</li>
                    <li><a href="{{ route('crustmanage') }}"><i class="icon icon-chart-bar-33"></i><span
                                class="nav-text">Manage Crusts</span></a></li>
                    <li><a href="{{ route('colddrink') }}"><i class="icon icon-chart-bar-33"></i><span
                                class="nav-text">Manage Cold Drinks</span></a></li>
                    <li class="nav-label">Customers</li>
                    <li><a href="{{ route('managecustomer') }}"><i class="icon icon-chart-bar-33"></i><span
                                class="nav-text">Manage Customers</span></a></li>
                    <li class="nav-label">Reports</li>
                    <li><a href="{{ route('reports') }}"><i class="icon icon-chart-bar-33"></i><span class="nav-text">View
                                Reports</span></a></li>
                </ul>
            </div>


        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>

    </div>

    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>

    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>


    <script src="{{ asset('admin/assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('admin/assets/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/preloader/pace.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

    <script>
        $(document).ready(function() {

            setTimeout(() => {
                $("#success_message").hide(200);
            }, 3000);

        });
    </script>

</body>

</html>
