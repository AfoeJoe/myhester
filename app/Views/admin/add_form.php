<section>
  <h1>Add Post</h1>
  <?= \Config\Services::validation()->listErrors(); ?>

<form method="post" action="/admin/add-post">
  <?= csrf_field() ?>

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?= set_value('title'); ?>">
  </div>
  <div class="form-group">
    <label for="excerpt">excerpt</label>
    <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="excerpt" value="<?= set_value('excerpt'); ?>">
  </div>
  <div class="form-group">
    <label for="picture">Profile Picture Link</label>
    <input type="text" class="form-control" name="picture" id="picture" placeholder="picture link" value="<?= set_value('picture'); ?>">
  </div>
  <div class="form-group">
    <label for="cat_id">Category</label>
    <select class="form-control" name="cat_id" id="cat_id">
      <option value="" selected>select Category</option>

      <?php foreach ($cats as $cat): ?>
        <option value="<?= $cat['id']; ?>" <?= set_select('cat_id', $cat['id'], TRUE); ?>><?= $cat['name']; ?></option>

      <?php endforeach; ?>

    </select>
  </div>
  <div class="input-group-prepend">
    <label for="published">Publish</label>

    <div class="input-group-text">

      <input type="checkbox" name="published" value="1"  aria-label="Checkbox for following text input">
    </div>
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" rows="3" name="body" ><?= set_value('body'); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
</form>
</section>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: "autolink lists link image charmap print preview hr anchor pagebreak advlist lists ",
      toolbar: 'undo redo | formats | bold italic underline | bullist numlist |alignleft aligncenter alignright alignjustify paragraph | outdent indent for',
    });
  </script>
