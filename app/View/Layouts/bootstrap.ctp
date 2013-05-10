<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('きんにぐらむ'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('style'); ?>
	<?php echo $this->Html->css('icon-style'); ?>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
	<?php echo $this->Html->css('jquery.fancybox'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="/img/favicon.ico">
	<link rel="icon" href="/img/favicon.ico">
	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo $this->Html->image('logo.png'); ?></a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <?php if ($this->Session->check('Auth.User')): ?>
                        <li class="divider-vertical"></li>
                        <li><?php echo $this->Html->link(__('ホーム'), array('controller' => 'kintores', 'action' => 'index')); ?></li>
                        <li class="divider-vertical"></li>
                        <li><?php echo $this->Html->link(__('投稿'), array('controller' => 'kintores', 'action' => 'add')); ?></li>
                        <li class="divider-vertical"></li>
                        <li><?php echo $this->Html->link(__('ユーザ一覧'), array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li class="divider-vertical"></li>
                        <?php else: ?>
                        <li><a href="about.html">このサイトについて</a></li>
                        <li class="divider-vertical"></li>
                        <?php endif ; ?>
                   </ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <?php if ($this->Session->check('Auth.User')): ?>
                        <li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?></li>
                        <?php else: ?>
                        <li><?php echo $this->Html->link(__('<i class="icon-lock"></i>ログイン'), array('controller' => 'users', 'action' => 'login'),array('escape' => false)); ?></li>
                        <li class="divider-vertical"></li>
                        <li><?php echo $this->Html->link(__('<i class="icon-lock"></i>アカウント登録'), array('controller' => 'users', 'action' => 'login'),array('escape' => false)); ?></li>
                        <li class="divider-vertical"></li>
                        <?php endif ; ?>
                        
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">

		<!--<h1>きんにぐらむ</h1>-->

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->


    <div class="container footer">
        <hr class="alt" />
        <div class="row">
            <div class="span6">&copy; 2013 きんにぐらむ. All right reserved.</div>
            <div class="span6">
                <ul>
                    <li><a href="#">開発者について</a></li>
                    <li><a href="#">プライバシー</a></li>
                </ul>
            </div>
        </div>
    </div><!--end_footer -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php //echo $this->Html->script('jquery'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('image-gallery'); ?>
	<?php echo $this->Html->script('jquery.mousewheel-3.0.6.pack'); ?>
	<?php echo $this->Html->script('jquery.fancybox'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
