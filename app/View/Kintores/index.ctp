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
                    <?php echo $this->Html->image($kintore['User']['file']); ?><?php echo h($kintore['User']['username']); ?>&nbsp;
                    <?php echo $this->Form->postLink('いいね', array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), null); ?>
                    <i class='icon-thumbs-up'></i><?php echo h($kintore['Kintore']['nice_sum']); ?>&nbsp;
                    </span>
                    <span>
                    <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $kintore['Kintore']['id'])); ?>
                    <?php if($this->Html->actionView($auth_user['id'],$kintore['Kintore']['user_id'])): ?>
					<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $kintore['Kintore']['id'])); ?>
                    <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $kintore['Kintore']['id']), null, __('Are you sure you want to delete # %s?', $kintore['Kintore']['id'])); ?>
                    <?php endif; ?>

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
