<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Perl Travels - Admin Panel</title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        include('import/header.php')
        ?>


        <?php
        include('import/sideNav.php')
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ticket List</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Ticket List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">2,064</h1>
                                                <h6 class="text-white">Total Tickets</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">1,738</h1>
                                                <h6 class="text-white">Responded</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">1100</h1>
                                                <h6 class="text-white">Resolve</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">964</h1>
                                                <h6 class="text-white">Pending</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Agent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">276377</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1234251</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/11</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1020345</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/04/01</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">7810203</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/01/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">2103450</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/01</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">2140530</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/07/01</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">4500123</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/10</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1230450</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/14</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1240503</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/02/01</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1250304</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/05/21</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1470250</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/11</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1450023</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/05/13</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1420530</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/10/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Agent</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>

</html>