<?php 
  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require PATH.'\include\common.inc.php';
?>

 <?php 
 		require PATH.'\include\css.inc.php';
 		require PATH.'\include\doadmin.inc.php';
 		if ($_GET['action']=='mf_doadmin') {
 			
 			//接收数据
			$JS=$_POST;
			$CLdata=array(); 
			$CLdata[email]=$JS[email];
			$CLdata[password]=sha1($JS[password]);
  			$CLdata[logintime]=$JS[logintime];
  			
			_MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
			$ML="select * from admins where admins_email='{$CLdata[email]}' and admins_password='{$CLdata[password]}'";
   			$result=mysql_query($ML) or die(mysql_error());
   			$JG=(mysql_fetch_array($result,MYSQL_NUM));   

   				if (!!$JG) {
                 setcookie('doadmin',$CLdata[email]);
                 header('Refresh:1; url=admin.php');
             }else
                _tanchuang ('登录失败，请检查邮箱或密码是否正确');

 		}else
  ?>




