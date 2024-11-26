
<?php
include("protected_page.php")
?>



<?php

require("config/db.php");

if (isset($_POST['update_blog'])) {
    try {
        $blogTitle = $_POST['blogTitle'];
        $blogContent = $_POST['blogContent'];
        $blogCategory = $_POST['blogCategory'];
        $blogTags = $_POST['blogTags'];
        $createdBy = $_POST['createdBy'];

        if (isset($_FILES['blogImage']) && $_FILES['blogImage']['error'] == 0) {

            $imageTmpName = $_FILES['blogImage']['tmp_name'];
            $imageSize = $_FILES['blogImage']['size'];
            $imageType = $_FILES['blogImage']['type'];
            $imageData = file_get_contents($imageTmpName);

            $allowedExts = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($imageType, $allowedExts) && $imageSize < 5000000) {
           
                $sql = "UPDATE blog_details SET blogTitle = ?, blogImage = ?, blogContent = ?, blogCategory = ?, blogTags = ?, createdBy = ? WHERE b_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$blogTitle, $imageData, $blogContent, $blogCategory, $blogTags, $createdBy, $blogId]);
            } else {
                echo '<script>alert("Invalid image format or size too large");</script>';
                exit;
            }
        } else {
     
            $sql = "UPDATE blog_details SET blogTitle = ?, blogContent = ?, blogCategory = ?, blogTags = ?, createdBy = ? WHERE b_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$blogTitle, $blogContent, $blogCategory, $blogTags, $createdBy, $blogId]);
        }

        echo '<script>
                 document.addEventListener("DOMContentLoaded", function() {
                     Swal.fire({
                         position: "center",
                         icon: "success",
                         text: "Blog Updated Successfully",
                         showConfirmButton: false,
                         timer: 1500
                     });
                 });
             </script>';
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>




<!--content start-->
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Blog</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- TinyMCE (Text Editor) -->
    <script src="https://cdn.tiny.cloud/1/irsvj7n33k29usp9ttesj178qs79yp2aiyz9nzpmnv0jwlsx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#blogContent',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | preview',
            height: 300
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector("form").addEventListener("submit", function(event) {
                const content = tinymce.get("blogContent").getContent();
                if (content.trim() === "") {
                    event.preventDefault();
                    Swal.fire({
                        icon: "error",
                        text: "Please enter blog content",
                        showConfirmButton: false,
                        timer: 1500
                    });
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
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Create Blog</li>
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
                            <?php
                            require("config/db.php");

                            $blogId = $_GET['id'] ?? null;
                            if ($blogId) {
                            
                                $stmt = $pdo->prepare("SELECT * FROM blog_details WHERE b_id  = ?");
                                $stmt->execute([$blogId]);
                                $blog = $stmt->fetch(PDO::FETCH_ASSOC);

                                if (!$blog) {
                                    echo "Blog post not found.";
                                    exit;
                                }
                            } else {
                                echo "No blog ID provided.";
                                exit;
                            }
                            ?>

                            <div class="card-body">
                                <h4 class="card-title">Edit Blog</h4>
                                <form method="POST" enctype="multipart/form-data">
                                    <!-- Blog Title -->
                                    <div class="form-group pb-2">
                                        <label for="blogTitle">Title</label>
                                        <input type="text" class="form-control" id="blogTitle" name="blogTitle" placeholder="Enter blog title" value="<?= htmlspecialchars($blog['blogTitle']) ?>" required>
                                    </div>

                                    <!-- Blog Image -->
                                    <div class="form-group pb-2">
                                        <label for="blogImage">Blog Image (Upload new to replace)</label>
                                        <input type="file" class="form-control" id="blogImage" name="blogImage">
                                    </div>

                                    <!-- Blog Content -->
                                    <div class="form-group pb-2">
                                        <label for="blogContent">Content</label>
                                        <textarea id="blogContent" name="blogContent" class="form-control" placeholder="Enter blog content"><?= htmlspecialchars($blog['blogContent']) ?></textarea>
                                    </div>

                                    <!-- Blog Category -->
                                    <div class="form-group pb-2">
                                        <label for="blogCategory">Category</label>
                                        <input type="text" class="form-control" id="blogCategory" name="blogCategory" placeholder="Enter category" value="<?= htmlspecialchars($blog['blogCategory']) ?>" required>
                                    </div>

                                    <!-- Blog Tags -->
                                    <div class="form-group pb-2">
                                        <label for="blogTags">Tags</label>
                                        <input type="text" class="form-control" id="blogTags" name="blogTags" placeholder="Enter tags (comma separated)" value="<?= htmlspecialchars($blog['blogTags']) ?>">
                                    </div>

                                    <!-- Created By -->
                                    <div class="form-group pb-2">
                                        <label for="createdBy">Created By</label>
                                        <input type="text" class="form-control" id="createdBy" name="createdBy" placeholder="Enter your name" value="<?= htmlspecialchars($blog['createdBy']) ?>">
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary" name="update_blog">Update Blog</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>

    <!-- Include required scripts -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>