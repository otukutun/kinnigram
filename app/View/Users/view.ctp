<div class="row">
    <div class="span3 left-sidebar">
        <div class="account-settings">
			<?php echo $this->Html->image($user['User']['file'],array('height' => 210, 'width' => 230)); ?>
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
    </div><!-- span3 -->
    <div class="span9 content-setting">
        <?php if ($kintores == null): ?>
            <h4>筋肉写真を投稿しませんか？みんながあなたの筋肉を見たがっています。</h4>
        <?php else: ?>
            <div class="span9 portfolio-images">
                <h3>これまでの投稿</h3>
                <div class="row">
                <?php $i = 0; ?>
                <?php foreach($kintores as $kintore): ?>
                    <?php if ($i == 0): ?> <div class="span9 list-images"> <?php endif; ?>
                    <div class="span2">
                           <?php echo $this->Html->image('thumbnails' . DS . h($kintore['Kintore']['file']),array('height' => '160','weight' => '120')); ?>
                           <!--<a href="#" class="thumbnail"><img src="http://placehold.it/160x120" alt=""></a>-->
                    </div>
                    <?php $i++; ?>
                    <?php if ($i == 4): ?> </div> <?php endif; ?>
                    <?php if ($i == 4) {$i = 0;} ?> <?php endforeach; ?>
                    </div><!-- row-->
            </div><!-- span9 portfolio-images-->
            <?php echo $this->BootstrapPaginator->pagination(); ?>
        <?php endif; ?>
    </div>
</div>

