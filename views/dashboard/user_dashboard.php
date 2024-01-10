<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../public/assets/styles/dashboard.css">
     
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
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="../../public/assets/images/wiki.png" alt="Wiki™">
            </div>
            <span class="logo_name">Wiki™</span>
        </div>
        <div class="menu-items">
        <ul class="nav-links">
                <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="wiki.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">wikis</span>
                </a></li>
                <li><a href="category.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Category</span>
                </a></li>
                <li><a href="tag.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Tags</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
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

            <!-- statistique -->
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes p-4 mb-2">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <!-- end statistique -->

            <!-- add auteur -->
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            add users
            </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        <form action="controller/add" method="POST">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">add Auteur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">

                        <div class="form-outline mb-2">
                            <label class="form-label" for="formName">Auteur</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg">
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3cg">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg">
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example1cg">role</label>
                                <select name="role" id="" class="form-control form-control-lg">
                                    <option value="spectateur">auteur</option>
                                    <option value="admin">admin</option>
                                </select>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example4cg">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg">
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
                </div>
            </div>
            </div>
    
            <!-- end add auteur -->

                <!-- html + php -->
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr class="table table-dark">
                        <th></th>
                        <th>users</th>
                        <th>email</th>
                        <th>password</th>
                        <th>role</th>
                        <th>option</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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