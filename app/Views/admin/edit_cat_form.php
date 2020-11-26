<section>
  <h1>Edit Category</h1>
  <?= \Config\Services::validation()->listErrors(); ?>

<form method="post" action="/admin/edit-category">
  <?= csrf_field() ?>
  <input type="hidden" name="id" value="<?= $cat['id']; ?>">

  <div class="form-group">
    <label for="exampleFormControlInput1">cat name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="cat name" value="<?= set_value('name',$cat['name']); ?>">
  </div>

  <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
</form>
</section>
