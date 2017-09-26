<?php
ini_set('memory_limit', '128M');
/**
 * 
 * User(会员管理文件)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2012-10-08 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class ArbitratorAction extends AdminbaseAction {

    public $dao,$userextend,$upurl,$addurl,$photourl;
	function _initialize()
	{
		parent::_initialize();
		$this->dao = D('User');
		$this->userextend = M('User_extend');
		$this->upurl = "http://192.168.1.213/system/arbitratorOutUpdate.action"; //仲裁员更新接口
		$this->addurl = "http://192.168.1.213/system/arbitratorOutSave.action"; //仲裁员新增接口
		$this->photourl = "http://192.168.1.213/system/outSavePic.action"; //仲裁员头像保存
		$this->fileurl = "http://192.168.1.213/system/outSaveFile.action"; //仲裁员附件保存
		$this->counturl = "http://192.168.1.213/system/arbitratorOutListCount.action";  //获取列表数量
		$this->listurl = "http://192.168.1.213/system/arbitratorOutList.action"; //获取列表
		//测试连接
		//$this->upurl = "http://192.168.100.220:8080/cietac/system/arbitratorOutUpdate.action"; //仲裁员更新接口
		//$this->addurl = "http://192.168.100.220:8080/cietac/system/arbitratorOutSave.action"; //仲裁员新增接口
		//$this->photourl = "http://192.168.100.220:8080/cietac/system/outSavePic.action"; //仲裁员头像保存
		
	}

	/**
	 * 仲裁员资料管理（中文站添加）
	 */
	function indexcn(){
		import ( '@.ORG.Page' );
		//搜索字段
		$searchrealname = get_safe_replace($_GET['searchrealname']);
		$searchSex = get_safe_replace($_GET['searchSex']);
		$searchidnumber = get_safe_replace($_GET['searchidnumber']);
		$searchcity = get_safe_replace($_GET['searchcity']);
		$searchoccclassification = get_safe_replace($_GET['searchoccclassification']);
		$searchhighestschooling = get_safe_replace($_GET['searchhighestschooling']);
		$searchlanguagetype = get_safe_replace($_GET['searchlanguagetype']);
		$searchexpertise = get_safe_replace($_GET['searchexpertise']);
		$searchchecked = get_safe_replace($_GET['searchchecked']);
                $searchyear = get_safe_replace($_GET['searchyear']);
                $searchmonth = get_safe_replace($_GET['searchmonth']);

		$this->assign($_GET);
		$where = "u.groupid = 3 and u.lang = 'cn'";
		if(!empty($searchrealname)){
			$where .= " and u.realname like '%$searchrealname%'";
		}
		if(!empty($searchSex)){
			$where .= " and u.sex = $searchSex";
		}
		if(!empty($searchidnumber)){
			$where .= " and u.identityid = '$searchidnumber'";
		}
		if(!empty($searchcity)){
			$where .= " and e.city = '$searchcity'";
		}
		if(!empty($searchoccclassification)){
			$where .= " and e.occclassification = $searchoccclassification";
		}
		if(!empty($searchhighestschooling)){
			$where .= " and e.highestschooling = '$searchhighestschooling'";
		}
		if(!empty($searchlanguagetype)){
			$where .= " and e.firstlang = $searchlanguagetype";
		}
		if(!empty($searchexpertise)){
			$where .= " and e.specialty like '%$searchexpertise%'";
		}
		if(!empty($searchchecked)){
			$where .= " and u.checked = $searchchecked";
		}
                if(!empty($searchyear) && !empty($searchmonth)){
                    $begin_time = strtotime($searchyear.'-'.$searchmonth .'-01 00:00:00');
                    $end_time = strtotime($searchyear.'-'.($searchmonth+1) .'-01 00:00:00');
                    //echo date('Y-m-d H:i:s',$begin_time);
                    //echo date('Y-m-d H:i:s',$end_time);
                    $where .= " and u.createtime >= '{$begin_time}' and u.createtime < '{$end_time}'";
                }elseif(!empty ($searchyear) && empty ($searchmonth)){
                    $begin_time = strtotime($searchyear.'-01-01 00:00:00');
                    $end_time = strtotime(($searchyear+1).'-01-01 00:00:00');
                    //echo date('Y-m-d H:i:s',$begin_time);
                    //echo date('Y-m-d H:i:s',$end_time);
                    $where .= " and u.createtime >= '{$begin_time}' and u.createtime < '{$end_time}'";
                } 
		
// 		if(!empty($keyword) && !empty($searchtype)){
// 			$where .= " and $searchtype like '%$keyword%'";
// 		}
		$user=$this->dao;
		$sqlcount = "select count(*) cnt from mz_user u left join mz_user_extend e on u.id = e.user_id where $where";
		$countarr = $user->query($sqlcount);
		$count = 0;
		if($countarr){
			$count = $countarr[0]['cnt'];
		}
		//$count=$user->where($where)->count();
		$page=new Page($count,20);
		$show=$page->show();
		$this->assign("page",$show);
		$sql = "select u.*,e.company,e.job,e.birthday,e.technicaltitle,e.highestschooling,e.city from mz_user u left join mz_user_extend e on u.id = e.user_id where $where order by id desc limit $page->firstRow,$page->listRows";
		$list = $user->query($sql);
		//$list=$user->order('id')->where($where)
		//->limit($page->firstRow.','.$page->listRows)->select();
		//获取城市
		$city = $GLOBALS['province'];
		$occclassification = $GLOBALS['occclassification'];
		$nicaltitle = $GLOBALS['nicaltitle'];
		$highestschooling = $GLOBALS['highestschooling'];
		$languagetype = $GLOBALS['languagetype'];
		$this->assign("city",$city);
                $now_year = date('Y');
                for($y=$now_year;$y>=2000;$y--){
                    $year[] = (int)$y;
                }
                for($mon=1;$mon<=12;$mon++){
                    $month[] = $mon;
                }
                $this->assign("year",$year);
                $this->assign("month",$month);
		$this->assign("occclassification",$occclassification);
		$this->assign("highestschooling",$highestschooling);
		$this->assign("languagetype",$languagetype);
		$this->assign("nicaltitle",$nicaltitle);
		$this->assign('ulist',$list);
		$this->display();
	}
	
	/**
	 * 仲裁员资料管理（英文站添加）
	 */
	function indexen(){
		import ( '@.ORG.Page' );
		//搜索字段
		$searchrealname = get_safe_replace($_GET['searchrealname']);
		$searchSex = get_safe_replace($_GET['searchSex']);
		$searchidnumber = get_safe_replace($_GET['searchidnumber']);
		$searchcity = get_safe_replace($_GET['searchcity']);
		$searchoccclassification = get_safe_replace($_GET['searchoccclassification']);
		$searchhighestschooling = get_safe_replace($_GET['searchhighestschooling']);
		$searchlanguagetype = get_safe_replace($_GET['searchlanguagetype']);
		$searchexpertise = get_safe_replace($_GET['searchexpertise']);
		$searchchecked = get_safe_replace($_GET['searchchecked']);
                $searchyear = get_safe_replace($_GET['searchyear']);
                $searchmonth = get_safe_replace($_GET['searchmonth']);
	
		$this->assign($_GET);
		$where = "u.groupid = 3 and u.lang = 'en'";
		if(!empty($searchrealname)){
			$where .= " and u.realname like '%$searchrealname%'";
		}
		if(!empty($searchSex)){
			$where .= " and u.sex = $searchSex";
		}
		if(!empty($searchidnumber)){
			$where .= " and u.identityid = '$searchidnumber'";
		}
		if(!empty($searchcity)){
			$where .= " and e.city = '$searchcity'";
		}
		if(!empty($searchoccclassification)){
			$where .= " and e.occclassification = $searchoccclassification";
		}
		if(!empty($searchhighestschooling)){
			$where .= " and e.highestschooling = '$searchhighestschooling'";
		}
		if(!empty($searchlanguagetype)){
			$where .= " and e.firstlang = $searchlanguagetype";
		}
		if(!empty($searchexpertise)){
			$where .= " and e.specialty like '%$searchexpertise%'";
		}
		if(!empty($searchchecked)){
			$where .= " and u.checked = $searchchecked";
		}
                if(!empty($searchyear) && !empty($searchmonth)){
                    $begin_time = strtotime($searchyear.'-'.$searchmonth .'-01 00:00:00');
                    $end_time = strtotime($searchyear.'-'.($searchmonth+1) .'-01 00:00:00');
                    //echo date('Y-m-d H:i:s',$begin_time);
                    //echo date('Y-m-d H:i:s',$end_time);
                    $where .= " and u.createtime >= '{$begin_time}' and u.createtime < '{$end_time}'";
                }elseif(!empty ($searchyear) && empty ($searchmonth)){
                    $begin_time = strtotime($searchyear.'-01-01 00:00:00');
                    $end_time = strtotime(($searchyear+1).'-01-01 00:00:00');
                    //echo date('Y-m-d H:i:s',$begin_time);
                    //echo date('Y-m-d H:i:s',$end_time);
                    $where .= " and u.createtime >= '{$begin_time}' and u.createtime < '{$end_time}'";
                } 
		$user=$this->dao;
		$sqlcount = "select count(*) cnt from mz_user u left join mz_user_extend e on u.id = e.user_id where $where";
		$countarr = $user->query($sqlcount);
		$count = 0;
		if($countarr){
			$count = $countarr[0]['cnt'];
		}
		//$count=$user->where($where)->count();
		$page=new Page($count,20);
		$show=$page->show();
		$this->assign("page",$show);
		$sql = "select u.*,e.company,e.job,e.birthday,e.technicaltitle,e.highestschooling,e.city from mz_user u left join mz_user_extend e on u.id = e.user_id where $where order by id desc limit $page->firstRow,$page->listRows";
		$list = $user->query($sql);
		//$list=$user->order('id')->where($where)
		//->limit($page->firstRow.','.$page->listRows)->select();
		//获取城市
		$city = $GLOBALS['province'];
		$occclassification = $GLOBALS['occclassification_en'];
		$highestschooling = $GLOBALS['highestschooling'];
		$languagetype = $GLOBALS['languagetype_en'];
		$nicaltitle = $GLOBALS['nicaltitle_en'];
		$this->assign("occclassification",$occclassification);
		$this->assign("languagetype",$languagetype);
		$this->assign("nicaltitle",$nicaltitle);
		$this->assign('ulist',$list);
                $now_year = date('Y');
                for($y=$now_year;$y>=2000;$y--){
                    $year[] = (int)$y;
                }
                for($mon=1;$mon<=12;$mon++){
                    $month[] = $mon;
                }
                $this->assign("year",$year);
                $this->assign("month",$month);
		$this->display();
	}
	
	function detail(){
		$id=$_GET['id'];
		$user=$this->dao;
		$userbaseinfo = $user->find($id);
		$userextendinfo = $this->userextend->where("user_id = $id")->select();
		if($userextendinfo){
			$userextendinfo = $userextendinfo[0];
		}else{
			$userextendinfo = array();
		}
		//将语言能力反序列化
		$firstlanvalue = '';
		if($userextendinfo['firstvalue']){
			$firstlanvalue = unserialize($userextendinfo['firstvalue']);
		}
		$twolanvalue = '';
		if($userextendinfo['twovalue']){
			$twolanvalue = unserialize($userextendinfo['twovalue']);
		}
		$this->assign('firstlanvalue',$firstlanvalue);
		$this->assign('twolanvalue',$twolanvalue);
		//获取国籍
		if($userextendinfo['lang'] == 'cn'){
			$nationality = $GLOBALS['nationality'];
		}else{
			$nationality = $GLOBALS['nationality_en'];
		}
		//获取城市
		if($userextendinfo['lang'] == 'cn'){
			$city = $GLOBALS['province'];
		}else{
			$city = '';
		}
		//获取最高学历
		if($userextendinfo['lang'] == 'cn'){
			$highestschooling = $GLOBALS['highestschooling'];
		}else{
			$highestschooling = '';
		}
		//获取职称
		if($userextendinfo['lang'] == 'cn'){
			$nicaltitle = $GLOBALS['nicaltitle'];
		}else{
			$nicaltitle = $GLOBALS['nicaltitle_en'];
		}
		//获取职业分类
		if($userextendinfo['lang'] == 'cn'){
			$occclassification = $GLOBALS['occclassification'];
		}else{
			$occclassification = $GLOBALS['occclassification_en'];
		}
		//获取语种
		if($userextendinfo['lang'] == 'cn'){
			$languagetype = $GLOBALS['languagetype'];
		}else{
			$languagetype = $GLOBALS['languagetype_en'];
		}
		//语言能力
		if($userextendinfo['lang'] == 'cn'){
			$lantype = array(1=>'优', 2=>'良', 3=>'一般');
		}else{
			$lantype = array(1=>'Excellent', 2=>'Good', 3=>'Average');
		}
		
		//调取修改后的log数据
		if($userbaseinfo['checked'] == 1){
			$userlog = M('User_log');
			$usereditlog = $userlog->where("user_id = $id")->select();
			if($usereditlog){
				$usereditarr = json_decode($usereditlog[0]['content'],true);
				//将语言能力反序列化
				$logfirstlanvalue = '';
				if($usereditarr['firstvalue']){
					$logfirstlanvalue = unserialize($usereditarr['firstvalue']);
				}
				$logtwolanvalue = '';
				if($usereditarr['twovalue']){
					$logtwolanvalue = unserialize($usereditarr['twovalue']);
				}
				$this->assign('logfirstlanvalue',$logfirstlanvalue);
				$this->assign('logtwolanvalue',$logtwolanvalue);
				$this->assign('logusereditarr',$usereditarr);
			}
		}
		
		
		$this->assign("userextendinfo",$userextendinfo);
		$this->assign('nationality',$nationality);
		$this->assign('city',$city);
		$this->assign('highestschooling',$highestschooling);
		$this->assign('nicaltitle',$nicaltitle);
		$this->assign('occclassification',$occclassification);
		$this->assign('languagetype',$languagetype);
		$this->assign("userbaseinfo",$userbaseinfo);
		$this->assign('lantype',$lantype);
		if($userbaseinfo['checked'] == 1 && $usereditarr){
			$this->display('checkpage');
		}else{
			$this->display();
		}
		
	}

	function checkpage(){
		$id = intval($_GET['id']);
		$this->assign("uid",$id);
		$this->display();
	}

	/**
	 * 信息预览
	 */
	function review(){
		$userid=(int)$_GET['id'];
		if(empty($userid)){
			return ;
		}
		$user = $this->dao->find($userid);
		$this->assign('vo',$user);
		$userextendInfo = $this->userextend->where("user_id ='{$userid}'")->select();
		if($userextendInfo){
			$userextendInfo = $userextendInfo[0];
		}else{
			$userextendInfo = array();
		}
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
		//输入字数配置
		if(LANG_NAME == 'cn'){
			$fontnum = 1500;
			$fontnum1 = 100;
			$fontnum3 = 200;
		}else{
			$fontnum = 3000;
			$fontnum1 = 200;
			$fontnum3 = 400;
		}
		//将语言能力反序列化
		if($userextendInfo){
			$firstlanvalue = '';
			if($userextendInfo['firstvalue']){
				$firstlanvalue = unserialize($userextendInfo['firstvalue']);
			}
			$twolanvalue = '';
			if($userextendInfo['twovalue']){
				$twolanvalue = unserialize($userextendInfo['twovalue']);
			}
			$this->assign('firstlanvalue',$firstlanvalue);
			$this->assign('twolanvalue',$twolanvalue);
		}
		$this->assign('userextendInfo',$userextendInfo);
		$this->assign('nationality',$nationality);
		$this->assign('city',$city);
		$this->assign('highestschooling',$highestschooling);
		$this->assign('nicaltitle',$nicaltitle);
		$this->assign('occclassification',$occclassification);
		$this->assign('fontnum',$fontnum);
		$this->assign('fontnum1',$fontnum1);
		$this->assign('fontnum3',$fontnum3);
		$this->assign('languagetype',$languagetype);
		$this->display();
		//$this->display('Index:pro');

	}


	/**
	 * 信息预览
	 */
	function preview(){
		$userid=(int)$_GET['id'];
		if(empty($userid)){
			return ;
		}
		$user = $this->dao->find($userid);
		$this->assign('vo',$user);
		$userextendInfo = $this->userextend->where("user_id ='{$userid}'")->select();
		if($userextendInfo){
			$userextendInfo = $userextendInfo[0];
		}else{
			$userextendInfo = array();
		}
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
		//输入字数配置
		if(LANG_NAME == 'cn'){
			$fontnum = 1500;
			$fontnum1 = 100;
			$fontnum3 = 200;
		}else{
			$fontnum = 3000;
			$fontnum1 = 200;
			$fontnum3 = 400;
		}
		//将语言能力反序列化
		if($userextendInfo){
			$firstlanvalue = '';
			if($userextendInfo['firstvalue']){
				$firstlanvalue = unserialize($userextendInfo['firstvalue']);
			}
			$twolanvalue = '';
			if($userextendInfo['twovalue']){
				$twolanvalue = unserialize($userextendInfo['twovalue']);
			}
			$this->assign('firstlanvalue',$firstlanvalue);
			$this->assign('twolanvalue',$twolanvalue);
		}
		$this->assign('userextendInfo',$userextendInfo);
		$this->assign('nationality',$nationality);
		$this->assign('city',$city);
		$this->assign('highestschooling',$highestschooling);
		$this->assign('nicaltitle',$nicaltitle);
		$this->assign('occclassification',$occclassification);
		$this->assign('fontnum',$fontnum);
		$this->assign('fontnum1',$fontnum1);
		$this->assign('fontnum3',$fontnum3);
		$this->assign('languagetype',$languagetype);
		$this->display();
		//$this->display('Index:pro');

	}

	function check(){
		$user=$this->dao;
		$uid = intval($_POST['id']);
		if(empty($uid)){
			$this->error("参数错误");
		}
		//基本信息
		$userbaseinfo = $user->find($uid);
		if(empty($userbaseinfo)){
			$this->error("仲裁员不存在");
		}
		$languagetype = $GLOBALS['languagetype'];
		$languagetype_en = $GLOBALS['languagetype_en'];

		$nicaltitle = $GLOBALS['nicaltitle'];
		//申请信息
		$userextendinfo = $this->userextend->where("user_id = $uid")->select();
		$updata = array();
		if(isset($_POST['checkok'])){
			if($userbaseinfo['lang'] == 'cn'){
				//加接口数据
				$cdata = array(
					'arbitrator.arbitratorName' => $userbaseinfo['realname'],   //姓名
					'arbitrator.mobileNo' 		=> $userbaseinfo['mobile'],     //手机
					'arbitrator.homePhone' 	    => $userextendinfo[0]['familytel'],    //家庭电话
					'arbitrator.homeFax' 		=> $userextendinfo[0]['familyfax'],    //家庭传真
					'arbitrator.phone' 			=> $userextendinfo[0]['worktel'],      //电话
					'arbitrator.fax' 			=> $userextendinfo[0]['workfax'],      //传真
					'arbitrator.email' 			=> $userextendinfo[0]['electronicmail'],  //电子信箱
					'arbitrator.idNumber' 		=> $userextendinfo[0]['identityid'],  //身份证号
					'arbitrator.birthday' 		=> $userextendinfo[0]['birthday'],    //出生日期
					'arbitrator.professional' 	=> $userextendinfo[0]['occclassification'],  //职业
					'arbitrator.workingLanguage'=> $languagetype[$userextendinfo[0]['firstlang']].' '.$languagetype[$userextendinfo[0]['twolang']],  //所会语言
					'arbitrator.speciality' 	=> $userextendinfo[0]['specialty'],  //专长
					'arbitrator.education' 		=> $userextendinfo[0]['edubackground'],  //教育背景
					'arbitrator.sex' 			=> $userextendinfo[0]['sex'],  //性别
					'arbitrator.achievements' 	=> $userextendinfo[0]['professresults'],  //业务成果
					'arbitrator.socialOccupation' => $userextendinfo[0]['partjob'],    //社会团体兼职情况
					'arbitrator.rltArbExperience' => $userextendinfo[0]['arbitexperience'],  //仲裁相关经历
					'arbitrator.validAddress' 	=> $userextendinfo[0]['validaddress'],   //有效通信地址
					'arbitrator.homeAddress' 	=> $userextendinfo[0]['familyaddress'],  //家庭邮编
					'arbitrator.address' 		=> $userextendinfo[0]['companyaddress'], //单位地址
					'arbitrator.company' 		=> $userextendinfo[0]['company'],        //单位
					'arbitrator.city' 			=> $userextendinfo[0]['city'],           //所在城市
					'arbitrator.mostGraduate' 	=> $userextendinfo[0]['highestschooling'],  //最高学历
					'arbitrator.workingExperience' 	=> $userextendinfo[0]['workexperience'],  //工作经历
					'arbitrator.duty' 			=> $userextendinfo[0]['job'],    //职务
					'arbitrator.surname' 		=> $userextendinfo[0]['surname'],  //姓
					'arbitrator.givenName' 		=> $userextendinfo[0]['name'],   //名
					'arbitrator.introduce' 		=> $userextendinfo[0]['introduction'],  //自我介绍
					'arbitrator.dutyTitle' 		=> $nicaltitle[$userextendinfo[0]['technicaltitle']],  //职称
					'arbitrator.nationality' 	=> $userextendinfo[0]['nationalityid'],   //国籍
					'arbitrator.recommend' 		=> $userextendinfo[0]['recommend'],       //推荐人
					'arbitrator.branchID' 		=> 1
				);
			}else{
				//加接口数据
				$cdata = array(
					'arbitrator.englishArbitratorName' => $userbaseinfo['realname'],   //姓名
					'arbitrator.mobileNo' 		=> $userbaseinfo['mobile'],     //手机
					'arbitrator.homePhone' 	    => $userextendinfo[0]['familytel'],    //家庭电话
					'arbitrator.homeFax' 		=> $userextendinfo[0]['familyfax'],    //家庭传真
					'arbitrator.phone' 			=> $userextendinfo[0]['worktel'],      //电话
					'arbitrator.fax' 			=> $userextendinfo[0]['workfax'],      //传真
					'arbitrator.email' 			=> $userextendinfo[0]['electronicmail'],  //电子信箱
					'arbitrator.idNumber' 		=> $userextendinfo[0]['identityid'],  //身份证号
					'arbitrator.birthday' 		=> $userextendinfo[0]['birthday'],    //出生日期
					'arbitrator.englishProfessional' 	=> $userextendinfo[0]['occclassification'],  //职业
					'arbitrator.englishWorkingLanguage'=> $languagetype_en[$userextendinfo[0]['firstlang']].' '.$languagetype_en[$userextendinfo[0]['twolang']],  //所会语言
					'arbitrator.englishSpeciality' 	=> $userextendinfo[0]['specialty'],  //专长
					'arbitrator.englishEducation' 		=> $userextendinfo[0]['edubackground'],  //教育背景
					'arbitrator.englishSex' 			=> $userextendinfo[0]['sex'],  //性别
					'arbitrator.englishAchievements' 	=> $userextendinfo[0]['professresults'],  //业务成果
					'arbitrator.englishSocialOccupation' => $userextendinfo[0]['partjob'],    //社会团体兼职情况
					'arbitrator.englishRltArbExperience' => $userextendinfo[0]['arbitexperience'],  //仲裁相关经历
					'arbitrator.englishValidAddress' 	=> $userextendinfo[0]['validaddress'],   //有效通信地址
					'arbitrator.englishHomeAddress' 	=> $userextendinfo[0]['familyaddress'],  //家庭邮编
					'arbitrator.englishAddress' 		=> $userextendinfo[0]['companyaddress'], //单位地址
					'arbitrator.englishCompany' 		=> $userextendinfo[0]['company'],        //单位
					'arbitrator.englishCity' 			=> $userextendinfo[0]['city'],           //所在城市
					'arbitrator.englishMostGraduate' 	=> $userextendinfo[0]['highestschooling'],  //最高学历
					'arbitrator.englishWorkingExperience' 	=> $userextendinfo[0]['workexperience'],  //工作经历
					'arbitrator.englishDuty' 			=> $userextendinfo[0]['job'],    //职务
					'arbitrator.englishSurname' 		=> $userextendinfo[0]['surname'],  //姓
					'arbitrator.englishGivenName' 		=> $userextendinfo[0]['name'],   //名
					'arbitrator.englishIntroduce' 		=> $userextendinfo[0]['introduction'],  //自我介绍
					//'arbitrator.englishDutyTitle' 		=> $userextendinfo[0]['technicaltitle'],  //职称
					'arbitrator.englishNationality' 	=> $userextendinfo[0]['nationalityid'],   //国籍
					//'arbitrator.recommend' 		=> urlencode($userextendinfo[0]['recommend']),       //推荐人
					'arbitrator.branchID' 		=> 1
				);
			}
			if($userbaseinfo['arbitratorid'] > 0){
				//修改
				$upurl = $this->upurl;
				$cdata['arbitrator.arbitratorId'] = $userbaseinfo['arbitratorid'];
				$rs = curl_post($upurl,$cdata);
				//保存仲裁员头像
				$photourl = $this->photourl;
				//读取图片文件，转换成base64编码格式
				if($userextendinfo[0]['photo']){
					$image_file = '.'.$userextendinfo[0]['photo'];
					//$image_info = getimagesize($image_file);
					//print_r($image_info);exit;
					//$base64_image_content = "data:{$image_info['mime']};base64," . chunk_split(base64_encode(file_get_contents($image_file)));
					$base64_image_content = base64_encode(file_get_contents($image_file));
					$photodata = array(
							'id' => $userbaseinfo['arbitratorid'],
							'picBase64' => $base64_image_content,  //头像
					);
					curl_post($photourl,$photodata);
				}
				if($userextendinfo[0]['attachment']){
					$attachment_file = '.'.$userextendinfo[0]['attachment'];
					$att_type = explode("/", $userextendinfo[0]['attachment']);
					$base64_attachment_content = base64_encode(file_get_contents($attachment_file));
					$attachmentdata = array(
							'id' => $userbaseinfo['arbitratorid'],
							'fileBase64' => $base64_attachment_content,  //附件
							'attachName' => $att_type[4]    //附件名称
					);
					curl_post($this->fileurl,$attachmentdata);
				}
				if(isset($rs['error']) && !empty($rs['error'])){
					$this->error("推送办案系统出错!");
				}
			}else{
				//新增
				$addurl = $this->addurl;
				$rs = curl_post($addurl,$cdata);
				if(isset($rs['result']) && !empty($rs['result'])){
					$usidarr = json_decode($rs['result'],true);
					if(isset($usidarr['userID'])){
						//回写仲裁员id
						$arbitratorid = intval($usidarr['userID']);
						$ardata = array();
						$ardata['arbitratorid'] = $arbitratorid;
						if(false === $user->where("id = $uid")->save($ardata)){
							$this->error("推送办案系统出错!");
						}
						//保存仲裁员头像
						$photourl = $this->photourl;
						//读取图片文件，转换成base64编码格式
						if($userextendinfo[0]['photo']){
							$image_file = '.'.$userextendinfo[0]['photo'];
							//$image_info = getimagesize($image_file);
							//print_r($image_info);exit;
							//$base64_image_content = "data:{$image_info['mime']};base64," . chunk_split(base64_encode(file_get_contents($image_file)));
							$base64_image_content = base64_encode(file_get_contents($image_file));
							$photodata = array(
								'id' => $arbitratorid,
								'picBase64' => $base64_image_content,
							);
							curl_post($photourl,$photodata);
						}

						if($userextendinfo[0]['attachment']){
							$attachment_file = '.'.$userextendinfo[0]['attachment'];
							$att_type = explode("/", $userextendinfo[0]['attachment']);
							$base64_attachment_content = base64_encode(file_get_contents($attachment_file));
							$attachmentdata = array(
									'id' => $arbitratorid,
									'fileBase64' => $base64_attachment_content,  //附件
									'attachName' => $att_type[4]    //附件名称
							);
							curl_post($this->fileurl,$attachmentdata);
						}
						
					}else{
						$this->error("推送办案系统出错!");
					}
				}else{
					$this->error("推送办案系统出错!");
				}
			}
			$updata['checked'] = 2;
		}else{
			$updata['checked'] = 3;
		}
		
		if(false!==$user->where("id = $uid")->save($updata)){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
		 
	}


	function delete(){
		$id=$_GET['id'];
		$user=$this->dao;
		if(false!==$user->delete($id)){
			$roleuser=M('RoleUser');
			$roleuser->where('user_id ='.$id)->delete();
			delattach(array('moduleid'=>0,'catid'=>0,'id'=>0,'userid'=>$id));
			$this->userextend->where('user_id ='.$id)->delete();
			$this->success(L('delete_ok'));
		}else{
			$this->error(L('delete_error').$user->getDbError());
		}
	}

	function deleteall(){		
		$ids=$_POST['ids'];
		if(!empty($ids) && is_array($ids)){
			$user=$this->dao;
			$id=implode(',',$ids);
			if(false!==$user->delete($id)){
				$roleuser=M('RoleUser');
				$roleuser->where('user_id in('.$id.')')->delete();
				delattach("moduleid=0 and catid=0 and id=0 and userid in($id)");
				$this->userextend->where('user_id in('.$id.')')->delete();
				$this->success(L('delete_ok'));
			}else{
				$this->error(L('delete_error'));
			}
		}else{
			$this->error(L('do_empty'));
		}
	}

	public function syncdata(){
		$realname = $_GET['realname'];
		$usermodel = M('User');
		$userextendmodel = M('User_extend');
		if($realname){
			$where .= "&arbitratorCondition.searchArbitratorName=".urlencode($realname);
		}
		$counturl = $this->counturl."?arbitratorCondition.branchID=1".$where;
		$listurl = $this->listurl."?arbitratorCondition.branchID=1".$where;

 		$countjson = curl_get($counturl);
 		if(isset($countjson['result']) && !empty($countjson['result'])){
 			$countarr = json_decode($countjson['result'],true);
 		}

 		$count = 0;
 		if($countarr && isset($countarr['arbitratorCount'])){
 			$count = $countarr['arbitratorCount'];
 		}
 		if($count){
 			$totalpage = ceil($count/100);
 			for($i=1; $i<=$totalpage; $i++){
 				$listgeturl = $listurl."&pageBean.pageline=100&pageBean.cpage=".$i;
				$listjson = curl_get($listgeturl);
				if(isset($listjson['result']) && !empty($listjson['result'])){
					$listarr = json_decode($listjson['result'],true);
				}
				// $listjson = '{"arbitrator":[{"englishHomeAddress":"288-1-2101 WESTE HUAIHAIROAD","englishRltArbExperience":"","phone":"021-65367581","englishDuty":"","arbitratorName":"戴国强","englishSocialOccupation":"","specificMode":"","remark":"","introduce":"","surname":"戴 ","courtUserID":0,"listIds":[],"homePhone":" ","city":"上海","arbitratorId":0,"homeAddress":" 上海市淮海西路288弄1号2101室","userId":5002,"englishDutyTitle":"Professor","nationalityName":"","englishAchievements":"","rltArbExperience":"","englishNationality":"CHINA","englishLetterId":0,"fax":"021-65367581 ","letterId":0,"status":"","dutyTitle":"教授","onPanelString":"","mostGraduate":"1 ","mainAddress":0,"homeZipcode":"","professional":"","arbitratorNo":550,"branchID":0,"email":"gqdai9@yahoo.com.cn","englishMainAddress":"","englishGivenName":"Guoqiang ","company":"上海财经大学MBA学院","validAddress":"上海市中山北一路369号 ","userAccount":"","englishCity":"Shanghai","birthday":"1952-06-11","englishSurname":"Dai ","workingLanguage":"中文","sex":1,"englishArbitratorName":"Dai Guoqiang","modifyType":0,"englishValidAddress":"369,NORTH ZHONGSHAN ROAD ","state":0,"englishOnPanel":0,"onPanel":1,"givenName":"国强 ","dictionaryItemName":"中国","education":"1983年1月 上海财经学院财金系 获经济学学士学位\r\n1987年7月 上海财经大学金融系 获经济学硕士学位\r\n1994年7月 复旦大学国际金融系 获经济学博士学位\r\n1997年2-3月 香港城市大学商学部 访问学者\r\n1997年10月-1998年1月 新加坡国立大学商学院 访问学2002年3-5月 纽约大学STERN商学院 访问学者\r\n2002年5-9月 美国国民经济研究局 访问学者","recommend":" ","homeFax":" ","socialOccupation":"","achievements":"主编：\r\n《商业银行经营学》第二版，高教出版社 2004年\r\n《基金管理学》上海三联书店1996、台湾五南图书出版公司1999\r\n《货币银行学》高教出版社 1999\r\n\r\n著作：\r\n《中国货币需求分析》 复旦大学出版社 1995\r\n〈2000中国金融发展报告》 上海财经大学出版社 2000\r\n〈2002中国金融发展报告》 上海财经大学出版社 2002\r\n〈融资方式与融资政策比较》 中国财政经济出版社2002\r\n〈投资基金》 上海译文出版社 2003\r\n《2004中国金融发展报告》 上海财经大学出版社 2004","secname":"","duty":"院长","englishIntroduce":"","sexString":"","idNumber":"310103195206112834","englishMostGraduate":"DOCTOR ","englishWorkingLanguage":"Chinese","englishEducation":"","speciality":"金融理论与实务研究","zipcode":"","englishWorkingExperience":"","englishSex":1,"pwd":"6688 ","nationality":1,"address":" 上海市中山北一路369号,200083","englishAddress":"369,NORTH ZHONGSHAN ROAD","englishSpeciality":"Theory and Pratice of Finance","englishProfessional":"Teaching and Research ","englishCompany":"MBA SCHOOL,SHUFE,","workingExperience":"1968年11月-1997年1月 上海第二织带厂 工人、计划\r\n1983年1月――现在 上海财经大学金融学院 讲师、副教授、教授、博士生导师 ，系副主任、副院长、院长","englishRemark":"","mobileNo":"133162563611"}]}';
				// $listarr = json_decode($listjson, true);
				if($listarr && isset($listarr['arbitrator'])){
					$sql = "";
					foreach($listarr['arbitrator'] as $value){
						$realname = $value['arbitratorName'];
						$userInfo = $usermodel->where("realname = '{$realname}'")->find();

						$useracc = $value['userAccount'];
						$useraccount = $usermodel->where("username = '{$useracc}'")->find();
						if(!empty($value['userAccount']) && empty($userInfo) && empty($useraccount)){
							$data=array();
							$data['groupid'] = 3;
							$data['website'] = 1;
					        $data['lang']= 'cn';
					        $data['username']= $value['userAccount'];
					        $data['password'] = sysmd5(82217788);
					        $data['email']=$value['email'];
					        $data['realname']= $value['arbitratorName'];
					        $data['card_type'] = 1;
					        $data['identityid']= $value['idNumber'];
					        $data['question'] = '';
					        $data['answer'] = '';
					        $data['sex']  = $value['sex'];
					        $data['tel']  = $value['homePhone'];
					        $data['mobile'] = $value['mobileNo'];
					        $data['fax']	= $value['fax'];
					        $data['login_count']=1;
					        $data['createtime']=time();
					        $data['updatetime']=time();
					        $data['last_logintime']=0;
					        $data['status']=1;
					        $data['checked'] = 2;
					        $data['arbitratorid'] = $value['userId'];

					        if($r=$usermodel->create($data)){
					            if(false!==$usermodel->add()){
					            	//获取头像
					            	$photo = '';
					            	if($value['englishMainAddress']){
					            		$photo = $this->getPhoto($value['englishMainAddress']);
					            	}
					            	//end
					            	$uid=$usermodel->getLastInsID();
					            	$dataextend=array();
					            	$dataextend['user_id']= $uid;
						        	$dataextend['lang']= 'cn';
						        	$dataextend['realname']= $value['arbitratorName'];
						        	$dataextend['sex']= $value['sex'];  
									$dataextend['photo'] = $photo;
						        	$dataextend['surname']= $value['surname'];
						        	$dataextend['name']= $value['givenName'];
						        	$dataextend['familytel'] = $value['homePhone'];
						        	$dataextend['familyfax'] = $value['homeFax'];
						        	$dataextend['nationalityid'] = $value['nationality'];
						        	$dataextend['twonationality'] = '';
						        	$dataextend['identityid'] = $value['idNumber'];
						        	$dataextend['birthday'] = $value['birthday'];
						        	$dataextend['city'] = $value['city'];
						        	$dataextend['highestschooling'] = $value['mostGraduate'];
						        	$dataextend['technicaltitle'] = $value['dutyTitle'];
						        	$dataextend['occclassification'] = $value['professional'];
						        	$dataextend['identitycategory'] = 2;
						            $dataextend['company']= $value['company'];
						            $dataextend['job']= $value['duty'];
						            $dataextend['companyaddress']= $value['address'];
						            $dataextend['familyaddress']= $value['homeAddress'];
						            $dataextend['validaddress'] = $value['validAddress'];
						            $dataextend['electronicmail'] = $value['email'];
						            $dataextend['worktel'] = $value['phone'];
						            $dataextend['workfax'] = $value['fax'];
						            $dataextend['mobile'] = $value['mobileNo'];
						            $dataextend['edubackground'] = $value['education'];
						            $dataextend['workexperience']= $value['workingExperience'];
						            $dataextend['arbitexperience']= $value['rltArbExperience'];
						            $dataextend['partjob']= $value['socialOccupation'];
						            $dataextend['specialty']= $value['speciality'];
						            $dataextend['professresults']= $value['achievements'];
						            //$dataextend['firstlang']= $value['workingExperience'];
						            $dataextend['firstvalue'] = '';
						            $dataextend['twolang']= 0;
						            $dataextend['twovalue']= '';
						            $dataextend['introduction'] = $value['introduce'];
						            $dataextend['train'] = '';
						            $dataextend['recommend'] = $value['recommend'];
						            $dataextend['remarks'] = '';
						            $dataextend['updatetime'] = time();
					        		if($rs = $userextendmodel->create($dataextend)){
					        			if(false !== $userextendmodel->add()){
					        				echo $value['arbitratorName']."添加成功<br/>";
					        			}else{
					        				$this->error($userextendmodel->getError());
					        			}
					        		}else{
					        			$this->error($userextendmodel->getError());
					        		}
					            }else{
					                $this->error($usermodel->getError());
					            }
					        }else{
					            $this->error($usermodel->getError());
					        }
						}
					}
				}
 			}
 			echo '完成!';
 		}else{
 			echo '无数据';
 		}
	}
}
?>