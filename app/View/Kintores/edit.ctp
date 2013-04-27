<div class="row-fluid">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Kintore', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Edit %s', __('Kintore')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('category_id');
				echo $this->BootstrapForm->input('category');
				echo $this->BootstrapForm->input('nice_sum');
				echo $this->BootstrapForm->input('file');
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>
