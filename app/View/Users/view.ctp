<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('User');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Twitter Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['twitter_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Access Token'); ?></dt>
			<dd>
				<?php echo h($user['User']['access_token']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Access Token Secret'); ?></dt>
			<dd>
				<?php echo h($user['User']['access_token_secret']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Detail'); ?></dt>
			<dd>
				<?php echo h($user['User']['detail']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Age'); ?></dt>
			<dd>
				<?php echo h($user['User']['age']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('File'); ?></dt>
			<dd>
				<?php echo h($user['User']['file']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('User')), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('User')), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('controller' => 'nices', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('controller' => 'nices', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Nices')); ?></h3>
	<?php if (!empty($user['Nice'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Kintore Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($user['Nice'] as $nice): ?>
			<tr>
				<td><?php echo $nice['id'];?></td>
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
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('controller' => 'nices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
