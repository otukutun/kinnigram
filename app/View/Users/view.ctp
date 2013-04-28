<div class="row-fluid">
	<div class="span12">
		<h2><?php  echo __('ユーザ情報');?></h2>
		<dl>
			<dt><?php echo __('ユーザ名'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('プロフィール'); ?></dt>
			<dd>
				<?php echo h($user['User']['detail']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('年齢'); ?></dt>
			<dd>
				<?php echo h($user['User']['age']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('メールアドレス'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('登録日'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('画像'); ?></dt>
			<dd>
				<?php echo $this->Html->image($user['User']['file']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3><?php echo __('Related %s', __('Nices')); ?></h3>
	<?php if (!empty($user['Nice'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Kintore Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Nice'] as $nice): ?>
			<tr>
				<td><?php echo $nice['kintore_id'];?></td>
				<td><?php echo $nice['user_id'];?></td>
				<td><?php echo $nice['created'];?></td>
				<td><?php echo $nice['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'nices', 'action' => 'view', $nice['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'nices', 'action' => 'edit', $nice['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'nices', 'action' => 'delete', $nice['id']), null, __('Are you sure you want to delete # %s?', $nice['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>
