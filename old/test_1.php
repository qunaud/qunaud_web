<?php

//�t�@�C�����J��
//���[�h[r]�̓ǂݍ��ݐ�p
if (! ($fp = fopen ( "data.txt", "r" ))) {
   echo "�t�@�C�����J���܂���B";
}

//�t�@�C���̓ǂݍ��݂ƕ\��
//�P�s���t�@�C����ǂݍ���ŁA�\������B
while (! feof ($fp)) {
   $load = fgets ($fp, 4096);
   $strplint = nl2br($load);
   echo $strplint;
}
//�t�@�C�������
fclose ($fp) 

?>