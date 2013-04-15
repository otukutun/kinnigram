<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Nice', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Nice')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('kintore_id');
				echo $this->BootstrapForm->input('user_id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Kintores')), array('controller' => 'kintores', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Kintore')), array('controller' => 'kintores', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>