<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Nice');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($nice['Nice']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Kintore'); ?></dt>
			<dd>
				<?php echo $this->Html->link($nice['Kintore']['id'], array('controller' => 'kintores', 'action' => 'view', $nice['Kintore']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($nice['User']['id'], array('controller' => 'users', 'action' => 'view', $nice['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($nice['Nice']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($nice['Nice']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Nice')), array('action' => 'edit', $nice['Nice']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Nice')), array('action' => 'delete', $nice['Nice']['id']), null, __('Are you sure you want to delete # %s?', $nice['Nice']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Kintores')), array('controller' => 'kintores', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Kintore')), array('controller' => 'kintores', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

