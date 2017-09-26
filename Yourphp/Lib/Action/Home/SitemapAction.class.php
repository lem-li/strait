<?php
/**
 * 
 * SitemapAction.class.php (网站地图)
 */
if(!defined("Yourphp")) exit("Access Denied");
class SitemapAction extends BaseAction
{
    public function index()
    {
    	$modle=M('Page');
    	if(LANG_NAME == 'cn'){
    		$catid = 134;
    	}else{
    		$catid = 135;
    	}
    	
    	$data = $modle->find($catid);
    	$data['catid'] = $catid;
    	$this->assign($data);
        $this->display();
    }
}
?>