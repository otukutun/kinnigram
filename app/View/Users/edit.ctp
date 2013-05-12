<div class="row">
    <div class="span3 left-sidebar">
        <div class="account-settings">
			<?php echo $this->Html->image($user['User']['file'],array('height' => 210, 'weight' => 230)); ?>
        </div><!-- acount-settings -->
        <div class="account-detail">
            <p><strong>ユーザ名:</strong>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
            </p>
            <p><strong>詳細:</strong>
				<?php echo h($user['User']['detail']); ?>
				&nbsp;
            </p>
            <p><strong>年齢:</strong>
				<?php echo h($user['User']['age']) . '歳'; ?>
				&nbsp;
            </p>
            <p><strong>登録日:</strong>
                <?php echo date("Y年 n月 j日",strtotime($user['User']['created'])); ?>
				&nbsp;
            </p>
        </div>
    </div>
    <div class="span9 content-setting">
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
