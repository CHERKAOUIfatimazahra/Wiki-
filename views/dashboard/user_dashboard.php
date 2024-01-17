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
    <title>Admin Dashboard Wiki™</title>
</head>

<body>
    <?php include "../views/partials/sidbar.php" ?>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <?php if ($_SESSION['role'] == 1): ?>

            <div class="dash-content">

                <!-- statistique -->
                <div class="overview">
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Dashboard</span>
                    </div>

                    <div class="boxes p-2 mb-6">
                        <?php if (isset($categoryCount)): ?>
                            <div class="box box1 col-md-4 mb-4">
                                <i class="uil uil-thumbs-up"></i>
                                <span class="text">Total Categories</span>
                                <span class="number">
                                    <?= $statistic["categoryCOUNT"] ?>
                                </span>
                            </div>
                        <?php endif ?>

                        <div class="box box2 col-md-4 mb-4">
                            <i class="uil uil-comments"></i>
                            <span class="text">Total Tags</span>
                            <span class="number">
                                <?= $statistic["tagCOUNT"] ?>
                            </span>
                        </div>

                        <div class="box box3 col-md-4 mb-4">
                            <i class="uil uil-share"></i>
                            <span class="text">Total Users</span>
                            <span class="number">
                                <?= $statistic["userCOUNT"] ?>
                            </span>
                        </div>

                        <div class="box box2 col-md-4 mb-4">
                            <i class="uil uil-share"></i>
                            <span class="text">Total Wikis</span>
                            <span class="number">
                                <?= $statistic["wikiCOUNT"] ?>
                            </span>
                        </div>
                    </div>

                </div>
                <!-- end statistique -->

                <!-- add auteur -->
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    add users
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="/add_user" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">add Auteur</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="formName">Auteur</label>
                                        <input type="text" id="name" name="name" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example1cg">role</label>
                                        <select name="role" id="" class="form-control form-control-lg">
                                            <option value="2">auteur</option>
                                            <option value="1">admin</option>
                                        </select>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg">
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" onclick="add_user()" class="btn btn-primary">Save changes</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- end add auteur -->

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr class="table table-dark">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <?= $user['name'] ?>
                            </td>
                            <td>
                                <?= $user['email'] ?>
                            </td>
                            <td>
                                <?= $user['role'] ?>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal<?= $user['id'] ?>">Delete</button>
                                <!-- Update Modal Button -->
                                <!-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#updateModal<?= $user['id'] ?>">Update</button> -->
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal<?= $user['id'] ?>" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete
                                        <?= $user['id'] ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form method="POST" action="/delete_user/<?= $user['id'] ?>">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Modal -->
                        <div class="modal fade" id="updateModal<?= $user['id'] ?>" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="/update_user/<?= $user['id'] ?>" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Pre-fill the existing user data in the form -->
                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="formName<?= $user['id'] ?>">Name</label>
                                                <input type="text" id="username<?= $user['id'] ?>" name="name"
                                                    class="form-control form-control-lg" value="<?= $user['name'] ?>">
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="form3Example3cg<?= $user['id'] ?>">Email</label>
                                                <input type="email" id="email<?= $user['id'] ?>" name="email"
                                                    class="form-control form-control-lg" value="<?= $user['email'] ?>">
                                            </div>

                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="form3Example1cg<?= $user['id'] ?>">Role</label>
                                                <select name="role" class="form-control form-control-lg"
                                                    id="role<?= $user['id'] ?>">
                                                    <option value="2" <?= ($user['role'] == 2) ? 'selected' : '' ?>>Auteur</option>
                                                    <option value="1" <?= ($user['role'] == 1) ? 'selected' : '' ?>>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        <?php elseif ($_SESSION['role'] == 2): ?>
            <div class="dash-content mt-5">
                <span class=" mt-5">Sorry, you don't have permission!</span>
            </div>
        <?php endif ?>
    </section>

    <!-- script -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- end script -->

</body>

</html>