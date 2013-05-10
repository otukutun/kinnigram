<?php if (!$this->Session->check('Auth.User')) : /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ ?>
<div class="account-container btm10">

	<div class="form-content clearfix">
    
		<form action="./" method="post">

			<h1><i class="iconbig-lock"></i>ログイン</h1>	
            
			<div class="login-fields">
            
				<p>ユーザ名とパスワードを入力してください</p>
                
				<div class="field">

					<label for="username">ユーザ名:</label>

					<input type="text" id="username" name="username" value="" placeholder="ユーザ名" class="login username-field" required />

				</div> <!-- /field -->

				<div class="field">

					<label for="password">パスワード:</label>

					<input type="password" id="password" name="password" value="" placeholder="パスワード" class="login password-field" required />

				</div> <!-- /password -->

			</div> <!-- /login-fields -->			

			<div class="login-actions">

				<span class="login-checkbox">

					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />

					<label class="choice" for="Field">パスワードを保存する</label>

				</span>

				<input type="submit" name="submit" value="ログイン" class="btn-signin btn btn-primary" />
                <a href="#" class="btn-signin btn">キャンセル</a>
                

			</div> <!-- .actions -->


			<div class="login-social marg10-btm">

				<p>Sign in using social network:</p>

                    <?php echo $this->Html->link($this->Html->image('twitter-18.png') . 'twitterでログイン  ',array('controller' => 'users','action' => 'twitter_login'),array('escape' => false,'class' => 'btn')); ?>
                    <?php echo $this->Html->link($this->Html->image('facebook-18.png') . 'facebookでログイン',array('controller' => 'users','action' => 'twitter_login'),array('escape' => false,'class' => 'btn')); ?>


			</div>
            
            <p><a href="#">パスワードを忘れた</a></p>

		  </form>

	   </div> <!-- /form-content -->

<?php else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ ?>
    ログイン済みです。
<?php endif ; ?>
</div>
