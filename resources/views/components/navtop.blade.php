<div class="page-container">
    <!-- START HEADER -->
    <div class="header ">
        <!-- START MOBILE SIDEBAR TOGGLE -->
        <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
        </a>
        <!-- END MOBILE SIDEBAR TOGGLE -->
        <div class="">
            <div class="brand inline  m-l-10 text-center">
                <img src="/assets/img/logo_2x.png?3" alt="logo" data-src="/assets/img/logo_2x.png?3" data-src-retina="/assets/img/logo-2x.png?2" height="50" class="d-none d-lg-block">
            </div>
        </div>
        <div class="d-flex align-items-center">

            <!-- START NOTIFICATION LIST -->
            <ul class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block b-grey b-l b-r no-style p-l-20 p-r-20">


            </ul>
            <!-- END NOTIFICATIONS LIST -->

            <!-- START User Info-->
            <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
                <span class="semi-bold">&nbsp;&nbsp;{{ MyAccount()->name }}</span>
            </div>
            <div class="dropdown pull-right d-lg-block d-none">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="thumbnail-wrapper d32 circular inline" style="cursor: pointer;">
                        <img src="/assets/img/profiles/avatar.jpg" alt="" data-src="/assets/img/profiles/avatar.jpg" data-src-retina="/assets/img/profiles/avatar.jpg" width="32" height="32">
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                    <a href="{!! url('/logout'); !!}" class="clearfix bg-master-lighter dropdown-item">
                        <span class="pull-left">Logout</span>
                        <span class="pull-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
