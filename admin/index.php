<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>クナウドの雑記帳-管理用</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="sticky-footer.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80174817-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
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
          <a href="../utau" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">UTAU<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../utau/index.html">Info</a></li>
            <li><a href="../utau/kiyaku.html">利用規約</a></li>
            <li><a href="../utau/illust.html">イラスト</a></li>
          </ul>
        </li>
      <li><a href="../work.html">制作環境</a></li>
      <li><a href="../link.html">外部リンク</a></li>
      <li><a href="../admin/">管理用</a></li>
    </ul>
  </div>
</div>
</nav>
 <div class="col-sm-6 col-xs-12">
<div class="text-center">
<h2>温度を表示</h2>
<br/>
<?php
print '<p class=lead>部屋の気温 = ';
$deviceId = '28-00000647211a';
$sensor_path = '/sys/bus/w1/devices/'.$deviceId.'/w1_slave';
$t = null;
//温度取得
exec("cat ".$sensor_path, $w1_slave);
if(isset($w1_slave[1])){
$tmp = explode('t=', $w1_slave[1]);
if(isset($tmp[1])) $t = $tmp[1] / 1000;
}
echo $t;
print '℃<br>CPU温度 = ';
$cputemp = exec('cat /sys/class/thermal/thermal_zone0/temp');
$cputemp = $cputemp/1000;
echo "$cputemp";
print ' ℃</p>';
?>
</div>
</div>
<div class="col-sm-6 col-xs-12">
<div class="text-center">
<button type="button" class="btn btn-default btn-lg" onclick="location.reload()">ページを更新</button>
<br/>
<button onclick="window.open('cputemp.php')" class="btn btn-default btn-lg" >cputemp</button>
<br/>
<button onclick="window.open('adminer.php')" class="btn btn-default btn-lg" >adminer</button>
<br/>
<h2>WOL</h2>
<button type="button"onclick="window.open('wol.php')" class="btn btn-default btn-lg" >qunaud-main</button><br/>
<button type="button"onclick="window.open('wol3.php')" class="btn btn-default btn-lg">qunaud-tvsv</button><br/>
</div>
</div>
 <script src="../js/bootstrap.min.js"></script>
</body>
</html>
