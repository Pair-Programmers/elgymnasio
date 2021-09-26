<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{asset('images')}}/users/admin.jpeg" style="width: 70px; height: 70px" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Malik Qasim</strong>
                             </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GYM
                        </div>
                    </li>
                    <li >
                        <a href="{{URL::to('admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                        
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Members/Customers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('member_register')}}">New Registration</a></li>
                            <li><a href="{{URL::to('member_list', ['query'=>'Registered'])}}">List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_payment_create')}}">Recieve Fee</a></li>
                            <li><a href="{{URL::to('display_payment_list')}}">List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Attendance</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Add</a></li>
                            <li><a href="mail_detail.html">Edit</a></li>
                            <li><a href="mail_compose.html">List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Services</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_add_service')}}">Add</a></li>
                            <li><a href="{{URL::to('display_list_service')}}">List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Packages</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_add_package')}}">Add</a></li>
                            <li><a href="{{URL::to('display_list_package')}}">List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Expensses</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_add_expense')}}">Add</a></li>
                            <li><a href="{{URL::to('display_list_expense')}}">List</a></li>
                            <li><a href="{{URL::to('display_expense_category')}}">Manage Categories</a></li>
                            <li><a href="{{URL::to('display_expense_subcategory')}}">Manage SubCategories</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Vendors</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_vendor_create')}}">Create</a></li>
                            <li><a href="{{URL::to('display_vendor_list')}}">List</a></li>
                        </ul> 
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Employee  </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_employee_create')}}">Create</a></li>
                            <li><a href="{{URL::to('display_employee_list')}}">List</a></li>
                        </ul>
                    </li>

                    

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Accounts  </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('display_account_create')}}">Create</a></li>
                            <li><a href="{{URL::to('display_account_list')}}">List</a></li>
                        </ul>
                    </li>

                    
                </ul>

            </div>
        </nav>