<?php
/**
 * RegisterAction.class.php (前台会员注册模块)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class RegisterAction extends BaseAction
{

	function _initialize()
    {
		parent::_initialize();
		$this->dao = M('User');
		$this->userextend = M('User_extend');
		$_GET =get_safe_replace($_GET);
		if(empty($this->member_config['member_register'])) $this->error(L('close_reg'));
    }
    public function index()
    {
		if( cookie('auth')){
			$this->assign('forward','');
			$this->assign('jumpUrl','/');
			$this->success(L('login_ok'));
		}
		$this->assign('bcid',0);
        //$this->display();
        $this->display('Register:one');
    }

    public function doreg()
    {
        $username = get_safe_replace($_POST['username']);
        $password = get_safe_replace($_POST['password']);
        $realname = get_safe_replace($_POST['realname']);
        $card_type = get_safe_replace($_POST['card_type']);
        $identityid = get_safe_replace($_POST['identityid']);
        $mobile = get_safe_replace($_POST['mobile']);
        $email = get_safe_replace($_POST['email']);
        $question = get_safe_replace($_POST['question']);
        $answer = get_safe_replace($_POST['answer']);
        $verifyCode =$_POST['verifyCode'];
        if(empty($username) || empty($password) || empty($realname) || empty($identityid) || empty($mobile) || empty($email) || empty($question) || empty($answer)){
           $this->error(L('ERROR_IS_EMPTY'));
        }
        // if(!preg_match("/^[A-Za-z0-9]{18}$|^[A-Za-z0-9]{15}$/",$identityid)){
        // 	$this->error(L('IDCARD_RULE'));
        // }
        /*
        if(!preg_match("/^[a-z0-9]+[._\-\+]*@([a-z0-9]+[-a-z0-9]*\.)+[a-z0-9]+$/",$email)){
                $this->error(L('EMAIL_RULE'));
        }*/
        if(!strpos($email, '@')){
            $this->error(L('EMAIL_RULE'));
        }
        if($this->checkusername2($username)){
            $this->error(L('USERNAME_EXIST'));
        }
        if($this->checkEmail2($email)){
            $this->error(L('EMAIL_EXIST'));
        }
        // if(!preg_match("/^1[345789]\d{9}$/",$mobile)){
        // 	$this->error(L('MOBILE_RULE'));
        // }
        if($this->member_config['member_login_verify'] && md5($verifyCode) != $_SESSION['verify']){
           $this->error(L('error_verify'));
        }
        //$status = $this->member_config['member_registecheck'] ? 0 : 1;
        $status = 1;
        if($this->member_config['member_emailcheck']){ $status = 1; $groupid=5 ;}
        $groupid = $groupid ? $groupid : 3;
        $data=array();
        $data['lang']= LANG_NAME;
        $data['username']= $username;
        $data['realname']= $realname;
        $data['card_type'] = $card_type ? $card_type : 1;
        $data['identityid']= $identityid;
        $data['mobile'] = $mobile;
        $data['email']=$email;
        $data['groupid']=$groupid;
        $data['question'] = $question;
        $data['answer'] = $answer;
        $data['login_count']=1;
        $data['createtime']=time();
        $data['updatetime']=time();
        $data['last_logintime']=time();
        $data['reg_ip']=get_client_ip();
        $data['status']=$status;
        $authInfo['password'] = $data['password'] = sysmd5($password);

        if($r=$this->dao->create($data)){
            if(false!==$this->dao->add()){
                $authInfo['id'] = $uid=$this->dao->getLastInsID();
                $authInfo['groupid'] = $ru['role_id']=$data['groupid'];
                $ru['user_id']=$uid;
                $roleuser=M('RoleUser');
                $roleuser->add($ru);

                if($this->member_config['member_emailcheck']){
                    $yourphp_auth = authcode($uid."-".$username."-".$email, 'ENCODE',$this->sysConfig['ADMIN_ACCESS'],3600*24*3);//3天有效期
                    $url = 'http://'.$_SERVER['HTTP_HOST'].U('User/Login/regcheckemail?code='.$yourphp_auth);
                    $click = "<a href=\"$url\" target=\"_blank\">".L('CLICK_THIS')."</a>";
                    $message = str_replace(array('{click}','{url}','{sitename}'),array($click,$url,$this->Config['site_name']),$this->member_config['member_emailchecktpl']);
                    $r = sendmail($email,L('USER_REGISTER_CHECKEMAIL').'-'.$this->Config['site_name'],$message,$this->Config);
                    $this->assign('send_ok',1);
                    $this->assign('username',$username);
                    $this->assign('email',$email);
                    $this->display('Login:emailcheck');
                    exit;
                }

                $yourphp_auth_key = sysmd5($this->sysConfig['ADMIN_ACCESS'].$_SERVER['HTTP_USER_AGENT']);
                $yourphp_auth = authcode($authInfo['id']."-".$authInfo['groupid']."-".$authInfo['password'], 'ENCODE', $yourphp_auth_key);

                $authInfo['username'] = $data['username'];
                $authInfo['email'] = $data['email'];
                cookie('auth',$yourphp_auth,$cookietime);
                cookie('username',$authInfo['username'],$cookietime);
                cookie('groupid',$authInfo['groupid'],$cookietime);
                cookie('userid',$authInfo['id'],$cookietime);
                cookie('email',$authInfo['email'],$cookietime);

                redirect(U(MODULE_NAME.'/agreement?userid='.$uid.'&l='.LANG_NAME));
                //$this->assign('jumpUrl',$this->forward);
                //$this->success(L('reg_ok'));
            }else{
                $this->error(L('reg_error'));
            }
        }else{
            $this->error($this->dao->getError());
        }

    }


    function checkEmail(){
        $email=$_GET['email'];
		$userid=intval($_GET['userid']);
		if(empty($userid)){
			if($this->dao->getByEmail($email)){
				 echo 'false';
			}else{
				echo 'true';
			}
		}else{
			//判断邮箱是否已经使用
			if($this->dao->where("id!={$userid} and email='{$email}'")->find()){
				 echo 'false';
			}else{
				echo 'true';
			}
		}
        exit;
	}

    function checkusername(){
        $username=$_GET['username'];
        if($this->dao->getByUsername($username)){
                         echo 'false';
                }else{
                        echo 'true';
        }
        exit;
    }
    function checkusername2($username){
        if($this->dao->getByUsername($username)){
                        return true;
                }else{
                        return false;
        }
    }
     function checkEmail2($email){
        $userid=intval($_GET['userid']);
        if(empty($userid)){
            if($this->dao->getByEmail($email)){
                return true;
            }else{
                return false;
            }
        }else{
            //判断邮箱是否已经使用
            if($this->dao->where("id!={$userid} and email='{$email}'")->find()){
                 return true;
            }else{
                 return false;
            }
        }
    }
    
    /**
     * info 阅读协议
     * author 付鹏
     * date 2015-08-19
     */
    public function agreement(){
    	if(!$this->_userid){
    		$this->assign('jumpUrl',U('User/Login/index?l='.LANG_NAME));
    		$this->error(L('nologin'));
    		exit;
    	}
    	
    	if($_POST){
    		if($_POST['agee'] == 1){
    			redirect(U(MODULE_NAME.'/twostep?userid='.$this->_userid.'&l='.LANG_NAME));
    		}
    	}
    	
    	$this->assign("userid",$this->_userid);
    	$this->display();
    }

    /**
     * info  注册申请第二步
     * author 付鹏
     * date 2015-07-30
     */
    public function twostep(){
    	if(!$this->_userid){
    		$this->assign('jumpUrl',U('User/Login/index?l='.LANG_NAME));
    		$this->error(L('nologin'));
    		exit;
    	}
        $userid = intval($_REQUEST['userid']);
        if(empty($userid)){
           $this->error(L('do_empty'));
        }
        if($userid != $this->_userid){
        	$this->error(L('ERROR_NO_USER'));
        }
        //扩展信息
        $userextendInfo = $this->userextend->where("user_id = $userid")->select();
        if($userextendInfo){
        	$userextendInfo = $userextendInfo[0];
        }else{
        	$userextendInfo = array();
        }
        //处理post 数据
        if($_POST){
        	$postdata = get_safe_replace($_POST);
        	//字段验证
        	if(empty($postdata['realname']) || empty($postdata['surname']) || empty($postdata['identityid']) || empty($postdata['city']) || empty($postdata['technicaltitle']) || empty($postdata['name']) || empty($postdata['birthday']) || empty($postdata['highestschooling']) || empty($postdata['occclassification']) || empty($postdata['validaddress']) || empty($postdata['email']) || empty($postdata['mobile']) || empty($postdata['specialty'])){
        		$this->error(L('ERROR_IS_EMPTY'));
        	}
        	// if(!preg_match("/^[A-Za-z0-9]{18}$|^[A-Za-z0-9]{15}$/",$postdata['identityid'])){
        	// 	$this->error(L('IDCARD_RULE'));
        	// }
        	
			//处理头像
			$image_type = array("image/jpeg", "image/jpg", "image/png", "image/bmp", "image/pjpeg", "image/x-png","image/gif");
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
        	//先更新主表
        	$userdata = array();
        	$userdata['realname'] = $postdata['realname'];
            $userdata['card_type'] = isset($postdata['card_type']) ? $postdata['card_type'] : 1;
        	$userdata['identityid'] = $postdata['identityid'];
        	$userdata['sex'] = $postdata['sex'];
        	$userdata['tel'] = $postdata['familytel'];
        	$userdata['fax'] = $postdata['familyfax'];
            $userdata['email'] = $postdata['email'];
            $userdata['mobile'] = $postdata['mobile'];
        	//首先如果主表数据有变动则更新
        	$re = $this->dao->where("id = $userid")->save($userdata);
        	//新增或编辑扩展表
        	$data=array();
        	$data['lang']= LANG_NAME;
        	$data['user_id']= $postdata['userid'];
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
        	$data['identitycategory'] = $postdata['identitycategory'] ? $postdata['identitycategory'] : 2;
            $data['company']= $postdata['company'];
            $data['job']= $postdata['job'];
            $data['companyaddress']= $postdata['companyaddress'];
            $data['familyaddress']= $postdata['familyaddress'];
            $data['validaddress'] = $postdata['validaddress'];
            $data['electronicmail'] = $postdata['email'];
            $data['worktel'] = $postdata['worktel'];
            $data['workfax'] = $postdata['workfax'];
            $data['mobile'] = $postdata['mobile'];
            $data['specialty']= $postdata['specialty'];
        	if(empty($userextendInfo)){
        		if($r = $this->userextend->create($data)){
        			if(false !== $this->userextend->add()){
        				redirect(U(MODULE_NAME.'/thirdstep?userid='.$userid.'&l='.LANG_NAME));
        			}else{
        				$this->error(L('add_error'));
        			}
        		}else{
        			$this->error($this->userextend->getError());
        		}
        	}else{
        		$rext = $this->userextend->where("user_id = $userid")->save($data);
        		redirect(U(MODULE_NAME.'/thirdstep?userid='.$userid.'&l='.LANG_NAME));
        	}
        }
        $userInfo = $this->dao->find($userid);  //基本信息
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
        $this->assign('userinfo',$userInfo);
        $this->assign('userextendInfo',$userextendInfo);
        $this->assign('nationality',$nationality);
        $this->assign('city',$city);
        $this->assign('highestschooling',$highestschooling);
        $this->assign('nicaltitle',$nicaltitle);
        $this->assign('occclassification',$occclassification);
        //$this->display();
        $this->display('Register:two');
    }
    
    /**
     * info  注册申请第三步
     * author 付鹏
     * date 2015-07-31
     */
    public function thirdstep(){
    	if(!$this->_userid){
    		$this->assign('jumpUrl',U('User/Login/index?l='.LANG_NAME));
    		$this->error(L('nologin'));
    		exit;
    	}
    	$userid = intval($_REQUEST['userid']);
    	if(empty($userid)){
    		$this->error(L('do_empty'));
    	}
    	if($userid != $this->_userid){
    		$this->error(L('ERROR_NO_USER'));
    	}
    	$userInfo = $this->dao->find($userid);  //基本信息
    	if(empty($userInfo)){
    		$this->error(L('do_empty'));
    	}
    	//扩展信息
    	$userextendInfo = $this->userextend->where("user_id = $userid")->select();
    	if($userextendInfo){
    		$userextendInfo = $userextendInfo[0];
    	}else{
    		$userextendInfo = array();
    	}
    	//处理post 数据
    	if($_POST){
    		$postdata = get_safe_replace($_POST);
            //处理附件
            //$file_type = array("application/msword",'application/msword');
            $file_type = array("application/msword",'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            $attachmenturl = '';
            if(!empty($_FILES['attachment']) && $_FILES['attachment']['error'] !== 4){
                //var_dump($_FILES);exit;
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
                //var_dump($attachmentnewfile);exit;
                if($result){
                    $attachmenturl = substr($attachmentnewfile, 1);
                }else{
                    $this->error(L('error_upload_fail'));
                }
            }
    		//新增或编辑扩展表
    		$data=array();
    		$data['lang']= LANG_NAME;
    		$data['user_id']= $postdata['userid'];
    		$data['edubackground'] = $postdata['edubackground'];
    		$data['workexperience'] = $postdata['workexperience'];
    		$data['arbitexperience'] = $postdata['arbitexperience'];
    		$data['partjob'] = $postdata['partjob'];
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
            $messbody = LANG_NAME == 'cn' ? '尊敬的'.$userInfo['realname'].'先生/女士：<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您已于'.date('Y年m月d日', time()).'在中国国际经济贸易仲裁委员会网站成功填写仲裁员申请登记信息。
您的登录用户名为'.$userInfo['username'].'。您可随时登录修改您的相关信息。
感谢您对贸仲委工作的大力支持！<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关于申请成为贸仲委仲裁员如有其他疑问，请发送邮件至arbitrators@cietac.org。<br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国国际经济贸易仲裁委员会<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date('Y年m月d日', time()).'' : 'Dear Mr./Ms. '.$userInfo['realname'].':<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have been successfully filled the application form for CIETAC arbitrator on '.date('d, m, Y', time()).'.
Your user name is '.$userInfo['username'].'. You can log in at any time on the website to modify your relevant information.
Thank you for your support for CIETAC.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you have any other questions for applying for CIETAC arbitrator, please send your email to arbitrators@cietac.org.<br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHINA INTERNATIONAL ECONOMIC AND TRADE 
ARBITRATION COMMISSION<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date('d, m, Y', time()).'
';
            //$r = self::send_smtp('lwl_0321@126.com','注册信息','hello');
            //var_dump($r);
            //exit;
    		if(empty($userextendInfo)){
    			if($r = $this->userextend->create($data)){
    				if(false !== $this->userextend->add()){
                        //$rr = sendemail($userInfo['email'], $userInfo['realname'], '注册信息', $messbody, $this->Config);
                        //$rr = send_smtp($userInfo['email'],'注册信息',$messbody, $this->Config);
                        for($i=1;$i<=5;$i++){
                            $rr = send_smtp($userInfo['email'],'注册信息',$messbody, $this->Config);
                            if($rr)
                                break;
                        }
                        redirect(U('User/Index/profile?l='.LANG_NAME),1,L('reg_ok'));
    				}else{
    					$this->error(L('add_error'));
    				}
    			}else{
    				$this->error($this->userextend->getError());
    			}
    		}else{
                    $rext = $this->userextend->where("user_id = $userid")->save($data);
                    //发送邮件 经常不成功，循环5次 ，成功为止
                    for($i=1;$i<=5;$i++){
                        $rr = send_smtp($userInfo['email'],'注册信息',$messbody, $this->Config);
                        if($rr)
                            break;
                    }
			cookie(null,'YP_');
                    $this->display('Register:ok');
                    exit;
    		}
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

    	$this->assign('userinfo',$userInfo);
    	$this->assign('userextendInfo',$userextendInfo);
    	$this->assign('fontnum',$fontnum);
    	$this->assign('fontnum1',$fontnum1);
        $this->assign('fontnum3',$fontnum3);
        $this->assign('languagetype',$languagetype);
    	$this->display('Register:three');
    }

    public static function send_smtp($receiver, $subject, $content)
    {
        import("@.ORG.cls_smtp");
        if (is_array($receiver)) {
            $receiver = implode(', ', $receiver);
        }
        /* 邮件的头部信息 */
        $content   =  base64_encode($content);
        $charset = 'utf-8';
        $name = '';
        $headers = array();
        $headers[] = 'Date: ' . gmdate('D, j M Y H:i:s') . ' +0000';
        $headers[] = 'To: "' . '=?' . $charset . '?B?' . base64_encode($name) . '?=' . '" <' . $receiver. '>';
        $headers[] = 'From: "' . '=?' . $charset . '?B?' . base64_encode('中国国际经济贸易仲裁委员会') . '?='.'" <arbitrators@cietac.org>';
        $headers[] = 'Subject: ' . '=?' . $charset . '?B?' . base64_encode($subject) . '?=';
        $headers[] = 'Content-Type: text/html; charset=utf-8 ; format=flowed';
        $headers[] = 'Content-Transfer-Encoding: base64';
        $headers[] = 'Content-Disposition: inline';

        /* 获得邮件服务器的参数设置 */
        $params['host'] = 'mail.cietac.org';
        $params['port'] = 25;
        $params['user'] = 'arbitrators@cietac.org';
        $params['pass'] = 'arbitrators-admin';
        $send_params['recipients'] = $receiver;
        $send_params['headers']    = $headers;
        $send_params['from']       = 'arbitrators@cietac.org';
        $send_params['body']       = $content;
        static $smtp;
        if(!is_object($smtp)){
            $smtp = new smtp($params);
        }
        $res = $smtp->connect() && $smtp->send($send_params);
        return $res;
    }

    /**
     * info  注册预览保存
     * author 付鹏
     */
    public function save_preview(){
        if(!$this->_userid){
            $this->assign('jumpUrl',U('User/Login/index?l='.LANG_NAME));
            $this->error(L('nologin'));
            exit;
        }
        $userid = intval($_REQUEST['userid']);
        if(empty($userid)){
            $this->error(L('do_empty'));
        }
        if($userid != $this->_userid){
            $this->error(L('ERROR_NO_USER'));
        }
        $userInfo = $this->dao->find($userid);  //基本信息
        if(empty($userInfo)){
            $this->error(L('do_empty'));
        }
        //扩展信息
        $userextendInfo = $this->userextend->where("user_id = $userid")->select();
        if($userextendInfo){
            $userextendInfo = $userextendInfo[0];
        }else{
            $userextendInfo = array();
        }
        //处理post 数据
        if($_POST){
            $postdata = get_safe_replace($_POST);
            //处理附件
            //$file_type = array("application/msword",'application/msword');
            $file_type = array("application/msword",'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            $attachmenturl = '';
            if(!empty($_FILES['attachment']) && $_FILES['attachment']['error'] !== 4){
                //var_dump($_FILES);exit;
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
                //var_dump($attachmentnewfile);exit;
                if($result){
                    $attachmenturl = substr($attachmentnewfile, 1);
                }else{
                    $this->error(L('error_upload_fail'));
                }
            }
            //新增或编辑扩展表
            $data=array();
            $data['lang']= LANG_NAME;
            $data['user_id']= $postdata['userid'];
            $data['edubackground'] = $postdata['edubackground'];
            $data['workexperience'] = $postdata['workexperience'];
            $data['arbitexperience'] = $postdata['arbitexperience'];
            $data['partjob'] = $postdata['partjob'];
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
            if(empty($userextendInfo)){
                if($r = $this->userextend->create($data)){
                    if(false !== $this->userextend->add()){
                        redirect(U('User/Register/preview?userid='.$userid.'&l='.LANG_NAME));
                    }else{
                        $this->error(L('add_error'));
                    }
                }else{
                    $this->error($this->userextend->getError());
                }
            }else{
                $rext = $this->userextend->where("user_id = $userid")->save($data);
                redirect(U('User/Register/preview?userid='.$userid.'&l='.LANG_NAME));
            }
        }
    }


    /**
     * info  注册申请第四步
     * author 付鹏
     * date 2015-07-31
     */
    public function fourstep(){
    	if(!$this->_userid){
    		$this->assign('jumpUrl',U('User/Login/index?l='.LANG_NAME));
    		$this->error(L('nologin'));
    		exit;
    	}
    	$userid = intval($_REQUEST['userid']);
    	if(empty($userid)){
    		$this->error(L('do_empty'));
    	}
    	if($userid != $this->_userid){
    		$this->error(L('ERROR_NO_USER'));
    	}
    	$userInfo = $this->dao->find($userid);  //基本信息
    	if(empty($userInfo)){
    		$this->error(L('do_empty'));
    	}
    	//扩展信息
    	$userextendInfo = $this->userextend->where("user_id = $userid")->select();
    	if($userextendInfo){
    		$userextendInfo = $userextendInfo[0];
    	}else{
    		$userextendInfo = array();
    	}
    	//处理post 数据
    	if($_POST){
    		$postdata = get_safe_replace($_POST);
    		//字段验证
    		if(empty($postdata['specialty']) || empty($postdata['professresults'])){
    			$this->error(L('ERROR_IS_EMPTY'));
    		}
    		//新增或编辑扩展表
    		$data=array();
    		$data['lang']= LANG_NAME;
    		$data['user_id']= $postdata['userid'];
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
    		if(empty($userextendInfo)){
    			if($r = $this->userextend->create($data)){
    				if(false !== $this->userextend->add()){
    					redirect(U('User/Index/profile?l='.LANG_NAME),1,L('reg_ok'));
    				}else{
    					$this->error(L('add_error'));
    				}
    			}else{
    				$this->error($this->userextend->getError());
    			}
    		}else{
    			$rext = $this->userextend->where("user_id = $userid")->save($data);
    			//redirect($this->Config['site_url'],1,L('reg_ok'));
    			redirect(U('User/Index/profile?l='.LANG_NAME),1,L('reg_ok'));
    		}
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
    	$this->assign('userinfo',$userInfo);
    	$this->assign('userextendInfo',$userextendInfo);
    	$this->assign('fontnum',$fontnum);
    	$this->assign('fontnum1',$fontnum1);
    	$this->assign('fontnum3',$fontnum3);
    	$this->assign('languagetype',$languagetype);
    	$this->display();
    }
    /**
     * info  预览
     * author 付鹏
     * date 2015-07-31
     */
    public function preview()
    {	 
        $userid = intval($_REQUEST['userid']);
        if(empty($userid)){
            $this->assign('jumpUrl',U('User/Login/index'));
            $this->error(L('nologin'));
            exit;
        }
        $user = $this->dao->find($userid);
        $this->assign('vo',$user);
        $this->userextend = M('User_extend');
    	$userextendInfo = $this->userextend->where("user_id = '{$userid}'")->select();
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
    }
    
}
?>
