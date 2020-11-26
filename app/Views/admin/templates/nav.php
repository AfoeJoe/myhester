<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

<?php if (session()->get('isLoggedIn')): ?>
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?php echo base_url("admin/profile");?>">
    <?php echo session()->get('first_name'); ?>  </a>
<?php else: ?>
  My hester
<?php endif; ?>

<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<ul class="navbar-nav px-3">
<li class="nav-item text-nowrap">
  <?php if (session()->get('isLoggedIn')): ?>
    <a class="nav-link" href="<?php echo base_url("admin/logout");
 ?>">Sign out</a>
  <?php else: ?>
    <a class="nav-link" href="<?php echo base_url("admin/logout");?>">login</a>

  <?php endif; ?>
</li>
</ul>
</nav>

<div class="container-fluid">
<div class="row">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="<?= base_url('./admin') ?>">
          <span data-feather="home"></span>
          All posts <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('./admin/add-post') ?>">
          <span data-feather="file"></span>
          Add post
        </a>
      </li>

    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Misc</span>
      <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('./admin/category'); ?>">
          <span data-feather="file-text"></span>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('./admin/add-category'); ?>">
          <span data-feather="file-text"></span>
          Add Category
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('./admin/upload'); ?>">
          <span data-feather="file-text"></span>
          Files
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('./admin/add-upload'); ?>">
          <span data-feather="file-text"></span>
          File Uploading
        </a>
      </li>


    </ul>
  </div>
</nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
