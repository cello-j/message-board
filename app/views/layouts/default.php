<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Klab フォーラム </title>
    <link rel="shortcut icon" type="image/x-icon" href="/bootstrap/img/logo.ico">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/board.css" rel="stylesheet">
  </head>

  <body class="background-gradient">

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         <a class="brand" href="/"> <img src="/bootstrap/img/com_header.gif">KLab フォーラム </a>
	  <div class="right-positioner">
          <?php if(!isset($_SESSION['username'])):?>
               <a class="btn btn-small btn-primary" href="<?php eh(url('user/add_new')) ?>">新規登録</a>
               <a class="btn btn-small btn-primary" href="<?php eh(url('user/login')) ?>"> ログイン </a>
         <?php else: ?>
               Logged in as: [<?php echo $_SESSION['username']?>]&nbsp;
               <a class="btn btn-small btn-primary" href="<?php eh(url('user/logout')) ?>"> ログアウト </a>
          <?php endif ?>
	  </div>
        </div>
      </div>
    </div>

    <div class="contents-container">

      <?php echo $_content_ ?>

    </div>

    <script>
    console.log(<?php eh(round(microtime(true) - TIME_START, 3)) ?> + 'sec');
    </script>

  </body>
</html>
