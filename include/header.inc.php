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

define("KSTIME", _TIME());

 ?>


<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MF影视</a>
        </div>
       
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav list-inline list-unstyled">
                <li><a href="movie-list.php"><span class="glyphicon glyphicon-sd-video"> 电影</span></a></li>
                <li><a href=""><span class="glyphicon glyphicon-expand"> 电视剧</span></a></li>
                <li><a href=""><span class="glyphicon glyphicon-comment "> 论坛</span></a></li>
                <form class="navbar-form navbar-left" role="search"  method="get" action="searchlist.php">
                     <div class="form-group">
                     <ul class="list-unstyled list-inline">
                     <li><input type="text" class="form-control"  placeholder="影名/主演/国家/类型"  name="search"></li>
                     <li><button type="submit" class="btn btn-default"><!-- <span class="glyphicon glyphicon-search"></span> -->搜索</button></li>
                     </ul>
                     </div>
                </form>
                </li>
    
                <?php 

                    if ($_COOKIE[doadmin]) {
                      echo  "<li><a href='admin.php'><span class='glyphicon  glyphicon-user'> MF管理平台</span></a></li>";
                    } else {
                      
                         if (isset($_COOKIE[mf_username])) {
                      echo  "<li><a href='usercenter.php'><span class='glyphicon  glyphicon-user'>个人中心</span></a></li>";
                      echo  "<li><a href='logout.php'><span class='glyphicon glyphicon-remove-circle'>退出</span></a></li>";
                        }else
                            {
                              echo  "<li><a href='register.php'><span class='glyphicon glyphicon-bell'> 注册</span></a></li>";
                              echo  "<li><a href='login.php'><span class='glyphicon glyphicon-check'> 登录</span></a></li>";
                            }

                            }
                    
                 ?>

                
                  

            </ul>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->