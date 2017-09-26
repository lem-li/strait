<?php
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
class TraineeAction extends AdminbaseAction {

    public $trainee;
	function _initialize()
	{
		parent::_initialize();
		$this->trainee = M('Trainee_user');
	}


	function index(){
		import ( '@.ORG.Page' );
		$keyword=$_GET['keyword'];
		$searchtype=$_GET['searchtype'];
		$websiteid =intval($_GET['websiteid']);

		$this->assign($_GET);
		if(!$this->website_menu){
			$where['website']=$this->userInfo['website'];
		}
		if(!empty($keyword) && !empty($searchtype)){
			$where[$searchtype]=array('like','%'.$keyword.'%');
		}
		if($websiteid){
			$where['website']=$websiteid;
		}
		$count=$this->trainee->where($where)->count();
		$page=new Page($count,20);
		$show=$page->show();
		$this->assign("page",$show);
		$list=$this->trainee->order('id')->where($where)
		->limit($page->firstRow.','.$page->listRows)->select();
		if($list){
			foreach($list as &$v){
				$websinfo = D('Domain')->field("name")->find($v['website']);
				$v['websitename'] = $websinfo['name'];
			}
		}
		$this->assign('website_menu',$this->website_menu);
		$this->assign('ulist',$list);
		$this->display();
	}
	
	function detail(){
		$id=$_GET['id'];
		if(empty($id)){
			$this->error('参数错误');
		}
		$traineeinfo = $this->trainee->find($id);
		if(empty($traineeinfo)){
			$this->error('信息不存在');
		}
		if(!$this->website_menu && $this->userInfo['website'] != $traineeinfo['website']){
			$this->error('无权查看该信息');
		}
		$this->assign("traineeinfo",$traineeinfo);
		$this->display();
	}

	function delete(){
		$id=$_GET['id'];
		if(empty($id)){
			$this->error('参数错误');
		}
		$traineeinfo = $this->trainee->find($id);
		if(empty($traineeinfo)){
			$this->error('信息不存在');
		}
		if(!$this->website_menu && $this->userInfo['website'] != $traineeinfo['website']){
			$this->error('无权删除该信息');
		}
		if(false!==$this->trainee->delete($id)){
			$this->success(L('delete_ok'));
		}else{
			$this->error(L('delete_error').$user->getDbError());
		}
	}

	function deleteall(){		
		$ids=$_POST['ids'];
		if(!empty($ids) && is_array($ids)){
			$id=implode(',',$ids);
			if(false!==$this->trainee->delete($id)){
				$this->success(L('delete_ok'));
			}else{
				$this->error(L('delete_error'));
			}
		}else{
			$this->error(L('do_empty'));
		}
	}
}
?>