<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('banner_messages.dashboard') }}</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('banner_messages.login') }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ action('Admin\LocationController@create') }}">{{ trans('banner_messages.addLocation') }}</a>
                    </li>
                    <li>
                        <a href="morris.html">Morris.js Charts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-table fa-fw"></i> {{ trans('banner_messages.user') }}</a>
            </li>
            <li>
                <a href="{{ action('Admin\GroupuserController@index') }}"><i class="fa fa-table fa-fw"></i> {{ trans('banner_messages.groupUser') }}</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>