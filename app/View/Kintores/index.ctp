<div class="row-fluid">
    <div class="span12">
        <p>
            <?php //echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
        </p>
        <?php $i = 0; ?>
        <?php foreach ($kintores as $kintore): ?>
<?php if($i  == 0): ?>
        <div class="row">
<?php endif; ?>
            <div class="span3 galery">
                <div class="menu-galery">
                    <ul>
                        <li><?php echo $this->Html->link(__('<i class="iconbig-search"></i>'), array('controller' => 'kintores', 'action' => 'view',$kintore['Kintore']['id']),array('escape' => false,'rel' =>'tooltip','title' => '詳細')); ?></li>
                        <li><?php echo $this->Html->link(__('<i class="iconbig-speak"></i>'), array('controller' => 'kintores', 'action' => 'view',$kintore['Kintore']['id']),array('escape' => false,'rel' =>'tooltip','title' => 'コメント')); ?></li>
                    <?php $nice_id = $this->Kintore->checkNice($kintore['Nice'],$auth_user['username']); ?>
                    <?php if(empty($nice_id)  || $nice_id === false): ?>
                    <?php echo $this->Form->postLink(__('<i class="iconbig-thumbs-up"></i>'), array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), array('escape' => false, 'rel' => 'tooltip', 'title' => 'いいね'),null); ?>
                    <?php else: ?>
                     <!--いいねしました。-->
                    <?php echo $this->Form->postLink(__('<i class="iconbig-thumbs-down"></i>'), array('controller' => 'nices', 'action' => 'delete', $nice_id), array('escape' => false, 'rel' => 'tooltip', 'title' => 'いいねを取り消す'),null); ?>
                    <?php endif; ?>

                    </ul>
                    
                </div><!-- menu-galery-->
                
                <div class="image-galery">
                    <?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file']); ?>&nbsp;
                </div><!-- image-galery-->
                    <div class="count-galery">
                        <ul>
                        <li><i class="icon-comment"></i> 5</li>
                        <!--<li><i class="icon-download-alt"></i> 7</li>-->
                        <li><i class="icon-thumbs-up"></i><?php echo ' ' . h($kintore['Kintore']['nice_sum']); ?></li>
                        <li><i class="icon-eye-open"></i> <?php echo ' ' . h($kintore['Kintore']['total_view']); ?></li>
                    </ul>
                    </div><!-- count-galery-->
                    <div class="tags-galery">
                        <p> <i class="icon-th-list"></i> カテゴリ : <?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?><br />
                             投稿日 : <?php echo date("Y年 n月 j日",strtotime($kintore['Kintore']['created'])); ?>&nbsp;<br />
                    投稿者 : <?php echo $this->Html->link(h($kintore['User']['username']), array('controller' => 'users', 'action' => 'view',h($kintore['User']['id']))); ?>&nbsp;
                        </p>
                    </div><!-- tags-galery-->

            </div><!-- end_span4-->
<?php $i++; ?>
<?php if($i == 4): ?>
      </div><!-- end_row-fluid-->
        <?php $i = 0; ?>
<?php endif; ?>
       <?php endforeach; ?>
        <?php if($i != 4): ?>

      </div><!-- end_row-fluid-->
        <?php endif; ?>


        <?php echo $this->BootstrapPaginator->pagination(); ?>
    </div>
</div>
