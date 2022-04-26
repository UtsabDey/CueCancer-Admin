<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="{{ request()->is('/') ? 'active' : '' }}"> 
                    <a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('appointment') ? 'active' : '' }}"> 
                    <a href="{{ url('/appointment') }}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li class="submenu">
                    <a href=""><i class="fe fe-users"></i> <span> Doctors</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ request()->is('doctor/list') ? 'active' : '' }}"><a href="{{ url('/doctor/list') }}"><i class="fe fe-user"></i> &nbsp; Doctors</a></li>
                        <li class="{{ request()->is('doctor/add') ? 'active' : '' }}"><a href="{{ url('doctor/add') }}"><i class="fe fe-user-plus"></i> &nbsp; Add Doctors</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href=""><i class="fe fe-users"></i> <span> Patients</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ request()->is('patient/list') ? 'active' : '' }}"><a href="{{ url('/patient/list') }}"><i class="fe fe-user"></i> &nbsp; Patients</a></li>
                        <li class="{{ request()->is('patient/add') ? 'active' : '' }}"><a href="{{ url('patient/add') }}"><i class="fe fe-user-plus"></i> &nbsp; Add Patients</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href=""><i class="fe fe-document"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ request()->is('blog/add*') ? 'active' : '' }}"><a href="{{ url('/blog/add') }}">Add Blog</a></li>
                        <li class="{{ (request()->is('/blog/list*')) ? 'active' : '' }}"><a href="{{ url('/blog/list') }}">Blog List</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('registration') }}"><i class="fe fe-document"></i><span>Add Admin</span></a></li>
            </ul>
        </div>
    </div>
</div>