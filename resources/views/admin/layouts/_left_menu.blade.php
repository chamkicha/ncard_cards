<ul id="menu" class="page-sidebar-menu">

    <li {!! (Request::is('admin') ? 'class="active"' : '' ) !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>


    <li {!! ( Request::is('admin/cardImport/cardimports*') || Request::is('admin/cardImport/cardimports/create') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Cards</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            
            <li {!! (Request::is('admin/cardImport/cardimports/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardImport.cardimports.index') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Card List
                </a>
            </li>
            
            <li  {!! (Request::is('admin/cardImport/cardimports/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardImport.cardimports.create') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Import Cards 
                </a>
            </li>
        </ul>
    </li>


    <li {!! ( Request::is('admin/cardrequisition/cardrequisitions*') || Request::is('admin/cardrequisition/cardrequisitions/create') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Card requisitions</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            
            <li {!! (Request::is('admin/cardrequisition/cardrequisitions/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardrequisition.cardrequisitions.index') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Requisition List
                </a>
            </li>
            
            <li  {!! (Request::is('admin/cardrequisition/cardrequisitions/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardrequisition.cardrequisitions.create') !!}">
                <i class="fa fa-angle-double-right"></i>
                        New Request 
                </a>
            </li>
        </ul>
    </li>


    <li {!! (Request::is('admin/users') || Request::is('admin/vendor/vendors*') || Request::is('admin/vendor/vendors/index') || Request::is('admin/bulk_import_users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/vendor/vendors/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ route('admin.vendor.vendors.index') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Vendors
                </a>
            </li>
            <li {!! (Request::is('admin/vendor/vendors/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ route('admin.vendor.vendors.create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Vendors
                </a>
            </li>


            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) || Request::is('admin/user_profile') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>


    <li {!! (Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/roles/*') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Roles</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/roles') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/roles') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Roles List
                </a>
            </li>
            <li {!! (Request::is('admin/roles/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/roles/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Role
                </a>
            </li>
        </ul>
    </li>

    

    <li {!! ( Request::is('admin/cardStatus/cardstatuses*') || Request::is('admin/vendorStatus/vendorStatuses*') || Request::is('admin/cardrequisitionStatus/cardrequisitionStatuses*') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Settings</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            
            <li {!! (Request::is('admin/cardStatus/cardstatuses/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardStatus.cardstatuses.index') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Card status
                </a>
            </li>
            
            <li  {!! (Request::is('admin/vendorStatus/vendorStatuses/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.vendorStatus.vendorStatuses.index') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Vendor Status
                </a>
            </li>
            
            <li  {!! (Request::is('admin/cardrequisitionStatus/cardrequisitionStatuses/index') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{!! route('admin.cardrequisitionStatus.cardrequisitionStatuses.index') !!}">
                <i class="fa fa-angle-double-right"></i>
                        Card requisition Status
                </a>
            </li>
        </ul>
    </li>
    <!-- Menus generated by CRUD generator -->
    @include('admin/layouts/menu')
</ul>
