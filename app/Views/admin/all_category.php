<section>
<h2>  All Posts
</h2>
<?php if (session()->get('success')): ?>
  <div class="alert alert-success">
    <p><?= session()->get('success'); ?></p>
  </div>
<?php endif; ?>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>

        <th scope="col">#</th>
        <th scope="col" colspan="2">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $post): ?>
        <tr>
          <th scope="row"><?= $post['id']; ?></th>
          <td colspan="2"><?= $post['name']; ?></td>
          <td>  <a type="button" class="btn btn-secondary" href="<?= base_url('/admin/edit-category/?id='.$post['id']) ?>">Edit</a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="<?php echo '#exampleModal'.$post['id'] ?>" >Delete</button>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="<?php echo 'exampleModal'.$post['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want  to delet this</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="<?= base_url('/admin/delete-category/?id='.$post['id']) ?>" class="btn btn-primary">Yes</a>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>


</div>
</section>
