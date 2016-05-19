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

<html>
<head>
  <meta charset="UTF-8">
  <title>MF管理平台</title>
</head>
<body id="doadmin">
<div class="doadmindaxiao">
    <form method="post" action="doadmin.php?action=mf_doadmin">
    <h3>MF管理平台</h3>
    <div class="doadmin input-group input-group-sm">
        <span class="input-group-addon">ID号</span>
        <input type="text"  class="form-control" placeholder="AdminID" name="adminid">
    </div> 
    <div class="doadmin input-group input-group-sm">
        <span class="input-group-addon">邮箱</span>
        <input type="text"  class="form-control" placeholder="Email" name="email">
    </div> 
    <div class="doadmin input-group input-group-sm">
        <span class="input-group-addon">密码</span>
        <input type="password"  class="form-control" placeholder="Password"  name="password">
    </div>
    
    <br>
     <tr>
         <td><input class="doadminlogin btn btn-info" type="submit" value="登录"></td>
     </tr>

</div>
 
     </table>
  </form> 
</body>
</html>





