<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/styles/dashboard.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">

    <title>Admin Dashboard Wiki™</title>
</head>

<body>

    <?php include '../views/partials/sidbar.php'; ?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
           
        </div>

        <div class="dash-content">

            <!-- add auteur -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                add Wiki™
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form class="modal-dialog" action="/add_wiki" method="POST">
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
                                <select name="tags[]" id="tagID" class="form-control form-control-lg" select
                                    id="tags" multiple>
                                
                                    <?php foreach ($tags as $tag) {
                                        echo "<option value='{$tag['tagID']}'>{$tag['tagName']}</option>";
                                    } ?>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form class="modal-dialog" action="/edit_wiki" method="POST">
                    <input type="hidden" name="wikiID" id="wikiID">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Wiki™</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-outline mb-2">
                                <label class="form-label" for="formName">Title</label>
                                <input  type="text" id="Update_title" name="title" class="form-control form-control-lg">
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="formName">content</label>
                                <input type="text" id="Update_content" name="content" class="form-control form-control-lg">
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example1cg">category</label>
                                <select name="categoryID" id="Update_categoryID" class="form-control form-control-lg">
                                    <option value="" selected>SELECT CATEGORY</option>
                                    <?php foreach ($categories as $category) {
                                        echo "<option value='{$category['categoryID']}'>{$category['categoryName']}</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example1cg">tags</label>
                                <select name="tags[]" id="Update_tagID" class="form-control form-control-lg" select
                                    id="tags" multiple>
                                
                                    <?php foreach ($tags as $tag) {
                                        echo "<option value='{$tag['tagID']}'>{$tag['tagName']}</option>";
                                    } ?>
                                </select>
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


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <form class="modal-dialog" action="/delete_wiki" method="POST">
                    <div class="modal-content">
                    

                    <input type="hidden" name="wikiIDDeletye" id="wikiIDDeletye">

                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                       
                    </div>
                    </form>
            </div>

            <!-- end add auteur -->

            <!-- html + php -->
            <table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr class="table table-dark">
            <th>wiki</th>
            <th>content</th>
            <th>category</th>
            <th>tags</th>
            <th>creation date</th>
            <?php if ($_SESSION['role'] == 1): ?>
                
                <th>status</th>
            <?php endif; ?>
            <th>option</th>
        </tr>
    </thead>
    <tbody>
                <?php foreach ($wikis as $wiki): ?>
    <tr>
        <td><?= $wiki['title'] ?></td>
        <td><?= $wiki['content'] ?></td>
        <td><?= $wiki['categoryName'] ?></td>
        <td><?= $wiki['tags'] ?></td>
        <td><?= $wiki['creationDate'] ?></td>

        <?php if ($_SESSION['role'] == 1): ?>
            
            <td>
                <form method="post" action="/wikis/Published">
                    <input type="hidden" name="id" value="<?= $wiki['wikiID'] ?>">
                    <button type="submit" class="<?= ($wiki['status'] === 'Published') ? 'd-none' : '' ?>" style="background-color: #d4edda;" <?= ($wiki['status'] === 'Published') ? 'disabled' : '' ?>>Published</button>
                </form>
                <form method="post" action="/wikis/Archived">
                    <input type="hidden" name="id" value="<?= $wiki['wikiID'] ?>">
                    <button type="submit" class="<?= ($wiki['status'] === 'Archived') ? 'd-none' : '' ?>" style="background-color: #f8d7da;" <?= ($wiki['status'] === 'Archived') ? 'disabled' : '' ?>>Archived</button>
                </form>
                <span><?= $wiki['status'] ?></span>
            </td>
        <?php endif; ?>

        <?php if ($_SESSION['role'] == 2): ?>
            <td>
                <!-- <button data-wikiId="<?= $wiki['wikiID'] ?>" class="btn btn-warning btn-sm updateId">Edit</button> -->
                <button data-wikiId="<?= $wiki['wikiID'] ?>" class="btn btn-danger btn-sm deleteWiki" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $wiki['wikiID'] ?>">Delete</button>
            </td>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 1): ?>
            <td>
                <button data-wikiId="<?= $wiki['wikiID'] ?>" class="btn btn-danger btn-sm deleteWiki" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $wiki['wikiID'] ?>">Delete</button>
            </td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
                    
                   
                </tbody>
            </table>
        </div>
        </div>
    </section>

    <!-- script -->
    <script src="assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('tags')
    </script>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  $(document).ready(function() {
    // Handle the click event for the "Edit" button
    $('.updateId').click(function(e) {
      e.preventDefault();
      var wikiID = $(this).data('wikiid');
      $.ajax({
        type: 'GET',
        url: `/wiki/update`, // Replace with the actual URL to your server-side handler
        data: { wikiID: wikiID },
        success: function(data) {
          // Check if the user is an admin and is not the owner of the wiki
          if (data.userRole !== 1 && data.userId !== data.wikiOwnerId) {
            // If not an admin or the owner, hide the edit button
            $('#editWikiBtn').hide();
          } else {
            $('#editWikiBtn').show();
          }

          // Populate the modal fields with wiki data
          $('#Update_title').val(data.title)
          $('#Update_content').val(data.content)
          $('#wikiID').val(data.wikiID)
          $('#Update_categoryID').val(data.categoryID);
          $('#Update_creationDate').val(data.creationDate);

          // Show the edit modal
          $('#editModal').modal('show');
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", status, error);
        }
      });
    });

    $('.deleteWiki').click(function(e) {
      e.preventDefault();
      var wikiID = $(this).data('wikiid');
      $.ajax({
        type: 'GET',
        url: `/wiki/update`, // Replace with the actual URL to your server-side handler
        data: { wikiID: wikiID },
        success: function(data) {
          console.log(data)
          $('#wikiIDDeletye').val(data.wikiID)

          $('#deleteModal').modal('show');
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", status, error);
        }
      });
    });
  });
</script>


    <!-- end script -->
</body>

</html>