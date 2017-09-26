<?php

if(!defined("Yourphp")) exit("Access Denied");
class ContactUsAction extends BaseAction
{
    public function index()
    {
        $this->Urlrule =F('Urlrule');
		if(empty($catid)) $catid =  intval($_REQUEST['id']);
		$p= max(intval($_REQUEST[C('VAR_PAGE')]),1);
		if($catid){
			$cat = $this->categorys[$catid];
			$bcid = explode(",",$cat['arrparentid']);
			$bcid = $bcid[1];
			if($bcid == '') $bcid=intval($catid);
			if(empty($module))$module=$cat['module'];
			$this->assign('module_name',$module);
			unset($cat['id']);
			$this->assign($cat);
			$cat['id']=$catid;
			$this->assign('catid',$catid);
			$this->assign('bcid',$bcid);
		}
		$modle=M('Page');
		$data = $modle->find($catid);
		$data['catid'] = $catid;
		unset($data['id']);
		$parent_id = $cat['parentid']=='0' ? $catid : $cat['parentid'];
		$cata_list = M('Category')->where("parentid='{$parent_id}'")->order('listorder = 0,listorder asc,id desc')->select();
		$data['cate_list'] = $cata_list;
        
		$this->assign ($data);
		
        
		$this->display("Page:contactus");
    }
   
}
?>