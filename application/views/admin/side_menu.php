<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa-regular fa-pen-to-square"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Superadmin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>Admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#header_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-image"></i>
            <span>Header & Footer</span>
        </a>
        <div id="header_menu" class="collapse" aria-labelledby="header_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Header_home">Home</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Header_other">Page & Footer</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#partner__customer_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Partners & Customers</span>
        </a>
        <div id="partner__customer_menu" class="collapse" aria-labelledby="partner__customer_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Partners_management">Partners</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Customers_management">Customers</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-building"></i>
            <span>About Us</span>
        </a>
        <div id="about_menu" class="collapse" aria-labelledby="about_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> About management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Introduction">Introdaction</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/About_us">About Content</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Contact_us">Contact</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#insight_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Insight</span>
        </a>
        <div id="insight_menu" class="collapse" aria-labelledby="insight_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Insight management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Insight_category">Category</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Insight">Content</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hsolution_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>Solutions</span>
        </a>
        <div id="hsolution_menu" class="collapse" aria-labelledby="hsolution_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Solutions">Solution</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Solution_logo">Logo</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#interaction_menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-comment"></i>
            <span>Interactions</span>
        </a>
        <div id="interaction_menu" class="collapse" aria-labelledby="interaction_menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Interaction management:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Faq">FAQ</a>
                <a class="collapse-item" href="<?php echo base_url();?>Admin/Inquiry">Inquery</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
