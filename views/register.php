<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/styles/home.css">
  <link rel="stylesheet" href="/assets/styles/navbar.css">
  <link rel="stylesheet" href="/assets/styles/footer.css">
  <link rel="stylesheet" href="/assets/styles/navbar.css">
  <link rel="stylesheet" href="/assets/styles/register.css">
  <script src="/assets/js/home.js" defer></script>
  <style>

  </style>
</head>

<body>
  <!-- Navbar --> 
  <div class="register-photo">
    <div class="form-container">
      <div class="image-holder"></div>
      <form action="/auth_register" method="post">
        <h2 class="text-center"><strong>Create</strong> an account.</h2>
        <div class="form-group"><input class="form-control" type="name" name="name" placeholder="Name"></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-outline mb-2">

          <div class="form-group">
            <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I
                agree to the license terms.</label></div>
          </div>
          <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a
            href="/login" class="already">You already have an account? Login here.</a>
      </form>
    </div>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-body" href="https://mdbootstrap.com/">Wiki™</a>
  </div>
  <!-- Copyright -->
  </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>