<!-- connect toi database trong mysql (phpmyadmin) -->
<?php
$connect = mysqli_connect('localhost','root','','taobang');
mysqli_set_charset($connect,'utf8');