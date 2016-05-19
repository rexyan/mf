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
    <title>个人中心</title>
    
       <?php 
            require  PATH.'\include\css.inc.php';
        ?>

  </head>
  <body>  
        <?php 
        require PATH.'\include\header.inc.php';
        ?>
      
     <div class="container-fluid">
        <div class="row">
            <!--  -->
                <div class="carousel-inner">
                    <div class="item active">
                         <img src="./images/usercenter/usercenterbackground.jpg" alt="...">
                    </div>
                </div>
            <!--  -->
        </div>
     </div>

<!-- 
     <div class="container-fluid container">
        <div class="row">
              <div class="ceshi col-md-3  ">
                    <table class="table">
                      <tr>
                        <th>个人资料</th>
                      </tr>
                      
                      <tr>
                        <td>昵称：</td>
                      </tr>

                       <tr>
                        <td>邮箱：</td>
                      </tr>

                       <tr>
                        <td>等级：</td>
                      </tr>

                       <tr>
                        <td>注册时间：</td>
                      </tr>
  
                       <tr>
                        <td>上次登录IP：</td>
                       </tr>

                       <tr>
                        <td>上次登录时间：</td>
                       </tr>
                      
                    </table>
              </div>
        </div>
     </div>

 -->


    <div class="container">
     <?php 
    require PATH.'\include\footer.inc.php';
     ?>
   </div>
  </body>
  </html>