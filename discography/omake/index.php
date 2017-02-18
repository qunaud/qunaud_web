<?php
//初期化
session_start();
$dsn = 'mysql:dbname=qucddb;host=localhost;charset=utf8';
$user = 'qucd';
$password = 'qucd0808';

//DB接続はじめ
try{
    $dbh = new PDO($dsn, $user, $password);
//入力IDからパスワードを出す
    $stmt = $dbh->prepare("SELECT * FROM qucd WHERE id = ?");
    $stmt->execute(array($_POST['id']));
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST["id"])){
    if(empty($res)){
    $regist_error = "IDかパスワードが違います。<br />";
     $status = "failed";
    }}
    $hash =  $res['password'];
    $pass = $_POST['password'];
    //パスワード比較
    $hikaku = password_verify($pass, $hash);
  if($hikaku == 1){
    $status = "ok";
    //セッションにユーザ名を保存
    $_SESSION["id"] = $_POST["id"];
    $_SESSION["id"]=$res['id'];
    $file=$res['file'];
      }else{
    $status = "failed";
    if(!empty($pass)){
    $regist_error = "IDかパスワードが違います。<br />";
    }
   }
//DB接続エラー時処理
} catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
    }
$dbh = null;
//DB接続終わり
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="google-site-verification" content="2M_cPHkPrDhlsIyGgRN7OXPpBSzmMmDB9MKkWLN20Vs" />
  <title>クナウドの雑記帳</title>
    <meta name ="keywords" content="クナウド","qunaud","qunaudazarea","qunaud_azarea","クナウドアザレア","UTAU","くなっぽいど","クナっぽいど,"UTAU音源">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sticky-footer.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="../js/top.js"></script>
    <link href="../css/top.css" rel="stylesheet">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80174817-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
  <div class="navbar-header">
       <a href="../" class="navbar-brand">クナウドの雑記帳</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
      <span class="sr-only">メニュー</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <div id="gnavi" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="../utau/index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UTAU<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../utau/index.html">Info</a></li>
            <li><a href="../utau/kiyaku.html">利用規約</a></li>
            <li><a href="../utau/illust.html">イラスト</a></li>
          </ul>
        </li>
      <li><a href="../work.html">制作環境</a></li>
       <li><a href="../discography/">作品集</a></li>
      <li><a href="../link.html">外部リンク</a></li>
      <li><a href="../admin/">管理用</a></li>
    </ul>
  </div>
</div>
</nav>
<body>

  <header   class="header ">
      <a href="../index.html"><img src="../img/logo.png" alt="クナウドの雑記帳"  class="img-responsive"></a> 
        <div class="row">
         <div class="col-xs-11 col-sm-offset-1">  
      <p>ここはクナウドの適当な雑記帳です。UTAU音源配布や制作環境の晒しに使っていきます。</p>
      </div>
</div>
    </header>

    <?php if($status == "logged_in"): 
    echo "すでに";
    ?>
    <?php elseif($status == "ok"): 
    header("Location: $file");
exit;
    ?>
    <?php elseif($status == "failed"): 
       print('
    <div class="col-xs-offset-1">'
        .$regist_error.'
      </div>
    ');?>
        <div class="row">
        <div class="col-md-6">
            <form method="POST" action="index.php" class="form-horizontal">
                <div class="form-group">
                      <label for="id" class="col-sm-2 control-label">ID</label>
                          <div class="col-sm-5 ">
                                <input required type="text" name="id" maxlength="10" class="form-control" placeholder="ID"/>
                                </div>
                    </div>
                    <div class="form-group">
                       <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-5">
                                              <input required type="password" name="password" maxlength="100" class="form-control" placeholder="Password"/>
                                    </div>
                       </div>
                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                 <input type="submit" value="ログイン" class="orm-control btn btn-default"/>
                                  <div>
                         </div>
                </form>
      <br>
        <input type="button" onclick="location.href='usertouroku.php'" value="新規登録" class="btn btn-default">
         </div>
    </div>
 
    <?php endif; ?>


    <!-- sm以下で非表示-->
    <div class="col-md-3 hidden-sm hidden-xs">
        <a class="twitter-timeline"  width="95%" height="500px" href="https://twitter.com/qunaud"  data-widget-id="490119919216779264">@qunaud からのツイート</a>
         <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<br/>
<a class="twitter-timeline" width="95%" height="500px" href="https://twitter.com/qunaud_test"  data-widget-id="490122784224186369">@qunaud_test からのツイート</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!--sm以下で表示-->
   <div class="col-xs-12 visible-xs visible-sm" style="margin-top:1em">
        <div class="btn-group">
       <a href="https://twitter.com/qunaud" class="twitter-follow-button" data-show-count="false">Follow @qunaud</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a href="https://twitter.com/qunaud_test" class="twitter-follow-button" data-show-count="false">Follow @qunaud_test</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
   </div>
</div>

<p id="page-top"><a href="#">▲</a></p>
    <footer class="footer">
        <div class=" container col-xs-12">
    	<p class="small text-muted text-center">Copyright (C) 2014-2017 qunaud All Rights Resrved.</p>
        </div>
    </footer>

    <script src="../js/bootstrap.min.js"></script>
</script>
</body>

</html>