<?php
// �A�N�Z�X�J�E���^�P

$fp = @fopen("counter1.txt", "r+") or die("Counter Error");
flock($fp, LOCK_EX);
$count = fgets($fp);
$count++;
rewind($fp);
fputs($fp, $count);
fclose($fp);

print $count;
?>