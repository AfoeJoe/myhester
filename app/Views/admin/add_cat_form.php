<section>
  <h1>Add Category</h1>
  <?= \Config\Services::validation()->listErrors(); ?>

<form method="post" action="/admin/add-category">
  <?= csrf_field() ?>

  <div class="form-group">
    <label for="exampleFormControlInput1">cat name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="cat name" value="<?= set_value('name'); ?>">
  </div>

  <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
</form>
</section>
