<?php 
  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
  require  PATH.'\include\css.inc.php';  
  require  PATH.'\include\admin_header.inc.php';
  require  PATH.'\include\admin_manage_left.inc.php';  
 ?>
<?php 
    $sql="select 
                movie_direct,
                movie_scriptwriter,
                movie_protagonist, 
                movie_nationality,
                movie_language, 
                movie_duration,
                movie_name,
                movie_showtime
                from 
                movie
                where movie_id='{$_GET[movie_id]}'
                "; 
                
    $result=mysql_query($sql) or die(mysql_error());  
    $arr=mysql_fetch_array($result,MYSQL_ASSOC);
 ?>

 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>电影信息修改</title>
 </head>
 <body>
 

 <div class="row col-md-8 col-md-offset-1 rexyan">
      <ol class="breadcrumb">
          <li>你的位置</li>
          <li><a href="admin.php">MF后台管理</a></li>
          <li><a href="admin_manage_movielist.php">电影管理</a></li>
          <li class="active"><?php echo $arr[movie_name]; ?></li>
      </ol>
 </div>


 		<form action=" admin_movie_information.php?mf=admin_movie_information&amp;movie_id=<?php echo $_GET[movie_id]; ?>"method="post">
      <div class="admin_movie_information col-md-4 col-md-offset-2">
      
      <table >
      <div class=" input-group input-group-lm col-md-12 ">
      <span class="input-group-addon">导演</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_direct]; ?>" name="movie_direct"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">编剧</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_scriptwriter]; ?>" name="movie_scriptwriter"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">主演</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_protagonist]; ?>" name="movie_protagonist"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">国家</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_nationality]; ?>" name="movie_nationality"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">语言</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_language]; ?>" name="movie_language"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">时长</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_duration]; ?>" name="movie_duration"> </input>
      </div> 
      <br>
      <div class=" input-group input-group-lm col-md-12">
      <span class="input-group-addon">上映时间</span>
      <input type="text"  class="form-control" value="<?php echo $arr[movie_showtime]; ?>" name="movie_showtime"> </input>
      </div> 
      <br>
      <div class="input-group input-group-lm col-md-1 col-md-offset-4">
      <input type="submit"  class="form-control"  value="更新电影信息"> </input>
      </div> 

 			</table>
 			</div>
 		</form>
 </body>
 </html>

 <?php 
    if ($_GET['mf']=='admin_movie_information') {  

     $arr=array();
     $arr[movie_id]=$_GET[movie_id];
     $arr[movie_direct]=$_POST[movie_direct];
     $arr[movie_scriptwriter]=($_POST[movie_scriptwriter]);
     $arr[movie_protagonist]=($_POST[movie_protagonist]);
     $arr[movie_nationality]=($_POST[movie_nationality]);
     $arr[movie_language]=($_POST[movie_language]);
     $arr[movie_duration]=($_POST[movie_duration]);
     $arr[movie_showtime]=($_POST[movie_showtime]);
   
     $ML="UPDATE movie SET 
                        movie_direct='{$arr[movie_direct]}',
                        movie_scriptwriter='{$arr[movie_scriptwriter]}',
                        movie_protagonist='{$arr[movie_protagonist]}',
                        movie_nationality='{$arr[movie_nationality]}',
                        movie_language='{$arr[movie_language]}',
                        movie_duration='{$arr[movie_duration]}',
                        movie_showtime='{$arr[movie_showtime]}'
                          WHERE
                                movie_id='{$arr[movie_id]}' 
                                ";


     $result1=mysql_query($ML) or die(mysql_error());
     if ($result1) {
       _tanchuang('信息增加或修改成功！！');
     }
  }

  ?>