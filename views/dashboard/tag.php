<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/assets/styles/dashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <title>Admin Dashboard Wiki™</title>
</head>
<body>
<?php include "../views/partials/sidbar.php" ?> 
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <!-- <img src="images/profile.jpg" alt=""> -->
        </div>

        <div class="dash-content">

            <!-- add tags -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Wiki™ tags
            </button>

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Wiki™ tags</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/add_tag" method="POST">
                    <div class="modal-body">
                        <div class="form-outline mb-2">
                            <label class="form-label" for="formName">tags</label>
                            <input type="text" id="tagName" name="tagName" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" onclick="addTags()" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <!-- end add tags -->

                <!-- html + php -->
            <table id="example" class="table table-striped" style="width:100%">

                <thead>
                    <tr class="table table-dark">
                        <th></th>
                        <th>tags</th>
                        <th>option</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($tags as $tag) : ?>
                    <tr>
                        <td></td>
                        <td><?= $tag['tagName'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $tag['tagID'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $tag['tagID'] ?>">Delete</button>
                        </td>
                    </tr>
                     <!-- Edit Modal -->
            <div class="modal fade" id="editModal<?= $tag['tagID'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/update_tag/<?= $tag['tagID'] ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Tag</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="formName">Tags</label>
                                    <input type="text" id="tagName" name="tagName" class="form-control form-control-lg" value="<?= $tag['tagName'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                        <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal<?= $tag['tagID'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <?= $tag['tagName'] ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="/delete_tag/<?= $tag['tagID'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>
                </tbody>
                
            </table>
        </div> 
    </div>
</section>

<!-- script -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- end script -->
</body>
</html>