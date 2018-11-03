<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Dashboard</span></a></li>
            {{--<li><a href="#"><i class='fa fa-link'></i> <span>Businesses</span></a></li>--}}
            <li class="treeview">
                <a href="#"><i class='fa fa-building'></i> <span>Manage Businesses</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('businesses')}}">Businesses</a></li>
                    <li><a href="{{url('biz_types_index')}}">Business Types</a></li>
                    <li><a href="{{url('referral_codes')}}">Referal Codes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-briefcase'></i> <span>Packages</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('packages') }}"> <span>Packages</span></a></li>
                    <li><a href="{{url('package_features')}}">Package features</a></li>
                </ul>
            </li>

            <li class=""><a href="{{url('slide_manager')}}"><i class='fa fa-home'></i> <span>Slide Manager</span></a></li>
            <hr>
            <li class="treeview">
                <a href="#"><i class='fa fa-building'></i> <span>Manage Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users')}}">Users</a></li>
                    <li><a href="#">User Roles</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
