<div class="row">
    <div class="span9">
        <div class="row">
            <div class="span9 image-detail">
                <div class="auto image-single">
				<?php echo $this->Html->image('thumbnails' . DS . $kintore['Kintore']['file'],array('class' => 'centered','width' => '553','height' => '553')); ?>
                &nbsp;
                </div><!-- auto image-single-->
            </div><!-- end_span9-image-detail-->
            
            <div class="span9 image-comments">
                <div class="comment">
                    <h3>コメント</h3>
                    <ul>
                        <?php foreach($kintore['Comment'] as $comment): ?>
                            <li>
                            <div class="avatar">
                                <?php //echo $this->Html->image('gravatar.jpg'); ?>
                                <?php echo $this->Html->image($comment['User']['file'],array('width' => 35, 'height' => 35)); ?>
                                <span class="comment-name"><?php echo $this->Html->link(h($comment['username']),array('controller' => 'users','action' => 'view',$comment['user_id'])); ?></span>
                                <span class="comment-date"><?php echo h($comment['created']); ?></span>
                            </div><!-- div .avatar-->
                            <div class="comment-text">
                                <p><?php echo h($comment['body']); ?></p>
                            </div>
                            </li>
                            <?php endforeach; ?>
                    </ul>
                </div><!--comment -->
                <br class="clearfix" />
                <!--<h3>コメント投稿</h3>-->
                <div class="post-comment" id="add-comment">
		            <?php echo $this->BootstrapForm->create('Comment', array('action' => 'add','class' => 'form-horizontal','div' => array('control-group' => false),'between' => array('controls' => false)));?>
				        <legend><?php echo __('コメント投稿'); ?></legend>
                        <?php echo $this->BootstrapForm->input('body',array('label' => false,'type' => 'textarea','class' => 'input-xxlarge inp-btm','rows' => 5,'placeholder' => 'コメントを入力してください。','div' => false,'style' => 'resize: none;')); ?>
                        <?php echo $this->BootstrapForm->input('kintore_id',array('value' => $kintore['Kintore']['id'],'type' => 'hidden')); ?><br />
				        <?php echo $this->BootstrapForm->submit(__('投稿'),array('class' => 'btn btn-primary','label' => false, 'div' => false));?>
				        <?php echo $this->BootstrapForm->reset(__('リセット'),array('class' => 'btn'));?>
		            <?php echo $this->BootstrapForm->end();?>
                </div><!--post_comment -->
            </div><!-- end_span9-image-comments-->
    </div><!-- end_span-->
    </div><!-- end_row-->
    <div class='span3'><!--sidebar -->
        <div class='row'>
            <div class="span3 sidebar-detail-menu">
            <ul>
                <li>
                    <?php $favorite_id = $this->Kintore->checkFavorite($kintore['Favorite'],$auth_user['username']); ?>
                    <?php if($favorite_id === false): ?>
                    <?php echo $this->Form->postLink(__('<i class="iconbig-black-star"></i>'), array('controller' => 'favorites', 'action' => 'add', $kintore['Kintore']['id']), array('escape' => false,'rel' =>'tooltip','title' => 'お気に入り登録')); ?></li>
                    <?php else: ?>
                    <?php echo $this->Form->postLink(__('<i class="iconbig-white-star"></i>'), array('controller' => 'favorites', 'action' => 'delete', $favorite_id), array('escape' => false,'rel' =>'tooltip','title' => 'お気に入りを取り消す')); ?></li>
                    <?php endif; ?>
                <li><?php echo $this->Html->link(__('<i class="iconbig-speak"></i>'), '#add-comment',array('escape' => false,'rel' =>'tooltip','title' => 'コメント投稿')); ?></li>
                <li>
                <?php $nice_id = $this->Kintore->checkNice($kintore['Nice'],$auth_user['username']); ?>
                    <?php if($nice_id === false): ?>
                    <?php echo $this->Form->postLink('<i class="iconbig-thumbs-up"></i>', array('controller' => 'nices', 'action' => 'add', $kintore['Kintore']['id']), array('escape' => false,'rel' => 'tooltip','data-original-title' => 'いいね')); ?>
                    <?php else: ?>
                     <!--いいねしました。-->
                    <?php echo $this->Form->postLink('<i class="iconbig-thumbs-down"></i>', array('controller' => 'nices', 'action' => 'delete', $nice_id), array('escape' => false,'rel' => 'tooltip','data-original-title' => 'いいねを取り消す')); ?>
                    <?php endif; ?>
                </li>
            </ul>
            </div><!-- .span3 sidebar-detail-menu-->
            <div class="span3 sidebar-detail-category">
                        <div class="category-image">
                            <div class="cat-category">カテゴリ :<?php echo $this->Html->link($kintore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $kintore['Category']['id'])); ?> </div>
                            <div class="cat-liked">いいね by: 
                                <?php if ($kintore['Kintore']['nice_sum'] >= 1): ?>
                                    <?php foreach($kintore['Nice'] as $nice): ?>
                                    <?php echo $this->Html->link(h($nice['username']), 'https://twitter.com/' . h($nice['username'])); ?>,
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="cat-download">投稿日 :<?php echo h($kintore['Kintore']['created']); ?>&nbsp;</div>
                            <div class="cat-post-user">投稿者 : <?php echo $this->Html->link(h($kintore['User']['username']), array('controller' => 'users', 'action' => 'view', h($kintore['User']['id']))); ?>&nbsp;
            <?php echo $this->Html->image($kintore['User']['file'],array('alt' => h($kintore['User']['username']),'url' => array('controller' => 'users', 'action' => 'view', h($kintore['User']['id'])), 'style' => 'margin-left: 10px;')); ?>
                            </div>
                &nbsp; <br />
                    <?php if ($kintore['Kintore']['nice_sum'] >= 1): ?>
                    <div class='dropdown'>
                    <?php echo $this->Html->link(h($kintore['Kintore']['nice_sum']) . '人', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?>がいいねと言っています。&nbsp;
<ul class='dropdown-menu' role='menu' target='_blank'>
<?php foreach($kintore['Nice'] as $nice): ?>
<li><?php echo $this->Html->link(h($nice['username']), array('controller' => 'users', 'action' => 'view', h($nice['user_id']))); ?></li>
<?php endforeach; ?>
</ul><!-- end_ul_dropdown-menu-->
                    </div><!--end_dropdown-menu -->
                    <?php endif; ?>

                        </div>
                    </div>
        </div><!-- .row-->
    </div><!-- .span3-->
</div><!-- end_row-->

