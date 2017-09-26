<?php
/**
 * 
 * AreaAction.class.php (ajax 获取地址)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class OutNewsAction extends BaseAction
{
	function _initialize()
    {	
		parent::_initialize();
    }

    public function index()
    {
        $wid = $_REQUEST['wid'];
		$id = $_REQUEST['id'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];
        $webid = $this->webInfo['self']['id'];
        
        if($lang == 1){
                $catid = 30;
        }else{
                $catid = 48;
        }
        $web_list = $news_web = array();
        if($weblist)foreach($weblist as $k=>$w){
            if($w['id'] != $webid){
                $web_list[] = $w;
            } 
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $web_list[0]['id'];
        }
        if($web_list)foreach($web_list as $k=>$w){
            if($w['id'] == $wid){
                $news_web = $w;
            }
        }
        unset($weblist);
        $this->assign('news_web', $news_web);
        if($web_list)foreach($web_list as $k=>$v){
            if($v['id'] == 24) {
                unset($web_list[$k]);
                continue;
            }
            if($v['id'] == 17){
                if($lang == 1){
                    $web_list[$k]['url'] = 'http://www.cietachk.org/portal/newsPage.do?pagePath=\zh_CN\news';
                }else{
                    $web_list[$k]['url'] = 'http://www.cietachk.org/portal/newsPage.do?pagePath=\en_US\news';
                }
            }else{
                $web_list[$k]['url'] = '/index.php?m=News&wid='.$v['id'].($lang==1?'':'&l=en');
            }
        }
        $this->assign('weblist', $web_list);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang,content from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' AND id= '{$id}' order by createtime desc";
        $arr = $this->dao->query($sql);
        
        $this->assign('arr_list',$arr);
        //var_dump($arr);
        $this->display("Order:news");
    }
   
	
 
}
?>