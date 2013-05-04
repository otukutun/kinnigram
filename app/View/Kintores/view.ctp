<div class="row-fluid">
	<div class="span12">
		<dl>
			<dt></dt>
			<dd>
				<?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __(''); ?></dt>
			<dd>
                カテゴリ:<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>
				&nbsp; <br />
                投稿日:<?php echo h($kintore['Kintore']['created']); ?>
				&nbsp;
			</dd>
			<dd>
            </dd>
            <dt></dt>
            <dd><?php echo $this->Html->image($kintore['User']['file'],array('alt' => h($kintore['User']['username']),'url' => 'https://twitter.com/' . h($kintore['User']['username']))); ?>
                    <?php echo $this->Html->link(h($kintore['User']['username']), 'https://twitter.com/' . h($kintore['User']['username'])); ?>&nbsp;
                    <?php $nice_id = $this->Kintore->checkNice($kintore['Nice'],$auth_user['username']); ?>
                    <?php if($nice_id === false): ?>
                    <?php echo $this->Form->postLink('いいね', array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), null); ?>
                    <?php else: ?>
                     <!--いいねしました。-->
                    <?php echo $this->Form->postLink('いいねを取り消す', array('controller' => 'nices', 'action' => 'delete', $nice_id), null); ?>
                    <?php endif; ?>
                    <br />
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
</dd>
		</dl>
	</div>
</div>

