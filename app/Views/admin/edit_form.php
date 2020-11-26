<section>
  <h1>Edit Post</h1>
  <?= \Config\Services::validation()->listErrors(); ?>

<form method="post" action="/admin/edit-post">
  <?= csrf_field() ?>
  <input type="hidden" name="id" value="<?= $post['id']; ?>">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?= set_value('title',$post['title']); ?>">
  </div>
  <div class="form-group">
    <label for="excerpt">excerpt</label>
    <input type="text" class="form-control" name="excerpt" id="excerpt" placeholder="excerpt" value="<?= set_value('excerpt',$post['excerpt']); ?>">
  </div>
  <div class="form-group">
    <label for="picture">Profile Picture Link</label>
    <input type="text" class="form-control" name="picture" id="picture" placeholder="picture link" value="<?= set_value('picture',$post['photo_string']); ?>">
  </div>
  <div class="form-group">
    <label for="cat_id">Category</label>
    <select class="form-control" name="cat_id" id="cat_id">
      <option value="" selected>select Category</option>

      <?php foreach ($cats as $cat): ?>
        <option value="<?= $cat['id']; ?>" <?= set_select('cat_id', $post['cat_id'],($post['cat_id'] == $cat['id'])?TRUE:FALSE); ?>><?= $cat['name']; ?></option>

      <?php endforeach; ?>

    </select>
  </div>
    <div class="input-group-prepend">
      <label for="published">Publish</label>
        <input type="checkbox" <?php echo ($post['published']=='1') ? 'checked':''; ?> name="published" value="1" <?php echo set_checkbox('published', $post['published']); ?> aria-label="Checkbox for following text input">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" rows="30" name="body" ><?= set_value('body',$post['body']); ?></textarea>
    </div>



    <script>
        tinymce.init({
          selector: 'textarea',

          plugins: "autolink lists link image imagetools charmap print preview hr anchor pagebreak advlist lists ",
          toolbar: 'undo redo | formats | bold italic underline | bullist numlist |alignleft aligncenter alignright alignjustify paragraph | outdent indent for | image',
          automatic_uploads: true,

          image_class_list: [
            {title: 'None', value: 'img-fluid'},
            {title: 'No border', value: 'img_no_border'},
            {title: 'Borders',
              menu: [
                {title: 'Green border', value: 'img_green_border'},
                {title: 'Blue border', value: 'img_blue_border'},
                {title: 'Red border', value: 'img_red_border'}
              ]
            }
          ],
          imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',

        });
    </script>



  <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
</form>
</section>
