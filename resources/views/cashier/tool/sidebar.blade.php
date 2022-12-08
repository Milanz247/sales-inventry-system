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
                <a class="active" href="{{ url('cashier-dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Bill</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('cashier-view-billing') }}">Create Bill</a>
                    </li>
                    <li>
                        <a href=" {{ url('cashier-view-process-bill')}} ">Prossesing bill</a>
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
                <a href="{{ url('cashier-view-sales-report') }}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Sales Report</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
