<?php
//$time = data('Y-m-d H:i:s', time());

//echo $time;

//data_default_timezone_set('PRC');
//设置时区(中国标准时间)
date_default_timezone_set('PRC');

echo date('Y-m-d H:i:s', time());

?>
