<?php
session_start();
 
header("Content-type:text/html; charset=UTF-8");
/**
 * 
 * 仲裁员
 * @author          fupeng
 * @time        	2015-08-31
 */
if(!defined("Yourphp")) exit("Access Denied");
class ArbitratorStmAction extends BaseAction {

    public $dao,$userextend,$counturl,$listurl,$infourl;
	function _initialize()
	{
		parent::_initialize();
		$this->dao = M('User');
		$this->userextend = M('User_extend');
		$this->counturl = "http://192.168.1.213/system/arbAward2016BeforeCount.action";  //获取列表数量
		$this->listurl = "http://192.168.1.213/system/arb2016BeforeList.action"; //获取列表
		$this->infourl = "http://192.168.1.213/system/arb2016BeforeInfo.action"; //根据主键获取信息
		//测试连接
		//$this->counturl = "http://192.168.100.220:8080/cietac/system/arbitratorOutListCount.action";  //获取列表数量
		//$this->listurl = "http://192.168.100.220:8080/cietac/system/arbitratorOutList.action"; //获取列表
		//$this->infourl = "http://192.168.100.220:8080/cietac/system/outGetArbitrator.action"; //根据主键获取信息
	}
//请求数据到短信接口，检查环境是否 开启 curl init。
function Post($curlPost,$url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
}
 
//将 xml数据转换为数组格式。
function xml_to_array($xml){
    $reg = "/<(\w+)[^-->]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
        $subxml= $matches[2][$i];
        $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}
 
