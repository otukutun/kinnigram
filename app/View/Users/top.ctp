<div class="row">
    <div class="span12" style="margin-bottom:25px">
        <?php echo $this->Html->image('top_kinnigram3.png'); ?>
    </div><!--span12-->
    <hr />
    <div class="span6">
        <h3 class="selector" style="margin-bottom:15px">対応端末</h3>
        <?php echo $this->Html->image('platform.png'); ?>
    </div><!-- span6-->
    <div class="span6">
        <h3 class="selector"style="margin-bottom:15px">注目機能</h3>
        <?php echo $this->Html->image('function.png'); ?>
    </div><!-- span6-->
    <div class="span12" style="margin-bottom:25px">
        <h3 class="selector"style="margin-bottom:15px">最新の投稿</h3>
        <?php if ($kintores): ?>
            <div class="row">
            <?php foreach($kintores as $kintore): ?>
                <div class="span3">
                    <?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>
                </div><!-- span3-->
            <?php endforeach; ?>
            </div><!-- row -->
        <?php else: ?>
            <h3>投稿がありません。</h3>
        <?php endif; ?> 
    </div>

</div><!-- row-->
