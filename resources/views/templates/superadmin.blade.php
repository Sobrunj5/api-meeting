<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:02:48 GMT -->
@include('templates.partials.superadmin._head')
<!-- END HEAD -->

<body
        class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
<div class="page-wrapper">
    <!-- start header -->
@include('templates.partials.superadmin._navbar')
<!-- end header -->
    <!-- start color quick setting -->
    <!-- end color quick setting -->
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
    @include('templates.partials.superadmin._sidebar')
    <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- end page content -->
        <!-- start chat sidebar -->
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; Smart University Theme By
            <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">Redstar Theme</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
</div>
<!-- start js include path -->
@include('templates.partials.superadmin._script')
<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:03:51 GMT -->
</html>