	//random() 函数返回随机整数。
	function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
	}
     
	function stm(){
		//短信接口地址
		echo "BBBBBBBBBBBBBB";
		$target="";
		$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
		//获取手机号
		$mobile = $_POST['mobile'];
		//$mobile = "13311216337";
		//获取验证码
		//$send_code = $_POST['send_code'];
		//生成的随机数
		//echo random12(4,1);
		echo $this->random(4,1);
		$mobile_code = $this->random(4,1);
	
		if(empty($mobile)){
			exit('手机号码不能为空');
		}
		//防用户恶意请求
		//if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
		//	exit('请求超时，请刷新页面后重试');
		//}
		//验证码：【变量】。请不要把验证码泄露给其他人。如非本人操作，可不用理会！
		$post_data = "account=cf_jmwyh&password=b1151478918075e2ab69500d8beec6fd&mobile=".$mobile."&content=".rawurlencode("验证码：".$mobile_code."。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");
		//$_SESSION['mobile'] = $mobile;
		$_SESSION['mobile_code'] = $mobile_code;
		//用户名是登录ihuyi.com账号名（例如：cf_demo123）
		//查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
		$gets =  $this->xml_to_array($this->Post($post_data, $target));
		if($gets['SubmitResult']['code']==2){
			$_SESSION['mobile'] = $mobile;
			$_SESSION['mobile_code'] = $mobile_code;
		}
		echo $gets['SubmitResult']['code'];
		echo $gets['SubmitResult']['msg'];
	}

	function m(){
		
	}
	
	function info(){
		$userid = intval($_GET['userId']);
		$searchurl = $this->infourl."?arbitrator.arbitratorId=$userid";
		$userinfojson = curl_get($searchurl);
		if(isset($userinfojson['result']) && !empty($userinfojson['result'])){
			$userinfoarr = json_decode($userinfojson['result'],true);
		}
		$userextendinfo = array();
		if($userinfoarr && isset($userinfoarr['arbitrator'])){
			$userextendinfo = $userinfoarr['arbitrator'];
		}
		if($userextendinfo['englishMainAddress']){
			$userextendinfo['photo'] = 'http://192.168.1.213/arbpic/'.$userextendinfo['englishMainAddress'];
		}
		//$userInfojson = '{"arbitrator":{"englishHomeAddress":"288-1-2101 WESTE HUAIHAIROAD","englishRltArbExperience":"","phone":"021-65367581","englishDuty":"","arbitratorName":"戴国强","englishSocialOccupation":"","specificMode":"","remark":"","introduce":"","surname":"戴 ","courtUserID":0,"listIds":[],"homePhone":" ","city":"上海","arbitratorId":0,"homeAddress":" 上海市淮海西路288弄1号2101室","userId":5002,"englishDutyTitle":"Professor","nationalityName":"","englishAchievements":"","rltArbExperience":"","englishNationality":"CHINA","englishLetterId":0,"fax":"021-65367581 ","letterId":0,"status":"","dutyTitle":"教授","onPanelString":"","mostGraduate":"1 ","mainAddress":0,"homeZipcode":"","professional":"","arbitratorNo":550,"branchID":0,"email":"gqdai9@yahoo.com.cn","englishMainAddress":"","englishGivenName":"Guoqiang ","company":"上海财经大学MBA学院","validAddress":"上海市中山北一路369号 ","userAccount":"","englishCity":"Shanghai","birthday":"1952-06-11","englishSurname":"Dai ","workingLanguage":"中文","sex":1,"englishArbitratorName":"Dai Guoqiang","modifyType":0,"englishValidAddress":"369,NORTH ZHONGSHAN ROAD ","state":0,"englishOnPanel":0,"onPanel":1,"givenName":"国强 ","dictionaryItemName":"中国","education":"1983年1月 上海财经学院财金系 获经济学学士学位\r\n1987年7月 上海财经大学金融系 获经济学硕士学位\r\n1994年7月 复旦大学国际金融系 获经济学博士学位\r\n1997年2-3月 香港城市大学商学部 访问学者\r\n1997年10月-1998年1月 新加坡国立大学商学院 访问学2002年3-5月 纽约大学STERN商学院 访问学者\r\n2002年5-9月 美国国民经济研究局 访问学者","recommend":" ","homeFax":" ","socialOccupation":"","achievements":"主编：\r\n《商业银行经营学》第二版，高教出版社 2004年\r\n《基金管理学》上海三联书店1996、台湾五南图书出版公司1999\r\n《货币银行学》高教出版社 1999\r\n\r\n著作：\r\n《中国货币需求分析》 复旦大学出版社 1995\r\n〈2000中国金融发展报告》 上海财经大学出版社 2000\r\n〈2002中国金融发展报告》 上海财经大学出版社 2002\r\n〈融资方式与融资政策比较》 中国财政经济出版社2002\r\n〈投资基金》 上海译文出版社 2003\r\n《2004中国金融发展报告》 上海财经大学出版社 2004","secname":"","duty":"院长","englishIntroduce":"","sexString":"","idNumber":"310103195206112834","englishMostGraduate":"DOCTOR ","englishWorkingLanguage":"Chinese","englishEducation":"","speciality":"金融理论与实务研究","zipcode":"","englishWorkingExperience":"","englishSex":1,"pwd":"6688 ","nationality":1,"address":" 上海市中山北一路369号,200083","englishAddress":"369,NORTH ZHONGSHAN ROAD","englishSpeciality":"Theory and Pratice of Finance","englishProfessional":"Teaching and Research ","englishCompany":"MBA SCHOOL,SHUFE,","workingExperience":"1968年11月-1997年1月 上海第二织带厂 工人、计划\r\n1983年1月――现在 上海财经大学金融学院 讲师、副教授、教授、博士生导师 ，系副主任、副院长、院长","englishRemark":"","mobileNo":"133162563611"}}';
		//$userextendinfo = json_decode($userInfojson,true);
		//获取国籍
		
		$nationality = $GLOBALS['nationality'];
		$nationality_en = $GLOBALS['nationality_en'];
		
		
		$this->assign("userextendinfo",$userextendinfo);
		$this->assign('nationality',$nationality);
		$this->assign('nationality_en',$nationality_en);
		$this->display();
		
	}
	function wInfo(){
		$userid = intval($_GET['userId']);
		$searchurl = $this->infourl."?arbitrator.arbitratorId=$userid";
		$userinfojson = curl_get($searchurl);
		if(isset($userinfojson['result']) && !empty($userinfojson['result'])){
			$userinfoarr = json_decode($userinfojson['result'],true);
		}
		$userextendinfo = array();
		if($userinfoarr && isset($userinfoarr['arbitrator'])){
			$userextendinfo = $userinfoarr['arbitrator'];
		}
		if($userextendinfo['englishMainAddress']){
			$userextendinfo['photo'] = 'http://192.168.1.213/arbpic/'.$userextendinfo['englishMainAddress'];
		}
		//$userInfojson = '{"arbitrator":{"englishHomeAddress":"288-1-2101 WESTE HUAIHAIROAD","englishRltArbExperience":"","phone":"021-65367581","englishDuty":"","arbitratorName":"戴国强","englishSocialOccupation":"","specificMode":"","remark":"","introduce":"","surname":"戴 ","courtUserID":0,"listIds":[],"homePhone":" ","city":"上海","arbitratorId":0,"homeAddress":" 上海市淮海西路288弄1号2101室","userId":5002,"englishDutyTitle":"Professor","nationalityName":"","englishAchievements":"","rltArbExperience":"","englishNationality":"CHINA","englishLetterId":0,"fax":"021-65367581 ","letterId":0,"status":"","dutyTitle":"教授","onPanelString":"","mostGraduate":"1 ","mainAddress":0,"homeZipcode":"","professional":"","arbitratorNo":550,"branchID":0,"email":"gqdai9@yahoo.com.cn","englishMainAddress":"","englishGivenName":"Guoqiang ","company":"上海财经大学MBA学院","validAddress":"上海市中山北一路369号 ","userAccount":"","englishCity":"Shanghai","birthday":"1952-06-11","englishSurname":"Dai ","workingLanguage":"中文","sex":1,"englishArbitratorName":"Dai Guoqiang","modifyType":0,"englishValidAddress":"369,NORTH ZHONGSHAN ROAD ","state":0,"englishOnPanel":0,"onPanel":1,"givenName":"国强 ","dictionaryItemName":"中国","education":"1983年1月 上海财经学院财金系 获经济学学士学位\r\n1987年7月 上海财经大学金融系 获经济学硕士学位\r\n1994年7月 复旦大学国际金融系 获经济学博士学位\r\n1997年2-3月 香港城市大学商学部 访问学者\r\n1997年10月-1998年1月 新加坡国立大学商学院 访问学2002年3-5月 纽约大学STERN商学院 访问学者\r\n2002年5-9月 美国国民经济研究局 访问学者","recommend":" ","homeFax":" ","socialOccupation":"","achievements":"主编：\r\n《商业银行经营学》第二版，高教出版社 2004年\r\n《基金管理学》上海三联书店1996、台湾五南图书出版公司1999\r\n《货币银行学》高教出版社 1999\r\n\r\n著作：\r\n《中国货币需求分析》 复旦大学出版社 1995\r\n〈2000中国金融发展报告》 上海财经大学出版社 2000\r\n〈2002中国金融发展报告》 上海财经大学出版社 2002\r\n〈融资方式与融资政策比较》 中国财政经济出版社2002\r\n〈投资基金》 上海译文出版社 2003\r\n《2004中国金融发展报告》 上海财经大学出版社 2004","secname":"","duty":"院长","englishIntroduce":"","sexString":"","idNumber":"310103195206112834","englishMostGraduate":"DOCTOR ","englishWorkingLanguage":"Chinese","englishEducation":"","speciality":"金融理论与实务研究","zipcode":"","englishWorkingExperience":"","englishSex":1,"pwd":"6688 ","nationality":1,"address":" 上海市中山北一路369号,200083","englishAddress":"369,NORTH ZHONGSHAN ROAD","englishSpeciality":"Theory and Pratice of Finance","englishProfessional":"Teaching and Research ","englishCompany":"MBA SCHOOL,SHUFE,","workingExperience":"1968年11月-1997年1月 上海第二织带厂 工人、计划\r\n1983年1月――现在 上海财经大学金融学院 讲师、副教授、教授、博士生导师 ，系副主任、副院长、院长","englishRemark":"","mobileNo":"133162563611"}}';
		//$userextendinfo = json_decode($userInfojson,true);
		//获取国籍
		
		$nationality = $GLOBALS['nationality'];
		$nationality_en = $GLOBALS['nationality_en'];
		layout(false);
		$this->assign("userextendinfo",$userextendinfo);
		$this->assign('nationality',$nationality);
		$this->assign('nationality_en',$nationality_en);
		$this->display();
	}
}
?>
