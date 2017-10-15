<?php
/**
 * 
 * 仲裁员
 * @author          fupeng
 * @time        	2015-08-31
 */
if(!defined("Yourphp")) exit("Access Denied");
class ArbitratorAfterAction extends BaseAction {

    public $dao,$userextend,$counturl,$listurl,$infourl;
	function _initialize()
	{
		parent::_initialize();
		$this->dao = M('User');
		$this->userextend = M('User_extend');
		$this->counturl = "http://192.168.1.213/system/arbAward2016AfterCount.action";  //获取列表数量
		$this->listurl = "http://192.168.1.213/system/arb2016AfterList.action"; //获取列表
	}


	function after(){
		$counturl = $this->counturl;
		$listurl = $this->listurl;
		import ( '@.ORG.Page' );
		if(LANG_NAME == 'cn'){
			$searchName = get_safe_replace($_GET['caseno']);
			$searchType = get_safe_replace($_GET['searchType']);
			$searchLanguage = get_safe_replace($_GET['searchLanguage']);
			//$searchAddress = get_safe_replace($_GET['searchAddress']);
			$searchAddress = get_safe_replace($_SESSION['searchName']);
			$searchArbitListId = get_safe_replace($_SESSION['userId']);
			$searchSpecSkill = get_safe_replace($_GET['searchSpecSkill']);
			$searchENAddress=get_safe_replace($_GET['searchENAddress']);
			$where = "?arbitratorCondition.branchID=1";
			if(!empty($searchName)){
				$where .= "&arbitratorCondition.searchCaseNo=".urlencode($searchName);
			}
			if(!empty($searchType)){
				$where .= "&arbitratorCondition.nationalityType=$searchType";
			}
			if(!empty($searchLanguage)){
				$where .= "&arbitratorCondition.searchLanguage=".urlencode($searchLanguage);
			}
			if(!empty($searchAddress)){
				$where .= "&arbitratorCondition.searchHomeAddress=".urlencode($searchAddress);
			}
			if(!empty($searchSpecSkill)){
				$where .= "&arbitratorCondition.searchSpeciality=".urlencode($searchSpecSkill);
			}
			if(!empty($searchENAddress)){
				$where .= "&arbitratorCondition.searchEnglishHomeAddress=".urlencode($searchENAddress);
			}
			if(!empty($searchArbitListId)){
				$where .= "&arbitratorCondition.searchArbitListId=".urlencode($searchArbitListId);
			}
		}else{
			/*
			$searchENName = get_safe_replace($_GET['searchENName']);
			$searchType = get_safe_replace($_GET['searchType']);
			$searchENLanguage = get_safe_replace($_GET['searchENLanguage']);
			$searchENAddress = get_safe_replace($_GET['searchENAddress']);
			$searchENSpecSkill = get_safe_replace($_GET['searchENSpecSkill']);
			$where = "?arbitratorCondition.branchID=1";
			if(!empty($searchENName)){
				$where .= "&arbitratorCondition.searchEnglishArbitratorName=".urlencode($searchENName);
			}
			if(!empty($searchType)){
				$where .= "&arbitratorCondition.searchEnglishNationality=$searchType";
			}
			if(!empty($searchENLanguage)){
				$where .= "&arbitratorCondition.searchEnglishLanguage=".urlencode($searchENLanguage);
			}
			if(!empty($searchENAddress)){
				$where .= "&arbitratorCondition.searchEnglishHomeAddress=".urlencode($searchENAddress);
			}
			if(!empty($searchENSpecSkill)){
				$where .= "&arbitratorCondition.searchEnglishSpeciality=".urlencode($searchENSpecSkill);
			}
			*/
		}
 		$this->assign($_GET);
 		$counturl = $counturl.$where;
 		$countjson = curl_get($counturl);
 		if(isset($countjson['result']) && !empty($countjson['result'])){
 			$countarr = json_decode($countjson['result'],true);
 		}
 		$count = 0;
 		if($countarr && isset($countarr['arbitratorCount'])){
 			$count = $countarr['arbitratorCount'];
 		}
		$page=new Page($count,15);
		$show=$page->show();
		$this->assign("page",$show);
		$listgeturl = $listurl.$where."&pageBean.pageline=300&pageBean.cpage=$page->nowPage";
		$listjson = curl_get($listgeturl);
		if(isset($listjson['result']) && !empty($listjson['result'])){
			$listarr = json_decode($listjson['result'],true);
		}
		//print_r($listarr);exit;
		$list = array();
		if($listarr && isset($listarr['arbitrator'])){
			$list = $listarr['arbitrator'];
		}
		//$list = json_decode($listjson,true);
		$this->assign('ulist',$list);
		//获取国籍
		if(LANG_NAME == 'cn'){
			$nationality = $GLOBALS['nationality'];
		}else{
			$nationality = $GLOBALS['nationality_en'];
		}
		//获取城市
		if(LANG_NAME == 'cn'){
			$city = $GLOBALS['province'];
		}else{
			$city = '';
		}
		//获取最高学历
		if(LANG_NAME == 'cn'){
			$highestschooling = $GLOBALS['highestschooling'];
		}else{
			$highestschooling = '';
		}
		//获取职称
		if(LANG_NAME == 'cn'){
			$nicaltitle = $GLOBALS['nicaltitle'];
		}else{
			$nicaltitle = $GLOBALS['nicaltitle_en'];
		}
		//获取职业分类
		if(LANG_NAME == 'cn'){
			$occclassification = $GLOBALS['occclassification'];
		}else{
			$occclassification = $GLOBALS['occclassification_en'];
		}
		//获取语种
		if(LANG_NAME == 'cn'){
			$languagetype = $GLOBALS['languagetype'];
		}else{
			$languagetype = $GLOBALS['languagetype_en'];
		}
		$this->assign('nationality',$nationality);
		$this->assign('city',$city);
		$this->assign('highestschooling',$highestschooling);
		$this->assign('nicaltitle',$nicaltitle);
		$this->assign('occclassification',$occclassification);
		$this->assign('languagetype',$languagetype);
		if(LANG_NAME == 'cn'){
			$this->display();
		}else{
			$this->display('indexen');
		}
	}


