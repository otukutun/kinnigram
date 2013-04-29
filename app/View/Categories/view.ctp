<div class="row-fluid">
	<div class="span12">
		<h2><?php  echo __('カテゴリ');?></h2>
		<dl>
			<dt><?php echo __('カテゴリ名'); ?></dt>
			<dd>
				<?php echo h($category['Category']['name']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3><?php echo __('Related %s', __('Kintores')); ?></h3>
	<?php if (!empty($category['Kintore'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('カテゴリ名'); ?></th>
				<th><?php echo __('いいねの合計'); ?></th>
				<th><?php echo __('投稿日'); ?></th>
				<th><?php echo __('編集日'); ?></th>
				<th><?php echo __('画像'); ?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($category['Kintore'] as $kintore): ?>
			<tr>
				<td><?php echo $kintore['category_id'];?></td>
				<td><?php echo $kintore['nice_sum'];?></td>
				<td><?php echo $kintore['created'];?></td>
				<td><?php echo $kintore['modified'];?></td>
				<td><?php echo $this->Html->image('thumbnails' . DS . $kintore['file']);?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('詳細'), array('controller' => 'kintores', 'action' => 'view', $kintore['id'])); ?>
					<?php echo $this->Html->link(__('編集'), array('controller' => 'kintores', 'action' => 'edit', $kintore['id'])); ?>
					<?php echo $this->Form->postLink(__('削除'), array('controller' => 'kintores', 'action' => 'delete', $kintore['id']), null, __('Are you sure you want to delete # %s?', $kintore['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>
