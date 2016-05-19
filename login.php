<?php 
  ob_start();
  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
 ?>


<?php 
     require  PATH.'\include\login.inc.php';
 ?>


<?php 

  // 判断是否已经登录，若已经登录，不能加载login.php页面
if (isset($_COOKIE[mf_username])) {
  _tanchuang('你已处于登录状态，若要进行此操作，请先退出！'); 
}

if ($_GET['action']=='login') {    
	//接收数据
	$JS=$_POST;
	$CLdata=array();   
  //处理数据
  $CLdata[email]=$JS[email];
	$CLdata[password]=sha1($JS[password]);
  $CLdata[logintime]=$JS[logintime];

  _MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);

	  $ML="select * from user where email='{$CLdata[email]}' and password='{$CLdata[password]}'";
   	$result=mysql_query($ML);
   	$JG=(mysql_fetch_array($result,MYSQL_NUM));   
  //查询结果
   	if (!!$JG) {
      _set_cookie($CLdata[email],'uniqid1',$CLdata[logintime]);
      header('Refresh:1; url=index.php');
   		

   	}else
   	  _tanchuang ('登录失败，请检查邮箱或密码是否正确');

   }else	
 ?>