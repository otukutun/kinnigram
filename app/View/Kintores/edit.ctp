<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Kintore', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('投稿編集'); ?></legend>
				<?php
				echo $this->BootstrapForm->input('category_id',array('label' => 'カテゴリ'));
                echo $this->BootstrapHtml->image('thumbnails' . DS . $this->request->data['Kintore']['file'],array('label' => '画像'));
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('投稿'),array('class' => 'btn btn-primary'));?>
			</fieldset>
        <?php echo $this->BootstrapForm->end();?>

         <fieldset>
            <legend><?php echo __('投稿削除'); ?></legend>
                <?php echo $this->BootstrapForm->postLink(__('削除'), array('action' => 'delete', $this->request->data['Kintore']['id']), null, __('投稿を削除しますか？')); ?>
         </fieldset>
    </div>
</div>
