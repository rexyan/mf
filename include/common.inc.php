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

define('REXYAN', true);    //global.func.php设置有非法调用的判断，此处需设置常量
require 'global.func.php';
require 'register.func.php';
require 'admin.func.php';




//数据库常量
  define(DB_USER,'root');
  define(DB_PASSWORD,'yanrunsha');
  define(DB_HOST,'localhost');
  define(DB_NANE,'neu');
  define(DB_NANE2,'movie');
_MYSQL(DB_HOST,DB_USER,DB_PASSWORD,DB_NANE);
  
 ?>