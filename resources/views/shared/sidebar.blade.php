 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital text-info"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lata Medical</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Call & Visits
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">

            <i class="fas fa-fw fa-phone-volume"></i>
            <span>Biweekly Telecall</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Biweekly Telecall:</h6>
                <a class="collapse-item" href="{{ route('new_call') }}">New Call</a>
                <a class="collapse-item" href="buttons.html">Pending Calls</a>
                <a class="collapse-item" href="buttons.html">Hospital Visits</a>
                <a class="collapse-item" href="buttons.html">Home Visit for No Contact</a>
                <a class="collapse-item" href="buttons.html">Home Visit for No Contact</a>
                <a class="collapse-item" href="buttons.html">Home Visit for ILS Contact</a>
                <a class="collapse-item" href="buttons.html">ILS FollowUp Call</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">

            <i class="fas fa-fw fa-person-booth"></i>
            <span>In Person Visit</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ANC Visit:</h6>
                <a class="collapse-item" href="utilities-color.html">ANC Visit 2</a>
                <a class="collapse-item" href="utilities-border.html">ANC Visit 3</a>
                <a class="collapse-item" href="utilities-animation.html">ANC Visit 4</a>
                <a class="collapse-item" href="utilities-other.html">Delivery Visit</a>
                <a class="collapse-item" href="utilities-other.html">Day7 postpartum Visit</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Staff and Reports
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">

            <i class="fas fa-fw fa-user-nurse"></i>
            <span>Operators</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Operator details</h6>
                <a class="collapse-item" href="{{ route('viewall_operator') }}">View</a>
                <a class="collapse-item" href="{{ route('add_operator') }}">Add</a>

            </div>
        </div>
    </li>
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatients"
            aria-expanded="true" aria-controls="collapsePatients">

            <i class="fas fa-fw fa-female"></i>
            <span>Patients</span>
        </a>
        <div id="collapsePatients" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Operator details</h6>
                <a class="collapse-item"href="{{ route('viewall_patients') }}">View</a>
                <a class="collapse-item" href="{{ route('add_patient') }}">Add</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-print"></i>
            <span>Reports</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
