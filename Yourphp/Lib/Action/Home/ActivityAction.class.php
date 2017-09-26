<?php
/**
 * 活动相关页面
 */
if(!defined("Yourphp")) exit("Access Denied");
class ActivityAction extends BaseAction
{
	function _initialize()
	{
		parent::_initialize();
	}
	
	public function index()
	{
		$catid = 31;//活动
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
		
		$seo_title = $cat['title'] ? $cat['title'] : $cat['catname'];
		$this->assign ('seo_title',$seo_title);
		$this->assign ('seo_keywords',$cat['keywords']);
		$this->assign ('seo_description',$cat['description']);
		
		$where = " status=1 ";
		$where .= " AND website='{$this->webInfo['self']['id']}' ";
		if($cat['child']){
			$where .= " and catid in(".$cat['arrchildid'].")";
		}else{
			$where .=  " and catid=".$catid;
		}
		$this->dao= M($module);
		$count = $this->dao->where($where)->count();
		if($count){
			//import ( "@.ORG.Page" );
			//$listRows =  !empty($cat['pagesize']) ? $cat['pagesize'] : C('PAGE_LISTROWS');
			//$page = new Page ( $count, $listRows );
			//$page->urlrule = geturl($cat,'',$this->Urlrule);
			//$pages = $page->show();
			$field =  'id,catid,userid,url,username,title,title_style,keywords,description,content,thumb,createtime,hits';
			$list = $this->dao->field($field)->where($where)->order('createtime desc,id desc')->limit('0,20')->select();
			//$this->assign('pages',$pages);
			$this->assign('list',$list);
		}
		$this->display();
	}
	
	public function show()
	{
		$id = $_REQUEST['id'] ? intval($_REQUEST['id']) : 0;
		$module = 'Article';
		$this->assign('module_name',$module);
		$this->dao= M($module);;
		$data = $this->dao->find($id);
	
		$catid = $data['catid'];
		$cat = $this->categorys[$data['catid']];
		if(empty($cat['ishtml']))$this->dao->where("id=".$id)->setInc('hits'); //添加点击次数
		$bcid = explode(",",$cat['arrparentid']);
		$bcid = $bcid[1];
		if($bcid == '') $bcid=intval($catid);
	
		$seo_title = $data['title'].'-'.$cat['catname'];
		$this->assign ('seo_title',$seo_title);
		$this->assign ('seo_keywords',$data['keywords']);
		$this->assign ('seo_description',$data['description']);
	
		$this->assign('catid',$catid);
		$this->assign ($cat);
		$this->assign('bcid',$bcid);
	
		$this->assign ($data);
		
		//列表
		$where = " status=1 and website='{$this->webInfo['self']['id']}' and catid=".$catid;
		$field =  'id,catid,userid,url,username,title,title_style,keywords,description,content,thumb,createtime,hits';
		$list = $this->dao->field($field)->where($where)->order('listorder asc,createtime desc')->limit('0,20')->select();
		$this->assign('list',$list);
	
		$this->display();
	}
}