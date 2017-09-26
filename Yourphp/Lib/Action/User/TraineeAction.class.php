<?php
/**
 * TraineeAction.class.php (实习生申请模块)
 *
 * @package      	YOURPHP
 * @author          fupeng
 * @date        	2015-08-05
 */
if(!defined("Yourphp")) exit("Access Denied");
class TraineeAction extends BaseAction
{

	function _initialize()
    {
		parent::_initialize();
		$this->trainee_user = M('Trainee_user');
		$_GET =get_safe_replace($_GET);
    }
    public function index()
    {
    	if(LANG_NAME == 'cn'){
        	$this->display();
    	}else{
    		$this->display('indexen');
    	}
    }

	public function doapply()
	{
		$postdata = get_safe_replace($_POST);
		if($postdata['identityid'] && !preg_match("/^[A-Za-z0-9]{18}$|^[A-Za-z0-9]{15}$/",$postdata['identityid'])){
			$this->error(L('IDCARD_RULE'));
		}
		if(!preg_match("/^1[345789]\d{9}$/",$postdata['mobile'])){
			$this->error(L('MOBILE_RULE'));
		}
		if(!preg_match("/^[a-z0-9]+[._\-\+]*@([a-z0-9]+[-a-z0-9]*\.)+[a-z0-9]+$/",$postdata['email'])){
			$this->error(L('EMAIL_RULE'));
		}
		$data=array();
		$data['website']= $this->webInfo['self']['id'];
		$data['name']= $postdata['name'];
        $data['sex']= $postdata['sex'];
        $data['birthday']= $postdata['birthday'];
        $data['worktime']= $postdata['workstarttime'].'至'.$postdata['workendtime'];
        $data['hukou']= $postdata['hukou'];
        $data['currentcity']= $postdata['currentcity'];
        $data['identityid']= $postdata['identityid'];
        $data['mobile']= $postdata['mobile'];
        $data['tel']= $postdata['tel'];
        $data['email']= $postdata['email'];
        $data['isexperience']= $postdata['isexperience'];
        $data['company_name']= $postdata['company_name'];
        $data['jobtitle']= $postdata['jobtitle'];
        $data['workdate']= $postdata['workstime'].'至'.$postdata['worketime'];
        $data['salary']= $postdata['salary'];
        $data['workdescription']= $postdata['workdescription'];
        $data['education_level']= $postdata['education_level'];
        $data['istongzhao']= $postdata['istongzhao'];
        $data['studydate']= $postdata['studystartdate'].'至'.$postdata['studyenddate'];
        $data['schoolname']= $postdata['schoolname'];
        $data['profession_name']= $postdata['profession_name'];
		$data['createtime']=time();
		$data['apply_ip']=get_client_ip();

		if($r=$this->trainee_user->create($data)){
			if(false!==$this->trainee_user->add()){
				$traineeuid=$this->trainee_user->getLastInsID();
				//跳到预览页面
                redirect($this->Config['site_url'],1,L('apply_ok'));
			}else{
				$this->error(L('DO_ERROR'));
			}
		}else{
			$this->error($this->trainee_user->getError());
		}

	}


	function checkIdentityid(){
        $identityid = $_GET['identityid'];
		if($this->trainee_user->getByIdentityid($identityid)){
			 echo 'false';
		}else{
			echo 'true';
		}
        exit;
	}
}
?>
