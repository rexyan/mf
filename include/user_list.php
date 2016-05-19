
<html>
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
</head>
<body>
		<table border="1">
			<form>
				<tr>
					<th>ID</th>
					<th>昵称</th>
					<th>性别</th>
				    <th>邮箱</th>
				    <th>状态</th>
				    <th>访问时间</th>
				    <th>访问IP</th>
				    <th>评论</th>
				    <th colspan="3">操作</th>
				</tr>
		


<?php 
	$con=@mysql_connect('localhost','root','yanrunsha') or die(mysql_error());
    mysql_select_db('neu') or die(mysql_errno());
    mysql_set_charset(utf8) or die(mysql_error());

    $sql='select * from user';
    $result=mysql_query($sql);
    while ($row=mysql_fetch_array($result,MYSQL_NUM)) {
 ?>   	
	<tr>
		
		<td><?php echo $row[0] ?></td> 
		<td><?php echo $row[6] ?></td>
		<td><?php echo $row[7] ?></td>
		<td><?php echo $row[1] ?></td>
		<td><?php 
					if (!row[4]) {
					 echo "未激活";
					 } else
					 echo "激活";
			?>
		</td>
		<td><?php echo $row[5] ?></td>
		<td><?php echo $row[4] ?></td>
		<td><?php  echo '20条';?></td>
		<td><a href=""> <?php echo '修改';?></td></a>
		<td><a href=""><?php echo  '冻结';?></td></a>
		<td><a href=""><?php echo  '删除';?></td></a>

	</tr>
 
 <?php 	
    }

 ?>

 </form>
	</table>
		
</body>
</html>