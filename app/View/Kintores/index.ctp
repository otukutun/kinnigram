<div class="row-fluid">
    <div class="span12">
        <h2><?php echo __('投稿一覧');?></h2>

        <p>
            <?php //echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
        </p>
        <?php $i = 0; ?>
        <?php foreach ($kintores as $kintore): ?>
<?php if($i  == 0): ?>
        <div class="row-fluid">
<?php endif; ?>
            <div class="span4">
                <div class="thumbnail"><?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>&nbsp;
                    <div class="caption">
                    <span><h4>カテゴリ：<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>     <small><?php echo h($kintore['Kintore']['created']); ?>&nbsp;</small></span>
</h4>
                    <span>
                    <?php echo $this->Html->image($kintore['User']['file'],array('alt' => h($kintore['User']['username']),'url' => 'https://twitter.com/' . h($kintore['User']['username']))); ?>
                    <?php echo $this->Html->link(h($kintore['User']['username']), 'https://twitter.com/' . h($kintore['User']['username'])); ?>&nbsp;
                    <?php if(!$this->Kintore->checkNice($kintore['Nice'],$auth_user['username'])): ?>
                    <?php echo $this->Form->postLink('いいね', array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), null); ?>
                    <?php else: ?>
                    既にいいねしました。
                    <?php //echo $this->Form->postLink('いいねを取り消す', array('controller' => 'nices', 'action' => 'delete', $kintore['Kintore']['id']), null); ?>
                    <?php endif; ?>
                    <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $kintore['Kintore']['id'])); ?><br />
                    <?php if ($kintore['Kintore']['nice_sum'] >= 1): ?>
                    <div class='dropdown'>
                    <?php echo $this->Html->link(h($kintore['Kintore']['nice_sum']) . '人', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>がいいねと言っています。&nbsp;
<ul class='dropdown-menu' role='menu' target='_blank'>
<?php foreach($kintore['Nice'] as $nice): ?>
<li><?php echo $this->Html->link(h($nice['username']), 'https://twitter.com/' . h($nice['username'])); ?></li>
<?php endforeach; ?>
</ul><!-- end_ul_dropdown-menu-->
                    </div><!--end_dropdown-menu -->
                    <?php endif; ?>
                    </span>
                    <span>

                    </span>
                    </div><!-- end_caption-->
                </div><!-- end_thumbnail-->
            </div><!-- end_span4-->
<?php $i++; ?>
<?php if($i == 3): ?>
      </div><!-- end_row-fluid-->
        <?php $i = 0; ?>
<?php endif; ?>
       <?php endforeach; ?>
        <?php if($i != 3): ?>

      </div><!-- end_row-fluid-->
        <?php endif; ?>


        <?php echo $this->BootstrapPaginator->pagination(); ?>
    </div>
</div>
