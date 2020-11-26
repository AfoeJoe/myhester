</div>
<main role="main" class="container">
<div class="row">
<div class="col-md-8 blog-post">

  <h2 class="blog-post-title"><?= $post['title'] ?></h2>
  <p class="blog-post-meta"><?= date('F j , Y',strtotime($post['updated_at'])); ?> by  Esther</p>
  <img preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" class="bd-placeholder-img img-fluid" src="<?= $post['photo_string']; ?>"  alt="">

  <div>
    <?= html_entity_decode($post['body']) ?>
  </div>
  <div class="row">
    <div class="col-md-8">
      <h3 class="pb-4 mt-4 font-italic border-bottom">
        Also Interesting
      </h3>
      <a class="blog-post-title text-link" href="<?= base_url($nextpost['slug']) ?>"><?= $nextpost['title'] ?></a>
    </div><!-- /.row -->
</div>
</div>
