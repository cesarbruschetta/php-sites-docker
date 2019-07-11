<?php // $Id: box.tpl.php,v 1.1.2.1 2009/06/22 04:36:03 agileware Exp $ ?>
<div class="box">
  <div class="Block">
    <div class="Block-body">
      <?php if ($title): ?>
        <div class="BlockHeader">
          <div class="l"></div>
          <div class="r"></div>
          <div class="header-tag-icon">
            <div class="t">
              <?php echo $title; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="BlockContent">
        <div class="BlockContent-body">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
  </div>
</div>
