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

    <?php 
    require  PATH.'\include\css.inc.php';
    ?>

    </head>
    <body>
  
    <?php 
    require PATH.'\include\header.inc.php';
    ?>

<div class="loginpage">
     <form method="post" action="login.php?action=login">
        <div class=" input-group input-group-sm">
            <span class="input-group-addon">邮箱</span>
            <input type="text"  class="form-control" placeholder="Email" name="email">
        </div> 
       <div class=" input-group input-group-sm">
            <span class="input-group-addon">密码</span>
            <input type="password"  class="form-control" placeholder="Password"  name="password">
      </div>
     <!--  <div class=" input-group input-group-sm">
            <span class="input-group-addon">验证</span>
            <input type="text"  class="form-control" placeholder="AdminID" name="">
      </div> -->
      <div class="radio">
            <label>
               <input type="radio" name="logintime" checked value="0">临时
            </label>
            <label>
               <input type="radio" name="logintime"  value="1">一天
            </label>
            <label>
              <input type="radio" name="logintime"  value="2">一周
            </label>
            <label>
              <input type="radio" name="logintime"  value="3">一月
           </label>
      </div>
         <div class="loginstate">
           <br>
             <tr>
                  <td><input class=" btn btn-info" type="submit" value="登录"></td>
                  <td><a href="">忘记密码！</a></td>
             </tr>
          </div>
      </table>
    </form> 
</div>

    <?php 
    require PATH.'\include\footer.inc.php';
     ?>
</body>
</html>

