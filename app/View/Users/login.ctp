<div class="hero-unit">
あなたの筋肉をきんにぐらむでシェアしよう。
<?php if (!$this->Session->check('Auth.User')) : /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ ?>
    <?php echo $this->BootstrapForm->create('User',array('action'=>'twitter_login'));?>
    <?php echo $this->BootstrapForm->submit(__('Twitter でログイン'),array('class' => 'btn btn-primary'));?>
    <?php echo $this->BootstrapForm->end(); ?>
<?php else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ ?>
    ログイン済みです。
<?php endif ; ?>
</div>
