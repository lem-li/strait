<?php
/**
 * 
 * SearchAction.class.php (前台搜索功能)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class SearchAction extends BaseAction
{

	function _initialize()
    {	
		parent::_initialize();
    }

    public function index()
    {
		//搜索
		$_REQUEST['id'] = $catid =  intval($_REQUEST['id']);
		$p= max(intval($_REQUEST[C('VAR_PAGE')]),1);
		$_REQUEST['keyword'] = $keyword = get_safe_replace($_REQUEST['keyword']);
		//$_REQUEST['module'] = $module =  get_safe_replace($_REQUEST['module']);
		$module =  $module ? $module  : 'Article' ;
		$this->assign($_REQUEST);
		$this->assign('bcid',0);
		$where = " status=1 ";
		if(empty($keyword)){
			if(LANG_NAME == 'cn'){
				$this->error('搜索内容不能为空！');
			}else{
				$this->error('search content is can not empty！');
			}
		}

		
		
		if(APP_LANG){
			$lang = LANG_NAME;
			$langid= LANG_ID;
			$where .=" and lang= $langid";
			$this->assign('lang',$lang);
			$this->assign('langid',$langid);
		}

		if($catid){
			$cat = $this->categorys[$catid];		
			$bcid = explode(",",$cat['arrparentid']); 
			$bcid = $bcid[1]; 
			if($bcid == '') $bcid=intval($catid);
			if(empty($module))$module=$cat['module'];	
			unset($cat['id']);
			$this->assign($cat);
			$cat['id']=$catid;
			$this->assign('catid',$catid);
			$this->assign('bcid',$bcid);


			if($cat['child']){							
				$where .= " and catid in(".$cat['arrchildid'].")";			
			}else{
				$where .=  " and catid=".$catid;			
			}
		}
		$seo_title = $cat['title'] ? $cat['title'] : $cat['catname'];
		$this->assign ('seo_title',$keyword.' '.$seo_title);
		$this->assign ('seo_keywords',$keyword.$cat['keywords']);
		$this->assign ('seo_description',$keyword.$cat['description']);
		

		
		if($keyword){ 
			
			if(strstr($keyword,'or')){
				$keydo = ' or ';
				$keyword_arr= explode('or',$keyword);
			}elseif(strstr($keyword,' ')){
				$keydo = ' AND ';
				$keyword_arr= explode(' ',$keyword);
			}
			
			if(count($keyword_arr)>1){
				$keyrep = array();
				$keyrepl = array();
				foreach($keyword_arr as $key =>$keywordz){
					$keyword_arr[$key] = ' title like "%'.trim($keywordz).'%" ';
					$keyrep[$key] = '/'.trim($keywordz).'/';
					$keyrepl[$key] = '<font color=red>'.trim($keywordz).'</font>';
				}
				$where .= ' AND ('.implode($keydo,$keyword_arr).')';
			}else{
				$where .= ' AND title like "%'.$keyword.'%" ';
			}
		}
		$this->dao= M($module);
		$sqlcount = "select count(*) cnt from mz_page where $where AND website = 24 union select count(*) cnt from mz_article where $where";
		$countarr = $this->dao->query($sqlcount);
		$count = 0;
		if($countarr){
			$count = $countarr[0]['cnt'];
			$count1 = $countarr[0]['cnt'];
			if($countarr[1]){
				$count = $count+$countarr[1]['cnt'];
				$count2 = $countarr[1]['cnt'];
			}
		}
		//$count = $this->dao->where($where)->count();
		$this->assign('count',$count);
		
		if($count){
			import ( "@.ORG.Page" );
			$listRows =  !empty($cat['pagesize']) ? $cat['pagesize'] : C('PAGE_LISTROWS');
			$page = new Page ( $count, $listRows );
			$_REQUEST['p'] = '{$page}';
			$page->urlrule =  URL('Home-Search/index',$_REQUEST);
			$pages = $page->show();
			//$field =  $this->module[$cat['moduleid']]['listfields'];
			//$field =  $field ? $field : 'id,catid,userid,url,username,title,title_style,keywords,description,thumb,createtime,hits';
			//article字段
			$fieldar = 'id,url,title';
			//page字段
			$fieldpa = 'id,status as url,title';
			//$list = $this->dao->field($field)->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
			$sql = "select a.* from (select $fieldpa from mz_page where $where AND website = 24 union select $fieldar from mz_article where $where) a limit $page->firstRow,$page->listRows";
			$list = $this->dao->query($sql);
			if($list)foreach($list as &$v){
				$v['title'] = str_replace($keyword, '<font color=red>'.$keyword.'</font>',$v['title']);
				if($keyrep && $keyrepl){
					$v['title'] = preg_replace($keyrep,$keyrepl,$v['title']);
				}
			}
			$this->assign('pages',$pages);
			$this->assign('list',$list);
		}

		$this->display();

    } 
}
?>