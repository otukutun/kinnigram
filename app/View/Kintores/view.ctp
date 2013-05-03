<div class="row-fluid">
	<div class="span12">
		<dl>
			<dt></dt>
			<dd>
				<?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __(''); ?></dt>
			<dd>
                カテゴリ:<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?>
				&nbsp; <br />
				いいね:<?php echo h($kintore['Kintore']['nice_sum']); ?> 
                &nbsp;<br />
                投稿日:<?php echo h($kintore['Kintore']['created']); ?>
				&nbsp;
			</dd>
			<dd>
			</dd>
		</dl>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
	<?php if (!empty($kintore['Nice'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('ユーザ名'); ?></th>
				<th><?php echo __('投稿日'); ?></th>
				<th class="actions"><?php echo __('アクション');?></th>
			</tr>
		<?php foreach ($kintore['Nice'] as $nice): ?>
			<tr>
				<td><?php echo $nice['username'];?></td>
				<td><?php echo $nice['created'];?></td>
				<td class="actions">
					<?php echo $this->Form->postLink(__('削除'), array('controller' => 'nices', 'action' => 'delete', $nice['id']), null, __('Are you sure you want to delete # %s?', $nice['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>
