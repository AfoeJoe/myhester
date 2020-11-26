
</div>
<main role="main" class="container">
<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 border-bottom">
        <?= ucfirst($page).'->';?>
        <?= ($page == 'date') ? date('M ,Y',strtotime($cat)): $cat;?>
      </h3>
      <?php if (empty($posts)): ?>
        <div class="blog-post">
          <p>Sorry No Post under this Category</p>

               <a href="<?= base_url('./'); ?>">Go Home</a>

          <hr>

        </div><!-- /.blog-post -->
      <?php else: ?>
        <?php foreach ($posts as $post) :?>
          <div class="blog-post">
            <strong class="d-inline-block mb-2 text-success"><?= $post['name'] ?></strong>

            <h2 class="blog-post-title"><?= $post['title'] ?></h2>
            <p class="blog-post-meta"><?= date('M j',strtotime($post['updated_at'])); ?> by Esther</p>

            <p><?= $post['excerpt'] ?></p>
            <a href="<?= base_url($post['slug']) ?>" class="link">Continue reading</a>

            <hr>

          </div><!-- /.blog-post -->
        <?php endforeach; ?>
      <?php endif; ?>


  <!--     <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
  </nav> -->

    </div><!-- /.blog-main -->
