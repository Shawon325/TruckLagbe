<div class="sidebar">
    <div class="sidebar-content">
        <ul class="navigation">
            <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                <a href="{{ url('/admin') }}"><span>Dashboard</span> <i class="icon-screen2"></i></a>
            </li>
            <li>
                <a href="#"><span>RBAC</span> <i class="icon-user-plus"></i></a>
                <ul>
                    <li class="{{ (request()->is('admin/role')) ? 'active' : '' }}"><a
                            href="{{url('/admin/role')}}">Role</a></li>
                    <li class="{{ (request()->is('admin/district')) ? 'active' : '' }}"><a
                            href="{{url('/admin/district')}}">Permission</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span>Address Setting</span> <i class="icon-location4"></i></a>
                <ul>
                    <li class="{{ (request()->is('admin/division')) ? 'active' : '' }}"><a
                            href="{{url('/admin/division')}}">Division</a></li>
                    <li class="{{ (request()->is('admin/district')) ? 'active' : '' }}"><a
                            href="{{url('/admin/district')}}">District</a></li>
                    <li class="{{ (request()->is('admin/upzilla')) ? 'active' : '' }}"><a
                            href="{{url('/admin/upzilla')}}">Upzilla</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span>Truck</span> <i class="icon-truck"></i></a>
                <ul>
                    <li class="{{ (request()->is('admin/ton')) ? 'active' : '' }}"><a
                            href="{{url('/admin/ton')}}">Ton</a></li>
                    <li class="{{ (request()->is('admin/truck/create')) ? 'active' : '' }}"><a
                            href="{{url('/admin/truck/create')}}">Add Truck</a></li>
                    <li class="{{ (request()->is('admin/truck')) ? 'active' : '' }}"><a href="{{url('/admin/truck')}}">Truck
                            List</a></li>
                    <li class="{{ (request()->is('admin/post_bid')) ? 'active' : '' }}"><a
                            href="{{url('/admin/post_bid')}}">Posts
                            Bid</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span>Post</span> <i class="icon-plus"></i></a>
                <ul>
                    <li class="{{ (request()->is('admin/posts/create')) ? 'active' : '' }}"><a
                            href="{{url('/admin/posts/create')}}">Add Posts</a></li>
                    <li class="{{ (request()->is('admin/posts')) ? 'active' : '' }}"><a href="{{url('/admin/posts')}}">Posts
                            List</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span>General Setting</span> <i class="icon-settings"></i></a>
                <ul>
                    <li class="{{ (request()->is('admin/general_setting')) ? 'active' : '' }}"><a
                            href="{{url('/admin/general_setting')}}">App Setting</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
