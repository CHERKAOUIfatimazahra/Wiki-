<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/singlepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/styles/navbar.css">
    <title>single page</title>
</head>

<body>
    <?php include "layout/navbar.php" ?>
    <section class="">
        <div id="main-content" class="blog-page">
            <div class="container p-5 mt-5">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 left-box">
                        <div class="card single_post">
                            <div class="body">
                            <h3><a href="blog-details.html"><?=$wiki["title"]?></a></h3>
                                <p>
                                <?=$wiki["content"]?>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 right-box">
                        <div class="card">
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2> Wiki Ctegory</h2>
                            </div>
                            <div class="body widget">
                                <ul class="list-unstyled categories-clouds m-b-0">
                                    <li><a href="javascript:void(0);"><?=$wiki["categoryName"]?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>Wiki Tags</h2>
                            </div>
                            <div class="body widget">
                                <ul class="list-unstyled categories-clouds m-b-0">
                                    <li><a href="javascript:void(0);"><?=$wiki["tags"]?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>