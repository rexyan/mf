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

<div class="registerpage">
	 <form method="post" action="register.php?action=mf">
	 <input type="hidden" name="hidden_uniqid" value="<?php echo $hidden_uniqid2 ?>"></input>
        <div class=" input-group input-group-sm">
            <span class="input-group-addon">昵称</span>
            <input type="text"  class="form-control" placeholder="想一个响亮的名字吧！长度2-20" name="username">
        </div> 
		
       <div class=" input-group input-group-sm">
            <span class="input-group-addon">邮箱</span>
            <input type="text"  class="form-control" placeholder="要正确的邮箱哦..."  name="email">
      </div>
      
      <div class=" input-group input-group-sm">
            <span class="input-group-addon">密码</span>
            <input type="password"  class="form-control" placeholder="不少于6位" name="password">
      </div>

       <div class=" input-group input-group-sm">
            <span class="input-group-addon">密码</span>
            <input type="password"  class="form-control" placeholder="重复你的密码" name="repassword">
      </div>

	  <select class="form-control input-sm" name="sex">
  			<option>请选择性别:</option>
  			<option value="男">男</option>
  			<option value="女">女</option>
      </select>

      <!--  <div class=" input-group input-group-sm">
            <span class="input-group-addon">验证</span>
            <input type="text"  class="form-control" placeholder="输入验证码" name="code">
      </div> -->
    

       <div class=" input-group input-group-sm">
            <span class="input-group-addon">兴趣</span>
            <input type="text"  class="form-control" placeholder="看看谁和你兴趣一样吧" name="interests">
       </div>

         <div class="registerstate">
           <br>
             <tr>
                  <td><input class=" btn btn-info" type="submit" value="注册"></td>
                  	<td ><a class="btn btn-link" href="login.php">已有账号,直接登录</a></td>
             </tr>
         </div>
     
      </table>
    </form> 
   </div>