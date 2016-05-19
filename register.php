<?php 
ob_start();
session_start();
/*
                   _ooOoo_
                  o8888888o
                  88" . "88
                  (| -_- |)
                  O\  =  /O
               ____/`---'\____
             .'  \\|     |//  `.
            /  \\|||  :  |||//  \
           /  _||||| -:- |||||-  \
           |   | \\\  -  /// |   |
           | \_|  ''\---/''  |   |
           \  .-\__  `-`  ___/-. /
         ___`. .'  /--.--\  `. . __
      ."" '<  `.___\_<|>_/___.'  >'"".
     | | :  `- \`.;`\ _ /`;.`/ - ` : | |
     \  \ `-.   \_ __\ /__ _/   .-` /  /
======`-.____`-.___\_____/___.-`____.-'======
                   `=---='
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
           佛祖保佑       永无BUG
*/

define("REXYAN",true);
define("PATH", dirname(__FILE__));
require  PATH.'\include\common.inc.php';
header('Content-Type: text/html; charset=utf-8');
?>

 <?php 
  // 判断是否已经登录，若已经登录，不能加载register.php页面
if (isset($_COOKIE[mf_username])) {
  _tanchuang('你已处于登录状态，若要进行此操作，请先退出！'); 
}
  
// 以下为登录验证问题
if ($_GET['action']=='mf') {    
// 判断get方式提交是否合法，防止恶意注册，跨站攻击
	//检查唯一标识符是否正确,防止伪造cookie登录
	_check_uniqid($hidden_uniqid2,$_SESSION[uniqid]);
    $CLdata=array();   
    $JS=$_POST; //接收数据
    $CLdata[username]=(_ZCCL($JS[username],3,20));
    $CLdata[sex]=$JS[sex];
    $CLdata[email]=_ZCCL_MAIL($JS[email]);
    $CLdata[password]=_ZCCL_PASSWORD($JS[password],6);
    $CLdata[repassword]=_ZCCL_REPASSWORD($CLdata[password],$JS[repassword]);
    $CLdata[interests]=($JS[interests]);
    $_IP=$_SERVER["REMOTE_ADDR"];
    $_date=_date();

   //连接数据库
    _MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
    
    //查询用户名是否已经存在
    $_select=("select * from user where username='{$JS[username]}' ");
    $_select_jieguo=mysql_query($_select) or die(mysql_error()); 
    $_select_count=mysql_num_rows($_select_jieguo);
    if ($_select_count>0) {
    	exit(_tanchuang('用户名已被注册'));	
    }
    //查询邮箱是否已经存在
     $_select1=("select * from user where email='{$JS[email]}' ");
     $_select_jieguo1=mysql_query($_select1) or die(mysql_error()) ;
     $_select_count1=mysql_num_rows($_select_jieguo1);
    if ($_select_count1>0) {
    	exit(_tanchuang('邮箱已被注册'));
    }
    //信息写入数据库
    $_insert="insert into user(
    							username,
    							interests,
    							time,
    							ip,
    							sex,
    							uniqid,
    							email,
    							password) 
								values(
								'{$CLdata[username]}',
								'$CLdata[interests]',
								'$_date',
								'$_IP',
								'{$_POST[sex]}',
								'{$_POST[hidden_uniqid]}',
								'{$CLdata[email]}',
								'{$CLdata[password]}'
									)";
	
	 $jieguo=mysql_query($_insert) or die(mysql_error());
	 if (!$jieguo>0) {
	 	echo '数据库执行失败';
	 }else{
	 	
	 	exit(_tanchuang('注册成功'));
	 }
	 	 
	
 }else
 	$_SESSION[uniqid]=$hidden_uniqid2=uniqid();
 ?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/ico.ico">

    <title>MF电影网注册</title>
 <meta itemprop="name" content="MF电影网 | 最新免费电影"/><meta name="description" itemprop="description" content="MF电影网，一个简单及时的电影网站。最新电影,热门电影,最新电视剧,电影下载,电影在线播放,电影爱好者聚集地，一个不用下载播放器的电影网站" /><meta name="keywords" content="MF电影网,电影网站,电影播放,电影下载,最新电影,热门电影,在线观看,MF,闫润沙" />
    <?php 
      require  PATH.'\include\css.inc.php';
    ?>
    
	</head>
	<body>

	<?php 
		require PATH.'\include\header.inc.php';
	 ?>

	<?php 
		require PATH.'\include\register.inc.php';
	 ?>

     <div class="container">
     <?php 
		require PATH.'\include\footer.inc.php';
	 ?>
   </div>
	</body>
</html>








	