<?php if (!$this->Session->check('Auth.User')) : /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ ?>
<div class="account-container btm10">

	<div class="form-content clearfix">
    

			<h1><i class="iconbig-add"></i>ユーザ登録</h1>	
				<!--<p>Twitterを使ってユーザ登録</p>-->
                    <?php echo $this->Html->link($this->Html->image('twitter-18.png') . 'twitterで登録  ',array('controller' => 'users','action' => 'twitter_login'),array('escape' => false,'class' => 'btn btn-large btn-block')); ?>
			<div class="login-actions">


			</div> <!-- .actions -->
	   </div> <!-- /form-content -->

<?php else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ ?>
    <h3>ログイン済みです。</h3>
<?php endif ; ?>
</div>
