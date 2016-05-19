 <?php 
ob_start();
//内容

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

 <?php 
          $sql="select 
                       movie_name,
                       movie_direct,
                       movie_scriptwriter,
                       movie_protagonist,
                       movie_nationality,
                       movie_language,
                       movie_grade,
                       movie_type,
                       movie_showtime,
                       movie_introduce,
                       movie_duration,
                       movie_resource_pan1,
                       movie_resource_pan2,
                       movie_resource_thunder1,
                       movie_resource_thunder2,
                       movie_resource_other
                       from 
                       movie
                       where movie_id=$_GET[id]";
          $result=mysql_query($sql) or die(mysql_error());
          $arr=mysql_fetch_array($result,MYSQL_ASSOC);

    ?>


<html>
<head>
  <meta charset="UTF-8">
  <title>MF电影网-<?php echo $arr[movie_name]; ?></title>
</head>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style1.css" rel="stylesheet">
    <link href="assets/css/usercenter.css" rel="stylesheet">
    <link href="assets/css/watch.css" rel="stylesheet">
    <link href="assets/css/movie_information.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

<body>

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






    <!-- 特效弹窗 -->
        <?php 
            $color = array('alert-danger' =>danger,'alert-info' =>info,'alert-warning' =>warning,'alert-success' =>success,'alert-primary' =>primary );
         ?>

            <div id="alert_watch" class="alert  <?php echo array_rand($color,1); ?>">
              <button type="button" class="close" data-dismiss="alert">×</button>
             温馨提示:小站由于服务器资源有限,目前只能提供部分影片观看，你可以选择<a href="">赞助小站</a>发展或者<a href="">提供资源</a>
           </div>

    <!-- 特效弹窗 -->    

      <div class="watchpage">

      <!-- 面包屑导航 -->
      <ol class="breadcrumb">
          <li><a href="index.php">首页</a></li>
          <li class="active"><?php echo $arr[movie_name]; ?></li>
      </ol>
      <!-- 面包屑导航 -->

          <div class="video">
                  <span><h4><?php echo $arr[movie_name]; ?></h4></span>
                  <video width="620" height="360" controls="controls" poster="./images/movie/404.png" autoplay>  
                  <source src="./movie/<?php echo $arr[movie_name]; ?>.mp4" type="video/mp4" ><?php echo $arr[movie_name]; ?></source>   
                  啊偶，你的浏览器不支持...换个浏览器吧！！！ 
                  </video>
          </div>
          
          <!-- watch_movie_information -->
          <div class="watch_movie_information">
                    <ol>
                       <table class="table  table-striped">
                               
                                  <tr>
                                      <td>导演：<?php echo $arr[movie_direct]; ?> </td>                                 
                                  </tr> 

                                   <tr>
                                      <td>编剧：<?php echo $arr[movie_scriptwriter]; ?> </td>                                 
                                  </tr> 

                                   <tr>
                                      <td>主演：<span class="label label-warning"><a href="searchlist.php?search=<?php echo $arr[movie_protagonist]; ?>"> <?php echo $arr[movie_protagonist]; ?> </a></span></td>                                 
                                  </tr> 

                                   <tr>
                                      <td>类型： <span class="label label-info"> <a href="searchlist.php?search=<?php echo $arr[movie_type]; ?>">  <?php echo $arr[movie_type]; ?> </a></span></td>                                 
                                  </tr> 
                                   <tr>
                                      <td>国家： <span class="label label-danger"><a href="searchlist.php?search=<?php echo $arr[movie_nationality]; ?>"> <?php echo $arr[movie_nationality]; ?> </a></span></td>                                 
                                  </tr>
                                   <tr>
                                      <td>语言：<?php echo $arr[movie_language]; ?> </td>                                 
                                  </tr>
                                   <tr>
                                      <td>时间：<?php echo $arr[movie_showtime]; ?> </td>                                 
                                  </tr>
                                   <tr>
                                      <td>片长：<?php echo $arr[movie_duration]; ?> </td>                                 
                                  </tr>
                                  <tr>
                                      <td>评分：<?php echo $arr[movie_grade]; ?> <td>                                 
                                  </tr>
                        </table>
                   </ol>
          </div>
        <!-- watch_movie_information -->
  
        <!-- 栏目颜色随机 -->
            <?php 
            $color2 = array('panel-danger' =>danger,'panel-info' =>info,'panel-warning' =>warning,'panel-success' =>success,'panel-default' =>1);
            ?>

        <!-- 栏目颜色随机 -->
      <div class="movie_intro">
              <div class="panel-group" id="accordion">
                <div class="panel <?php echo array_rand($color2,1); ?>">
                    <div class="panel-heading">
                       <h4 class="panel-title">
                          <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                       剧情介绍
                          </a>
                        </h4>
                    </div>
                   <div id="collapseOne" class="panel-collapse collapse in">
                     <div class="panel-body">
                      <?php echo $arr[movie_introduce]; ?>
                     </div>
                    </div>
                </div>
            </div>
      
      
       <div class="movie_intro">
              <div class="panel-group" id="accordion">
                <div class="panel <?php echo array_rand($color2,1); ?>">
                    <div class="panel-heading ">
                       <h4 class="panel-title">
                          <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2">
                              资源下载
                          </a>
                        </h4>
                    </div>
                   <div id="collapseOne2" class="panel-collapse collapse in">
                     <div class="panel-body">
                         <p>
                         <!-- 资源按钮颜色随机 -->
                         <?php  
                          $color3=array('btn-default'=>1,'btn-info'=>info,'btn-danger'=>danger,'btn-warning'=>warning,'btn-promary'=>promary);
                          ?>
                         <!-- 资源按钮颜色随机 -->
                         <?php 
                          $sql2="select movie_resource_pan1,movie_resource_pan2,movie_resource_thunder1,movie_resource_thunder2,movie_resource_other from movie where movie_id='$_GET[id]'";
                          $result2=mysql_query($sql2);
                          $arr2=mysql_fetch_array($result2,MYSQL_NUM);
                          
                         ?>
                          <ul class="pager">
                            <li><a href="#">网盘资源1</a></li>
                            <li><a href="#">网盘资源2</a></li>
                            <li><a href="#">磁力链接1</a></li>
                            <li><a href="#">磁力链接2</a></li>
                            <li><a href="#">其他资源</a></li>
                         </ul>
                            
                         </p>
                     </div>
                    </div>
                </div>
            </div>
      </div>


        <?php 
             $select='select * from movie where movie_label=3 ORDER BY movie_id DESC LIMIT 5';
             $result=mysql_query($select); 
         ?>
        <div class="movie_recommend">
        <span>其他推荐</span>
        <?php  while ($movie=mysql_fetch_array($result,MYSQL_ASSOC)) {  ?>

            <div class="movie_recommend1"> <a href="watch.php?id=<?php echo $movie[movie_id]; ?>&amp;play=<?php echo  ($movie[movie_play]+1); ?>"> <img src="./images/movie/<?php echo $movie[movie_img]; ?>"  style='' width="140" height="185" ''> </a> </div>                    

        <?php } ?>
         </div>
        

       
        <div class="watchduoshuo" id="watchduoshuo">
            <div id="uyan_frame"></div>
            <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
        </div> 
   
  </div>
    
  
</body>
</html>

<?php 
$houzui=".html";
$wenjian=$_GET[id].$houzui;
if(file_exists("$wenjian"))
{
    $time = time();
       if(($time - filemtime("$wenjian") < 604800))  //如果前有文件且,小于1小时，则转到
        {
            header("Location:$wenjian");
        }else{
              $content = ob_get_contents();   //超出1个小时候，生成新的html
              $fp = fopen("$wenjian", 'w');
              fwrite($fp, $content);
              fclose($fp); 
        }
}else{
  $content = ob_get_contents();
  $fp = fopen("$wenjian", 'w');
  fwrite($fp, $content);
  fclose($fp); 
}  
?>

