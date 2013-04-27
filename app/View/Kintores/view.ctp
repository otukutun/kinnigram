<div class="row-fluid">
	<div class="span12">
		<h2><?php  echo __('Kintore');?></h2>
		<dl>
			<dt><?php //echo __('Id'); ?></dt>
			<dd>
				<?php //echo h($kintore['Kintore']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php //echo __('Category'); ?></dt>
			<dd>
				<?php //echo h($kintore['Kintore']['category']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('いいねの合計'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['nice_sum']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('投稿日'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('編集日'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('画像'); ?></dt>
			<dd>
				<?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3><?php echo __('Related %s', __('Nices')); ?></h3>
	<?php if (!empty($kintore['Nice'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Kintore Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($kintore['Nice'] as $nice): ?>
			<tr>
				<td><?php echo $nice['id'];?></td>
				<td><?php echo $nice['kintore_id'];?></td>
				<td><?php echo $nice['user_id'];?></td>
				<td><?php echo $nice['created'];?></td>
				<td><?php echo $nice['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('詳細'), array('controller' => 'nices', 'action' => 'view', $nice['id'])); ?>
					<?php echo $this->Html->link(__('編集'), array('controller' => 'nices', 'action' => 'edit', $nice['id'])); ?>
					<?php echo $this->Form->postLink(__('削除'), array('controller' => 'nices', 'action' => 'delete', $nice['id']), null, __('Are you sure you want to delete # %s?', $nice['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>
