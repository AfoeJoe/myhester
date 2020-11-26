<aside class="col-md-4 blog-sidebar">
  <div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>

  <div class="p-4">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
      <?php $i = 0;
        while ($i < 12):
          $result = strtotime("-$i months");?>
        <li><a href="<?= base_url('date/'.date("Y-m", $result)) ?>"> <?= date("M Y", $result)?> </a></li>

        <?php
          $i++;
        endwhile;
       ?>

    </ol>
  </div>

  <div class="p-4">
    <h4 class="font-italic">Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">Youtube</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="https://www.facebook.com/okunola.esther">Facebook</a></li>
    </ol>
  </div>
</aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

</main><!-- /.container -->
