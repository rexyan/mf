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



  <?php 
 /**
 * _TIME()表示获取页面执行时间
 * @access public
 * @param  null
 * @return float
 */
  function _TIME(){
    $_MIRCROTIME=microtime();
    $TIME=explode(' ', $_MIRCROTIME);
    return $TIME[0]+$TIME[1];
  }
   
   /**
   *_MYSQL 表示连接数据库，选择数据库，设置字符集
   * @access public
   * @param 
   * return resource
   */
   function _MYSQL($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NANE){
    $connect=@mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD) or die('数据库连接失败'.mysql_error());
    mysql_select_db($DB_NANE) or die('选择数据库失败'.mysql_error());
    mysql_set_charset(utf8);
    return $connect;
   }


  /**
   *_set_cookie 登录生成cookie
   * @access public
   * @param string string string 
   * 
   */
   function _set_cookie($string1,$string2,$string3){
      switch ($string3) {
        case '0':
            setcookie('mf_username',$string1);
            setcookie('mf_uniqid',$string2);
          break;
        case '1':
            setcookie('mf_username',$string1,time()+24*60*60);
            setcookie('mf_uniqid',$string2,time()+24*60*60);
          break;
        case '2':
            setcookie('mf_username',$string1,time()+7*24*60*60);
            setcookie('mf_uniqid',$string2,time()+24*60*60);
          break;
        case '3':
            setcookie('mf_username',$string1,time()+30*24*60*60);
            setcookie('mf_uniqid',$string2,time()+24*60*60);
          break;
      }
   }

 /**
   *_del_cookie 删除cookie
   * @access public
   * @param  
   * 
   */
   function _del_cookie($string1,$string2){
            setcookie($string1,'',time()-1);
            setcookie($string2,'',time()-1);
   }

 


 /**
   *notfound 没有查询到
   * @access public
   * @param  string
   * 
   */
   function notfound($string1){
        echo "<h4>";
        echo $string1;
        echo "</h4>";       
   }


 /**
   *_duoshuo 多说评论框
   * @access public
   * @param  string string string
   * 
   */
function _duoshuo($id,$name,$url){
echo '<div class="ds-thread" thread-key=$id data-title=$name data-form-position="top" data-limit="20" data-order="desc" data-url=$url></div>';
echo "<script type='text/javascript'>";
echo 'var duoshuoQuery = {short_name:"123yrs"};';
echo '(function() {';
echo "  var ds = document.createElement('script');";
echo "  ds.type = 'text/javascript';ds.async = true;";
echo "    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';";
echo "    ds.charset = 'UTF-8';";
echo "    (document.getElementsByTagName('head')[0] ";
echo "     || document.getElementsByTagName('body')[0]).appendChild(ds);";
echo '  })();';
echo '  </script>';
}


?>