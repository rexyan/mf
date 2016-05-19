<?php 
  
  define("REXYAN",true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
 ?>

<?php 
     require  PATH.'\include\logout.inc.php';
     header('location:index.php');

 ?>