<div class="row-fluid">
	<div class="span12">
		<h2><?php echo __('カテゴリ一覧');?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id','ID');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name','カテゴリ名');?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
				<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $category['Category']['id'])); ?>|
					<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $category['Category']['id'])); ?>|
					<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>
