<header id="header" data-transparent="true" class="dark submenu-light">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="<?php echo base_url();?>">
                    <span class="logo-default"><img src="<?php echo $this->config->item('website_source'); ?>img/logo1.svg"></span>
                    <span class="logo-dark"><img src="<?php echo $this->config->item('website_source'); ?>img/logo1.svg"></span>
                </a>
            </div>
            <!--End: Logo-->
            <!-- Search -->
            <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                <form class="search-form" action="search-results-page.html" method="get">
                    <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                    <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                </form>
            </div>
            <!-- end: search -->
            <!--Header Extras-->
            <div class="header-extras">
                <ul>
                    <li>
                        <a href="<?php echo base_url();?>Website/Inquiry" class="btn btn-main d-none d-sm-block m-t-20">Send Inquiry</a>
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu" class="menu-center">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="<?php echo base_url();?>Website/Solution">Solution</a></li>
                            <li><a href="<?php echo base_url();?>Website/Faq">FAQ</a></li>
                            <li><a href="<?php echo base_url();?>Website/Insight/<?php echo $slug=null; ?>">Insight</a></li>
                            <li><a href="<?php echo base_url();?>Website/About">About Us</a></li>
                            <li class="d-block d-sm-none"><a href="<?php echo base_url();?>Website/Inquiry">Send Inquiry</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
