<?php if (session()->get('success')): ?>
  <div class="alert alert-success">
    <p><?= session()->get('success'); ?></p>
  </div>
<?php endif; ?>
<form class="form-signin row" action="/admin/profile" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Please Register </h1>
  <label for="inputFirstName" class="sr-only">First Name</label>
  <input type="text" name='first_name' id="inputFirstName" class="form-control" placeholder="First name" required autofocus value="<?= set_value('first_name',$user['first_name']); ?>" >
  <label for="inputLastName" class="sr-only">Last Name</label>
  <input type="text" name='last_name' id="inputLastName" class="form-control" placeholder="Last name" required value="<?= set_value('last_name',$user['last_name']); ?>"">
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" readonly id="inputEmail" class="form-control" placeholder="Email address" required value="<?= $user['email'] ?>"">

  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="new Password" value="">
  <?php if (isset($validation)): ?>
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <?php echo $validation->listErrors(); ?>
      </div>
    </div>
  <?php endif; ?>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>


</form>
