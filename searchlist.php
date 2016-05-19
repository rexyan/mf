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

define("REXYAN",true);
define("PATH", dirname(__FILE__));
require  PATH.'\include\common.inc.php';

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

    <title>MF电影网</title>
 <meta itemprop="name" content="MF电影网 | 最新免费电影"/><meta name="description" itemprop="description" content="MF电影网，一个简单及时的电影网站。最新电影,热门电影,最新电视剧,电影下载,电影在线播放,电影爱好者聚集地，一个不用下载播放器的电影网站" /><meta name="keywords" content="MF电影网,电影网站,电影播放,电影下载,最新电影,热门电影,在线观看,MF,闫润沙" />
    <?php
      require  PATH.'\include\css.inc.php';
     ?>

  </head>
  <body>

  <?php
    require PATH.'\include\header.inc.php';
   ?>

  <div class=" row row-offcanvas row-offcanvas-right" id="content" >

        <div class="col-xs-12 col-md-7 col-sm-9 col-md-offset-2">

             <?php
             if (empty($_GET[search])) {
                _tanchuang('(╬▔︹▔) 没有关键字....');
             }else
             $search=$_GET[search];
             $con=_MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
             $select="select * from movie where movie_name like '%$search%' OR movie_type like '%$search%' OR movie_protagonist like '%$search%'  OR movie_nationality like '%$search%' OR movie_showtime like '%$search%'  OR movie_grade like '%$search%' OR movie_label like '%$search%'";
             $result=mysql_query($select);
             $num=mysql_num_rows($result);

              if ($num==0) {
                 require PATH.'\include\404.inc.php';
              } else {

             ?>

            <div class="row text-center ">

                <div class="col-xs-12  col-lg-12 mlist ">

                    <ul class="list-inline row text-center">

            <?php  while ( $movie=mysql_fetch_array($result,MYSQL_ASSOC)) {  ?>

            <!-- 开始循环出推荐列表 -->

                        <li class="col-xs-6  col-lg-3">
                         <div class="margin_top">
                            <img src="images/movie/<?php  echo $movie[movie_img]; ?>" class="responsive img-thumbnail"/>
                            <div class="btn-group">

                             <button type="button" class="btn btn-danger"><?php   echo $movie[movie_name]; ?></button>
                             <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                             <span class="caret"></span>
                             <span class="sr-only">Toggle Dropdown</span>
                             </button>
                             <ul class="dropdown-menu" role="menu">
                             <li><a href="watch.php?id=<?php echo $movie[movie_id]; ?>&amp;play=<?php echo  ($movie[movie_play]+1); ?>">播放<span class="badge  pull-right"><?php  echo $movie[movie_play]; ?></span></a></li>
                             <li><a href="#">评价<span class="badge  pull-right"><?php  echo $movie[movie_comment]; ?></span></a></li>
                             <li><a href="#">详情</a></li>
                             <li class="divider"></li>
                             <li><a href="#"><span class="label label-danger">赞助</span></a></li>

                             </ul>
                             </div>
                        </div>
                        </li>

            <?php }; ?>
            <!-- 结束循环出推荐列表 -->
            <?php
}
             ?>
                    </ul>

                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->


   </div>
  </body>
</html>
