<nav class="app-header navbar navbar-expand bg-body"><!--begin::Container-->
    <div class="container-fluid"><!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a></li>
                    
                </ul><!--end::Start Navbar Links--><!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Messages Dropdown Menu-->
                    <li class="nav-item dropdown"><a class="nav-link" data-bs-toggle="dropdown" href="#"><i class="bi bi-chat-text"></i><span class="navbar-badge badge text-bg-danger">3</span></a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"><a href="#" class="dropdown-item"><!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img src="../../dist/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"></div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">Call me whenever you can...</p>
                                        <p class="fs-7 text-secondary"><i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div><!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img src="../../dist/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"></div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-end fs-7 text-secondary"><i class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">I got your message bro</p>
                                        <p class="fs-7 text-secondary"><i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div><!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><!--begin::Message-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img src="../../dist/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3"></div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-end fs-7 text-warning"><i class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">The subject goes here</p>
                                        <p class="fs-7 text-secondary"><i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div><!--end::Message-->
                            </a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li><!--end::Messages Dropdown Menu--><!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item dropdown"><a class="nav-link" data-bs-toggle="dropdown" href="#"><i class="bi bi-bell-fill"></i><span class="navbar-badge badge text-bg-warning">15</span></a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"><span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="bi bi-envelope me-2"></i> 4 new messages
                                <span class="float-end text-secondary fs-7">3 mins</span></a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="bi bi-people-fill me-2"></i> 8 friend requests
                                <span class="float-end text-secondary fs-7">12 hours</span></a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                                <span class="float-end text-secondary fs-7">2 days</span></a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item dropdown-footer">
                                See All Notifications
                            </a>
                        </div>
                    </li><!--end::Notifications Dropdown Menu--><!--begin::Fullscreen Toggle-->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu"><a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="{{asset('../../dist/assets/img/user2-160x160.jpg')}}" class="user-image rounded-circle shadow" alt="User Image"><span class="d-none d-md-inline">{{ Auth::user()->name }}</span></a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"><!--begin::User Image-->
                            <li class="user-header text-bg-primary"><img src="{{asset('../../dist/assets/img/user2-160x160.jpg')}}" class="rounded-circle shadow" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since Nov. 2023</small>
                                </p>
                            </li><!--end::User Image--><!--begin::Menu Body-->
                            
                            <li class="user-footer"><a href="#" class="btn btn-default btn-flat">Profile</a><a href="{{ asset('logout') }}" class="btn btn-default btn-flat float-end">Sign out</a></li><!--end::Menu Footer-->
                        </ul>
                    </li><!--end::User Menu Dropdown-->
                </ul><!--end::End Navbar Links-->
            </div><!--end::Container-->
        </nav><!--end::Header--><!--begin::Sidebar-->

        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"><!--begin::Sidebar Brand-->
            <div class="sidebar-brand"><!--begin::Brand Link--><a href="javascript" class="brand-link" style="text-align: center;"><!--begin::Brand Text--><span class="brand-text fw-light" style="font-weight: bold !important;font-size: 20px;">CUC</span><!--end::Brand Text--></a><!--end::Brand Link--></div><!--end::Sidebar Brand--><!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"><!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        
                        @if(Auth::user()->user_type == 1)
                        <li class="nav-item menu-open"><a href="{{ asset('admin/dashboard') }}" class="nav-link active "><i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard 
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/admin/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/student/list') }}" class="nav-link " ><i class="nav-icon bi bi-mortarboard"></i>
                                <p>Student</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/faculty/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Faculty</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/dept/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/club/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Club</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('admin/assign_club/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Assign Club</p>
                            </a>
                        </li>
                        <!--<li class="nav-item"><a href="{{ asset('admin/manage_club/list') }}" class="nav-link " ><i class="nav-icon bi bi-person"></i>
                                <p>Manage Club Information</p>
                            </a>
                        </li> -->
                        <li class="nav-item"><a href="{{ asset('admin/change_password') }}" class="nav-link " ><i class="nav-icon bi bi-unlock"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        @elseif(Auth::user()->user_type == 2)
                        <li class="nav-item menu-open"><a href="{{ asset('hep/dashboard') }}" class="nav-link active"><i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{ asset('hep/verify/list') }}" class="nav-link "><i class="nav-icon bi bi-person"></i>
                                <p>
                                    Application New Club
                                </p>
                            </a>
                        </li>

                        <li class="nav-item"><a href="{{ asset('hep/change_password') }}" class="nav-link " ><i class="nav-icon bi bi-unlock"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        @elseif(Auth::user()->user_type == 3)
                        <li class="nav-item menu-open"><a href="{{ asset('student/dashboard') }}" class="nav-link active"><i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{ asset('student/apply/list') }}" class="nav-link "><i class="nav-icon bi bi-person"></i>
                                <p>
                                    Application New Club
                                </p>
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{ asset('student/club/list') }}" class="nav-link "><i class="nav-icon bi bi-person"></i>
                                <p>
                                    Club
                                </p>
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{ asset('student/activity/list') }}" class="nav-link "><i class="nav-icon bi bi-person"></i>
                                <p>
                                    Activity
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('student/change_password') }}" class="nav-link " ><i class="nav-icon bi bi-unlock"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        @elseif(Auth::user()->user_type == 4)
                        <li class="nav-item menu-open"><a href="{{ asset('club/dashboard') }}" class="nav-link active"><i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item "><a href="{{ asset('club/member/list') }}" class="nav-link "><i class="nav-icon bi bi-person"></i>
                                <p>
                                    Members
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ asset('club/change_password') }}" class="nav-link " ><i class="nav-icon bi bi-unlock"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        @endif
                        
                        <li class="nav-item"><a href="{{ asset('logout') }}" class="nav-link"><i class="nav-icon bi bi-box-arrow-right "></i>
                                <p>Logout</p>
                            </a>
                        </li>                      
                    </ul><!--end::Sidebar Menu-->
                </nav>
        </div><!--end::Sidebar Wrapper-->
    </aside><!--end::Sidebar--><!--begin::App Main-->