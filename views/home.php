<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wiki</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="/assets/styles/home.css">
  <link rel="stylesheet" href="/assets/styles/navbar.css">
  <link rel="stylesheet" href="/assets/styles/footer.css">
  <script src="/assets/js/home.js" defer></script>
</head>

<body>
<!-- Navbar -->
<?php include "layout/navbar.php"?>
  <section class="image-generator">
    <div class="content mt-3 p-4">
      <h1>wiki</h1>
      <p>un endroit où tout le monde peut travailler ensemble, créer, trouver et partager des wikis de manière facile et intéressante.</p>
      <form action="#" class="generate-form">
        <input class="prompt-input" type="text" placeholder="Describe what you want to see" required>
        <div class="controls">
          <select class="img-quantity">
            <option value="1"><?= $category['categoryName']?></option>
          </select>
          <button type="submit" class="generate-btn">Generate</button>
        </div>
      </form>
    </div>
  </section>

  <section class="image-gallery">
	<div class="row m-3 p-3">
  <?php foreach ($wikis as $wiki): ?>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?= $wiki['title'] ?></h5>
				<p class="card-text"><?= $wiki['content'] ?></p>
				<a href="/single_page" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
  <?php endforeach ?>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
				<a href="single_page.php" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
				<a href="single_page.php" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
				<a href="single_page.php" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
				<a href="single_page.php" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.With supporting text below as a natural lead-in to additional content.</p>
				<a href="single_page.php" class="btn btn-warning">Go somewhere</a>
			</div>
			</div>
		</div>
	</div>
  </section>
  <!-- footer -->
  <footer class="bg-body-tertiary text-center">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
      data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="#!"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #dd4b39;"
        href="#!"
        role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="#!"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #0082ca;"
        href="#!"
        role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>
      <!-- Github -->
      <a
        data-mdb-ripple-init
        class="btn text-white btn-floating m-1"
        style="background-color: #333333;"
        href="#!"
        role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-body" href="https://mdbootstrap.com/">Wiki™</a>
  </div>
  <!-- Copyright -->
</footer>
  
</body>
</html>