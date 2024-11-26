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
                                <h4 class="card-title">Edit Travel Package</h4>

                                <?php
                                require("config/db.php");

                                $packageId = $_GET['id'] ?? null;
                                $package = null;

                                // Fetch package data by ID
                                if ($packageId) {
                                    $stmt = $pdo->prepare("SELECT * FROM tour_package WHERE p_id = ?");
                                    $stmt->execute([$packageId]);
                                    $package = $stmt->fetch();
                                }

                                // Update package details on form submission
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_package'])) {
                                    try {
                                        // Get the form data
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
                                        $offer = $_POST['offer'];
                                        $departure = $_POST['departure'];
                                        $arrived = $_POST['arrived'];

                                        // Process trip package details for all days
                                        $tripDetails = [];
                                        for ($i = 1; $i <= 7; $i++) {
                                            $tripDetails[] = [
                                                "day" => $_POST["processDurationDay$i"] ?? '',
                                                "place" => $_POST["processPlace$i"] ?? '',
                                                "description" => $_POST["editor$i"] ?? ''
                                            ];
                                        }

                                        $tripDetailsJson = json_encode($tripDetails);

                                        // Handle package included/excluded
                                        $packageIncluded = json_encode($_POST['packageIncluded'] ?? []);
                                        $packageExcluded = json_encode($_POST['packageExcluded'] ?? []);

                                        // Handle image upload
                                        if (isset($_FILES['packageImage']) && $_FILES['packageImage']['error'] == 0) {
                                            $imageTmpName = $_FILES['packageImage']['tmp_name'];
                                            $imageData = file_get_contents($imageTmpName);

                                            $sql = "UPDATE tour_package SET 
                offer = ?, departure = ?, arrived = ?,
                packageFrom = ?, packageTo = ?, agent = ?, nationality = ?, 
                groupName = ?, hotelPlace = ?, packageTitle = ?, 
                packageDescription = ?, packagePrice = ?, 
                packageTotalPersons = ?, packageTourType = ?, packagePlace = ?, 
                packageDuration = ?, packageImage = ?, 
                packageIncluded = ?, packageExcluded = ?, 
                tripDetails = ?
                WHERE p_id = ?";
                                            $params = [
                                                $offer,
                                                $departure,
                                                $arrived,
                                                $packageFrom,
                                                $packageTo,
                                                $agent,
                                                $nationality,
                                                $groupName,
                                                $hotelPlace,
                                                $packageTitle,
                                                $packageDescription,
                                                $packagePrice,
                                                $packageTotalPersons,
                                                $packageTourType,
                                                $packagePlace,
                                                $packageDuration,
                                                $imageData,
                                                $packageIncluded,
                                                $packageExcluded,
                                                $tripDetailsJson,
                                                $packageId
                                            ];
                                        } else {
                                            // SQL statement without image upload
                                            $sql = "UPDATE tour_package SET 
                offer = ?, departure = ?, arrived = ?,
                packageFrom = ?, packageTo = ?, agent = ?, nationality = ?, 
                groupName = ?, hotelPlace = ?, packageTitle = ?, 
                packageDescription = ?, packagePrice = ?, 
                packageTotalPersons = ?, packageTourType = ?, packagePlace = ?, 
                packageDuration = ?, packageIncluded = ?, packageExcluded = ?, 
                tripDetails = ?
                WHERE p_id = ?";
                                            $params = [
                                                $offer,
                                                $departure,
                                                $arrived,
                                                $packageFrom,
                                                $packageTo,
                                                $agent,
                                                $nationality,
                                                $groupName,
                                                $hotelPlace,
                                                $packageTitle,
                                                $packageDescription,
                                                $packagePrice,
                                                $packageTotalPersons,
                                                $packageTourType,
                                                $packagePlace,
                                                $packageDuration,
                                                $packageIncluded,
                                                $packageExcluded,
                                                $tripDetailsJson,
                                                $packageId
                                            ];
                                        }

                                        // Prepare and execute the query
                                        $stmt = $pdo->prepare($sql);
                                        if ($stmt->execute($params)) {
                                            echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "Package Updated Successfully",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>';
                                        } else {
                                            echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    text: "Failed to Update Package",
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
                                        <input type="text" class="form-control" id="packageTitle" name="packageTitle"
                                            value="<?= htmlspecialchars($package['packageTitle'] ?? '') ?>" required>
                                    </div>


                                    <label for="packagePrice" style="color:red"> Offer Percentage</label>
                                    <div class="form-group pb-2">
                                        <label for="offer">Offer</label>
                                        <input type="number" class="form-control" id="offer" name="offer" placeholder="Enter your Offer" value="<?= htmlspecialchars($package['offer'] ?? '') ?>">
                                    </div>

                                    <label for="packagePrice" style="color:red">Special Offers</label>

                                    <div class="form-group pb-2">
                                        <label for="packageFrom">From</label>
                                        <input type="date" class="form-control" id="packageFrom" name="packageFrom" placeholder="Enter From Date" value="<?= htmlspecialchars($package['packageFrom'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packageTo">To</label>
                                        <input type="date" class="form-control" id="packageTo" name="packageTo" placeholder="Enter To Date" value="<?= htmlspecialchars($package['packageTo'] ?? '') ?>" required>
                                    </div>

                                    <label for="packagePrice" style="color:red">Flight Dates</label>
                                    <div class="form-group pb-2">
                                        <label for="departure">Departure</label>
                                        <input type="date" class="form-control" id="departure" name="departure" value="<?= htmlspecialchars($package['departure'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="arrived">Arrived</label>
                                        <input type="date" class="form-control" id="arrived" name="arrived" value="<?= htmlspecialchars($package['arrived'] ?? '') ?>" required>
                                    </div>
                                    <!-- Package Description -->
                                    <div class="form-group pb-2">
                                        <label for="packageDescription">Description</label>
                                        <textarea class="form-control" id="packageDescription" name="packageDescription" required><?= htmlspecialchars($package['packageDescription'] ?? '') ?></textarea>
                                    </div>

                                    <!-- Included Items -->
                                    <div class="form-group pb-2">
                                        <label for="packageIncluded">Included</label>
                                        <div id="includedFields">
                                            <?php
                                            $includedItems = json_decode($package['packageIncluded'] ?? '[]');
                                            foreach ($includedItems as $included) {
                                                echo '<input type="text" class="form-control mb-2" name="packageIncluded[]" value="' . htmlspecialchars($included) . '">';
                                            }
                                            ?>
                                        </div>
                                        <button type="button" class="btn btn-link" id="addIncludedField"><i class="fa fa-plus"></i> Add More</button>
                                    </div>

                                    <!-- Excluded Items -->
                                    <div class="form-group pb-2">
                                        <label for="packageExcluded">Excluded</label>
                                        <div id="excludedFields">
                                            <?php
                                            $excludedItems = json_decode($package['packageExcluded'] ?? '[]');
                                            foreach ($excludedItems as $excluded) {
                                                echo '<input type="text" class="form-control mb-2" name="packageExcluded[]" value="' . htmlspecialchars($excluded) . '">';
                                            }
                                            ?>
                                        </div>
                                        <button type="button" class="btn btn-link" id="addExcludedField"><i class="fa fa-plus"></i> Add More</button>
                                    </div>

                                    <!-- Other Fields (Price, Total Persons, Tour Type, Place, Duration) -->
                                    <div class="form-group pb-2">
                                        <label for="packagePrice">Price</label>
                                        <input type="number" class="form-control" id="packagePrice" name="packagePrice" value="<?= htmlspecialchars($package['packagePrice'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packageTotalPersons">Total Persons</label>
                                        <input type="number" class="form-control" id="packageTotalPersons" name="packageTotalPersons" value="<?= htmlspecialchars($package['packageTotalPersons'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packageTourType">Tour Type</label>
                                        <input type="text" class="form-control" id="packageTourType" name="packageTourType" value="<?= htmlspecialchars($package['packageTourType'] ?? '') ?>" required>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packagePlace">Place</label>
                                        <input type="text" class="form-control" id="packagePlace" name="packagePlace" value="<?= htmlspecialchars($package['packagePlace'] ?? '') ?>" required>
                                    </div>

                                    <!-- Package Place -->
                                    <div class="form-group pb-2">
                                        <label for="agent">Agent</label>
                                        <input type="text" class="form-control" id="agent" name="agent" placeholder="Enter Agent Name" value="<?= htmlspecialchars($package['agent'] ?? '') ?>">
                                    </div>

                                    <!-- Package Place -->
                                    <div class="form-group pb-2">
                                        <label for="groupName">Group Name</label>
                                        <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Enter Group Name" value="<?= htmlspecialchars($package['groupName'] ?? '') ?>">
                                    </div>


                                    <!-- Package Place -->
                                    <div class="form-group pb-2">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter your Nationality" value="<?= htmlspecialchars($package['nationality'] ?? '') ?>">
                                    </div>


                                    <!-- Package Place -->
                                    <div class="form-group pb-2">
                                        <label for="hotelPlace">Hotel</label>
                                        <input type="text" class="form-control" id="hotelPlace" name="hotelPlace" placeholder="Enter Hotel Name place" value="<?= htmlspecialchars($package['hotelPlace'] ?? '') ?>">
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="packageDuration">Duration</label>
                                        <input type="text" class="form-control" id="packageDuration" name="packageDuration" value="<?= htmlspecialchars($package['packageDuration'] ?? '') ?>" required>
                                    </div>

                                    <!-- Package Image -->
                                    <div class="form-group pb-2">
                                        <label for="packageImage">Package Image</label>
                                        <input type="file" class="form-control-file" id="packageImage" name="packageImage">
                                        <?php if (isset($package['packageImage'])): ?>
                                            <p>Current Image: <img src="data:image/jpeg;base64,<?= base64_encode($package['packageImage']) ?>" width="100" /></p>
                                        <?php else: ?>
                                            <p>No image uploaded.</p>
                                        <?php endif; ?>
                                    </div>


                                    <div class="form-group pb-2">
                                        <label for="tripPackageProcess">Package Process</label>



                                        <!-- Day 1 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay1" name="processDurationDay1" value="Day 1">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace1" name="processPlace1" placeholder="Place" value="<?= htmlspecialchars($package['processPlace1'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor1" id="editor1" placeholder="Enter description"><?= htmlspecialchars($package['editor1'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 2 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay2" name="processDurationDay2" value="Day 2">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace2" name="processPlace2" placeholder="Place" value="<?= htmlspecialchars($package['processPlace2'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor2" id="editor2" placeholder="Enter description"><?= htmlspecialchars($package['editor2'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 3 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay3" name="processDurationDay3" value="Day 3">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace3" name="processPlace3" placeholder="Place" value="<?= htmlspecialchars($package['processPlace3'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor3" id="editor3" placeholder="Enter description"><?= htmlspecialchars($package['editor3'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 4 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay4" name="processDurationDay4" value="Day 4">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace4" name="processPlace4" placeholder="Place" value="<?= htmlspecialchars($package['processPlace4'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor4" id="editor4" placeholder="Enter description"><?= htmlspecialchars($package['editor4'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 5 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay5" name="processDurationDay5" value="Day 5">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace5" name="processPlace5" placeholder="Place" value="<?= htmlspecialchars($package['processPlace5'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor5" id="editor5" placeholder="Enter description"><?= htmlspecialchars($package['editor5'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 6 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay6" name="processDurationDay6" value="Day 6">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace6" name="processPlace6" placeholder="Place" value="<?= htmlspecialchars($package['processPlace6'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor6" id="editor6" placeholder="Enter description"><?= htmlspecialchars($package['editor6'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Day 7 -->
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="text" class="form-control" id="processDurationDay7" name="processDurationDay7" value="Day 7">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="processPlace7" name="processPlace7" placeholder="Place" value="<?= htmlspecialchars($package['processPlace7'] ?? '') ?>">
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group pb-2">
                                                    <textarea class="form-control" name="editor7" id="editor7" placeholder="Enter description"><?= htmlspecialchars($package['editor7'] ?? '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" name="update_package">Update Package</button>
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