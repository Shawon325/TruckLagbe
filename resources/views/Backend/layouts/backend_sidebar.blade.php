    <div class="sidebar">
        <div class="sidebar-content">
            <ul class="navigation">
                <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{ url('/admin') }}"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
                <li>
                    <a href="#"><span>Setting</span> <i class="icon-settings"></i></a>
                    <ul>
                        <li class="{{ (request()->is('admin/division')) ? 'active' : '' }}"><a href="{{url('/admin/division')}}">Division</a></li>
                        <li class="{{ (request()->is('admin/district')) ? 'active' : '' }}"><a href="{{url('/admin/district')}}">District</a></li>
                        <li><a href="{{url('/admin/upzilla')}}">Upzilla</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Truck</span> <i class="icon-truck"></i></a>
                    <ul>
                        <li class="{{ (request()->is('admin/ton')) ? 'active' : '' }}"><a href="{{url('/admin/ton')}}">Ton</a></li>
                        <li><a href="task_list.html">Truck</a></li>
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
