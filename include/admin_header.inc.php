<?php 
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
 if (!defined('REXYAN')) {
   exit('非法调用');
}
 
?>

<div>   
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <ul class="nav nav-pills">
        <li> <a href="admin.php">MF影视管理平台 </a></li> 
        <li class="active"><a href="admin.php">管理首页</a></li>
        <li><a href="index.php">返回MF</a></li>
        <li><a href="#">电影管理</a></li>
        <li><a href="#">电视剧管理</a></li>
        <li class="exit"><a href="logout.php" >安全退出</a></li>
    </ul>
  </nav>
      
    <?php 
      _MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
        $ML="select * from admins where admins_email='{$_COOKIE[doadmin]}'";
        $result=mysql_query($ML) or die(mysql_error());
        $arr=mysql_fetch_array($result,MYSQL_ASSOC);
        //获取当前时间
        $date=_date();
        //获取当前ip
        $_IP=$_SERVER["REMOTE_ADDR"];
    ?>

           <!-- 特效弹窗 -->
           <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <div class="circle"><img src=""> </div>
              <div class="circle1">
                <ul class="list-unstyled list-inline">
                  <li>
                       <h4>欢迎管理员  <?php echo $arr[admins_name] ?></h4>
                   </li>
                  <li> 时间:<?php echo $date; ?></li>
                  <li> IP:<?php echo  $_IP;?></li>
                  <li>通过账号:<?php echo $_COOKIE[doadmin]; ?> 登录</li>
                  <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><span class="label label-danger">不再显示</span></a></li>
                  
                  <br>
                  <li>上次访问IP: <?php echo $arr[admins_last_ip] ?></li>
                
                  <li>上次访问时间: <?php echo $arr[admins_last_time] ?> </li>
                  <li> 便捷选项   <a href="">添加影视</a>  <a href="">会员管理</a> </li>
                  <li> 账号异常? <a href="">修改密码</a></li>
                 </ul>
                <ul>   
              </ul>
            </div>
              
           </div>
               <!-- 特效弹窗 -->    
</div>