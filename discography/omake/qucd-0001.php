<?php
//初期化
session_start();
if (!isset($_SESSION["id"])) {
  header("Location: ./index.php");
  exit;
}
else {
    }
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/sticky-footer.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="../../js/top.js"></script>
    <link href="../../css/top.css" rel="stylesheet">
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
       <a href="../../" class="navbar-brand">クナウドの雑記帳</a>
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
          <a href="../../utau/index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UTAU<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../../utau/index.html">Info</a></li>
            <li><a href="../../utau/kiyaku.html">利用規約</a></li>
            <li><a href="../../utau/illust.html">イラスト</a></li>
          </ul>
        </li>
      <li><a href="../../work.html">制作環境</a></li>
       <li><a href="../">作品集</a></li>
      <li><a href="../../link.html">外部リンク</a></li>
      <li><a href="../../admin/">管理用</a></li>
    </ul>
  </div>
</div>
</nav>
<body>

  <header   class="header ">
      <a href="../../index.html"><img src="../../img/logo.png" alt="クナウドの雑記帳"  class="img-responsive"></a> 
        <div class="row">
         <div class="col-xs-11 col-sm-offset-1">  
      <p>ここはクナウドの適当な雑記帳です。UTAU音源配布や制作環境の晒しに使っていきます。</p>
      </div>
</div>
    </header>

    <div class="col-xs-12">
        <h2>こちらはQUCD-0001 ネットの隅のその唄をのおまけページです<br>
        下記リンクより各素材をDL可能となっております</h2>
        
<?php
$path = 'data/qucd-0001/';
recursion_dir($path);
 
// フォルダ名を出力
function recursion_dir($dir) {
	$target = "*.*"; // ここには複数定義可能。(e.g. '{*.jpg,*.gif}')
 
	foreach(glob($dir . "/*", GLOB_ONLYDIR) as $sub) {
	  echo "Directory: " . $sub . "<br />";
	  recursion_file($sub, $target);
	  recursion_dir($sub);
	}
}
 
// ファイル名を出力
function recursion_file($dir, $target) {
	foreach(glob($dir . "/" . $target, GLOB_BRACE) as $file) {
	  echo "File: " . $file . "<br />";
	}
}
?>

  </div>

  <p id="page-top"><a href="#">▲</a></p>
    <footer class="footer">
        <div class=" container col-xs-12">
    	<p class="small text-muted text-center">Copyright (C) 2014-2017 qunaud All Rights Resrved.</p>
        </div>
    </footer>

    <script src="../../js/bootstrap.min.js"></script>
</script>
</body>

</html>