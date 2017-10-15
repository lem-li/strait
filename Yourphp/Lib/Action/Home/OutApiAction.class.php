<?php
/**
 * 
 * ApiAction.class.php (数据接口)
 *
 * @author          liwenling 
 */
if(!defined("Yourphp")) exit("Access Denied");
class OutApiAction extends BaseAction
{
    public function outNews()
    {
		$id=$_GET["id"];
		$contentTitle=$_GET["contentTitle"];
        if(LANG_ID == 2){
            $lang = 2;
            $catid = 48;
        }else{
            $lang = 1;
            $catid = 30;
        }
        $where = ' lang='.$lang;
        $where .= ' and catid= '.$catid;
        $where .= ' and website= 1';
        $where .= " AND status=1";
		if($id!=null){
			$where .= ' AND id= '.$id;
		}
		if($contentTitle!=null){
			$where .= " AND title like '%".$contentTitle."%'";
		}
        $order = "listorder = 0,listorder asc,createtime desc";
        $list  = M("Article")->field("id,title,createtime,url,content")
                ->where($where)->order($order)->limit(10)->select();
        $res = array();
        if($list)foreach ($list as $key=>$val){
			$res['infoResult'][$key]['id'] = $val['id'];
            $res['infoResult'][$key]['contentTitle'] = $val['title'];
            $res['infoResult'][$key]['publishDate'] = date("Y-m-d H:i:s",$val['createtime']);
            $res['infoResult'][$key]['linkURL'] = strpos($val['url'],'http')===false ? 'http://www.cietac.org'.$val['url']:$val['url'];
			$res['infoResult'][$key]['content'] = $val['content'];
        }
        unset($list);
        echo json_encode($res);
        
    }
    
}