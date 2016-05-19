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
 <div class=" row row-offcanvas row-offcanvas-right" id="content" >

        <div class="col-xs-4 col-sm-9 ">

             <?php
             $con=_MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
             $select='select * from movie where movie_label=1 ORDER BY movie_id DESC LIMIT 4';//查询热门推荐的数据
             $select_1='select movie_name,movie_id,movie_play from  movie ORDER BY movie_play DESC LIMIT 7';//查询左侧点击排行榜的数据
             $select_2='select movie_name,movie_id,movie_play from  movie ORDER BY movie_grade DESC LIMIT 14';//查询左侧豆瓣排行榜排行榜的数据
             $result=mysql_query($select);  //查询热门推荐的数据
             $result_1=mysql_query($select_1); //查询左侧点击排行榜的数据
             $result_2=mysql_query($select_2); //查询左侧豆瓣排行榜排行榜的数据

             ?>

            <div class="row text-center ">

                <div class="col-xs-12 col-sm-8 col-md-12 mlist">
                    <h4>热门推荐 <a href="searchlist.php?search=1"> More </a></h4>
                    <ul class="list-inline row text-center">

           
            <?php  while ( $movie=mysql_fetch_array($result,MYSQL_ASSOC)) {  ?>

            <!-- 开始循环出推荐列表 -->
                        <li class="col-xs-4 col-sm-8 col-md-3 ">
                         <div class="margin_top">

                            <img src="images/movie/<?php  echo $movie[movie_img]; ?>" class=" responsive img-thumbnail" />
                            <div class="btn-group ">


                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><?php   echo $movie[movie_name]; ?></button>
                     
                             <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                             <span class="caret"></span>
                             <span class="sr-only">Toggle Dropdown</span>
                             </button>
                             <ul class="dropdown-menu" role="menu">

                             <li><a href="watch.php?id=<?php echo $movie[movie_id]; ?>&amp;play=<?php echo  ($movie[movie_play]+1); ?>">播放<span class="badge  pull-right"><?php  echo $movie[movie_play]; ?> </span> </a> </li>
                             <li  ><a href="watch.php?id=<?php echo $movie[movie_id];?>#uyan_frame" > 评价<span class="badge  pull-right" ><?php  echo $movie[movie_comment]; ?></a></span></li>
        
                             <li class="divider"></li>
                             <li><a href=""><span class="label label-danger">赞助</span></a></li>
                             </ul>
                             </div>
                        </div>
                        </li>
                    </form>
            <?php }; ?>
            <!-- 结束循环出推荐列表 -->
                    </ul>

                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->



<!-- 热门推荐右边部分 -->
        <div class="col-xs-0  col-md-3 col-sm-3 sidebar-offcanvas test" id="sidebar">
            <div class="sort list-group">
                <h4>点击排行榜</h4>
                        <ol>
                                <table class="table  table-striped">

                    <?php  while ($movie_1=mysql_fetch_array($result_1,MYSQL_ASSOC)) {  ?>

                                 <tr>
                                        <td><a href="watch.php?id=<?php echo $movie_1[movie_id]; ?>&amp;play=<?php echo  ($movie_1[movie_play]+1); ?>"</a><?php echo $movie_1[movie_name] ?></td>

                                  </tr>

                    <?php } ?>
                                </table>
                        </ol>

            </div>

        </div>
        <!--/.sidebar-offcanvas-->
        <!-- 热门推荐右边部分 -->
    </div>
    <!--/row-->


    <!-- 最新电影部分 -->
 <div class="row row-offcanvas row-offcanvas-right" id="content" >

        <div class="col-xs-12 col-sm-9">

             <?php
             $con=_MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
             $select='select * from movie where movie_label=2 OR movie_label=3 ORDER BY movie_date DESC LIMIT 16';
             $result=mysql_query($select);
             ?>

            <div class="row text-center ">

                <div class="col-xs-12 col-sm-8 col-md-12 mlist ">
                    <h4>最新电影 <a href="movie-list.php"> More </a></h4>
                    <ul class="list-inline row text-center">


            <?php  while ($movie=mysql_fetch_array($result,MYSQL_ASSOC)) {  ?>

            <!-- 开始循环出最新列表 -->

                        <li class="col-xs-12 col-sm-8 col-md-3">
                       <div class="margin_top">
                            <img  src="images/movie/<?php  echo $movie[movie_img];?>" class="responsive img-thumbnail"/>
                            <div class="btn-group" >

                             <button type="button" class="btn btn-info"><?php   echo $movie[movie_name]; ?></button>
                             <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                             <span class="caret"></span>
                             <span class="sr-only">Toggle Dropdown</span>
                             </button>
                             <ul class="dropdown-menu" role="menu">
                             <li><a href="watch.php?id=<?php echo $movie[movie_id]; ?>&amp;play=<?php echo  ($movie[movie_play]+1); ?>">播放<span class="badge  pull-right"><?php  echo $movie[movie_play]; ?></span></a></li>
                             <li><a href="#">评价<span class="badge  pull-right"><?php  echo $movie[movie_comment]; ?></span></a></li>
                             <li class="divider"></li>
                             <li><a href="#"><span class="label label-danger">赞助</span></a></li>

                             </ul>

                             </div>
                       </div>
                        </li>

            <?php }; ?>

            <!-- 结束循环出推荐列表 -->
                    </ul>

            <!-- 底部更多按钮 -->

               <div class="content_bottom_more alert-danger  col-xs-6 col-sm-12 ">
                   哎呀，你看到我的尾巴了 >_<||| &nbsp; &nbsp; &nbsp;&nbsp; <a href="movie-list.php" class="alert-link">还要继续浏览?</a>
                     &nbsp; &nbsp; &nbsp;&nbsp;<a href="#" class="alert-link">那就随便逛逛吧</a>
                </div>


                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->



<!-- 最新电影右边部分 -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="sort list-group">
                <h4>豆瓣排行榜 </h4>

                     <ol>
                                <table class="table  table-striped">

                          <?php  while ($movie_2=mysql_fetch_array($result_2,MYSQL_ASSOC)) {  ?>

                                  <tr>
                                        <td><a href="watch.php?id=<?php echo $movie_2[movie_id]; ?>&amp;play=<?php echo  ($movie_2[movie_play]+1); ?>"><?php echo $movie_2[movie_name]  ?></a></td>
                                  </tr>

                          <?php } ?>
                                </table>
                        </ol>

            </div>

        </div>
        <!--/.sidebar-offcanvas-->
        <!-- 最新电影左边部分结束 -->

  
  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="sort list-group">
              <!--   <h4>热门电视剧</h4>

                     <ol>
                                <table class="table  table-striped">

                               

                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>
                                  <tr>
                                        <td>111</td>
                                  </tr>


                                
                         
                                </table>
                        </ol>
 -->
            </div>

        </div>

    </div>
    <!--/row-->

    <!-- 最新电影部分结束 -->
