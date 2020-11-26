<?php if (isset($featured)): ?>
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
<?php endif; ?>

<?php if (isset($posts[0]) && isset($posts[0])): ?>
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?= $posts[0]['name'] ?></strong>
          <h3 class="mb-0"><?= $posts[0]['title'] ?></h3>
          <div class="mb-1 text-muted"><?= date('M j',strtotime($posts[0]['updated_at'])); ?></div>
          <p class="card-text mb-auto"><?= $posts[0]['excerpt'] ?></p>
          <a href="<?= $posts[0]['slug'] ?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <?php if (!empty($posts[0]['photo_string'])): ?>
            <img  focusable="false" role="img" aria-label="Placeholder: Thumbnail" class="bd-placeholder-img" src="<?= $posts[0]['photo_string']; ?>" width="200" height="250" alt="">
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if (isset($posts[1]) && isset($posts[1])): ?>

      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"><?= $posts[1]['name'] ?></strong>
            <h3 class="mb-0"><?= $posts[1]['title'] ?></h3>
            <div class="mb-1 text-muted"><?= date('M j',strtotime($posts[1]['updated_at'])); ?></div>
            <p class="card-text mb-auto"><?= $posts[1]['excerpt'] ?></p>
            <a href="<?= $posts[1]['slug'] ?>" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <?php if (!empty($posts[1]['photo_string'])): ?>
              <img src="<?= $posts[1]['photo_string'] ?>" alt="" class="bd-placeholder-img" width="200" height="250">
            <?php endif; ?>
          </div>
        </div>
      </div>
  <?php endif; ?>

  </div>
<?php endif; ?>

</div>

<main role="main" class="container">
<div class="row">
  <div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
      From the Firehose
    </h3>
    <?php $i = 2;while (isset($posts[$i])):?>
      <div class="blog-post">
        <div class="col-md-12">
          <div class="row no-gutters overflow-hidden ">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success"><?= $posts[$i]['name'] ?></strong>

              <h2 class="blog-post-title"><?= $posts[$i]['title'] ?></h2>
              <p class="blog-post-meta"><?= date('M j',strtotime($posts[$i]['updated_at'])); ?> by Esther</p>

              <p><?= $posts[$i]['excerpt'] ?></p>
              <a href="<?= base_url($posts[$i]['slug']) ?>" class="link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <?php if (!empty($posts[$i]['photo_string'])): ?>
                <img  focusable="false" role="img" aria-label="Placeholder: Thumbnail" class="bd-placeholder-img" src="<?= $posts[$i]['photo_string']; ?>" width="200" height="250" alt="">
              <?php endif; ?>
            </div>
          </div>

    </div>

        <hr>

      </div><!-- /.blog-post -->
      <?php $i++;
    endwhile; ?>



<!--     <nav class="blog-pagination">
  <a class="btn btn-outline-primary" href="#">Older</a>
  <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav> -->

  </div><!-- /.blog-main -->
