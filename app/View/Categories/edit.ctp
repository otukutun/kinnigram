<div class="row-fluid">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Category', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('カテゴリ編集'); ?></legend>
				<?php
				echo $this->BootstrapForm->input('name',array('label' => 'カテゴリ名'));
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('投稿'),array('class' => 'btn btn-primary'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>
