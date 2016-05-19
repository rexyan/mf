<?php 
		define("REXYAN",true);
		define("PATH", dirname(__FILE__));
		require  PATH.'\include\common.inc.php';
		require  PATH.'\include\css.inc.php';  
	  require  PATH.'\include\admin_header.inc.php';
	  require  PATH.'\include\admin_manage_left.inc.php';    
 ?>

 <?php 
 	    
   	   $_select=("select * from movie where movie_id='{$_GET[movie_id]}' ");
       $result=mysql_query($_select) or die(mysql_error()); 
       $result=mysql_fetch_array($result,MYSQL_ASSOC);
       
       $movie_modify=array();
       $movie_modify[movie_id]=$result[movie_id];
       $movie_modify[movie_name]=$result[movie_name];
       $movie_modify[movie_type]=$result[movie_type];
       $movie_modify[movie_user]=$result[movie_user];
       $movie_modify[movie_comment]=$result[movie_comment];
       $movie_modify[movie_play]=$result[movie_play];
       $movie_modify[movie_img]=$result[movie_img];
       $movie_modify[movie_grade]=$result[movie_grade];
       $movie_modify[movie_label]=$result[movie_label];
       $movie_modify[movie_date]=$result[movie_date];
       $movie_modify[movie_introduce]=$result[movie_introduce];
  ?>

<html>
<head>
  <meta charset="UTF-8">
</head>
<body>

<div class="row col-md-8 col-md-offset-1 rexyan">
      <ol class="breadcrumb">
          <li>你的位置</li>
          <li><a href="admin.php">MF后台管理</a></li>
          <li><a href="admin_manage_movielist.php">电影管理</a></li>
          <li class="active"><?php echo $movie_modify[movie_name]; ?></li>
      </ol>
 </div>

 <form method="post" action="admin_movie_modify.php?mf=modify" enctype="multipart/form-data" class="admin_movie_modify">
  <!-- <form action="test.php?id=3" method="POST" enctype="multipart/form-data"><div class="admin_movie_modify"> -->
      <table>
            <div class=" input-group input-group-lm">
            <span class="input-group-addon">电影ID</span>
            <input type="text"  class="form-control" value="<?php echo  $movie_modify[movie_id]; ?>" name="movie_id"> </input>
            </div> 


            <div class=" input-group input-group-lm">
            <span class="input-group-addon">管理员</span>
            <input type="text"  class="form-control" value="<?php echo  $movie_modify[movie_user]; ?>" name='movie_user'></input>
            </div> 


            <div class=" input-group input-group-lm">
            <span class="input-group-addon">评论数</span>
            <input type="text"  class="form-control" value="<?php echo  $movie_modify[movie_comment]; ?>" name='movie_comment'></input>
            </div> 

            <div class=" input-group input-group-lm">
            <span class="input-group-addon">播放数</span>
            <input type="text"  class="form-control"  value="<?php echo  $movie_modify[movie_play]; ?>" name='movie_play'></input>
            </div> 

            <div class=" input-group input-group-lm">
            <span class="input-group-addon">电影评分</span>
            <input type="text"  class="form-control" value="<?php echo   $movie_modify[movie_grade]; ?>" name='movie_grade'></input>
            </div> 

            <div class=" input-group input-group-lm">
            <span class="input-group-addon">电影名称</span>
            <input type="text"  class="form-control" value="<?php echo  $movie_modify[movie_name]; ?>" name='movie_name'></input>
            </div> 

            <div class=" input-group input-group-lm">
            <span class="input-group-addon">电影类型</span>
            <input type="text"  class="form-control" value="<?php echo  $movie_modify[movie_type]; ?>" name='movie_type'></input>
            </div> 
              

            <div class="admin_movie_modify_img">
            <img src="./images/movie/<?php echo $movie_modify[movie_img]; ?>"style="width:100px; height: 140px;">
            </div> 

            <div class=" input-group input-group-lm">
            <span class="input-group-addon">电影海报</span>
            <input type="file"  class="form-control" name="movie_img"></input>
            </div> 


            <div class=" input-group input-group-lm">
            <span class="input-group-addon">上传时间 </span>
            <input type="text"  class="form-control" value="<?php echo $movie_modify[movie_date];?>" name='movie_date'></input>
            </div> 
           

            <div class=" input-group input-group-lm">
           <span class="input-group-addon">当前栏目 <?php echo $movie_modify[movie_label];?></span>
            <select class="form-control" name="movie_label">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            </div> 

            <div class=" input-group input-group-lm">
           <span class="input-group-addon">电影简介</span>
            <textarea  cols="43" rows="5" value="<?php echo $movie_modify[movie_introduce];?>" name='movie_introduce'></textarea>
            </div> 
             
          <div class="admin_addmovie-submit input-group input-group-lm">
            <input type="submit"  class="form-control"  value="更新电影信息"> </input>
          </div> 
      
      </table>
    
    </form>
 


 <?php 
 //接收数据，修改电影资料
if ($_GET['mf']=='modify') {    
    
     $arr=array();
     $arr[movie_id]=$_POST[movie_id];
     $arr[movie_user]=($_POST[movie_user]);
     $arr[movie_comment]=($_POST[movie_comment]);
     $arr[movie_play]=($_POST[movie_play]);
     $arr[movie_grade]=($_POST[movie_grade]);
     $arr[movie_name]=($_POST[movie_name]);
     $arr[movie_type]=($_POST[movie_type]);
     $arr[movie_date]=($_POST[movie_date]);
     $arr[movie_label]=($_POST[movie_label]);
     $arr[movie_introduce]=($_POST[movie_introduce]);
     
     $ML="UPDATE movie SET 
                                movie_user='{$arr[movie_user]}',
                                movie_comment='{$arr[movie_comment]}',
                                movie_play='{$arr[movie_play]}',
                                movie_grade='{$arr[movie_grade]}',
                                movie_name='{$arr[movie_name]}',
                                movie_type='{$arr[movie_type]}',
                                movie_date='{$arr[movie_date]}',
                                movie_label='{$arr[movie_label]}',
                                movie_introduce='{$arr[movie_introduce]}'
                          WHERE
                                movie_id='{$arr[movie_id]}' 
                                ";


     $result=mysql_query($ML);
   if ($result) {
        _tangchuang('修改成功');
   }
        } else {
         
        }
          
  ?>


</body>
</html>