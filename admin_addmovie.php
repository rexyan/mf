<?php 
  

  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
  require  PATH.'\include\css.inc.php';  
  require  PATH.'\include\admin_header.inc.php';
  require  PATH.'\include\admin_manage_left.inc.php';  
 ?>

 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>电影增加</title>
 </head>
 <body>
 		<form action="admin_addmovie.php?mf=addmovie" method="post" enctype="multipart/form-data"><div class="admin_addmovie">

 			<table>
 				     <div class=" input-group input-group-lm">
       			<span class="input-group-addon">电影名称</span>
       			<input type="text"  class="form-control" placeholder="请输入影片名..." name="movie_name">
       		    </div> 

       		    <div class=" input-group input-group-lm">
       			<span class="input-group-addon">电影类型</span>
       			<input type="text"  class="form-control" placeholder="请输入影片所属于的类型..." name="movie_type">
       		    </div> 

       		    <div class=" input-group input-group-lm">
       			<span class="input-group-addon">电影评分</span>
       			<input type="text"  class="form-control" placeholder="请输入影片评分...1-10之间哦" name="movie_grade">
       		    </div> 

       		    <div class=" input-group input-group-lm">
       			<span class="input-group-addon">所属栏目</span>
       			<input type="text"  class="form-control" placeholder="1为推荐，2为最新，3为电视剧" name="movie_label">
       		    </div> 

       		    <div class=" input-group input-group-lm">
       			<span class="input-group-addon">上传图片</span>
       			<input type="file"  class="form-control" placeholder="上传影片的图片..." name="movie_img">
       		    </div> 

       		    <div class=" input-group input-group-lm">
       			<span class="input-group-addon">上传电影</span>
       			<input type="file"  class="form-control" placeholder="上传影片..." name="movie">
       		    </div>

              <div class=" input-group input-group-lm">
           <span class="input-group-addon">电影简介</span>
            <textarea  cols="43" rows="5"  placeholder="电影介绍...." name='movie_introduce'></textarea>
            </div> 

               <div class=" input-group input-group-lm">
            <span class="input-group-addon">影视资源</span>
            <input type="text"  class="form-control" placeholder="资源来源于云盘1..." name="movie_resource_pan1">
              </div>  

               <div class=" input-group input-group-lm">
            <span class="input-group-addon">影视资源</span>
            <input type="text"  class="form-control" placeholder="资源来源于云盘2..." name="movie_resource_pan2">
              </div> 

               <div class=" input-group input-group-lm">
            <span class="input-group-addon">影视资源</span>
            <input type="text"  class="form-control" placeholder="资源来源于磁力链接1..." name="movie_resource_thunder1">
              </div>  

               <div class=" input-group input-group-lm">
            <span class="input-group-addon">影视资源</span>
            <input type="text"  class="form-control" placeholder="资源来源于磁力链接2..." name="movie_resource_thunder2">
              </div>   

                <div class=" input-group input-group-lm">
            <span class="input-group-addon">影视资源</span>
            <input type="text"  class="form-control" placeholder="其他..." name="movie_resource_other">
              </div>   
          
          
           <?php 
              //获取当前时间
              $nowtime=_date();
            ?>

               <div class=" input-group input-group-lm">
            <span class="input-group-addon">时间:<?php echo $nowtime; ?></span>
            <span  class="input-group-addon"> 管理员:<?php echo $_COOKIE[doadmin]; ?></span>
              </div> 
			
				    <div class="admin_addmovie-submit input-group input-group-lm">
       			<input type="submit"  class="form-control" name="">
       		    </div> 



<?php 
    
if ($_GET[mf]=='addmovie') {
      $addmovie = array();
      $addmovie[movie_name]=_movie_name_type($_POST[movie_name]);
      $addmovie[movie_label]=_movie_grade_label($_POST[movie_label]);
      $addmovie[movie_grade]=_movie_grade_label($_POST[movie_grade]);
      $addmovie[movie_type]=_movie_name_type($_POST[movie_type]);
      $addmovie[movie_resource_pan1]=($_POST[movie_resource_pan1]);
      $addmovie[movie_resource_pan2]=($_POST[movie_resource_pan2]);
      $addmovie[movie_resource_thunder1]=($_POST[movie_resource_thunder1]);
      $addmovie[movie_resource_thunder2]=($_POST[movie_resource_thunder2]);
      $addmovie[movie_resource_other]=($_POST[movie_resource_other]);
      $addmovie[movie_introduce]=($_POST[movie_introduce]);
     
      //处理图片（改名并上传）
      $old_file_name=$_FILES[movie_img][name];
      $new_file_name="$addmovie[movie_name].";
      $updir='images/movie/';
      $old_file_tmp_name=$_FILES[movie_img][tmp_name];
      $filename=_upload($old_file_name,$new_file_name,$updir,$old_file_tmp_name); //将新文件返回接收

    

     //将信息写入数据库
        $_insert="insert into movie(
                  movie_name,
                  movie_type,
                  movie_user,
                  movie_date,
                  movie_grade,
                  movie_img,
                  movie_label,
                  movie_resource_pan1,
                  movie_resource_pan2,
                  movie_resource_thunder1,
                  movie_resource_thunder2,
                  movie_resource_other,
                  movie_introduce
                  ) 
                values(
                '{$addmovie[movie_name]}',
                '{$addmovie[movie_type]}',
                '{$_COOKIE[doadmin]}',
                '$nowtime',
                '{$addmovie[movie_grade]}',
                '$filename',
                '{$addmovie[movie_label]}',
                '{$addmovie[movie_resource_pan1]}',
                '{$addmovie[movie_resource_pan2]}',
                '{$addmovie[movie_resource_thunder1]}',
                '{$addmovie[movie_resource_thunder2]}',
                '{$addmovie[movie_resource_other]}',
                '{$addmovie[movie_introduce]}'
                  )";
        
        $result=mysql_query($_insert)or die(mysql_error()) ;
        if ($result) {
          _tanchuang('写入数据库成功');
        }


      }                    

?>

 			
 			</table>
 			</div>
 		</form>
 </body>
 </html>