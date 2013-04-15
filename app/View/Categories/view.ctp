<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Category');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($category['Category']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($category['Category']['name']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Category')), array('action' => 'edit', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Category')), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Kintores')), array('controller' => 'kintores', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Kintore')), array('controller' => 'kintores', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Kintores')); ?></h3>
	<?php if (!empty($category['Kintore'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Category Id'); ?></th>
				<th><?php echo __('Category'); ?></th>
				<th><?php echo __('Nice Sum'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th><?php echo __('File'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($category['Kintore'] as $kintore): ?>
			<tr>
				<td><?php echo $kintore['id'];?></td>
				<td><?php echo $kintore['category_id'];?></td>
				<td><?php echo $kintore['category'];?></td>
				<td><?php echo $kintore['nice_sum'];?></td>
				<td><?php echo $kintore['created'];?></td>
				<td><?php echo $kintore['modified'];?></td>
				<td><?php echo $kintore['file'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'kintores', 'action' => 'view', $kintore['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'kintores', 'action' => 'edit', $kintore['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'kintores', 'action' => 'delete', $kintore['id']), null, __('Are you sure you want to delete # %s?', $kintore['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Kintore')), array('controller' => 'kintores', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
