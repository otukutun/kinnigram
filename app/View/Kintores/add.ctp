<div class="row-fluid">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Kintore', array('class' => 'form-horizontal','enctype' => 'multipart/form-data'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Kintore')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('category_id');
				echo $this->BootstrapForm->input('file',array('type' => 'file'));
				?>
				<?php echo $this->BootstrapForm->submit(__('投稿'),array('class' => 'btn btn-primary'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>
