    <div class="sidebar">
        <div class="sidebar-content">

            <div class="user-menu dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('backend_assets/images/demo/users/face3.png')}}" alt="">
                    <div class="user-info">
                        Md. Shawon <span>Web Developer</span>
                    </div>
                </a>
            </div>

            <ul class="navigation">
                <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{ url('/admin') }}"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
                <li>
                    <a href="#"><span>Address Setting</span> <i class="icon-settings"></i></a>
                    <ul>
                        <li class="{{ (request()->is('admin/division')) ? 'active' : '' }}"><a href="{{url('/admin/division')}}">Division</a></li>
                        <li class="{{ (request()->is('admin/district')) ? 'active' : '' }}"><a href="{{url('/admin/district')}}">District</a></li>
                        <li class="{{ (request()->is('admin/upzilla')) ? 'active' : '' }}"><a href="{{url('/admin/upzilla')}}">Upzilla</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Truck</span> <i class="icon-truck"></i></a>
                    <ul>
                        <li class="{{ (request()->is('admin/ton')) ? 'active' : '' }}"><a href="{{url('/admin/ton')}}">Ton</a></li>
                        <li class="{{ (request()->is('admin/truck/create')) ? 'active' : '' }}"><a href="{{url('/admin/truck/create')}}">Add Truck</a></li>
                        <li class="{{ (request()->is('admin/truck')) ? 'active' : '' }}"><a href="{{url('/admin/truck')}}">Truck List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Post</span> <i class="icon-paragraph-justify"></i></a>
                    <ul>
                        <li><a href="task_grid.html">Posts</a></li>
                        <li><a href="task_list.html">Bid Post</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
