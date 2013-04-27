<div class="row-fluid">
	<div class="span12">
		<h2><?php echo '投稿一覧';?></h2>

		<p>
			<?php //echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php //echo $this->BootstrapPaginator->sort('id','投稿ID');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created','投稿日');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('file','きんにく');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('category_id','カテゴリ');?></th>
				<th><?php //echo $this->BootstrapPaginator->sort('modified','編集日');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('username','投稿者');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('nice_sum','いいね');?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($kintores as $kintore): ?>
			<tr>
				<td><?php //echo h($kintore['Kintore']['id']); ?>&nbsp;</td>
				<td><?php echo h($kintore['Kintore']['created']); ?>&nbsp;</td>
				<td><?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>
				</td>
				<td><?php //echo h($kintore['Kintore']['modified']); ?>&nbsp;</td>
				<td><?php echo h($kintore['User']['username']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Form->postLink(__('いいね'), array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), null); ?>
                <?php echo h($kintore['Kintore']['nice_sum']); ?>&nbsp;
                </td>
				<td class="actions">
                    <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $kintore['Kintore']['id'])); ?>
                    <?php if($this->Kintore->actionView($user['id'],$kintore['Kintore']['user_id'])): ?>
					<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $kintore['Kintore']['id'])); ?>
                    <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $kintore['Kintore']['id']), null, __('Are you sure you want to delete # %s?', $kintore['Kintore']['id'])); ?>
                    <?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>
