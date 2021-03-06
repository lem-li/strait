<?php
/**
 *
 * IndexAction.class.php (前台首页)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class IndexAction extends BaseAction
{
    public function index()
    {
        //var_Dump($this->module_name);var_dump($this->action_name);
        $this->assign('module_name',$this->module_name);
        $this->assign('action_name',$this->action_name);
        global $webInfo;
        $webid = $webInfo['self']['id'];
        $bansc=D('Domain')->where("status=1 and type_id=1")->order('id asc')->select();
        $this->assign('banshichu',$bansc);
        //幻灯片
        $flase_list = M('slide_data')->where('fid = 1 AND website = '.$webid.' AND status = 1 AND lang = '.LANG_ID)->order('listorder asc,id DESC')->select();
        if(empty($flase_list) && LANG_ID == 2){
            $flase_list = M('slide_data')->where('fid = 1 AND website = '.$webid.' AND status = 1 AND lang = 1')->order('listorder asc,id DESC')->select();
        }
        if(empty($flase_list) && LANG_ID == 3){
            $flase_list = M('slide_data')->where('fid = 1 AND website = '.$webid.' AND status = 1 AND lang = 1')->order('listorder asc,id DESC')->select();
        }
        $this->assign('flase_list',$flase_list);
        
        //重要提示
        if(LANG_ID == 1){
            $cate1id = 136;
        }elseif (LANG_ID == 2){
            $cate1id = 141;
        }else{
            $cate1id = 372;
        }
        $category = M('Category')->where('parentid="'.$cate1id.'"')->order("listorder asc,id asc")->select();
        $c_right_c_bt = '';
        $c_right_c1_r = '<div class="tab-con">';
        if($category){
            $c_right_c_bt .= '<div class="tab-head"><ul>';
            foreach($category as $k=>$cate){
                $c_right_c_bt .= '<li class="bt '.($k==0?' selected':'').'">'.($k==0?'<span class="line"></span>':'').$cate['catname'].'</li>';

                $article_list = M($cate['module'])->where('catid='.$cate['id'].' AND website = '.$webid)->order('listorder asc,id DESC')->limit('0,3')->select();
                $c_right_c1_r .= '<div class="tab-item '.($k<>0?"hide":"").'"><div class="c-info-con">';
                if($article_list)foreach($article_list as $article){
                    $c_right_c1_r .= '<p style="'.(LANG_ID == 2?'text-indent: 0em':"text-indent: 2em").'"><a style="color:#505050;" href="'.$article['url'].'" target="_blank">
                        '.mb_substr($article['description'],0,80,'utf-8').'</a>';
                    if($cate['module'] == 'Download')
                    $c_right_c1_r .= '<a style="color:#ffffff;" href="index.php?m=Download&a=down&id='.$article['id'].'" target="_blank">（PDF'.(LANG_ID == 2?' Download':"下载").'）</a></p>';
                }
                $c_right_c1_r .= '</div></div>';
            }
            $c_right_c1_r .= '</div>';
            $c_right_c_bt .= '</ul> </div>';
        }
        $this->assign('c_right_1',$c_right_c_bt.$c_right_c1_r);//顶级栏目
        //贸仲讲坛  
        $cate2id = LANG_ID == 1 ? 139 : 144;
        $category2 = M('Category')->where('parentid="'.$cate2id.'"')->order("listorder asc,id asc")->select();
        $c2_r_1 = '';
        $c2_r_1_list = '';
        if($category2){
            foreach($category2 as $k=>$cate){
                $c2_r_1 .= '<span additional="'.$cate['url'].'" class="bt'.($k==0?' active':'').'">'.$cate['catname'].'</span>';
                $article_list = M($cate['module'])->where('catid='.$cate['id'].' AND website = '.$webid)->order('listorder asc,createtime DESC')->limit('0,8')->select();
                $c2_r_1_list .= '<div class="c2_r_list'.($k<>0?' fn-hide':'').'">';
                if($article_list)foreach($article_list as $article){
                    $c2_r_1_list .= '<li><span>></span> <a href="'.$article['url'].'" title="'.$article['title'].'" target="_blank">'.$article['title'].'</a>
                        <span class="date">['.date('Y-m-d',$article['createtime']).']</span></li>';
                }
                $c2_r_1_list .= '</div>';
            }
            $c2_r_1 .= '<a href="'.$category2[0]['url'].'" class="more">MORE</a>';
        }
        $this->assign('c2_r_1',$c2_r_1);//顶级栏目
        $this->assign('c2_r_1_list',$c2_r_1_list);//顶级栏目
        
        
        $cate_id = LANG_ID == 1 ? 30 : 48;
        $i = 0;
        $web_news = array();
        if($webInfo['list'])foreach($webInfo['list'] as $k=>$web){
            $new_list_home = '';
            if($web['id'] != $webInfo['self']['id']){
                $i ++;
                $web_news[$k]['i'] = $i;
                if(LANG_ID == 1){
                    $web_news[$k]['name'] = $web['name'];
                }else{
                    $web_news[$k]['name'] = $web['enname'];
                }
                $where = ' lang='.LANG_ID.' and website='.$web['id'] .' AND status=1 AND catid='.$cate_id;
                $list = M('Article')->field('id,catid,url,title,listorder,createtime')->where($where)
                        ->order('listorder asc,createtime desc')->limit(8)->select();
                $new_list_home .= '<div class="c2_r_list'.($k>1?' fn-hide':'').'">';
                if($list)foreach($list as $kk=>$article){
                        $new_list_home .= '<li><span>></span> <a href="'.$article['url'].'" title="'.$article['title'].'" target="_blank">'.$article['title'].'</a>
                            <span class="date">['.date('Y-m-d',$article['createtime']).']</span></li>';
                }
                $new_list_home .= '</div>';
                $web_news[$k]['list'] = $new_list_home;
                
            }
            if(count($web_news) >= 2) break;
        }
        
        $this->assign('web_news',$web_news);//顶级栏目
       	
	$pic_cate_id = LANG_ID == 1 ? '241,242,245' : '257,258,259';
        $time = time();
        $pic_res = M('Article')->where("catid in ({$pic_cate_id}) and createtime < '{$time}' and is_thumb = 1")->order("createtime desc")->limit(1)->select();
        $pic_url = isset($pic_res[0]['thumb']) ? array('url'=>$pic_res[0]['url'],'pic'=>$pic_res[0]['thumb']) :'';
        $this->assign('hd_pic',$pic_url);//活动图片
 
        
        $this->assign('bcid',0);//顶级栏目
        $this->assign('ishome','home');
        //if(LANG_ID == 1){
            $this->display('Index:index');
        /*
        }elseif(LANG_ID == 2){
            $this->display('Index:indexEN');
        }else{
            $this->display('Index:indexFC');
        }
        */
    }

}
?>