	function m(){
		$counturl = $this->counturl;
		$listurl = $this->listurl;
		import ( '@.ORG.Page' );
		if(LANG_NAME == 'cn'){
			$searchName = get_safe_replace($_GET['caseno']);
			$searchType = get_safe_replace($_GET['searchType']);
			$searchLanguage = get_safe_replace($_GET['searchLanguage']);
			$searchAddress = get_safe_replace($_GET['searchAddress']);
			$searchSpecSkill = get_safe_replace($_GET['searchSpecSkill']);
			$where = "?arbitratorCondition.branchID=1";
			if(!empty($searchName)){
				$where .= "&arbitratorCondition.searchCaseNo=".urlencode($caseno);
			}
			if(!empty($searchType)){
				$where .= "&arbitratorCondition.nationalityType=$searchType";
			}
			if(!empty($searchLanguage)){
				$where .= "&arbitratorCondition.searchLanguage=".urlencode($searchLanguage);
			}
			if(!empty($searchAddress)){
				$where .= "&arbitratorCondition.searchHomeAddress=".urlencode($searchAddress);
			}
			if(!empty($searchSpecSkill)){
				$where .= "&arbitratorCondition.searchSpeciality=".urlencode($searchSpecSkill);
			}
		}else{
			$searchENName = get_safe_replace($_GET['searchENName']);
			$searchType = get_safe_replace($_GET['searchType']);
			$searchENLanguage = get_safe_replace($_GET['searchENLanguage']);
			$searchENAddress = get_safe_replace($_GET['searchENAddress']);
			$searchENSpecSkill = get_safe_replace($_GET['searchENSpecSkill']);
			$where = "?arbitratorCondition.branchID=1";
			if(!empty($searchENName)){
				$where .= "&arbitratorCondition.searchEnglishArbitratorName=".urlencode($searchENName);
			}
			if(!empty($searchType)){
				$where .= "&arbitratorCondition.searchEnglishNationality=$searchType";
			}
			if(!empty($searchENLanguage)){
				$where .= "&arbitratorCondition.searchEnglishLanguage=".urlencode($searchENLanguage);
			}
			if(!empty($searchENAddress)){
				$where .= "&arbitratorCondition.searchEnglishHomeAddress=".urlencode($searchENAddress);
			}
			if(!empty($searchENSpecSkill)){
				$where .= "&arbitratorCondition.searchEnglishSpeciality=".urlencode($searchENSpecSkill);
			}
		}
 		$this->assign($_GET);
 		$counturl = $counturl.$where;
 		$countjson = curl_get($counturl);
 		if(isset($countjson['result']) && !empty($countjson['result'])){
 			$countarr = json_decode($countjson['result'],true);
 		}
 		$count = 0;
 		if($countarr && isset($countarr['arbitratorCount'])){
 			$count = $countarr['arbitratorCount'];
 		}
		$page=new Page($count,15);
		$show=$page->show();
		$this->assign("page",$show);
		$listgeturl = $listurl.$where."&pageBean.pageline=15&pageBean.cpage=$page->nowPage";
		$listjson = curl_get($listgeturl);
		if(isset($listjson['result']) && !empty($listjson['result'])){
			$listarr = json_decode($listjson['result'],true);
		}
		//print_r($listarr);exit;
		$list = array();
		if($listarr && isset($listarr['arbitrator'])){
			$list = $listarr['arbitrator'];
		}
		print_r($listjson);
		//测试数据
		//$listjson = '{"arbitrator":[{"englishHomeAddress":"288-1-2101 WESTE HUAIHAIROAD","englishRltArbExperience":"","phone":"021-65367581","englishDuty":"","arbitratorName":"戴国强","englishSocialOccupation":"","specificMode":"","remark":"","introduce":"","surname":"戴 ","courtUserID":0,"listIds":[],"homePhone":" ","city":"上海","arbitratorId":0,"homeAddress":" 上海市淮海西路288弄1号2101室","userId":5002,"englishDutyTitle":"Professor","nationalityName":"","englishAchievements":"","rltArbExperience":"","englishNationality":"CHINA","englishLetterId":0,"fax":"021-65367581 ","letterId":0,"status":"","dutyTitle":"教授","onPanelString":"","mostGraduate":"1 ","mainAddress":0,"homeZipcode":"","professional":"","arbitratorNo":550,"branchID":0,"email":"gqdai9@yahoo.com.cn","englishMainAddress":"","englishGivenName":"Guoqiang ","company":"上海财经大学MBA学院","validAddress":"上海市中山北一路369号 ","userAccount":"","englishCity":"Shanghai","birthday":"1952-06-11","englishSurname":"Dai ","workingLanguage":"中文","sex":1,"englishArbitratorName":"Dai Guoqiang","modifyType":0,"englishValidAddress":"369,NORTH ZHONGSHAN ROAD ","state":0,"englishOnPanel":0,"onPanel":1,"givenName":"国强 ","dictionaryItemName":"中国","education":"1983年1月 上海财经学院财金系 获经济学学士学位\r\n1987年7月 上海财经大学金融系 获经济学硕士学位\r\n1994年7月 复旦大学国际金融系 获经济学博士学位\r\n1997年2-3月 香港城市大学商学部 访问学者\r\n1997年10月-1998年1月 新加坡国立大学商学院 访问学2002年3-5月 纽约大学STERN商学院 访问学者\r\n2002年5-9月 美国国民经济研究局 访问学者","recommend":" ","homeFax":" ","socialOccupation":"","achievements":"主编：\r\n《商业银行经营学》第二版，高教出版社 2004年\r\n《基金管理学》上海三联书店1996、台湾五南图书出版公司1999\r\n《货币银行学》高教出版社 1999\r\n\r\n著作：\r\n《中国货币需求分析》 复旦大学出版社 1995\r\n〈2000中国金融发展报告》 上海财经大学出版社 2000\r\n〈2002中国金融发展报告》 上海财经大学出版社 2002\r\n〈融资方式与融资政策比较》 中国财政经济出版社2002\r\n〈投资基金》 上海译文出版社 2003\r\n《2004中国金融发展报告》 上海财经大学出版社 2004","secname":"","duty":"院长","englishIntroduce":"","sexString":"","idNumber":"310103195206112834","englishMostGraduate":"DOCTOR ","englishWorkingLanguage":"Chinese","englishEducation":"","speciality":"金融理论与实务研究","zipcode":"","englishWorkingExperience":"","englishSex":1,"pwd":"6688 ","nationality":1,"address":" 上海市中山北一路369号,200083","englishAddress":"369,NORTH ZHONGSHAN ROAD","englishSpeciality":"Theory and Pratice of Finance","englishProfessional":"Teaching and Research ","englishCompany":"MBA SCHOOL,SHUFE,","workingExperience":"1968年11月-1997年1月 上海第二织带厂 工人、计划\r\n1983年1月――现在 上海财经大学金融学院 讲师、副教授、教授、博士生导师 ，系副主任、副院长、院长","englishRemark":"","mobileNo":"133162563611"}]}';
		//$list = json_decode($listjson,true);
		$this->assign('ulist',$list);
		//获取国籍
		if(LANG_NAME == 'cn'){
			$nationality = $GLOBALS['nationality'];
		}else{
			$nationality = $GLOBALS['nationality_en'];
		}
		//获取城市
		if(LANG_NAME == 'cn'){
			$city = $GLOBALS['province'];
		}else{
			$city = '';
		}
		//获取最高学历
		if(LANG_NAME == 'cn'){
			$highestschooling = $GLOBALS['highestschooling'];
		}else{
			$highestschooling = '';
		}
		//获取职称
		if(LANG_NAME == 'cn'){
			$nicaltitle = $GLOBALS['nicaltitle'];
		}else{
			$nicaltitle = $GLOBALS['nicaltitle_en'];
		}
		//获取职业分类
		if(LANG_NAME == 'cn'){
			$occclassification = $GLOBALS['occclassification'];
		}else{
			$occclassification = $GLOBALS['occclassification_en'];
		}
		//获取语种
		if(LANG_NAME == 'cn'){
			$languagetype = $GLOBALS['languagetype'];
		}else{
			$languagetype = $GLOBALS['languagetype_en'];
		}
		layout(false);
		$this->assign('nationality',$nationality);
		$this->assign('city',$city);
		$this->assign('highestschooling',$highestschooling);
		$this->assign('nicaltitle',$nicaltitle);
		$this->assign('occclassification',$occclassification);
		$this->assign('languagetype',$languagetype);
		
		$this->display('m');
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
