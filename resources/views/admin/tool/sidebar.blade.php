<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            {{--  <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"></div>Admin</div>  --}}
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ url('admin-dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                    <span class="nav-label">User Managment</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('view-users') }}">Users</a>
                    </li>
                    <li>
                        <a href="{{ url('add-new-user-form') }}">Add New User</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Stock Managment</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('admin-view-items') }}"> Items</a>
                    </li>
                    <li>
                        <a href="{{ url('admin-view-add-new-item-form') }}">Add New Item </a>
                    </li>
                    <li>
                        <a href="{{ url('admin-view-catagory') }}">Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">supplier Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('admin-view-supplier') }}">Suppliers</a>
                    </li>
                    <li>
                        <a href="{{ url('admin-view-add-supplier-form') }}">Add new supplier</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Bill</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('admin-view-billing') }}">Create Bill</a>
                    </li>
                    <li>
                        <a href="{{ url('admin-view-process-bill')}} ">View Invoices</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                    <span class="nav-label">Return Item</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('returnitem-view') }}">return</a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a href="{{ url('admin-view-sales-report') }}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Sales Report</span>
                </a>


            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">GRN</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('admin-view-grn') }}"> Grn</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</nav>
