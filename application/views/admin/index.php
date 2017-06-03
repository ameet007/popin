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
        <title>PopIn Admin Login</title>

        <!-- App css -->
        <link href="<?php echo base_url()?>backend-assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>backend-assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url()?>backend-assets/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="#" class="text-success">
                                          <?php /* ?>  <span><img src="<?php echo base_url()?>backend-assets/assets/images/logo.png" alt="" height="36"></span> <?php */ ?>
                                         <span>PopIn Admin Login</span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                  <?php if(!empty($error)){?>
                                     <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Message!</strong> <?php echo $error;?>
                                     </div>
                                     <?php } ?>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url()?>siteowner/AdminLogin">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="username"  placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div>
                                        </div>


                                        <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                              <!--  <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a> -->
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <!--<button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>-->
                                                 <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <!--<p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>-->
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url()?>backend-assets/assets/js/jquery.app.js"></script>

    </body>
</html>
