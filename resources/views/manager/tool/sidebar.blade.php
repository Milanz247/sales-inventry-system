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
                <a class="active" href="{{ url('manager-dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Stock Managment</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('manager-view-items') }}"> Items</a>
                    </li>
                    <li>
                        <a href="{{ url('manager-view-add-new-item-form') }}">Add New Item </a>
                    </li>
                    <li>
                        <a href="{{ url('manager-view-catagory') }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ url('manager-view-next-month-order') }}">Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">supplier Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('manager-view-supplier') }}">Suppliers</a>
                    </li>
                    <li>
                        <a href="{{ url('manager-view-add-supplier-form') }}">Add new supplier</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Bill</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('manager-view-billing') }}">Create Bill</a>
                    </li>
                    <li>
                        <a href=" {{ url('manager-view-process-bill')}} ">Processing Bill</a>
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
            </li>--}}
            <li>
                <a href="{{ url('manager-view-sales-report')}}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Sales Report</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">GRN</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('manager-view-grn') }}"> Grn</a>
                    </li>
                    <li>
                        <a href="{{ url('manager-view-grn-history') }}">View Grn Historys</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
