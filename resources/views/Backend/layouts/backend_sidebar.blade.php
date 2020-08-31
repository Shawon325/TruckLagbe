<div class="sidebar">
    <div class="sidebar-content">
        <ul class="navigation">
            <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                <a href="{{ url('/admin') }}"><span>Dashboard</span> <i class="icon-screen2"></i></a>
            </li>
            @can('RBAC')
                <li>
                    <a href="#"><span>RBAC</span> <i class="icon-user-plus"></i></a>
                    <ul>
                        @can('View Role')
                            <li class="{{ (request()->is('admin/role')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/role')}}">Role</a></li>
                        @endcan
                        @can('Permission View')
                            <li class="{{ (request()->is('admin/permission')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/permission')}}">Permission</a></li>
                        @endcan
                        @can('Role Permission View')
                            <li class="{{ (request()->is('admin/role_has_permission')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/role_has_permission')}}">Role Permission</a></li>
                        @endcan
                        @can('User Access View')
                            <li class="{{ (request()->is('admin/user_access')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/user_access')}}">User Access</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('Addressing Setting')
                <li>
                    <a href="#"><span>Address Setting</span> <i class="icon-location4"></i></a>
                    <ul>
                        @can('Division View')
                            <li class="{{ (request()->is('admin/division')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/division')}}">Division</a></li>
                        @endcan
                        @can('District View')
                            <li class="{{ (request()->is('admin/district')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/district')}}">District</a></li>
                        @endcan
                        @can('Upzilla View')
                            <li class="{{ (request()->is('admin/upzilla')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/upzilla')}}">Upzilla</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('Truck')
                <li>
                    <a href="#"><span>Truck</span> <i class="icon-truck"></i></a>
                    <ul>
                        @can('Ton View')
                            <li class="{{ (request()->is('admin/ton')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/ton')}}">Ton</a></li>
                        @endcan
                        @can('Truck Add')
                            <li class="{{ (request()->is('admin/truck/create')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/truck/create')}}">Add Truck</a></li>
                        @endcan
                        @can('	Truck View')
                            <li class="{{ (request()->is('admin/truck')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/truck')}}">Truck
                                    List</a></li>
                        @endcan
                        @can('Post Bid View')
                            <li class="{{ (request()->is('admin/post_bid')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/post_bid')}}">Posts
                                    Bid</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('Post')
                <li>
                    <a href="#"><span>Post</span> <i class="icon-plus"></i></a>
                    <ul>
                        @can('Post Add')
                            <li class="{{ (request()->is('admin/posts/create')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/posts/create')}}">Add Posts</a></li>
                        @endcan
                        @can('Post View')
                            <li class="{{ (request()->is('admin/posts')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/posts')}}">Posts
                                    List</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('General Setting')
                <li>
                    <a href="#"><span>General Setting</span> <i class="icon-settings"></i></a>
                    <ul>
                        @can('App Setting View')
                            <li class="{{ (request()->is('admin/general_setting')) ? 'active' : '' }}"><a
                                    href="{{url('/admin/general_setting')}}">App Setting</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
