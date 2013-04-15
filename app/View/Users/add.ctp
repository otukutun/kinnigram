<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('User')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('username');
				echo $this->BootstrapForm->input('twitter_id');
				echo $this->BootstrapForm->input('access_token');
				echo $this->BootstrapForm->input('access_token_secret');
				echo $this->BootstrapForm->input('detail');
				echo $this->BootstrapForm->input('age');
				echo $this->BootstrapForm->input('email');
				echo $this->BootstrapForm->input('file');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Nices')), array('controller' => 'nices', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Nice')), array('controller' => 'nices', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>