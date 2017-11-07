<?php

if(!defined("Yourphp")) exit("Access Denied");
class WechatAction extends BaseAction
{
    //新闻
    public function news()
    {
        $wid = $_REQUEST['wid'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];

        if($lang == 1){
            $catid = 30;
        }elseif($lang == 2){
            $catid = 48;
        }else{
            $catid = 361;
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $weblist[0]['id'];
        }
        unset($weblist);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' order by createtime desc limit 20";
        $arr = $this->dao->query($sql);
        if($arr)foreach($arr as $k=>$v){
            $arr[$k]['url'] = '/index.php?m=Wechat&a=detail&id='.$v['id'];
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:news");
    }

    //在线公告
    public function notice()
    {
        $wid = $_REQUEST['wid'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];

        if($lang == 1){
            $catid = 151;
        }elseif($lang == 2){
            $catid = 145;
        }else{
            $catid = 374;
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $weblist[0]['id'];
        }
        unset($weblist);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' order by createtime desc limit 20";
        $arr = $this->dao->query($sql);
        if($arr)foreach($arr as $k=>$v){
            $arr[$k]['url'] = '/index.php?m=Wechat&a=detail&id='.$v['id'];
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:news");
    }

    //详情
    public function detail()
    {
        $id = (int)$_REQUEST['id'];

        $this->dao= M($module);
        $sql = "select * from mz_article where id = '{$id}' ";
        $arr = $this->dao->query($sql);

        if(empty($arr)){
            throw_exception('404');
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:detail");

    }

    //资讯
    public function zixun()
    {
        $wid = $_REQUEST['wid'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];

        if($lang == 1){
            $catid = 356;
        }else{
            $catid = 356;
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $weblist[0]['id'];
        }
        unset($weblist);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' order by createtime desc limit 20";
        $arr = $this->dao->query($sql);
        if($arr)foreach($arr as $k=>$v){
            $arr[$k]['url'] = '/index.php?m=Wechat&a=detail&id='.$v['id'];
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:news");
    }

    //资讯
    public function tongzhi()
    {
        $wid = $_REQUEST['wid'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];

        if($lang == 1){
            $catid = 355;
        }else{
            $catid = 355;
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $weblist[0]['id'];
        }
        unset($weblist);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' order by createtime desc limit 20";
        $arr = $this->dao->query($sql);
        if($arr)foreach($arr as $k=>$v){
            $arr[$k]['url'] = '/index.php?m=Wechat&a=detail&id='.$v['id'];
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:news");
    }

    //资讯
    public function contactus()
    {
        $wid = $_REQUEST['wid'];
        $lang = LANG_ID;
        $weblist = $this->webInfo['list'];

        if($lang == 1){
            $catid = 357;
        }else{
            $catid = 357;
        }
        if(empty($wid) && !is_numeric($wid)){
            $wid = $weblist[0]['id'];
        }
        unset($weblist);
        $this->dao= M($module);
        $sql = "select id,website,catid,title,url,createtime,lang from mz_article where catid = '{$catid}' 
                        AND status=1 and lang = '{$lang}' AND website = '{$wid}' order by createtime desc limit 20";
        $arr = $this->dao->query($sql);
        if($arr)foreach($arr as $k=>$v){
            $arr[$k]['url'] = '/index.php?m=Wechat&a=detail&id='.$v['id'];
        }

        $this->assign('arr_list',$arr);

        layout(false);
        $this->display("Wechat:news");
    }


    //数据统计
    public function data()
    {
        /* $arr =  array();
        $modle=M('Page');
        $data = $modle->find(24);
		var_dump($data);
		$this->assign('arr_list',$data);
        layout(false);
        $this->display("Wechat:detail"); */
		
		$id = '383';
        $module=M('Page');
        $this->dao= M($module);
        $sql = "select * from mz_page where catid = '{$id}' ";
        $arr = $this->dao->query($sql);

        if(empty($arr)){
            throw_exception('404');
        }

        $this->assign('arr_list',$arr);
        layout(false);
        $this->display("Wechat:detail");
    }

}
?>