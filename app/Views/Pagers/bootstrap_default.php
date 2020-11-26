<?php $pager->setSurroundCount(2) ?>

<tfoot aria-label="Page navigation example">
  <tr class="pagination">

  <?php if ($pager->hasPreviousPage()) : ?>
        <td class="page-item">
            <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
        </td>
        <td class="page-item">
            <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
            </a>
        </td>
    <?php endif ?>
    <?php foreach ($pager->links() as $link) : ?>
        <td class="page-item" <?= $link['active'] ? 'class="active"' : '' ?>>
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </td>
    <?php endforeach ?>
    <?php if ($pager->hasNextPage()) : ?>
        <td class="page-item">
            <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.next') ?></span>
            </a>
        </td>
        <td class="page-item">
            <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </td>
    <?php endif ?>

  </tr>

</tfoot>
