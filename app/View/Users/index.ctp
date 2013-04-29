<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('%s 一覧', __('ユーザ'));?></h2>

		<p>
			<?php //echo $this->BootstrapPaginator->counter(array('format' => __(' {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('username','ユーザ名');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created','作成日');?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
                <td><?php echo $this->Html->image($user['User']['file'],
                                                    array('alt' => h($user['User']['username']),
                                                    'url' => 'https://twitter.com/' . h($user['User']['username']))); ?>&nbsp;
                    <?php echo $this->Html->link(h($user['User']['username']),'https://twitter.com/' . h($user['User']['username'])); ?>&nbsp;
                </td>
				<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                <td class="actions">
                    <?php if($this->Html->actionView($user['User']['id'],$auth_user['id'])): ?>
					<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $user['User']['id'])); ?> | 
                    <?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>
