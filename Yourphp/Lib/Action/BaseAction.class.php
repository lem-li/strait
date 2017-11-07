<?php
/**
 *
 * Base (前台公共模块)
 *
 * @package      	YOURPHP
 * @author          liuxun QQ:147613338 <admin@yourphp.cn>
 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt
 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $
 */
if(!defined("Yourphp")) exit("Access Denied");
class BaseAction extends Action
{

    public $year_lengh = 6;
    protected   $Config ,$sysConfig,$categorys,$module,$moduleid,$mod,$dao,$Type,$Role,$_userid,$_groupid,$_email,$_username ,$forward ,$user_menu,$Lang,$member_config;
    public function _initialize() {


//        $user_arr = array('uid'=>(string)123);
//
//        var_dump(json_encode($user_arr));
//		$a = array('uid'=> "123");
//		$a = json_encode($a);
//        $aa = json_decode($a,true);
//		var_dump($aa['uid']);exit();
            require_once APP_PATH.'Conf/peopleattr.php';
			$this->sysConfig = F('sys.config');
			$this->module = F('Module');
			$this->Role = F('Role');
			$this->Type =F('Type');
			$this->mod= F('Mod');
			$this->moduleid=$this->mod[MODULE_NAME];
                        if(isset($_SERVER['HTTP_HOST'])){
//                             $wwwww = explode('.', $_SERVER['HTTP_HOST']);
//                             if(count($wwwww) > 2 && isset($wwwww[0]) && !empty($wwwww[0]) && !is_numeric($wwwww[0])){
//                                 $www = $wwwww[0];
//                             }
                            $www = $_SERVER['HTTP_HOST'];
                        }
                        $webInfo['list']=D('Domain')->where("status=1 and type_id=0")->order('listorder = 0,listorder asc,id desc')->select();
                        if($webInfo['list'])foreach($webInfo['list'] as $web){
                            if($web['domain'] == $www){
                                $webInfo['self'] = $web;
                                break;
                            }
                        }
						$webInfo['self'] = isset($webInfo['self']) ? $webInfo['self'] : $webInfo['list'][0];
//                         if(empty($webInfo['self']))foreach($webInfo['list'] as $web){
//                             if($web['domain'] == 'www'){
//                                 $webInfo['self'] = $web;
//                                 break;
//                             }
//                         }
                        $this->webInfo = $webInfo;
                        $GLOBALS['webInfo'] = $webInfo;
                        $this->assign('webInfo',$this->webInfo);
                        $this->assign('webid',$webInfo['self']['id']);
                        $this->webid = $webInfo['self']['id'];
                        $banlist=D('Domain')->where("status=1 and type_id=1")->order('listorder = 0,listorder asc,id desc')->select();
                        $this->assign('banlist',$banlist);
			if(APP_LANG){
				$this->Lang = F('Lang');
				$this->assign('Lang',$this->Lang);
				if(get_safe_replace($_GET['l'])){
					if(!$this->Lang[$_GET['l']]['status'])$this->error ( L ( 'NO_LANG' ) );
					$lang=$_GET['l'];
				}else{
					$lang=$this->sysConfig['DEFAULT_LANG'];
				}
				define('LANG_NAME', $lang);
				define('LANG_ID', $this->Lang[$lang]['id']);
				$this->categorys = F('Category_'.$lang);
				if(empty($this->categorys)){
                    $categorys = M('category')->field("*")->where(" lang = ".LANG_ID)->select();
                    $category_arr = array();
                    if($categorys)foreach ($categorys as $cv){
                        $category_arr[$cv['id']] = $cv;
					}
					unset($categorys);
                    $this->categorys = $category_arr;
				}
				$this->Config = F('Config_'.$lang);
				$this->assign('l',$lang);
				$this->assign('langid',LANG_ID);
				$T = F('config_'.$lang,'', APP_PATH.'Tpl/Home/'.$this->sysConfig['DEFAULT_THEME'].'/');
				C('TMPL_CACHFILE_SUFFIX','_'.$lang.'.php');
				cookie('think_language',$lang);
			}else{
				$T = F('config_'.$this->sysConfig['DEFAULT_LANG'],'',  APP_PATH.'Tpl/Home/'.$this->sysConfig['DEFAULT_THEME'].'/');
				$this->categorys = F('Category');
				$this->Config = F('Config');
				cookie('think_language',$this->sysConfig['DEFAULT_LANG']);
			}
			$this->assign('T',$T);
			$this->assign($this->Config);
			$this->assign('Role',$this->Role);
			$this->assign('Type',$this->Type);
			$this->assign('Module',$this->module);
			$this->assign('Categorys',$this->categorys);
			import("@.ORG.Form");
			$this->assign ( 'form',new Form());

			C('HOME_ISHTML',$this->sysConfig['HOME_ISHTML']);
			C('PAGE_LISTROWS',$this->sysConfig['PAGE_LISTROWS']);
			C('URL_M',$this->sysConfig['URL_MODEL']);
			C('URL_M_PATHINFO_DEPR',$this->sysConfig['URL_PATHINFO_DEPR']);
			C('URL_M_HTML_SUFFIX',$this->sysConfig['URL_HTML_SUFFIX']);
			C('URL_LANG',$this->sysConfig['DEFAULT_LANG']);
			C('DEFAULT_THEME_NAME',$this->sysConfig['DEFAULT_THEME']);


			import("@.ORG.Online");
			$session = new Online();
			if(cookie('auth')){
				$yourphp_auth_key = sysmd5($this->sysConfig['ADMIN_ACCESS'].$_SERVER['HTTP_USER_AGENT']);
				list($userid,$groupid, $password) = explode("-", authcode(cookie('auth'), 'DECODE', $yourphp_auth_key));
				$this->_userid = $userid;
				$this->_username =  cookie('username');
				$this->_groupid = $groupid;
				$this->_email =  cookie('email');
			}else{
				$this->_groupid = cookie('groupid') ?  cookie('groupid') : 4;
				$this->_userid =0;
			}


			foreach((array)$this->module as $r){
				if($r['issearch'])$search_module[$r['name']] = L($r['name']);
				if($r['ispost'] && (in_array($this->_groupid,explode(',',$r['postgroup']))))$this->user_menu[$r['id']]=$r;
			}
			if(GROUP_NAME=='User'){
				$langext = $lang ? '_'.$lang : '';
				$this->member_config=F('member.config'.$langext);
				$this->assign('member_config',$this->member_config);
				$this->assign('user_menu',$this->user_menu);
				if($this->_groupid=='5' &&  MODULE_NAME!='Login'){
					$this->assign('jumpUrl',URL('User-Login/emailcheck'));
					$this->assign('waitSecond',3);
					$this->success(L('no_regcheckemail'));
					exit;
				}
				$this->assign('header',TMPL_PATH.'Home/'.THEME_NAME.'/Home_header.html');
			}
			if($_GET['forward'] || $_POST['forward']){
				$this->forward = get_safe_replace($_GET['forward'].$_POST['forward']);
			}else{
				if(MODULE_NAME!='Register' || MODULE_NAME!='Login' )
				$this->forward =isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] :  $this->Config['site_url'];
			}
			$this->assign('forward',$this->forward);
			if($this->categorys){
				$menulist = $this->categorys;
				foreach ($menulist as $catk => $catv){
					if($catv['ismenu'] == 0){
						unset($menulist[$catk]);
					}else{
						if($catv['parentid'] > 0){
							$menulist[$catv['parentid']]['children'][$catk] = $menulist[$catk];
							unset($menulist[$catk]);
						}
					}
				}
			}
			$this->assign('menulist',$menulist);
			$this->assign('search_module',$search_module);
			$this->assign('module_name',MODULE_NAME);
			$this->assign('action_name',ACTION_NAME);

	}

    public function index($catid='',$module='')
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
		$leftmenu = $this->getleftmenu($bcid,$catid);
		$this->assign('leftmenu',$leftmenu);
		if($cat['readgroup'] && $this->_groupid!=1 && !in_array($this->_groupid,explode(',',$cat['readgroup']))){$this->assign('jumpUrl',URL('User-Login/index'));$this->error (L('NO_READ'));}
		$fields = F($this->mod[$module].'_Field');
		foreach($fields as $key=>$r){
			$fields[$key]['setup'] =string2array($fields[$key]['setup']);
		}
		$this->assign ( 'fields', $fields);


		$seo_title = $cat['title'] ? $cat['title'] : $cat['catname'];
		$this->assign ('seo_title',$seo_title);
		$this->assign ('seo_keywords',$cat['keywords']);
		$this->assign ('seo_description',$cat['description']);


		if($module=='Guestbook'){
			$where['status']=array('eq',1);
			$this->dao= M($module);
			$count = $this->dao->where($where)->count();
			if($count){
				import ( "@.ORG.Page" );
				$listRows =  !empty($cat['pagesize']) ? $cat['pagesize'] : C('PAGE_LISTROWS');
				$page = new Page ( $count, $listRows );
				$page->urlrule = geturl($cat,'');
				$pages = $page->show();
				$field =  $this->module[$cat['moduleid']]['listfields'];
				$field =  $field ? $field : '*';
				$list = $this->dao->field($field)->where($where)->order('listorder = 0,listorder asc,id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
				$this->assign('pages',$pages);
				$this->assign('list',$list);
			}
			$template = $cat['module']=='Guestbook' && $cat['template_list'] ? $cat['template_list'] : 'index';
			$this->display(THEME_PATH.$module.'_'.$template.'.html');
		}elseif($module=='Feedback'){
			$template = $cat['module']=='Feedback' && $cat['template_list'] ? $cat['template_list'] : 'index' ;

			$this->display(THEME_PATH.$module.'_'.$template.'.html');
		}elseif($module=='Page'){
			$modle=M('Page');
			//$data = $modle->find($catid);
                        $data = $modle->find(array('where'=>"website = '".$this->webid."' AND catid = '{$catid}'"));
			$data['catid'] = $catid;
			unset($data['id']);
                        $parent_id = $cat['parentid']=='0' ? $catid : $cat['parentid'];
                        $cata_list = M('Category')->where("parentid='{$parent_id}'")->order('listorder = 0,listorder asc,id desc')->select();
                        $data['cate_list'] = $cata_list;
			//分页
			$CONTENT_POS = strpos($data['content'], '[page]');
			if($CONTENT_POS !== false) {
				$urlrule = geturl($cat,'',$this->Urlrule);
				$urlrule[0] =  urldecode($urlrule[0]);
				$urlrule[1] =  urldecode($urlrule[1]);
				$contents = array_filter(explode('[page]',$data['content']));
				$pagenumber = count($contents);
				for($i=1; $i<=$pagenumber; $i++) {
					$pageurls[$i] = str_replace('{$page}',$i,$urlrule);
				}
				$pages = content_pages($pagenumber,$p, $pageurls);
				//判断[page]出现的位置
				if($CONTENT_POS<7) {
					$data['content'] = $contents[$p];
				} else {
					$data['content'] = $contents[$p-1];
				}
				$this->assign ('pages',$pages);
			}

			$template = $cat['template_list'] ? $cat['template_list'] :  'index' ;
			$this->assign ($data);
//                        if($catid == 26 || $catid == 53){
//                            $template = 'contactus';
//                        }
			$this->display(THEME_PATH.$module.'_'.$template.'.html');

		}else{
			if($catid){
				$seo_title = $cat['title'] ? $cat['title'] : $cat['catname'];
				$this->assign ('seo_title',$seo_title);
				$this->assign ('seo_keywords',$cat['keywords']);
				$this->assign ('seo_description',$cat['description']);

                                $year = isset($_GET['year']) && is_numeric($_GET['year']) ? $_GET['year'] : 0;
				$where = " status=1 ";
                                $where .= " AND website='{$this->webInfo['self']['id']}' ";
                                if($year){
                                    $year_start = strtotime($year.'-01-01 00:00:00');
                                    $year_end = strtotime(($year + 1).'-01-01 00:00:00');
                                    $today_year = date('Y');
                                    $to_endYear = $today_year-$this->year_lengh+1;
                                    if($to_endYear == $year){
                                        $where .= " AND createtime < $year_end";
                                    }else{
                                        $where .= " AND createtime > $year_start AND createtime < $year_end";
                                    }
                                    $this->assign ('currentyear',$year);
                                }
				if($cat['child']){
					$where .= " and catid in(".$cat['arrchildid'].")";
				}else{
					$where .=  " and catid=".$catid;
				}
				if(empty($cat['listtype'])){
					$this->dao= M($module);
					$count = $this->dao->where($where)->count();
					if($count){
						import ( "@.ORG.Page" );
						$listRows =  !empty($cat['pagesize']) ? $cat['pagesize'] : C('PAGE_LISTROWS');
						$page = new Page ( $count, $listRows );
						$page->urlrule = geturl($cat,'',$this->Urlrule);
						$pages = $page->show();
						$field =  $this->module[$this->mod[$module]]['listfields'];
						$field =  $field ? $field : 'id,catid,userid,url,username,title,title_style,keywords,description,thumb,createtime,hits';
						$list = $this->dao->field($field)->where($where)->order('listorder = 0,listorder asc,id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
						$this->assign('pages',$pages);
						$this->assign('list',$list);
					}
					$template_r = 'list';
				}else{
					$template_r = 'index';
				}
			}else{
				$template_r = 'list';
			}
                        if($catid == 30 || $catid == 48){
                            $today = date('Y');
                            $news_years = array();
                            $endYear = $today-$this->year_lengh;
                            for($year=$today;$year>$endYear;$year--){
                                $news_years[] = $year;
                            }
                            $this->assign('news_years',$news_years);
                        }else{
//                            $parent_id = $cat['module']=='Article' ? $cat['parentid'] : $catid;
                            //$parent_id = in_array($catid,array(56,23,63,67,70,71,80,77,76,75,74,73,69,91,92,93,94,105,120,124,125)) ? $cat['parentid'] : $catid;
                            $parent_id = $cat['parentid'] > 0 ? $cat['parentid'] : $catid;
                            $cata_list = M('Category')->where("parentid='{$parent_id}'")->order('listorder = 0,listorder asc,id desc')->select();
                            $this->assign('cate_list',$cata_list);
                        }
                        
			$template = $cat['template_list'] ? $cat['template_list'] : $template_r;
			$this->display($module.':'.$template);
		}
    }



	public function show($id='',$module='')
    {
		$this->Urlrule =F('Urlrule');
		$p= max(intval($_REQUEST[C('VAR_PAGE')]),1);
		$id = $id ? $id : intval($_REQUEST['id']);
		$module = $module ? $module : MODULE_NAME;
		$this->assign('module_name',$module);
		$this->dao= M($module);;
		$data = $this->dao->find($id);


		$catid = $data['catid'];
		$cat = $this->categorys[$data['catid']];
		if(empty($cat['ishtml']))$this->dao->where("id=".$id)->setInc('hits'); //添加点击次数
		$bcid = explode(",",$cat['arrparentid']);
		$bcid = $bcid[1];
		if($bcid == '') $bcid=intval($catid);
		
		$leftmenu = $this->getleftmenu($bcid,$catid);
		$this->assign('leftmenu',$leftmenu);

		if($data['readgroup']){
			if($this->_groupid!=1 && !in_array($this->_groupid,explode(',',$data['readgroup'])) )$noread=1;
		}elseif($cat['readgroup']){
			if($this->_groupid!=1 && !in_array($this->_groupid,explode(',',$cat['readgroup'])) )$noread=1;
		}
		if($noread==1){$this->assign('jumpUrl',URL('User-Login/index'));$this->error (L('NO_READ'));}

		$chargepoint = $data['readpoint'] ? $data['readpoint'] : $cat['chargepoint'];
		if($chargepoint && $data['userid'] !=$this->_userid){
			$user = M('User');
			$userdata =$user->find($this->_userid);
			if($cat['paytype']==1 && $userdata['point']>=$chargepoint){
				$chargepointok = $user->where("id=".$this->_userid)->setDec('point',$chargepoint);
			}elseif($cat['paytype']==2 && $userdata['amount']>=$chargepoint){
				$chargepointok = $user->where("id=".$this->_userid)->setDec('amount',$chargepoint);
			}else{
				$this->error (L('NO_READ'));
			}
		}

		$seo_title = $data['title'].'-'.$cat['catname'];
		$this->assign ('seo_title',$seo_title);
		$this->assign ('seo_keywords',$data['keywords']);
		$this->assign ('seo_description',$data['description']);
		$this->assign ( 'fields', F($cat['moduleid'].'_Field') );


		$fields = F($this->mod[$module].'_Field');
		foreach($data as $key=>$c_d){
			$setup='';
			$fields[$key]['setup'] =$setup=string2array($fields[$key]['setup']);
			if($setup['fieldtype']=='varchar' && $fields[$key]['type']!='text'){
				$data[$key.'_old_val'] =$data[$key];
				$data[$key]=fieldoption($fields[$key],$data[$key]);
			}elseif($fields[$key]['type']=='images' || $fields[$key]['type']=='files'){
				if(!empty($data[$key])){
					$p_data=explode(':::',$data[$key]);
					$data[$key]=array();
					foreach($p_data as $k=>$res){
						$p_data_arr=explode('|',$res);
						$data[$key][$k]['filepath'] = $p_data_arr[0];
						$data[$key][$k]['filename'] = $p_data_arr[1];
					}
					unset($p_data);
					unset($p_data_arr);
				}
			}
			unset($setup);
		}
		$this->assign('fields',$fields);


		//手动分页
		$CONTENT_POS = strpos($data['content'], '[page]');
		if($CONTENT_POS !== false) {

			$urlrule = geturl($cat,$data,$this->Urlrule);
			$urlrule =  str_replace('%7B%24page%7D','{$page}',$urlrule);
			$contents = array_filter(explode('[page]',$data['content']));
			$pagenumber = count($contents);
			for($i=1; $i<=$pagenumber; $i++) {
				$pageurls[$i] = str_replace('{$page}',$i,$urlrule);
			}
			$pages = content_pages($pagenumber,$p, $pageurls);
			//判断[page]出现的位置是否在文章开始
			if($CONTENT_POS<7) {
				$data['content'] = $contents[$p];
			} else {
				$data['content'] = $contents[$p-1];
			}
			$this->assign ('pages',$pages);
		}

		if(!empty($data['template'])){
			$template = $data['template'];
		}elseif(!empty($cat['template_show'])){
			$template = $cat['template_show'];
		}else{
			$template =  'show';
		}
		if($catid == 30 || $catid == 48){
			$today = date('Y');
			$news_years = array();
                        $endYear = $today-$this->year_lengh;
			for($year=$today;$year>$endYear;$year--){
				$news_years[] = $year;
			}
			$this->assign('news_years',$news_years);
		}else{
			$cata_list = M('Category')->where("parentid='{$bcid}'")->order('listorder = 0,listorder asc,id desc')->select();
			$this->assign('cate_list',$cata_list);
		}
		
		//增加上一篇下一篇
		if($module == 'Article' || $module == 'Download' || $module == 'Video'){
			//上一篇
			$cutime = $data['createtime'];
			$predata = M($module)->where("catid = $catid and lang = '".LANG_ID."' and website = '".$this->webid."' and createtime <= $cutime and id <> $id")->order('listorder = 0,listorder asc,id desc')->limit(1)->select();
			$lastdata = M($module)->where("catid = $catid and lang = '".LANG_ID."' and website = '".$this->webid."' and createtime > $cutime")->order('listorder = 0,listorder desc,id asc')->limit(1)->select();
			if($predata){
				$this->assign('predata',$predata[0]);
			}
			if($lastdata){
				$this->assign('lastdata',$lastdata[0]);
			}
		}

		$this->assign('catid',$catid);
		$this->assign ($cat);
		$this->assign('bcid',$bcid);

		$this->assign ($data);

		$this->display($module.':'.$template);
    }

	public function down()
	{

		$module = $module ? $module : MODULE_NAME;
		$id = $id ? $id : intval($_REQUEST['id']);
		$this->dao= M($module);
		$filepath = $this->dao->where("id=".$id)->getField('file');
		$this->dao->where("id=".$id)->setInc('downs');

		if(strpos($filepath, ':/')) {
			header("Location: $filepath");
		} else {
			$filepath = '.'.$filepath;
			if(!$filename) $filename = basename($filepath);
			$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
			if(strpos($useragent, 'msie ') !== false) $filename = rawurlencode($filename);
			$filetype = strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
			$filesize = sprintf("%u", filesize($filepath));
			if(ob_get_length() !== false) @ob_end_clean();
			header('Pragma: public');
			header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Cache-Control: pre-check=0, post-check=0, max-age=0');
			header('Content-Transfer-Encoding: binary');
			header('Content-Encoding: none');
			header('Content-type: '.$filetype);
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Content-length: '.$filesize);
			readfile($filepath);
		}
		exit;
	}

	public function hits()
	{
		$module = $module ? $module : MODULE_NAME;
		$id = $id ? $id : intval($_REQUEST['id']);
		$this->dao= M($module);
		$this->dao->where("id=".$id)->setInc('hits');

		if($module=='Download'){
			$r = $this->dao->find($id);
			echo '$("#hits").html('.$r['hits'].');$("#downs").html('.$r['downs'].');';
		}else{
			$hits = $this->dao->where("id=".$id)->getField('hits');
			echo '$("#hits").html('.$hits.');';
		}
		exit;
	}
	public function verify()
    {
		header('Content-type: image/jpeg');
        $type	 =	 isset($_GET['type'])? get_safe_replace($_GET['type']):'jpeg';
        import("@.ORG.Image");
        Image::buildImageVerify(4,1,$type);
    }
    
    public function getleftmenu($cateid,$currentcid=0,$type=0){
    	$child = $this->getchilds($cateid);
    	if(is_array($child)){
    		$this->html .= '<ul>';
    		foreach($child as $ck=>$cv){
    			$childs = $this->getchilds($cv['id']);
    			if($childs){
    				$this->html .= '<li><a href="javascript:void(0);" class="menu-link" title="'.$cv['catname'].'">'.$cv['catname'].'</a>';
    				$this->html .= '<div class="sub-main-menu">';
    				$this->getleftmenu($cv['id'],0,1);
    				$this->html .= '</div></li>';
    			}else{
    				if($type == 1){
    					$this->html .= '<li title="" class=""><a href="'.$cv['url'].'" title="'.$cv['catname'].'">'.$cv['catname'].'</a></li>';
    				}else{
    					$this->html .= '<li><a href="'.$cv['url'].'" class="menu-link" title="'.$cv['catname'].'">'.$cv['catname'].'</a></li>';
    				}
    			}
    
    		}
    		$this->html .= '</ul>';
    	}
    	return $this->html;
    }
    
    public function getchilds($bid){
    	$newarr = $v = array();
    	if(is_array($this->categorys)){
    		foreach($this->categorys as $k => $v){
    			if($v['parentid'] == $bid){
    				$newarr[$k] = $v;
    			}
    		}
    	}
    	return $newarr ? $newarr : array();
    }
}
?>
