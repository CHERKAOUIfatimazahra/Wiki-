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

<?php include '../views/partials/sidbar.php'; ?>
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

            <!-- add auteur -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            add Wiki™
            </button>

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="modal-dialog" action="/create_Wiki" method="post">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">add Wiki™</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="form-outline mb-2">
                            <label class="form-label" for="formName">Title</label>
                            <input type="text" id="title" name="title" class="form-control form-control-lg">
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="formName">content</label>
                            <input type="text" id="content" name="content" class="form-control form-control-lg">
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example1cg">category</label>
                                <select name="categoryID" id="categoryID" class="form-control form-control-lg">
                                    <option value="" selected>SELECT CATEGORY</option>
                                <?php foreach ($categories as $category) {
                                    echo "<option value='{$category['categoryID']}'>{$category['categoryName']}</option>";
                                } ?>
                                </select>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example1cg">tags</label>
                                <select name="tagID" id="tagID" class="form-control form-control-lg">
                                <option value="" selected>SELECT Tags</option>
                                <?php foreach ($tags as $tag) {
                                    echo "<option value='{$tag['tagID']}'>{$tag['tagName']}</option>";
                                } ?>
                                </select>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="formName">creat date</label>
                            <input type="date" id="creationDate" name="creationDate" class="form-control form-control-lg">
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </form>
            </div>
            <!-- end add auteur -->

                <!-- html + php -->
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    
                    <tr class="table table-dark">
                        <th></th>
                        <th>wiki</th>
                        <th>content</th>
                        <th>category</th>
                        <th>tags</th>
                        <th>cration date</th>
                        <th>option</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($wikis as $wiki):?>
                                    <tr>
                                    <th><?php $wiki['title']?></th>
                                    <td><?php $wiki['content']?></td>
                                    <td><?php $wiki['categoryID']?></td>
                                    <td><?php $wiki['tagID']?></td>
                                    <td><?php $wiki['creationDate']?></td>
                                    <td><?php $wiki['tagID']?></td>
                                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div> 
    </div>
</section>

<!-- script -->
    <script src="../../public/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- end script -->
</body>
</html>