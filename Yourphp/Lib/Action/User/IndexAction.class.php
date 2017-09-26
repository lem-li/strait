<?php
/**
 * 
 * User/IndexAction.class.php (前台会员中心模块)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2012-10-08 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class IndexAction extends BaseAction
{

	function _initialize()
    {	
		parent::_initialize();
		if(!$this->_userid){
			$this->assign('jumpUrl',U('User/Login/index'));
			$this->error(L('nologin'));
			exit;
		}
		$this->dao = M('User');
		$this->assign('bcid',0);
		$user = $this->dao->find($this->_userid);
		$this->assign('vo',$user);
		$this->userextend = M('User_extend');
		unset($_POST['status']);
		unset($_POST['groupid']);
		unset($_POST['amount']);
		unset($_POST['point']);
		$_GET =get_safe_replace($_GET);
    }

    public function index()
    {
        $this->display();
    }
	
	public function profile()
    {	 
    	$userextendInfo = $this->userextend->where("user_id = $this->_userid")->select();
    	if($userextendInfo){
    		$userextendInfo = $userextendInfo[0];
    	}else{
    		$userextendInfo = array();
    	}
		if($_POST['dosubmit']){
			$_POST['id']=$this->_userid;
			$postdata = get_safe_replace($_POST);
			if(empty($postdata['realname']) || empty($postdata['surname']) || empty($postdata['name']) || empty($postdata['nationalityid']) || empty($postdata['identityid']) || empty($postdata['birthday']) || empty($postdata['city']) || empty($postdata['highestschooling']) || empty($postdata['technicaltitle']) || empty($postdata['occclassification']) || empty($postdata['email']) || empty($postdata['validaddress']) || empty($postdata['mobile'])){
				$this->error(L('ERROR_IS_EMPTY'));
			}
			// if(!preg_match("/^[A-Za-z0-9]{18}$|^[A-Za-z0-9]{15}$/",$postdata['identityid'])){
			// 	$this->error(L('IDCARD_RULE'));
			// }
			//if(!preg_match("/^[a-z0-9]+[._\-\+]*@([a-z0-9]+[-a-z0-9]*\.)+[a-z0-9]+$/",$postdata['email'])){
			//	$this->error(L('EMAIL_RULE'));
			//}
			//if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+$/",$postdata['email'])){
			//	$this->error(L('EMAIL_RULE'));
			//}
			// if(!preg_match("/^1[345789]\d{9}$/",$postdata['mobile'])){
			// 	$this->error(L('MOBILE_RULE'));
			// }
			//处理头像
			$image_type = array("image/jpeg", "image/jpg", "image/png", "image/bmp", "image/pjpeg", "image/x-png");
			$photourl = '';
			
			if(!empty($_FILES['photos']) && $_FILES['photos']['error'] !== 4){
				if(!in_array($_FILES['photos']['type'], $image_type)){
					$this->error(L('error_pictype'));
				}
				$photosize = abs(filesize($_FILES['photos']['tmp_name']));
				//不大于1M
				if($photosize > 1024*1024){
					$this->error(L('error_picsize'));
				}
				//$photo_size = getimagesize($_FILES['photos']['tmp_name']);
				//上传路径
				$uploadpath = UPLOAD_PATH."photo/".date("Ym",time());
				if(!is_dir($uploadpath)){
					mkdir($uploadpath,0777);
				}
				$pathinfo = pathinfo($_FILES['photos']['name']);
				$extension = $pathinfo['extension'];
				$photonewfile = $uploadpath.'/'.uniqid().'.'.$extension;
				$result = move_uploaded_file($_FILES["photos"]["tmp_name"],$photonewfile);
				if($result){
					$photourl = substr($photonewfile, 1);
				}else{
					$this->error(L('error_upload_fail'));
				}
			}

			//处理附件
            $file_type = array("application/msword",'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            $attachmenturl = '';
            if(!empty($_FILES['attachment']) && $_FILES['attachment']['error'] !== 4){
                if(!in_array($_FILES['attachment']['type'], $file_type)){
                    $this->error(L('ATTACHMENT_ERROR'));
                }
                //上传路径
                $uploadpath = UPLOAD_PATH."attachment/".date("Ym",time());
                if(!is_dir($uploadpath)){
                    mkdir($uploadpath,0777);
                }
                $pathinfo = pathinfo($_FILES['attachment']['name']);
                $extension = $pathinfo['extension'];
                $attachmentnewfile = $uploadpath.'/'.uniqid().'.'.$extension;
                $result = move_uploaded_file($_FILES["attachment"]["tmp_name"],$attachmentnewfile);
                //var_dump($result);var_dump($attachmentnewfile);exit;
                if($result){
                    $attachmenturl = substr($attachmentnewfile, 1);
                }else{
                    $this->error(L('error_upload_fail'));
                }
            }
			//$status = $this->member_config['member_registecheck'] ? 0 : 1;
			$status = 1;
			//先更新主表
			$userdata = array();
			$userdata['email'] = $postdata['email'];
			$userdata['realname'] = $postdata['realname'];
			$userdata['card_type'] = isset($postdata['card_type']) ? $postdata['card_type'] : 1;
			$userdata['identityid'] = $postdata['identityid'];
			$userdata['sex'] = $postdata['sex'];
			$userdata['tel'] = $postdata['familytel'];
			$userdata['mobile'] = $postdata['mobile'];
			$userdata['fax'] = $postdata['familyfax'];
			$userdata['update_time'] = time();
			$userdata['last_ip'] = get_client_ip();
			$userdata['status']=$status;
			$userdata['checked'] = 1;
			//首先如果主表数据有变动则更新
			$re = $this->dao->where("id = $this->_userid")->save($userdata);
			if(false !== $re) {
				//新增或编辑扩展表
				$data=array();
				$data['user_id']= $this->_userid;
				$data['realname']= $postdata['realname'];
				$data['sex']= $postdata['sex'];
				if($photourl){
					$data['photo'] = $photourl;
				}
				$data['surname']= $postdata['surname'];
				$data['name']= $postdata['name'];
				$data['familytel'] = $postdata['familytel'];
				$data['familyfax'] = $postdata['familyfax'];
				$data['nationalityid'] = $postdata['nationalityid'];
				$data['twonationality'] = $postdata['twonationality'];
				$data['identityid'] = $postdata['identityid'];
				$data['birthday'] = $postdata['birthday'];
				$data['city'] = $postdata['city'];
				$data['highestschooling'] = $postdata['highestschooling'];
				$data['technicaltitle'] = $postdata['technicaltitle'];
				$data['occclassification'] = $postdata['occclassification'];
				$data['identitycategory'] = $postdata['identitycategory'];
				$data['company']= $postdata['company'];
				$data['job']= $postdata['job'];
				$data['companyaddress']= $postdata['companyaddress'];
				$data['familyaddress']= $postdata['familyaddress'];
				$data['validaddress'] = $postdata['validaddress'];
				$data['electronicmail'] = $postdata['email'];
				$data['worktel'] = $postdata['worktel'];
				$data['workfax'] = $postdata['workfax'];
				$data['mobile'] = $postdata['mobile'];
				$data['edubackground'] = $postdata['edubackground'];
				$data['workexperience'] = $postdata['workexperience'];
				$data['arbitexperience'] = $postdata['arbitexperience'];
				$data['partjob'] = $postdata['partjob'];
				$data['specialty']= $postdata['specialty'];
				$data['professresults']= $postdata['professresults'];
				$data['firstlang']= $postdata['firstlang'];
				$firstlangvalue = array('firhearing'=>$postdata['firhearing'],'firspoken'=>$postdata['firspoken'],'firread'=>$postdata['firread'],'firwriting'=>$postdata['firwriting']);
				$data['firstvalue']= serialize($firstlangvalue);
				$data['twolang'] = $postdata['twolang'];
				$twolangvalue = array('twohearing'=>$postdata['twohearing'],'twospoken'=>$postdata['twospoken'],'tworead'=>$postdata['tworead'],'twowriting'=>$postdata['twowriting']);
				$data['twovalue']= serialize($twolangvalue);
				$data['introduction'] = $postdata['introduction'];
				$data['train'] = $postdata['train'];
				$data['recommend'] = $postdata['recommend'];
				$data['remarks'] = $postdata['remarks'];
				if($attachmenturl){
					$data['attachment'] = $attachmenturl;
				}
				$data['updatetime'] = time();
				$flag = true;
				if(empty($userextendInfo)){
					if($r = $this->userextend->create($data)){
						if(false !== $this->userextend->add()){
							$flag = true;
						}else{
							$flag = false;
						}
					}else{
						$flag = false;
					}
				}else{
					$rext = $this->userextend->where("user_id = $this->_userid")->save($data);
					if(false !== $rext){
						$flag = true;
					}else{
						$flag = false;
					}
				}
				if($flag){
					$userlog = M('User_log');
					$ulog = array();
					$ulog['user_id'] = $this->_userid;
					$ulog['content'] = json_encode($userextendInfo, JSON_UNESCAPED_UNICODE);
					$userloginfo = $userlog->where("user_id = $this->_userid")->select();
					if($userloginfo){
						$ulo = $userlog->where("user_id = $this->_userid")->save($ulog);
					}else{
						if($r = $userlog->create($ulog)){
							$userlog->add();
						}
					}

					//注册成功跳转到登录页
                    cookie(null,'YP_');
                    $this->display('Index:ok');
                    exit;
					//$this->success(L('do_success'));
				}else{
					$this->error(L('do_error'));
				}
			}else{
				$this->error(L('do_error'));
			}
			exit;
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
        //$this->display();
        $this->display('Index:pro');
    }

	public function avatar()
    {	
		
		if($_POST['dosubmit']){
		
			$_POST['id']=$this->_userid;
			if(!$this->dao->create($_POST)) {
				$this->error($this->dao->getError());
			}
			$this->dao->update_time = time();
			$this->dao->last_ip = get_client_ip();
			$result	=	$this->dao->save();
			if(false !== $result) {
				if($_POST['aid']){
				$Attachment =M('Attachment');		
				$aids =  implode(',',$_POST['aid']);
				$data['userid']= $this->_userid;
				$data['catid']= 0;
				$data['status']= '1';
				$Attachment->where("aid in (".$aids.")")->save($data);
				}

				$this->success(L('do_success'));
			}else{
				$this->error(L('do_error'));
			}
			exit;
		}

		$yourphp_auth_key = sysmd5(C('ADMIN_ACCESS').$_SERVER['HTTP_USER_AGENT']);
		$yourphp_auth = authcode('0-1-0-1-jpeg,jpg,png,gif-3-0', 'ENCODE',$yourphp_auth_key);
		$this->assign('yourphp_auth',$yourphp_auth);
        $this->display();
    }

	public function password()
    {
		if($_POST['dosubmit']){

			if(md5($_POST['verify']) != $_SESSION['verify']) {
				$this->error(L('error_verify'));
			}
			if($_POST['password'] != $_POST['repassword']){
				$this->error(L('password_repassword'));
			}
			$map	=	array();
			$map['password']= array('eq',sysmd5($_POST['oldpassword']));
			$map['id']		=	$this->_userid;
			//检查用户
			if(!$this->dao->where($map)->field('id')->find()) {
				$this->error(L('error_oldpassword'));
			}else {
				$this->dao->id = $this->_userid;
				$this->dao->update_time = time();
				$this->dao->password	=	sysmd5($_POST['password']);
				$r = $this->dao->save();
				$this->assign('jumpUrl',U('User/Index/profile?l='.LANG_NAME));
				if($r){
					$this->success(L('do_success'));
				}else{
					$this->error(L('do_error'));
				}
			 }
			 exit;
		}
		$this->display();
    }
	
}
?>