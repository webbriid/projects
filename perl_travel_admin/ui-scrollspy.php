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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Scrollspy</h4>
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
                <!-- ============================================================== -->
                <!-- First Card with Navbar -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Scrollspy with Navbar</h4>
                        <nav id="navbar-example2" class="navbar navbar-light bg-light">
                            <a class="navbar-brand text-muted" href="#">Navbar</a>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="#fat">First</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#mdo">Second</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="true" aria-expanded="false">Third with Dropdown</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#one">one</a>
                                        <a class="dropdown-item" href="#two">two</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#three">three</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0"
                            class="position-relative mt-2" style="height: 200px; overflow: auto;">
                            <h4 id="fat">@fat</h4>
                            <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they
                                sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles
                                cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo
                                jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et
                                cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus,
                                cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
                            <h4 id="mdo">@mdo</h4>
                            <p>Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard
                                aliqua cupidatat mcsweeney's vero. Cupidatat four loko nisi, ea helvetica nulla carles.
                                Tattooed cosby sweater food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes
                                anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn
                                adipisicing craft beer vice keytar deserunt.</p>
                            <h4 id="one">First item</h4>
                            <p>Occaecat commodo aliqua delectus. Fap craft beer deserunt skateboard ea. Lomo bicycle
                                rights adipisicing banh mi, velit ea sunt next level locavore single-origin coffee in
                                magna veniam. High life id vinyl, echo park consequat quis aliquip banh mi pitchfork.
                                Vero VHS est adipisicing. Consectetur nisi DIY minim messenger bag. Cred ex in,
                                sustainable delectus consectetur fanny pack iphone.</p>
                            <h4 id="two">Second item</h4>
                            <p>In incididunt echo park, officia deserunt mcsweeney's proident master cleanse thundercats
                                sapiente veniam. Excepteur VHS elit, proident shoreditch +1 biodiesel laborum craft
                                beer. Single-origin coffee wayfarers irure four loko, cupidatat terry richardson master
                                cleanse. Assumenda you probably haven't heard of them art party fanny pack, tattooed
                                nulla cardigan tempor ad. Proident wolf nesciunt sartorial keffiyeh eu banh mi
                                sustainable. Elit wolf voluptate, lo-fi ea portland before they sold out four loko.
                                Locavore enim nostrud mlkshk brooklyn nesciunt.</p>
                            <h4 id="three">Third item</h4>
                            <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they
                                sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles
                                cardigan. Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo
                                jean shorts, williamsburg hoodie minim qui you probably haven't heard of them et
                                cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus,
                                cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
                            <p>Keytar twee blog, culpa messenger bag marfa whatever delectus food truck. Sapiente synth
                                id assumenda. Locavore sed helvetica cliche irony, thundercats you probably haven't
                                heard of them consequat hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before
                                they sold out, terry richardson proident brunch nesciunt quis cosby sweater pariatur
                                keffiyeh ut helvetica artisan. Cardigan craft beer seitan readymade velit. VHS chambray
                                laboris tempor veniam. Anim mollit minim commodo ullamco thundercats.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Second Card with Nested Nav -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Scollspy with Nested Nav</h4>
                        <div class="row">
                            <div class="col-4">
                                <nav id="navbar-example3" class="navbar navbar-light flex-column">
                                    <a class="navbar-brand text-muted" href="#">Navbar</a>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link" href="#item-1">Item 1</a>
                                        <nav class="nav nav-pills flex-column">
                                            <a class="nav-link ml-3 my-1" href="#item-1-1">Item 1-1</a>
                                            <a class="nav-link ml-3 my-1" href="#item-1-2">Item 1-2</a>
                                        </nav>
                                        <a class="nav-link" href="#item-2">Item 2</a>
                                        <a class="nav-link" href="#item-3">Item 3</a>
                                        <nav class="nav nav-pills flex-column">
                                            <a class="nav-link ml-3 my-1" href="#item-3-1">Item 3-1</a>
                                            <a class="nav-link ml-3 my-1" href="#item-3-2">Item 3-2</a>
                                        </nav>
                                    </nav>
                                </nav>
                            </div>
                            <div class="col-8">
                                <div data-spy="scroll" data-target="#navbar-example3" data-offset="0"
                                    class="position-relative mt-4" style="height: 300px;overflow: auto;">
                                    <h4 id="item-1">Item 1</h4>
                                    <p>Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco
                                        duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur
                                        ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat
                                        enim dolore proident. Qui laborum do non excepteur nulla magna eiusmod
                                        consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim
                                        reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip
                                        nulla enim veniam non fugiat id cupidatat nulla elit cupidatat commodo velit ut
                                        eiusmod cupidatat elit dolore.</p>
                                    <h5 id="item-1-1">Item 1-1</h5>
                                    <p>Amet tempor mollit aliquip pariatur excepteur commodo do ea cillum commodo Lorem
                                        et occaecat elit qui et. Aliquip labore ex ex esse voluptate occaecat Lorem
                                        ullamco deserunt. Aliqua cillum excepteur irure consequat id quis ea. Sit
                                        proident ullamco aute magna pariatur nostrud labore. Reprehenderit aliqua
                                        commodo eiusmod aliquip est do duis amet proident magna consectetur consequat eu
                                        commodo fugiat non quis. Enim aliquip exercitation ullamco adipisicing voluptate
                                        excepteur minim exercitation minim minim commodo adipisicing exercitation
                                        officia nisi adipisicing. Anim id duis qui consequat labore adipisicing sint
                                        dolor elit cillum anim et fugiat.</p>
                                    <h5 id="item-1-2">Item 1-2</h5>
                                    <p>Cillum nisi deserunt magna eiusmod qui eiusmod velit voluptate pariatur laborum
                                        sunt enim. Irure laboris mollit consequat incididunt sint et culpa culpa
                                        incididunt adipisicing magna magna occaecat. Nulla ipsum cillum eiusmod sint
                                        elit excepteur ea labore enim consectetur in labore anim. Proident ullamco ipsum
                                        esse elit ut Lorem eiusmod dolor et eiusmod. Anim occaecat nulla in non
                                        consequat eiusmod velit incididunt.</p>
                                    <h4 id="item-2">Item 2</h4>
                                    <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor.
                                        Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua.
                                        Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim
                                        Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco
                                        deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum
                                        mollit labore officia laborum excepteur commodo non commodo dolor excepteur
                                        commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.
                                    </p>
                                    <h4 id="item-3">Item 3</h4>
                                    <p>Quis anim sit do amet fugiat dolor velit sit ea ea do reprehenderit culpa duis.
                                        Nostrud aliqua ipsum fugiat minim proident occaecat excepteur aliquip culpa aute
                                        tempor reprehenderit. Deserunt tempor mollit elit ex pariatur dolore velit
                                        fugiat mollit culpa irure ullamco est ex ullamco excepteur.</p>
                                    <h5 id="item-3-1">Item 3-1</h5>
                                    <p>Deserunt quis elit Lorem eiusmod amet enim enim amet minim Lorem proident
                                        nostrud. Ea id dolore anim exercitation aute fugiat labore voluptate cillum do
                                        laboris labore. Ex velit exercitation nisi enim labore reprehenderit labore
                                        nostrud ut ut. Esse officia sunt duis aliquip ullamco tempor eiusmod deserunt
                                        irure nostrud irure. Ullamco proident veniam laboris ea consectetur magna sunt
                                        ex exercitation aliquip minim enim culpa occaecat exercitation. Est tempor
                                        excepteur aliquip laborum consequat do deserunt laborum esse eiusmod irure
                                        proident ipsum esse qui.</p>
                                    <h5 id="item-3-2">Item 3-2</h5>
                                    <p>Labore sit culpa commodo elit adipisicing sit aliquip elit proident voluptate
                                        minim mollit nostrud aute reprehenderit do. Mollit excepteur eu Lorem ipsum anim
                                        commodo sint labore Lorem in exercitation velit incididunt. Occaecat consectetur
                                        nisi in occaecat proident minim enim sunt reprehenderit exercitation cupidatat
                                        et do officia. Aliquip consequat ad labore labore mollit ut amet. Sit pariatur
                                        tempor proident in veniam culpa aliqua excepteur elit magna fugiat eiusmod amet
                                        officia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Third Card with List Group -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Scrollspy with List-group</h4>
                        <div class="row">
                            <div class="col-4">
                                <div id="list-example" class="list-group">
                                    <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
                                    <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
                                    <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                                    <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div data-spy="scroll" data-target="#list-example" data-offset="0"
                                    class="position-relative mt-2" style="height: 200px; overflow: auto;">
                                    <h4 id="list-item-1">Item 1</h4>
                                    <p>Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco
                                        duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur
                                        ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat
                                        enim dolore proident. Qui laborum do non excepteur nulla magna eiusmod
                                        consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim
                                        reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip
                                        nulla enim veniam non fugiat id cupidatat nulla elit cupidatat commodo velit ut
                                        eiusmod cupidatat elit dolore.</p>
                                    <h4 id="list-item-2">Item 2</h4>
                                    <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor.
                                        Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua.
                                        Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim
                                        Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco
                                        deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum
                                        mollit labore officia laborum excepteur commodo non commodo dolor excepteur
                                        commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.
                                    </p>
                                    <h4 id="list-item-3">Item 3</h4>
                                    <p>Quis anim sit do amet fugiat dolor velit sit ea ea do reprehenderit culpa duis.
                                        Nostrud aliqua ipsum fugiat minim proident occaecat excepteur aliquip culpa aute
                                        tempor reprehenderit. Deserunt tempor mollit elit ex pariatur dolore velit
                                        fugiat mollit culpa irure ullamco est ex ullamco excepteur.</p>
                                    <h4 id="list-item-4">Item 4</h4>
                                    <p>Quis anim sit do amet fugiat dolor velit sit ea ea do reprehenderit culpa duis.
                                        Nostrud aliqua ipsum fugiat minim proident occaecat excepteur aliquip culpa aute
                                        tempor reprehenderit. Deserunt tempor mollit elit ex pariatur dolore velit
                                        fugiat mollit culpa irure ullamco est ex ullamco excepteur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>

</html>