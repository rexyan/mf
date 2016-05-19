<?php 
  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
  require  PATH.'\include\css.inc.php';  
  require  PATH.'\include\admin_header.inc.php';
  require  PATH.'\include\admin_manage_left.inc.php';  
 ?>



<div class="admin_index_right">
      
              <div class="panel panel-default">
              <div class="panel-heading">电影管理</div>
              <table class="table">
                  <tr>
                    <td>ID</td>
                    <td>影名</td>
                    <td>图片</td>
                    <td>类型</td>
                    <td>管理员</td>
                    <td>栏目</td>
                    <td>评论数</td>
                    <td>播放数</td>
                    <td >操作</td>

                  </tr>
<?php 


     $page=$_GET[page];
      
      if (empty($page)) {   //如果没有接收到get传来的页码数，设置默认值为1
        $page=1;
      }

     $pagezise=5;    //设置每个页面的的数目的大小，即SQL查询的长度
     $pagenumber=($page-1)*$pagezise;  //设置每个页面的的数目的大小，即SQL查询的位置
 
     $ML2='select * from movie';
     $result2=mysql_query($ML2);
     $page_count=mysql_num_rows($result2); //获取数目
     $page_count_number=ceil($page_count/$pagezise);  //计算能分为几页

     $ML="select * from movie  order by movie_id desc limit $pagenumber,$pagezise";
     $result=mysql_query($ML);
    
     while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){
  ?>
                  <tr>
                    <td> <?php echo $row[movie_id]; ?></td>
                    <td> <?php echo $row[movie_name]; ?></td>
                    <td> <img src="./images/movie/<?php echo $row[movie_img]; ?>"style="width:37px; height: 50px;"/></td>
                    <td> <?php echo $row[movie_type]; ?></td>
                    <td> <?php echo $row[movie_user]; ?> </td>
                    <td> <?php echo $row[movie_label]; ?></td>
                    <td> <?php echo $row[movie_comment]; ?></td>
                    <td> <?php echo $row[movie_play]; ?></td>
                    <td><a href="admin_movie_modify.php?movie_id= <?php echo $row[movie_id]; ?>">基本</a>
                        <br>
                        <a href="admin_movie_information.php?movie_id= <?php echo $row[movie_id]; ?>">信息</a>
                        <br>
                        <a href=""> 删除</a>
                    </td>

 <?php  } ?>
                 </tr>
              </table>
              </div>
                    
                     <!-- 分页 -->
                     <td> 
                          <ul class="pagination"> 
                              <?php 
                             //页数如果已经在第一个，那就不能在继续往前了
                              if ($page<1 || $page==1) {  
                              echo ' <li class="disabled"><a href="admin_manage_movielist.php?page=1">&laquo;</a></li>';
                                }else
                              echo '<li class=""><a href="admin_manage_movielist.php?page=1">&laquo;</a></li>';
                             ?>
        
                
                               <?php for ($i=1; $i <$page_count_number+1 ; $i++) {?>
                                 <li class=""> <a href="admin_manage_movielist.php?page=<?php echo $i; ?>"><?php echo $i; ?><span class="sr-only"></span></a></li>
                               <?php } ?>
                               
                            <?php 
                             //页数如果已经在最后了，那就不能在往后了
                              if ($page>$page_count_number || $page==$page_count_number) {  
                              echo ' <li class="disabled"><a href="admin_manage_movielist.php?page=$page_count_number">&raquo;</a></li>';
                                }else
                              echo ' <li ><a href="admin_manage_movielist.php?page=$page_count_number">&raquo;</a></li>';
                             ?>
                          </ul>
                    </td>
                    <!-- 分页 -->
      </div>
      
</div>


