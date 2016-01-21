<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('admin.common.head')
    @yield('head')
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ action('Admin\DashboardController@index') }}">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
{{--                         <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li> --}}
                        <li><a href="{{ action('Admin\LoginController@lang') }}"><i class="fa fa-gear fa-fw"></i> {{ trans('banner_messages.changeLang') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ action('Admin\LoginController@logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('banner_messages.logout') }}</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.common.navigator.nav_menu')
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">@yield('content')</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    @include('admin.common.footer')
</body>

</html>
