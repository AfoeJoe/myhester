<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">


    <div class="container ">
      <h1><a href="<?= base_url(); ?>">my Hester</a></h1>
      <form class="form-signin row" action="/admin/register" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please Register </h1>
        <label for="inputFirstName" class="sr-only">First Name</label>
        <input type="text" name='first_name' id="inputFirstName" class="form-control" placeholder="First name" required autofocus value="<?= set_value('first_name'); ?>" >
        <label for="inputLastName" class="sr-only">Last Name</label>
        <input type="text" name='last_name' id="inputLastName" class="form-control" placeholder="Last name" required value="<?= set_value('last_name'); ?>">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name='email' id="inputEmail" class="form-control" placeholder="Email address" required value="<?= set_value('email'); ?>"">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <?php if (isset($validation)): ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?php echo $validation->listErrors(); ?>
            </div>
          </div>
        <?php endif; ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>


      </form>
      <div class="form-signin row">
        <a class="btn btn-lg btn-primary btn-block " href="./login">Sign in if already register</a>

      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
