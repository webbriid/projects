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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Perl Travels - Admin Panel</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/prism/prism.css">
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cards</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
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
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="../assets/images/big/img2.jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="../assets/images/big/img3.jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6 img-fluid">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="../assets/images/big/img4.jpg"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                        </div>
                        <!-- Row -->
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Content types</h4>
                        <p class="text-muted mt-0">The building block of a card is the <code>.card</code>
                            <code>.card-body</code> Use it whenever you need a padded section within a card.</p>
                        <div class="card">
                            <div class="card-body collapse show">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Titles, text, and links</h4>
                        <p class="text-muted mt-0">Card titles are used by adding <code>.card-title</code> &amp;
                            <code>.card-subtitle</code> for subtitle of card.</p>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <h5 class="card-subtitle mb-2 text-muted">Card subtitle</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="javascript:void(0)" class="card-link">Card link</a>
                                <a href="javascript:void(0)" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Header and footer</h4>
                        <p class="text-muted mt-0 font-12">Add an optional header and/or footer within a card.</p>
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Header and footer</h4>
                        <p class="text-muted mt-0 font-12">Add an optional header and/or footer within a card.</p>
                        <!-- Card -->
                        <div class="card text-center">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-info">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Size Using grid markup</h4>
                        <p class="text-muted mt-0 font-12">Using the grid, wrap cards in columns and rows as
                            needed.<code>.col-1 to .col-12</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Text alignment</h4>
                        <p class="text-muted mt-0 font-12">You can quickly change the text
                            alignment<code>.text-center .text-right</code>.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-info">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-right">
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Using utilities</h4>
                        <p class="text-muted mt-0 font-12">Using the utility, you can give direct width class to card
                            like<code>.w-25, w-50, w-75, w-100</code></p>
                        <div class="card w-75">
                            <div class="card-body">
                                <h3 class="card-title">This card has width of 75%</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-danger">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-body">
                                <h3 class="card-title">This card has width of 50%</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Size Using grid markup</h4>
                        <p class="text-muted mt-0 font-12">Using the grid, wrap cards in columns and rows as
                            needed.<code>.col-1 to .col-12</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0)">Active</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)">Link</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="javascript:void(0)">Disabled</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0)">Active</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)">Link</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="javascript:void(0)">Disabled</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-info">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Card styles</h4>
                        <p class="text-muted mt-0 font-12">Cards include various options for customizing their
                            backgrounds, borders, and color.<code>.card-primary info, warning, danger</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-dark">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card text-white bg-primary">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-danger">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card text-white bg-warning">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-white">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to
                                    additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Card styles</h4>
                        <p class="text-muted mt-0 font-12">Cards include various options for customizing their
                            backgrounds, borders, and color.<code>.card-primary info, warning, danger</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-dark">
                            <div class="card-header bg-dark">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-info">
                            <div class="card-header bg-info">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card border-primary">
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-danger">
                            <div class="card-header bg-danger">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 text-white">Card Title</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Card Groups</h4>
                        <p class="text-muted mt-0 font-12">Use card groups to render cards as a single, attached element
                            with equal width and height columns.</p>
                        <div class="card-group">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img2.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to
                                        additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img3.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This card has even longer content than the first
                                        to show that equal height action.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Card with Deck</h4>
                        <p class="text-muted mt-0 font-12">Use card groups to render cards as a single, attached element
                            with equal width and height columns.</p>
                        <div class="card-deck">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img2.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img3.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This card has even longer content than the first
                                        to show that equal height action. supporting text below as a natural lead-in to
                                        additional content</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Card columns</h4>
                        <p class="text-muted mt-0 font-12">Cards can be organized into Masonry-like columns with just
                            CSS by wrapping them in <code>card-columns</code></p>
                        <div class="card-columns">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img6.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title that wraps to a new line</h4>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                            <div class="card p-3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                                </p>
                                <footer>
                                    <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </div>
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/img5.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to
                                        additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card bg-primary p-3 text-center text-white">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                <footer>
                                    <small>
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </div>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to
                                        additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img img-fluid" src="../assets/images/big/img4.jpg" alt="Card image">
                            </div>
                            <div class="card p-3 text-right">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                                </p>
                                <footer>
                                    <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This card has even longer content than the first
                                        to show that equal height action.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="../assets/extra-libs/prism/prism.js"></script>
</body>

</html>