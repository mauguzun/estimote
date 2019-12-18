<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav" id="l_sidebar">
        <li class="nav-item nav-category">Main Menu</li>
        @can('access-content', 'raport.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url(route('admin::index')) }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Reports</span>
                </a>
            </li>
        @endcan
        @can('access-content', 'aircraft.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/aircrafts/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Aircrafts</span>
                </a>
            </li>
        @endcan
        @can('access-content', 'device.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/devices/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Devices</span>
                </a>
            </li>
        @endcan  @can('access-content', 'userdevice.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/userdevice/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Pick up / Drop off device </span>
                </a>
            </li>
        @endcan

        @can('access-content', 'apron.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/aprons/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Aprons</span>
                </a>
            </li>
        @endcan
        @can('access-content', 'stand.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/stands/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Stands</span>
                </a>
            </li> @endcan
        @can('access-content', 'status.view')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/statuses/') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Statuses</span>
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#auth" aria-expanded="false"
               aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Users & Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth" style="">
                <ul class="nav flex-column sub-menu">
                    @can('access-content', 'role.view')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url(route('admin::user.index')) }}">Users Management</a>
                        </li>
                    @endcan
                    @can('access-content', 'role.view')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url(route('admin::role.index')) }}">Roles Management</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    </ul>
</nav>