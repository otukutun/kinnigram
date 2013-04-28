<div class="row-fluid">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal','enctype' => 'multipart/form-data'));?>
			<fieldset>
				<legend><?php echo __('ユーザ情報編集'); ?></legend>
				<?php
				echo $this->BootstrapForm->input('detail',array('label' => 'プロフィール'));
                echo $this->BootstrapForm->input('age',array('label' => '年齢'));
				echo $this->BootstrapForm->input('email',array('label' => 'メールアドレス'));
				//echo $this->BootstrapForm->input('file',array('type' => 'file','label' => '画像'));
				?>
				<?php echo $this->BootstrapForm->submit(__('投稿'),array('class' => 'btn btn-primary'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>
