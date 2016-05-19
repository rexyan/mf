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
header('content:text/html,charset=utf-8');
if (!defined('REXYAN')) {
  exit('非法调用');
}
?>

<?php 


/**
* _ZCCL 处理usernam的格式,去除空格，屏蔽敏感字符，转义（未成功）
*@access private
*@param string int int 
*@return string
*/
function _ZCCL($str,$min,$max){
  $str=trim($str);
  if (strlen($str)<=$min || strlen($str)>=$max) {
          _tanchuang('昵称长度不符合要求');
  }elseif (preg_match('/毛泽东|邓小平|习近平|马凯|王岐山|王沪宁|刘云山|刘延东|刘奇葆|许其亮|孙春兰|孙政才|李克强|李建国|李源潮|汪洋|张春贤|张高丽|张德江|范长龙|孟建柱|赵乐际|胡春华|俞正声|栗战书|郭金龙|韩正|[\^ \& \\ \/ \% \$ \# \@ \! \` \~]+/',$str)) {
     exit(_tanchuang("名称不合法,不能包含敏感字符"));
  }elseif(!GPC){                  
    return mysql_real_escape_string($str);
  }else
    return $str;
}


/**
* _ZCCL_MAIL 判断邮箱地址是否合法
*@access public
*@param string
*@return string
*/
function _ZCCL_MAIL($str){
  $mode='/[\w]+@(\w)+.[a-z]+/';
  if (preg_match($mode,$str)) {
    return $str;
  }else
    exit(_tanchuang('邮箱地址不正确'));
}


/**
*_ZCCL_PASSWORD  检查密码长度,并加密
*@access private
*@param string int
*@return string 
*/
function _ZCCL_PASSWORD($str,$mix){
  if (strlen($str)<$mix) {
    exit(_tanchuang("密码长度最少".$mix."位"));
   }else
    $str=sha1($str);
    return $str;
 }


/**
*_ZCCL_REPASSWORD   密码校验
*@access private
*@param string string 
*@return string 
*/
function _ZCCL_REPASSWORD($pass,$repass){
  $repass=sha1($repass);
  if ($repass===$pass) {
   return $repass;
  }else
  exit(_tanchuang('两次输入的密码不一致'));
}


 function _check_code($_first_code,$_end_code) {
  if ($_first_code != $_end_code) {
   echo '验证码不正确';
  }
}

/**
*_tanchuang   弹窗
*@access public
*@param string 
*/
function _tanchuang($_info) {
  echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
  exit();
}

/**
*_check_uniqid   判断唯一标识符是否正确
*@access public
*@param string  string
*/
function _check_uniqid($uniqid1,$uniqid2){
    if (!$uniqid1===$uniqid2) {
      exit(_tanchuang('唯一标识符不正确，非法操作！'));
    }
}

/**
*_date   获取当前时间
*@access public
*@return date 
*/
function _date(){
  return date('Y-m-d H:i:s',time()+(8*60*60));
}

 ?>




