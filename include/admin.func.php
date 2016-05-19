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
        * _movie_name_type 过滤新增影片名字和类型
        *@access private
        *@param string
        *@return string
        */
      function _movie_name_type($string){
            $string=trim($string);
            return $string;
      }


      /**
        * _movie_grade_label 过滤新增影片评分和所属栏目
        *@access private
        *@param string
        *@return
        */
      function _movie_grade_label($string){
          if (!is_numeric($string)) {
           _tanchuang('填入信息类型不正确');
          }
          if ( $string>=0 && $string<=10) { 
              return $string;
           } else
           _tanchuang('栏目或评分数不正确');
      }



      function _upload($old_file_name,$new_file_name,$updir,$old_file_tmp_name){
       $addmovie_img = array();
       //切割图片名称和类型
       $jpg=explode('.',$old_file_name);
       //图片改名为名称 + 类型
       $addmovie_img[name]=$new_file_name."$jpg[1]";
       $_utf8name=iconv('utf-8','gb2312',$addmovie_img[name]);
       $uploaddir=$updir;
       $upstate=move_uploaded_file($old_file_tmp_name, $uploaddir.$_utf8name);
       if ($upstate) {
          return  $addmovie_img[name];   //将新的文件名返回
       }else
         _tanchuang('啊偶，上传出现点问题...');
      }






 ?>
