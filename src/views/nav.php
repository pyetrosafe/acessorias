          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php if ($pagination->showStartNav()) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=1">1 ...</a>
              </li>
              <?php } ?>

              <li class="page-item">
                <?php if ($navPage['one']['link'] == null) { ?>
                  <span class="page-link"><?= $navPage['one']['label']; ?></span>
                <? } else { ?>
                  <a class="page-link" href="<?= $navPage['one']['link'] ?>"><?= $navPage['one']['label'] ?></a>
                <?php } ?>
              </li>
              <li class="page-item">
                <?php if ($navPage['two']['link'] == null) { ?>
                  <span class="page-link"><?= $navPage['two']['label']; ?></span>
                <? } else { ?>
                  <a class="page-link" href="<?= $navPage['two']['link'] ?>"><?= $navPage['two']['label'] ?></a>
                <?php } ?>
              </li>
              <li class="page-item">
                <?php if ($navPage['three']['link'] == null) { ?>
                  <span class="page-link"><?= $navPage['three']['label']; ?></span>
                <? } else { ?>
                  <a class="page-link" href="<?= $navPage['three']['link'] ?>"><?= $navPage['three']['label'] ?></a>
                <?php } ?>
              </li>
              <li class="page-item">
                <?php if ($navPage['four']['link'] == null) { ?>
                  <span class="page-link"><?= $navPage['four']['label']; ?></span>
                <? } else { ?>
                  <a class="page-link" href="<?= $navPage['four']['link'] ?>"><?= $navPage['four']['label'] ?></a>
                <?php } ?>
              </li>
              <li class="page-item">
                <?php if ($navPage['five']['link'] == null) { ?>
                  <span class="page-link"><?= $navPage['five']['label']; ?></span>
                <? } else { ?>
                  <a class="page-link" href="<?= $navPage['five']['link'] ?>"><?= $navPage['five']['label'] ?></a>
                <?php } ?>
              </li>

              <?php if ($pagination->showEndNav()) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $pagination->getMaxPage(); ?>">... <?= $navPage['last']; ?></a>
              </li>
              <?php } ?>
            </ul>
          </nav>
