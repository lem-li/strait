<?php
/**
 *
 * Content(内容管理模块)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <web@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2012-10-08 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class DomainAction extends AdminbaseAction
{
    protected  $dao,$fields;
    public function _initialize()
    {
        parent::_initialize();
        $module ='domain';
        $this->dao = D($module);

        $this->assign ('fields',array('status'=>1));
    }

    /**
	 * 列表
	 *
	 */
    public function index()
    {
        $template =  file_exists(THEME_PATH.MODULE_NAME.'_index.html') ? MODULE_NAME.':index' : 'Domain:index';
        $this->_list(MODULE_NAME);
        $this->display ($template);
    }

	public function add()
    {
		$vo['catid']= intval($_GET['catid']);
		//isadmin,more,isthumb,file_limit,file_types,file_size,moduleid,
		$yourphp_auth_key = sysmd5(C('ADMIN_ACCESS').$_SERVER['HTTP_USER_AGENT']);
		$yourphp_auth = authcode('1-1-0-10-jpeg,jpg,png,gif-5-230', 'ENCODE',$yourphp_auth_key);
		$this->assign('yourphp_auth',$yourphp_auth);
		
		$form=new Form($vo);
		$form->isadmin=1;
		$this->assign ( 'form', $form );
		$template =  file_exists(THEME_PATH.MODULE_NAME.'_edit.html') ? MODULE_NAME.':edit' : 'Content:edit';
		$this->display ( $template);
	}


	public function edit()
    {
		
		$id = $_REQUEST ['id'];		
		//isadmin,more,isthumb,file_limit,file_types,file_size,moduleid,
		$yourphp_auth_key = sysmd5(C('ADMIN_ACCESS').$_SERVER['HTTP_USER_AGENT']);
		$yourphp_auth = authcode('1-1-0-10-jpeg,jpg,png,gif-5-230', 'ENCODE',$yourphp_auth_key);
		$this->assign('yourphp_auth',$yourphp_auth);
		
		$vo = $this->dao->getById ( $id );
 		$form=new Form($vo);
		$this->assign ( 'vo', $vo );
		$this->assign ( 'form', $form );
		$template =  file_exists(THEME_PATH.MODULE_NAME.'_edit.html') ? MODULE_NAME.':edit' : 'Domain:edit';
		$this->display ( $template);
	}

    /**
     * 录入
     *
     */
    public function insert($module='',$fields=array(),$userid=0,$username='',$groupid=0)
    {
		$model = $module ?  M($module) : $this->dao;
		$fields = $fields ? $fields : $this->fields ;

		if($fields['verifyCode']['status'] && (md5($_POST['verifyCode']) != $_SESSION['verify'])){
			$this->assign ( 'jumpUrl','javascript:history.go(-1);');
			$this->error(L('error_verify'));
        }

		$_POST = checkfield($fields,$_POST);
		if(empty($_POST)) $this->error (L('do_empty'));
		
		$_POST['createtime'] = time();		 
		$_POST['updatetime'] = $_POST['createtime'];	
        $_POST['userid'] = $module ? $userid : $_SESSION['userid'];
		$_POST['username'] = $module ? $username : $_SESSION['username'];
		if($_POST['style_color']) $_POST['style_color'] = 'color:'.$_POST['style_color'];
		if($_POST['style_bold']) $_POST['style_bold'] =  ';font-weight:'.$_POST['style_bold'];
		if($_POST['style_color'] || $_POST['style_bold'] ) $_POST['title_style'] = $_POST['style_color'].$_POST['style_bold'];
 
		$module = $module? $module : MODULE_NAME ;
		if(GROUP_NAME=='User')$_POST['status'] = $this->Role[$groupid]['allowpostverify'] ? 1 : 0;
		
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		$_POST['id'] = $id= $model->add();

		if ($id !==false) {
			$catid = $module =='Page' ? $id : $_POST['catid'];



			if($_POST['aid']) {
				$Attachment =M('Attachment');		
				$aids =  implode(',',$_POST['aid']);
				$data['id']=$id;
				$data['catid']= $catid;
				$data['status']= '1';
				$Attachment->where("aid in (".$aids.")")->save($data);
			}
			
			$tablename=C('DB_PREFIX').strtolower($module);
			$db=D('');
			$db =   DB::getInstance();
			$tables = $db->getTables();			
			$Fields=$db->getFields($tablename); 
			
			if(isset($Fields['url'])){
				$data='';
				$cat = $this->categorys[$catid];
				$url = geturl($cat,$_POST,$this->Urlrule);
				$data['id']= $id;
				$data['url']= $url[0];
				$model->save($data);
			}

			
			if($_POST['keywords'] && $module !='Page'){
				$keywordsarr=explode(',',$_POST['keywords']);
				$i=0;
				$tagsdata =M('Tags_data');
				$tagsdata->where("id=".$id)->delete();
				foreach((array)$keywordsarr as $tagname){
					if($tagname){
						$tagidarr=$tagdatas=$where=array();
						$where['name']=array('eq',$tagname);
						$where['moduleid']=array('eq',$cat['moduleid']);
						$tagid=M('Tags')->where($where)->field('id')->find();
						$tagidarr['id']=$id;
						if($tagid){
							$num = $tagsdata->where("tagid=".$tagid[id])->count();
							$tagdatas['num']=$num+1;
							M('Tags')->where("id=".$tagid[id])->save($tagdatas);
							$tagidarr['tagid']=$tagid['id'];
						}else{
							$tagdatas['moduleid']=$cat['moduleid'];
							$tagdatas['name'] = $tagname;
							$tagdatas['slug'] = Pinyin($tagname);
							$tagdatas['num']=1;
							$tagdatas['lang']=$_POST['lang'];
							$tagdatas['module']= $cat['module'];
							$tagidarr['tagid']=M('Tags')->add($tagdatas);
						}
						$i++;
						$tagsdata->add($tagidarr);
					}
				}
			}

			if($cat['presentpoint']){
				$user =M('User');
				if($cat['presentpoint']>0) $user->where("id=".$_POST['userid'])->setInc('point',$cat['presentpoint']);
				if($cat['presentpoint']<0) $user->where("id=".$_POST['userid'])->setDec('point',$cat['presentpoint']);
			}
 
			if($cat['ishtml'] && $_POST['status']){
				if($module!='Page'   && $_POST['status'])	$this->create_show($id,$module);				
				$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
				foreach($arrparentid as $catid) {
					if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
				}
 			}
			if($this->sysConfig['HOME_ISHTML']) $this->create_index();
			if(GROUP_NAME=='Admin'){
				$this->assign ( 'jumpUrl', U($module.'/index') );
			}elseif(GROUP_NAME=='User'){
				$this->assign ( 'jumpUrl',$_SERVER['HTTP_REFERER']);
				//$this->assign ( 'jumpUrl', U(GROUP_NAME.'-'.MODULE_NAME.'/add?moduleid='.$cat['moduleid']) );
			}
			$this->success (L('add_ok'));
		} else {
			$this->error (L('add_error').': '.$model->getDbError());
		}
	
    }

	function update($module='',$fields=array(),$userid=0,$username='')
	{  
		$model = $module ?  M($module) : $this->dao;
		$fields = $fields ? $fields : $this->fields ;
		if($fields['verifyCode']['status'] && (md5($_POST['verifyCode']) != $_SESSION['verify'])){
			$this->assign ( 'jumpUrl','javascript:history.go(-1);');
			$this->error(L('error_verify'));
        }

		$_POST = checkfield($fields,$_POST);
		if(empty($_POST)) $this->error (L('do_empty'));

		$_POST['updatetime'] = time();		
		if($_POST['style_color']) $_POST['style_color'] = 'color:'.$_POST['style_color'];
		if($_POST['style_bold']) $_POST['style_bold'] =  ';font-weight:'.$_POST['style_bold'];
		if($_POST['style_color'] || $_POST['style_bold'] ) $_POST['title_style'] = $_POST['style_color'].$_POST['style_bold'];

		$cat = $this->categorys[$_POST['catid']];
		$module = $module? $module : MODULE_NAME ;
		$_POST['url'] = geturl($cat,$_POST,$this->Urlrule);
		$_POST['url'] =$_POST['url'][0];

		$olddata = $model->find($_POST['id']);
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}
		

		// 更新数据
		$list=$model->save ();

		if (false !== $list) {
			$id= $_POST['id'];
			$catid = $module =='Page' ? $id : $_POST['catid'];

			if($olddata['keywords']!=$_POST['keywords']  && $module !='Page'){
				 

				$tagidarr=$tagdatas=$where=array();
				$where['name']=array('in',$olddata['keywords']);
				$where['moduleid']=array('eq',$cat['moduleid']);
				$where['lang']=array('eq',$_POST['lang']);
				M('Tags')->where($where)->setDec('num'); 

				$tagsdata =M('Tags_data');
				$tagsdata->where("id=".$id)->delete();

				$keywordsarr=explode(',',$_POST['keywords']);			
				foreach((array)$keywordsarr as $tagname){
					if($tagname){
						$tagidarr=$tagdatas=$where=array();
						$where['name']=array('eq',$tagname);
						$where['moduleid']=array('eq',$cat['moduleid']);
						$where['lang']=array('eq',$_POST['lang']);
						$tagid=M('Tags')->where($where)->field('id')->find();
						$tagidarr['id']=$id;
						if($tagid['id']>0){
							M('Tags')->where("id=".$tagid[id])->setInc('num'); ;
							$tagidarr['tagid']=$tagid['id'];
						}else{
							$tagdatas['moduleid']=$cat['moduleid'];
							$tagdatas['name'] = $tagname;
							$tagdatas['slug'] = Pinyin($tagname);
							$tagdatas['num']=1;
							$tagdatas['lang']=$_POST['lang'];
							$tagdatas['module']= $cat['module'];
							$tagidarr['tagid']=M('Tags')->add($tagdatas);
						}
						$tagsdata->add($tagidarr);
					}
				}
				M('Tags')->where('num<=0')->delete();
			}

			if($_POST['aid']) {
				$Attachment =M('Attachment');		
				$aids =  implode(',',$_POST['aid']);
				$data['id']= $id;
				$data['catid']= $catid;
				$data['status']= '1';
				$Attachment->where("aid in (".$aids.")")->save($data);
			}
			$cat = $this->categorys[$catid];
			if($cat['ishtml']){
				if($module!='Page'  && $_POST['status'])	$this->create_show($_POST['id'],$module);
				$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
				foreach($arrparentid as $catid) {
					if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
				}
 			}
			if($this->sysConfig['HOME_ISHTML']) $this->create_index();
			$this->assign ( 'jumpUrl', $_POST['forward'] );
			$this->success (L('edit_ok'));
		} else {
			//错误提示
			$this->success (L('edit_error').': '.$model->getDbError());
		}
	}

 
	function statusallok(){

		$module = MODULE_NAME;
		$model = M ( $module );
		$ids=$_POST['ids'];
		if(!empty($ids) && is_array($ids)){
			$id=implode(',',$ids);
			$data = $model->select($id);
			if($data){				
				foreach($data as $key=>$r){	
					$model->save(array(id=>$r['id'],status=>1));
					if($this->categorys[$r['catid']]['ishtml'] && $r['status'])$this->create_show($r['id'],$module);	
				}
				$cat =  $this->categorys[$r['catid']];
				if($cat['ishtml']){			
					if($this->sysConfig['HOME_ISHTML']) $this->create_index();
					$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
					foreach($arrparentid as $catid) {
						if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
					}
				}
				$this->success(L('do_ok'));
			}else{
				$this->error(L('do_error').': '.$model->getDbError());
			}
		}else{
			$this->error(L('do_empty'));
		}
	}

	/*状态*/

	public function status(){
		$module = MODULE_NAME;
		$model = D ($module);
		if($model->save($_GET)){
			$_POST ='';
			$_POST = $model->find($_GET['id']);
			$cat =  $this->categorys[$_POST['catid']];
			if($cat['ishtml']){
				if($module!='Page'  && $_POST['status'])	$this->create_show($_POST['id'],$module);				
				if($this->sysConfig['HOME_ISHTML']) $this->create_index();
				$arrparentid = array_filter(explode(',',$cat['arrparentid'].','.$cat['id']));
				foreach($arrparentid as $catid) {
					if($this->categorys[$catid]['ishtml'])	$this->clisthtml($catid);					
				}
 			}

			$this->success(L('do_ok'));
		}else{
			$this->error(L('do_error'));
		}
	}
	
	/**
	 * 分站导航选择
	 */
	public function selectnav(){
		$id = intval($_REQUEST ['id']); //分站id
		//获取本站下导航数据
		$module = MODULE_NAME;
		$model = M ( $module );
		$mainnav = $model->field('nav')->find($id);
		if($mainnav) $mainnavdata = json_decode($mainnav['nav'],true);
		//中文导航
		$category_cn = M('category')->field(" id, catname")->where(" parentid = 0 and ismenu = 1 and lang = 1")->order(" listorder asc,id asc")->select();
		//英文导航
		$category_en = M('category')->field(" id, catname")->where(" parentid = 0 and ismenu = 1 and lang = 2")->order(" listorder asc,id asc")->select();
        $category_fc = M('category')->field(" id, catname")->where(" parentid = 0 and ismenu = 1 and lang = 3")->order(" listorder asc,id asc")->select();
		$this->assign('id',$id);
		$this->assign('category_cn',$category_cn);
		$this->assign('category_en',$category_en);
        $this->assign('category_fc',$category_fc);
		if($mainnavdata) $this->assign('mainnavdata',$mainnavdata);
		$this->display();
	}
	/**
	 * 分站导航更新操作
	 */
	function changenav(){
	
		$module = MODULE_NAME;
		$model = M ( $module );
		$id = intval($_POST['mainid']);
		$ids = $_POST['ids'];
		$eids = $_POST['eids'];
        $fids = $_POST['fids'];
		$listorders = $_POST['listorders'];
		$enlistorders = $_POST['enlistorders'];
        $fclistorders = $_POST['fclistorders'];
		$cdata = array();
		if(!empty($ids) && is_array($ids)){
			foreach($ids as $ck=>$cid){
				$cdata['cn'][$cid]['catid'] = $cid;
				$cdata['cn'][$cid]['listorder'] = $listorders[$cid];
			}
		}
		if(!empty($eids) && is_array($eids)){
			foreach($eids as $ek=>$eid){
				$cdata['en'][$eid]['catid'] = $eid;
				$cdata['en'][$eid]['listorder'] = $enlistorders[$eid];
			}
		}
        if(!empty($fids) && is_array($fids)){
            foreach($fids as $ek=>$eid){
                $cdata['fc'][$eid]['catid'] = $eid;
                $cdata['fc'][$eid]['listorder'] = $fclistorders[$eid];
            }
        }
		if($cdata){
			$cdatajson = json_encode($cdata);
		}else{
			$cdatajson = '';
		}
		$up = array();
		$up['nav'] = $cdatajson;
		if(false!==$model->where("id = $id")->save($up)){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}
	


}?>