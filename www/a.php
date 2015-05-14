<?php

phpinfo();
$size = 300;
$image=imagecreatetruecolor($size, $size);

// 用白色背景加黑色边框画个方框
$back = imagecolorallocate($image, 255, 255, 255);
$border = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $back);
imagerectangle($image, 0, 0, $size - 1, $size - 1, $border);

$yellow_x = 100;
$yellow_y = 75;
$red_x    = 120;
$red_y    = 165;
$blue_x   = 187;
$blue_y   = 125;
$radius   = 150;

// 用 alpha 值分配一些颜色
$yellow = imagecolorallocatealpha($image, 255, 255, 0, 75);
$red    = imagecolorallocatealpha($image, 255, 0, 0, 75);
$blue   = imagecolorallocatealpha($image, 0, 0, 255, 75);

// 画三个交迭的圆
imagefilledellipse($image, $yellow_x, $yellow_y, $radius, $radius, $yellow);
imagefilledellipse($image, $red_x, $red_y, $radius, $radius, $red);
imagefilledellipse($image, $blue_x, $blue_y, $radius, $radius, $blue);
// ob_start();
// 		imagejpeg($image);
// 		$image_stream = ob_get_contents();
// 		ob_end_clean();
// $x = get_resource_type($image);

		// var_dump($x);
// var_dump($image);
// exit;	
// 不要忘记输出正确的 header！
header('Content-type: image/pjpeg');
// var_dump($image);
// 最后输出结果
imagejpeg($image);
imagedestroy($image);



// $con = mysql_connect("localhost","kChina","kChinapassword");
// if (!$con)
//   {
//   die('Could not connect: ' . mysql_error());
//   }

// mysql_select_db("kchina", $con);
// $result = mysql_query("SELECT * FROM kc_users WHERE `user_login`='IsCod'");
// var_dump($result);
// $row = mysql_fetch_array($result);
// var_dump($row);
// while($row)
//   {
//   echo $row['user_login'] . " " . $row['ID'];
//   echo "<br />";
//   }

// $redis = new Redis();

// $redis = new Redis();
   // $redis->connect('127.0.0.1', 6379);
   // echo "Connection to server sucessfully";
         //查看服务是否运行
   // echo "Server is running: "+ $redis->ping();
// $redis->connect('127.0.0.1', 6379);
// $redis->set('redisset', '1');
// $set = $redis->get('redisset');
// var_dump($set);
// $redis->del('redisset');
// echo 'xxx';

// $memcached = new Memcache;

// $memcached->connect('localhost', 11211) or die ("Could not connect");;
// $memcached->set('mecachedset', 1);
// $ste = $memcached->get('mecachedset');
// var_dump($ste);

// echo 'ok';
?>
