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


  define('REXYAN',true);
  define("PATH", dirname(__FILE__));
  require  PATH.'\include\common.inc.php';
  require  PATH.'\include\css.inc.php';
 
 if (!isset($_COOKIE[doadmin])) {
    _tanchuang ('未登录，请登陆后在操作');
 }
 else
   
  ?>

  <html>
  <head>
    <meta charset="UTF-8">
    <title>MF影视-后台程序</title>
     <meta itemprop="name" content="MF电影网 | 最新免费电影"/><meta name="description" itemprop="description" content="MF电影网，一个简单及时的电影网站。最新电影,热门电影,最新电视剧,电影下载,电影在线播放,电影爱好者聚集地，一个不用下载播放器的电影网站" /><meta name="keywords" content="MF电影网,电影网站,电影播放,电影下载,最新电影,热门电影,在线观看,MF,闫润沙" />
     <?php 
          require  PATH.'\include\css.inc.php';
     ?>
 </head>
      <?php 
          require  PATH.'\include\admin_header.inc.php';  
          require  PATH.'\include\admin_manage_left.inc.php';  
         
      ?>
  </body>
  </html>