<div class="row-fluid">
	<div class="span12">
		<h2><?php  echo __('ユーザ情報');?></h2>
		<dl>
			<dt><?php echo __('ユーザ名'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('プロフィール'); ?></dt>
			<dd>
				<?php echo h($user['User']['detail']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('年齢'); ?></dt>
			<dd>
				<?php echo h($user['User']['age']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('登録日'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('画像'); ?></dt>
			<dd>
				<?php echo $this->Html->image($user['User']['file']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>

