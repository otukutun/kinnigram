<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Kintore', array('class' => 'form-horizontal','enctype' => 'multipart/form-data'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Kintore')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('category_id');
				echo $this->BootstrapForm->input('file',array('type' => 'file'));
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Kintores')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('controller' => 'nices', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('controller' => 'nices', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>
