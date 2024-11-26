<?php
include("protected_page.php")
?>




<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Travel Package</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- TinyMCE (Text Editor) -->
    <script src="https://cdn.tiny.cloud/1/irsvj7n33k29usp9ttesj178qs79yp2aiyz9nzpmnv0jwlsx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#packageDescription',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview',
            height: 300
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Handle form submission
            document.querySelector("form").addEventListener("submit", function(event) {
                const content = tinymce.get("packageDescription").getContent();

                if (content.trim() === "") {
                    event.preventDefault(); // Prevent form submission
                    Swal.fire({
                        icon: "error",
                        text: "Please enter a package description",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Manually add invalid class to TinyMCE editor
                    const textarea = document.querySelector("#packageDescription");
                    textarea.classList.add("is-invalid");
                    return;
                }
            });
        });
    </script>

    <script>
        tinymce.init({
            selector: '#processDescription',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview',
            height: 300
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Handle form submission
            document.querySelector("form").addEventListener("submit", function(event) {
                const content = tinymce.get("processDescription").getContent();

                if (content.trim() === "") {
                    event.preventDefault(); // Prevent form submission
                    Swal.fire({
                        icon: "error",
                        text: "Please enter a package description",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Manually add invalid class to TinyMCE editor
                    const textarea = document.querySelector("#processDescription");
                    textarea.classList.add("is-invalid");
                    return;
                }
            });
        });
    </script>
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php include('import/header.php'); ?>
        <?php include('import/sideNav.php'); ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Create Travel Package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Travel Package</h4>

                                <?php
                                require("config/db.php");

                                if (isset($_POST['publish_package'])) {
                                    try {
                                        // Retrieving form input values
                                        $packageTitle = $_POST['packageTitle'];
                                        $packageDescription = $_POST['packageDescription'];
                                        $packagePrice = $_POST['packagePrice'];
                                        $packageTotalPersons = $_POST['packageTotalPersons'];
                                        $packageTourType = $_POST['packageTourType'];
                                        $packagePlace = $_POST['packagePlace'];
                                        $packageDuration = $_POST['packageDuration'];
                                        $packageFrom = $_POST['packageFrom'];
                                        $packageTo = $_POST['packageTo'];
                                        $agent = $_POST['agent'];
                                        $nationality = $_POST['nationality'];
                                        $groupName = $_POST['groupName'];
                                        $hotelPlace = $_POST['hotelPlace'];
                                        $departure = $_POST['departure'];
                                        $offer = $_POST['offer'];
                                        $arrived = $_POST['arrived'];

                                        $processDurationDay1 = $_POST['processDurationDay1'];
                                        $processPlace1 = $_POST['processPlace1'];
                                        $editor1 = $_POST['editor1'];

                                        $processDurationDay2 = $_POST['processDurationDay2'];
                                        $processPlace2 = $_POST['processPlace2'];
                                        $editor2 = $_POST['editor2'];

                                        $processDurationDay3 = $_POST['processDurationDay3'];
                                        $processPlace3 = $_POST['processPlace3'];
                                        $editor3 = $_POST['editor3'];

                                        $processDurationDay4 = $_POST['processDurationDay4'];
                                        $processPlace4 = $_POST['processPlace4'];
                                        $editor4 = $_POST['editor4'];

                                        $processDurationDay5 = $_POST['processDurationDay5'];
                                        $processPlace5 = $_POST['processPlace5'];
                                        $editor5 = $_POST['editor5'];

                                        $processDurationDay6 = $_POST['processDurationDay6'];
                                        $processPlace6 = $_POST['processPlace6'];
                                        $editor6 = $_POST['editor6'];

                                        $processDurationDay7 = $_POST['processDurationDay7'];
                                        $processPlace7 = $_POST['processPlace7'];
                                        $editor7 = $_POST['editor7'];

                                        // Handling included and excluded items as arrays
                                        $packageIncluded = isset($_POST['packageIncluded']) ? $_POST['packageIncluded'] : [];
                                        $packageExcluded = isset($_POST['packageExcluded']) ? $_POST['packageExcluded'] : [];

                                        // Encoding them into JSON format
                                        $includedJson = json_encode($packageIncluded);
                                        $excludedJson = json_encode($packageExcluded);

                                        // Checking if the image was uploaded
                                        if (isset($_FILES['packageImage']) && $_FILES['packageImage']['error'] == 0) {
                                            $imageTmpName = $_FILES['packageImage']['tmp_name'];
                                            $imageData = file_get_contents($imageTmpName);

                                            // SQL Insert statement
                                            $sql = "INSERT INTO tour_package (
                                                processDurationDay1, processPlace1, editor1,
                                                processDurationDay2, processPlace2, editor2,
                                                processDurationDay3, processPlace3, editor3,
                                                processDurationDay4, processPlace4, editor4,
                                                processDurationDay5, processPlace5, editor5,
                                                processDurationDay6, processPlace6, editor6,
                                                processDurationDay7, processPlace7, editor7,
                                                departure, offer, arrived, agent, nationality,
                                                groupName, hotelPlace, packageTo, packageFrom, 
                                                packageTitle, packageDescription, packagePrice, 
                                                packageTotalPersons, packageTourType, packagePlace, 
                                                packageDuration, packageImage, packageIncluded, packageExcluded
                                            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            

                                            $stmt = $pdo->prepare($sql);

                                            // Execute the prepared statement with bound parameters
                                            if ($stmt->execute([
                                                $processDurationDay1,
                                                $processPlace1,
                                                $editor1,
                                                $processDurationDay2,
                                                $processPlace2,
                                                $editor2,
                                                $processDurationDay3,
                                                $processPlace3,
                                                $editor3,
                                                $processDurationDay4,
                                                $processPlace4,
                                                $editor4,
                                                $processDurationDay5,
                                                $processPlace5,
                                                $editor5,
                                                $processDurationDay6,
                                                $processPlace6,
                                                $editor6,
                                                $processDurationDay7,
                                                $processPlace7,
                                                $editor7,
                                                $departure,
                                                $offer,
                                                $arrived,
                                                $agent,
                                                $nationality,
                                                $groupName,
                                                $hotelPlace,
                                                $packageTo,
                                                $packageFrom,
                                                $packageTitle,
                                                $packageDescription,
                                                $packagePrice,
                                                $packageTotalPersons,
                                                $packageTourType,
                                                $packagePlace,
                                                $packageDuration,
                                                $imageData,
                                                $includedJson,
                                                $excludedJson
                                            ])) {
                                                echo '<script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            text: "Package Published Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';
                                            } else {
                                                echo '<script>
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            text: "Failed to Submit Package Details",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';
                                            }
                                        } else {
                                            echo '<script>
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        text: "Please upload an image",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>';
                                        }
                                    } catch (Exception $e) {
                                        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
                                    }
                                }
                                ?>


                                <form method="POST" enctype="multipart/form-data">
                                    <!-- Package Title -->
                                    <div class="form-group pb-2">
                                        <label for="packageTitle">Package Title</label>
                                        <input type="text" class="form-control" id="packageTitle" name="packageTitle" placeholder="Enter package title" required>
                                    </div>

                                    <label for="packagePrice" style="color:red"> Offer Percentage</label>
                                    <div class="form-group pb-2">
                                        <label for="offer">Offer</label>
                                        <input type="number" class="form-control" id="offer" name="offer" placeholder="Enter your Offer">
                                    </div>

                                    <label for="packagePrice" style="color:red">Special Offers</label>

                                    <div class="form-group pb-2">
                                        <label for="packageFrom">From</label>
                                        <input type="date" class="form-control" id="packageFrom" name="packageFrom">
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packageTo">To</label>
                                        <input type="date" class="form-control" id="packageTo" name="packageTo" required>
                                    </div>

                                    <label for="packagePrice" style="color:red">Flight Dates</label>
                                    <div class="form-group pb-2">
                                        <label for="departure">Departure</label>
                                        <input type="date" class="form-control" id="departure" name="departure" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="arrived">Arrived</label>
                                        <input type="date" class="form-control" id="arrived" name="arrived" required>
                                    </div>

                                    <!-- Package Description -->
                                    <div class="form-group pb-2">
                                        <label for="packageDescription">Description</label>
                                        <textarea class="form-control" id="packageDescription" name="packageDescription" placeholder="Enter package description"></textarea>
                                    </div>

                                    <!-- Included Items -->
                                    <div class="form-group pb-2">
                                        <label for="packageIncluded">Included</label>
                                        <div id="includedFields">
                                            <input type="text" class="form-control mb-2" name="packageIncluded[]" placeholder="Enter package Included">
                                        </div>
                                        <button type="button" class="btn btn-link" id="addIncludedField">
                                            <i class="fa fa-plus"></i> Add More
                                        </button>
                                    </div>

                                    <!-- Excluded Items -->
                                    <div class="form-group pb-2">
                                        <label for="packageExcluded">Excluded</label>
                                        <div id="excludedFields">
                                            <input type="text" class="form-control mb-2" name="packageExcluded[]" placeholder="Enter package Excluded">
                                        </div>
                                        <button type="button" class="btn btn-link" id="addExcludedField">
                                            <i class="fa fa-plus"></i> Add More
                                        </button>
                                    </div>

                                    <!-- Package Price -->
                                    <div class="form-group pb-2">
                                        <label for="packagePrice">Price</label>
                                        <input type="number" class="form-control" id="packagePrice" name="packagePrice" required>
                                    </div>

                                    <!-- Total Persons -->
                                    <div class="form-group pb-2">
                                        <label for="packageTotalPersons">Total Persons</label>
                                        <input type="number" class="form-control" id="packageTotalPersons" name="packageTotalPersons">
                                    </div>

                                    <!-- Tour Type -->
                                    <div class="form-group pb-2">
                                        <label for="packageTourType">Tour Type</label>
                                        <input type="text" class="form-control" id="packageTourType" name="packageTourType">
                                    </div>

                                    <!-- Package Place -->
                                    <div class="form-group pb-2">
                                        <label for="packagePlace">Place</label>
                                        <input type="text" class="form-control" id="packagePlace" name="packagePlace" required>
                                    </div>

                                    <!-- Agent -->
                                    <div class="form-group pb-2">
                                        <label for="agent">Agent</label>
                                        <input type="text" class="form-control" id="agent" name="agent">
                                    </div>

                                    <!-- Group Name -->
                                    <div class="form-group pb-2">
                                        <label for="groupName">Group Name</label>
                                        <input type="text" class="form-control" id="groupName" name="groupName">
                                    </div>

                                    <!-- Nationality -->
                                    <div class="form-group pb-2">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality">
                                    </div>

                                    <!-- Hotel Place -->
                                    <div class="form-group pb-2">
                                        <label for="hotelPlace">Hotel</label>
                                        <input type="text" class="form-control" id="hotelPlace" name="hotelPlace">
                                    </div>

                                    <!-- Package Duration -->
                                    <div class="form-group pb-2">
                                        <label for="packageDuration">Duration</label>
                                        <input type="text" class="form-control" id="packageDuration" name="packageDuration" required>
                                    </div>

                                    <!-- Package Image -->
                                    <div class="form-group pb-2">
                                        <label for="packageImage">Package Image</label>
                                        <input type="file" class="form-control-file" id="packageImage" name="packageImage" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="tripPackageProcess">Package Process</label>

                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay1" name="processDurationDay1" value="Day 1">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace1" name="processPlace1" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor1" id="editor1" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay2" name="processDurationDay2" value="Day 2">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace2" name="processPlace2" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor2" id="editor2" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay3" name="processDurationDay3" value="Day 3">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace3" name="processPlace3" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor3" id="editor3" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay4" name="processDurationDay4" value="Day 4">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace4" name="processPlace4" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor4" id="editor4" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay5" name="processDurationDay5" value="Day 5">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace5" name="processPlace5" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor5" id="editor5" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay6" name="processDurationDay6" value="Day 6">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace6" name="processPlace6" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor6" id="editor6" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay7" name="processDurationDay7" value="Day 7">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace7" name="processPlace7" placehoder="Place">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor7" id="editor7" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary" name="publish_package">Publish Package</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!-- Add More Fields Functionality -->
    <script>
        // Add more included fields
        document.getElementById('addIncludedField').addEventListener('click', function() {
            var includedFieldsDiv = document.getElementById('includedFields');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control mb-2';
            newInput.name = 'packageIncluded[]';
            newInput.placeholder = 'Enter package Included';
            includedFieldsDiv.appendChild(newInput);
        });

        // Add more excluded fields
        document.getElementById('addExcludedField').addEventListener('click', function() {
            var excludedFieldsDiv = document.getElementById('excludedFields');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control mb-2';
            newInput.name = 'packageExcluded[]';
            newInput.placeholder = 'Enter package Excluded';
            excludedFieldsDiv.appendChild(newInput);
        });
    </script>

    <script>
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        // Set the 'min' and 'max' attributes to today's date
        document.getElementById('packageFrom').setAttribute('min', today);
        document.getElementById('packageFrom').setAttribute('max', today);
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor3'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor4'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor5'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor6'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor7'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'fontSize']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>