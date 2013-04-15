<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Kintore');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['category']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Nice Sum'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['nice_sum']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('File'); ?></dt>
			<dd>
				<?php echo h($kintore['Kintore']['file']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Kintore')), array('action' => 'edit', $kintore['Kintore']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Kintore')), array('action' => 'delete', $kintore['Kintore']['id']), null, __('Are you sure you want to delete # %s?', $kintore['Kintore']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Kintores')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Kintore')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('controller' => 'nices', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('controller' => 'nices', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Nices')); ?></h3>
	<?php if (!empty($kintore['Nice'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Kintore Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($kintore['Nice'] as $nice): ?>
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
