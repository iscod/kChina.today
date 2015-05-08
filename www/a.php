<?php

phpinfo();


$con = mysql_connect("localhost","kChina","kChinapassword");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("kchina", $con);
$result = mysql_query("SELECT * FROM kc_users WHERE `user_login`='IsCod'");
var_dump($result);
$row = mysql_fetch_array($result);
var_dump($row);
// while($row)
//   {
//   echo $row['user_login'] . " " . $row['ID'];
//   echo "<br />";
//   }

$redis = new Redis();

// $redis = new Redis();
   // $redis->connect('127.0.0.1', 6379);
   // echo "Connection to server sucessfully";
         //查看服务是否运行
   // echo "Server is running: "+ $redis->ping();
$redis->connect('127.0.0.1', 6379);
$redis->set('redisset', '1');
$set = $redis->get('redisset');
var_dump($set);
// $redis->del('redisset');
echo 'xxx';

$memcached = new Memcache;

$memcached->connect('localhost', 11211) or die ("Could not connect");;
$memcached->set('mecachedset', 1);
$ste = $memcached->get('mecachedset');
var_dump($ste);

echo 'ok';
?>
