<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Users'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php //echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('file','画像');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('username','ユーザ名');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('twitter_id');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('access_token');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('access_token_secret');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('detail');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('age');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('email');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created','作成日');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php //echo h($user['User']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->image($user['User']['file']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['twitter_id']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['access_token']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['access_token_secret']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['detail']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['age']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
				<td><?php //echo h($user['User']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php //echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>
