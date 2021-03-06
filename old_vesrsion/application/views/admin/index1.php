<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url()?>backend-assets/assets/images/favicon.ico">
        <!-- App title -->
        <title>PopIn Dashboard</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>backend-assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="<?php echo base_url()?>backend-assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url()?>backend-assets/plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url()?>backend-assests/assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php $this->load->view('admin/include/header'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('admin/include/left-sidebar'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Statistics</p>
                                        <h2>34578 <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-account-convert widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">User Today</p>
                                        <h2>895 <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 1250</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">User This Month</p>
                                        <h2>52410 <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 40.33k</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-av-timer widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Request Per Minute</p>
                                        <h2>652 <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 956</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Users">Total Users</p>
                                        <h2>3245 <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 20k</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-download widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">New Downloads</p>
                                        <h2>78541 <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        <p class="text-muted m-0"><b>Last:</b> 50k</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <!--<div class="col-lg-4">
                        		<div class="card-box">

                        			<h4 class="header-title m-t-0">Daily Sales</h4>

                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example"style="height: 245px;"></div>
                                        <ul class="list-inline chart-detail-list m-b-0">
                                            <li>
                                                <h5 class="text-danger"><i class="fa fa-circle m-r-5"></i>Series A</h5>
                                            </li>
                                            <li>
                                                <h5 class="text-success"><i class="fa fa-circle m-r-5"></i>Series B</h5>
                                            </li>
                                        </ul>
                                	</div>
                        		</div>
                            </div>--><!-- end col -->

                            <!--<div class="col-lg-4">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0">Statistics</h4>
                                    <div id="morris-bar-example" style="height: 280px;"></div>
                                </div>
                            </div>--><!-- end col -->

                            <!--<div class="col-lg-4">
                                <div class="card-box">

                                    <h4 class="header-title m-t-0">Total Revenue</h4>
                                    <div id="morris-line-example" style="height: 280px;"></div>
                                </div>
                            </div>--><!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <!--<div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                                    <div class="table-responsive">
                                        <table class="table table table-hover m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>User Name</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <img src="<?php echo base_url()?>backend-assets/assets/images/users/avatar-1.jpg" alt="user" class="thumb-sm img-circle" />
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Louis Hansen</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+12 3456 789</td>
                                                    <td>USA</td>
                                                    <td>07/08/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="<?php echo base_url()?>backend-assets/assets/images/users/avatar-2.jpg" alt="user" class="thumb-sm img-circle" />
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Craig Hause</h5>
                                                        <p class="m-0 text-muted font-13"><small>Programmer</small></p>
                                                    </td>
                                                    <td>+89 345 6789</td>
                                                    <td>Canada</td>
                                                    <td>29/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="<?php echo base_url()?>backend-assets/assets/images/users/avatar-3.jpg" alt="user" class="thumb-sm img-circle" />
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Edward Grimes</h5>
                                                        <p class="m-0 text-muted font-13"><small>Founder</small></p>
                                                    </td>
                                                    <td>+12 29856 256</td>
                                                    <td>Brazil</td>
                                                    <td>22/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="<?php echo base_url()?>backend-assets/assets/images/users/avatar-4.jpg" alt="user" class="thumb-sm img-circle" />
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Bret Weaver</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+00 567 890</td>
                                                    <td>USA</td>
                                                    <td>20/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <img src="<?php echo base_url()?>backend-assets/assets/images/users/avatar-5.jpg" alt="user" class="thumb-sm img-circle" />
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Mark</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web design</small></p>
                                                    </td>
                                                    <td>+91 123 456</td>
                                                    <td>India</td>
                                                    <td>07/07/2016</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>-->
                            <!-- end col -->

                            <!--<div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                                    <div class="table-responsive">
                                        <table class="table table table-hover m-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>User Name</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-success">L</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Louis Hansen</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+12 3456 789</td>
                                                    <td>USA</td>
                                                    <td>07/08/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-primary">C</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Craig Hause</h5>
                                                        <p class="m-0 text-muted font-13"><small>Programmer</small></p>
                                                    </td>
                                                    <td>+89 345 6789</td>
                                                    <td>Canada</td>
                                                    <td>29/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-brown">E</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Edward Grimes</h5>
                                                        <p class="m-0 text-muted font-13"><small>Founder</small></p>
                                                    </td>
                                                    <td>+12 29856 256</td>
                                                    <td>Brazil</td>
                                                    <td>22/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-pink">B</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Bret Weaver</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                                    </td>
                                                    <td>+00 567 890</td>
                                                    <td>USA</td>
                                                    <td>20/07/2016</td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <span class="avatar-sm-box bg-orange">M</span>
                                                    </th>
                                                    <td>
                                                        <h5 class="m-0">Mark</h5>
                                                        <p class="m-0 text-muted font-13"><small>Web design</small></p>
                                                    </td>
                                                    <td>+91 123 456</td>
                                                    <td>India</td>
                                                    <td>07/07/2016</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>-->
                            <!-- end col -->

                        </div>
                        <!-- end row -->




                    </div> <!-- container -->

                </div> <!-- content -->

               <?php $this->load->view('admin/include/footer'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
             <?php $this->load->view('admin/include/right-sidebar'); ?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/detect.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url()?>backend-assets/plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url()?>backend-assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>backend-assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="<?php echo base_url()?>backend-assets/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url()?>backend-assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url()?>backend-assets/assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.app.js"></script>

    </body>
</html>
