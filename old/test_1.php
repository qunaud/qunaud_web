<?php

//ファイルを開く
//モード[r]の読み込み専用
if (! ($fp = fopen ( "data.txt", "r" ))) {
   echo "ファイルが開けません。";
}

//ファイルの読み込みと表示
//１行ずつファイルを読み込んで、表示する。
while (! feof ($fp)) {
   $load = fgets ($fp, 4096);
   $strplint = nl2br($load);
   echo $strplint;
}
//ファイルを閉じる
fclose ($fp) 

?>