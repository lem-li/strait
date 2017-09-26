<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <title><?php echo ($seo_title); ?>-<?php echo ($site_name); ?></title>
    <meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
    <meta name="description" content="<?php echo ($seo_description); ?>" />
    <link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
    <link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
    <link rel="stylesheet" href="__PUBLIC__/Css/list.css" />
    <link rel="stylesheet" href="__PUBLIC__/Css/login.css" />
    <style type="text/css">  
    .anchorBL{  
        display:none;  
    }  
    .header .nav .nav_item .nav_a{
        margin-left: -8px;
    }
   </style>
</head>
<body>
<div class="header">
    <div class="header_wrap">
        <div class="logo">
            <a href="/<?php if($l == 'en') : ?>?l=en<?php endif;?>"><img src="<?php if($webInfo['self']['pic']=='') : ?>__PUBLIC__/img/logo.jpg<?php else : echo ($webInfo['self']['pic']); endif;?>"> </a>
        </div>
        <div class="nav">
            <div  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=2">关于我们</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=2" >贸仲简介</a><a href="/index.php?m=Page&a=index&id=20" >组织机构</a><a href="/index.php?m=Page&a=index&id=21" >贸仲章程</a><a href="/index.php?m=Article&a=index&id=22" >历史资料</a><a href="/index.php?m=Article&a=index&id=23" >工作报告</a><a href="/index.php?m=Page&a=index&id=24" >统计数据</a><a href="/index.php?m=Page&a=index&id=25" >服务设施</a><a href="/index.php?m=Page&a=index&id=26" >联系我们</a></div></div><div  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=14">规则</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=65" >贸仲委现行仲裁规则</a><a href="/index.php?m=Article&a=index&id=248" >现行仲裁规则（其他语言译本）</a><a href="/index.php?m=Page&a=index&id=66" >贸仲委现行金融仲裁规则</a><a href="/index.php?m=Article&a=index&id=67" >贸仲委其他仲裁规则</a><a href="/index.php?m=Page&a=index&id=68" >贸仲委证据指引</a></div></div><div  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=4">仲裁指南</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=116" >为何选择仲裁</a><a href="/index.php?m=Page&a=index&id=117" >为何选择CIETAC</a><a href="/index.php?m=Page&a=index&id=119" >CIETAC受案范围</a><a href="/index.php?m=Page&a=index&id=118" >示范仲裁条款</a><a href="/index.php?m=Page&a=index&id=115" >申请仲裁须知</a><a href="/index.php?m=Article&a=index&id=124" >程序指南</a><a href="/index.php?m=Article&a=index&id=120" >申请仲裁</a><a href="/index.php?m=Page&a=index&id=121" >仲裁费用表</a><a href="/index.php?m=Cost" >费用快算</a><a href="/index.php?m=Page&a=index&id=122" >撤案仲裁费用的退费</a><a href="/index.php?m=Download&a=index&id=125" >仲裁文书下载</a></div></div><div  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=17">仲裁员</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=27" >仲裁员名册</a><a href="/index.php?m=Page&a=index&id=28" >仲裁员守则</a><a href="/index.php?m=Page&a=index&id=57" >仲裁员聘任规定</a><a href="/index.php?m=Page&a=index&id=58" >仲裁员培训规定</a><a href="/index.php?m=Page&a=index&id=59" >仲裁员行为考察规定</a><a href="http://www.cietac.org/index.php?g=User&m=Arbitrator&a=index" >仲裁员查询</a><a href="/index.php?m=Article&a=index&id=324" >通知公告</a><a href="/index.php?g=User&m=Login&a=index" >仲裁员在线申请</a><a href="/index.php?m=Article&a=index&id=63" >荣誉仲裁员</a></div></div><div  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=19">多元服务</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=262" >域名争议</a><a href="/index.php?m=Article&a=index&id=261" >网上仲裁</a><a href="/index.php?m=Article&a=index&id=263" >建设工程争议评审</a><a href="/index.php?m=Page&a=index&id=104" >投资争端调解</a></div></div><div  class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=30&year=2017">新闻</a></div><div  class="nav_item"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=245">专题活动</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=241" >海峡两岸经贸仲裁研讨会</a><a href="/index.php?m=Article&a=index&id=242" >贸仲杯</a><a href="/index.php?m=Article&a=index&id=245" >中国仲裁周</a></div></div><div  class="nav_item"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=73">资料</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=73" >中国法资料</a><a href="/index.php?m=Article&a=index&id=74" >外国法资料</a><a href="/index.php?m=Article&a=index&id=75" >外国仲裁机构仲裁规则</a><a href="/index.php?m=Article&a=index&id=76" >国际公约及惯例</a><a href="/index.php?m=Article&a=index&id=77" >格式合同</a><a href="http://cietac.chinalawinfo.com/" >法律资料库（中文）</a><a href="http://www.lawinfochina.com/" >法律资料库（英文）</a><a href="/index.php?m=Article&a=index&id=80" >会议资料</a></div></div><div  class="nav_item last"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=71">研究</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=71" >论文精选</a><a href="/index.php?m=Article&a=index&id=251" >年度报告</a><a href="/index.php?m=Page&a=index&id=72" >贸仲出版物</a><a href="/index.php?m=Article&a=index&id=93" >案例评析</a><a href="" >中国仲裁评论</a></div></div>
            <div class="switch">
                <?php if($old_site_url) : ?><a href="<?php echo ($old_site_url); ?>"><span style="margin-right: 23px;">原网站</span></a><?php endif;?>
                <a href="/<?php if($l == 'en') : ?>?l=en<?php endif;?>"><span style="margin-right: 23px;"><?php if($l=='cn') : ?>首页<?php else :?>Home<?php endif;?></span></a>
                <a href="<?php echo U('Sitemap/index?l='.$l);?>"><span style="margin-right: 23px;"><?php if($l=='cn') : ?>网站地图<?php else :?>Site map<?php endif;?></span></a>
                    <?php if($l == 'en') : ?>
                    <a href="/">中文</a> &nbsp;
                    <?php else :?>
                    <a href="/?l=en">English</a> &nbsp;
                    <?php endif;?>
            </div>
        </div>
    </div>
</div>


		<div class="c0">
    <div class="flexslider">
        <ul class="slides">
            <?php if(is_array($flase_list)): $i = 0; $__LIST__ = $flase_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li style="background: url('<?php echo ($r["pic"]); ?>') 50% 0 no-repeat;"></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="wrap">
        <div class="c_left c0_l">
            <div class="c_bt">
                <span class="bt"><?php if($l=='cn') : ?>新闻中心<?php else :?>News<?php endif;?></span>
                <a href="/index.php?m=Article&a=index&id=<?php if($l=='cn') : ?>30<?php else :?>48&l=en<?php endif;?>" class="more">MORE</a>
            </div>
            <div class="c0_img">
                <div id="scro_img" class="scro_img">
                    <ul>
                        <?php  $_result=M("Article")->field("title,url,thumb")->where("is_thumb=1 and lang=1 and website=1 AND status=1  AND catid=30")->order("listorder = 0,listorder asc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li>
                                <a href="<?php echo ($r["url"]); ?>" target="_blank">
                                    <img width="460" height="210" src="<?php echo ($r["thumb"]); ?>" alt="">
                                </a>
                            </li><?php endforeach; endif;?> 
                    </ul>
                </div>
                <div class="scro_nav" id="scro_nav">
                    <a href="javascript:void(0);" class="active">1</a>
                    <a href="javascript:void(0);">2</a>
                    <a href="javascript:void(0);">3</a>
                    <a href="javascript:void(0);">4</a>
                </div>
            </div>
            <ul class="c0_list">
                <?php  $_result=M("Article")->field("title,url,createtime")->where("is_thumb=1 and lang=1 and website=1 AND status=1  AND catid=30")->order("listorder = 0,listorder asc,id desc")->limit("4")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><li>
                        <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r[title]); ?>[<?php echo (todate($r["createtime"],'Y-m-d')); ?>]" target="_blank" style="width:auto;float:left;"><?php echo (str_cut($r[title],50)); ?></a><span class="date" style="float:right;color:#707070;">[<?php echo (todate($r["createtime"],'Y-m-d')); ?>]</span>
                    </li><?php endforeach; endif;?> 
            </ul>
        </div>
        <div class="c_right">
            <div class="search">
    <form name="searchPage" id="searchPage" method="get" action="index.php?" onsubmit="return validatek();">
        <input type="hidden" id="" name="m" value="Search"/>
        <?php if(APP_LANG) : ?><input type="hidden" name="l" value="<?php echo ($l); ?>" /><?php endif;?>
        <input type="text" name="keyword" id="keyword" class="search_input" value="<?php echo ($keyword); ?>" placeholder="<?php if($l == 'cn') : ?>请输入您要搜索的内容<?php else :?>Please enter the content you want to search.<?php endif;?>">
        <input type="submit" value="" class="search_button">
    </form>
</div>
<script type="text/javascript">
function validatek(){
    var langs = '<?php echo ($l); ?>';
    var keyword = $.trim($("#keyword").val());
    if(keyword == ''){
        if(langs == 'cn'){
            alert("搜索内容不能为空！");
        }else{
            alert("search content is can not empty！");
        }
        return false;
    }
}
</script>
        </div>
    </div>
</div>
<div class="c">
    <div class="c1">
        <div class="c_left">
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Article/index?id=120'); else : echo U('Article/index?id=190&l=en'); endif;?>" target="_blank"><span class="icon icon1"></span><?php if($l == 'cn') : ?>申请仲裁<?php else :?>Application<?php endif;?></a>
            <a class="c1_item" href="http://dndrc.cietac.org/cietac" target="_blank"><span class="icon icon6"></span><?php if($l == 'cn') : ?>域名争议解决<?php else :?>Domain Name<?php endif;?></a>
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Page/index?id=14'); else : echo U('Page/index?id=42&l=en'); endif;?>" target="_blank"><span class="icon icon3"></span><?php if($l == 'cn') : ?>仲裁规则<?php else :?>Rules<?php endif;?></a>
            <a class="c1_item" href="http://www.cietacodr.org/" target="_blank"><span class="icon icon5"></span><?php if($l == 'cn') : ?>网上仲裁<?php else :?>Online Arbitration<?php endif;?></a>
            <a class="c1_item" href="/index.php?m=Cost<?php if($l == 'en') : ?>&l=en<?php endif;?>" target="_blank"><span class="icon icon2"></span><?php if($l == 'cn') : ?>费用快算<?php else :?>Fee Calculator<?php endif;?></a>
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Page/index?id=72'); else : echo U('Page/index?id=207&l=en'); endif;?>" target="_blank"><span class="icon icon7"></span><?php if($l == 'cn') : ?>贸仲出版物<?php else :?>CIETAC Publication<?php endif;?></a>
           <a class="c1_item" href="<?php echo U('User/Arbitrator/index'); if($l == 'en') : ?>&l=en<?php endif;?>" target="_blank"><span class="icon icon4"></span><?php if($l == 'cn') : ?>仲裁员查询<?php else :?>Arbitrator Search<?php endif;?></a>
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Article/index?id=152'); else : echo U('Article/index?id=239&l=en'); endif;?>" target="_blank"><span class="icon icon9"></span><?php if($l == 'cn') : ?>贸仲简报<?php else :?>Newsletters<?php endif;?></a>
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Page/index?id=24'); else : echo U('Page/index?id=40&l=en'); endif;?>" target="_blank"><span class="icon icon10"></span><?php if($l == 'cn') : ?>数据统计<?php else :?>Statistics<?php endif;?></a>
            <a class="c1_item" href="<?php if($l == 'cn') : echo U('Article/index?id=251'); else : echo U('Article/index?id=255&l=en'); endif;?>" target="_blank"><span class="icon icon8"></span><?php if($l == 'cn') : ?>研究报告<?php else :?>Research Report<?php endif;?></a>						<a class="c1_item" href="index.php?g=User&m=ArbitratorSm&a=sm" target="_blank"><span class="icon icon11"></span><?php if($l == 'cn') : ?>报酬查询<?php else : endif;?></a>
        </div>
        <div class="c_right">
            <?php echo ($c_right_1); ?>
            <div class="c1_img">
                <?php if($hd_pic != '') : ?>
                <a href="<?php echo ($hd_pic['url']); ?>">
                    <img width="620" height="90" src="<?php echo ($hd_pic['pic']); ?>">
                </a>
                <?php else :?>
                <img width="620" height="90" src="Public/img/c1_img.jpg">
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="c2">
        <div class="c_left">
            <div class="c_bt"><span class="bt"><?php if($l=='cn') : ?>分会<?php else :?>Sub-Commission<?php endif;?></span><a href="<?php if($l == 'cn') : echo U('Page/index?id=26'); else : echo U('Page/index?id=53&l=en'); endif;?>" class="more">MORE</a></div>
            <div class="map">
                <div id="baidu_map2" >
                <img src="Public/img/map2.jpg" width="350px" height="200px">
                </div>
                <div class="map_list">
                    <?php if(is_array($webInfo["list"])): $i = 0; $__LIST__ = $webInfo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i; if($r['id'] != 24) : ?>
                        <a href="<?php if($r['link']!='') : echo ($r["link"]); else :?>http://<?php echo ($r["domain"]); ?>/<?php endif;?>" target="_blank">> <?php if($l=='cn') : echo ($r["name"]); else : echo ($r["enname"]); endif;?></a>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="c_bt" style="margin-top: 30px"><span class="bt"><?php if($l=='cn') : ?>办事处<?php else :?>Offices<?php endif;?></span><a href="<?php if($l == 'cn') : echo U('Page/index?id=246'); else : echo U('Page/index?id=247&l=en'); endif;?>" class="more">MORE</a></div>
        </div>
        <div class="c_right">
            <div class="c2_r_1">
                <div class="c_bt">
                    <?php echo ($c2_r_1); ?>
                </div>
                <?php echo ($c2_r_1_list); ?>
            </div>
            <div class="c2_r_2">
                <div class="c_bt">
                    <?php if(is_array($web_news)): $i = 0; $__LIST__ = $web_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><span class="bt <?php if($r.i==1) : ?>active<?php endif;?>"><?php echo ($r["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                    <a href="/index.php?m=News<?php if($l=='en') : ?>&l=en<?php endif;?>" class="more">MORE</a>
                </div>
                <?php if(is_array($web_news)): $i = 0; $__LIST__ = $web_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i; echo ($r["list"]); endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="c3">
        <div class="c_left">
            <div class="c_bt"><span class="bt"><?php if($l=='cn') : ?>友情链接<?php else :?>Links<?php endif;?></span></div>
            <div class="c3_l_c">
                <?php if($l=='cn') : ?>
                <a href="/index.php?m=FriendLink#guanlian" style="width:126px;" target="_blank" title="关联机构">关联机构</a>
                <a href="/index.php?m=FriendLink#hezuo" style="width:126px;" target="_blank" title="合作伙伴">合作伙伴</a>
                <a href="/index.php?m=FriendLink#changyong" style="width:126px;" target="_blank" title="常用网站">常用网站</a>
                <?php else :?>
                <a href="/index.php?m=FriendLink&l=en#guanlian" style="width:126px;" target="_blank" title="Affiliates">Affiliates</a>
                <a href="/index.php?m=FriendLink&l=en#hezuo" style="width:126px;" target="_blank" title="Partner">Partner</a>
                <a href="/index.php?m=FriendLink&l=en#changyong" style="width:126px;" target="_blank" title="Useful Websites">Useful Websites</a>
                <?php endif;?>
            </div>
        </div>
        <div class="c_right">
            <div class="map" id="baidu_map" style="width: 274px;height: 173px;"></div>
            <div class="addr">
                <dl>
                    <?php if($l=='cn') : ?>
                    <dt>地址：</dt>
                    <dd><?php echo ($webInfo['self']['address']); ?></dd>
                    <?php else :?>
                    <dt>Add：</dt>
                    <dd><?php echo ($webInfo['self']['enaddress']); ?></dd>
                    <?php endif;?>
                </dl>
                <dl>
                    <dt><?php if($l=='cn') : ?>电话<?php else :?>Tel<?php endif;?>：</dt>
                    <dd><?php echo ($webInfo['self']['phone']); ?></dd>
                </dl>
                <dl>
                    <dt><?php if($l=='cn') : ?>传真<?php else :?>Fax<?php endif;?>：</dt>
                    <dd><?php echo ($webInfo['self']['fax']); ?></dd>
                </dl>
                <dl>
                    <dt><?php if($l=='cn') : ?>邮编<?php else :?>P.C.<?php endif;?>：</dt>
                    <dd><?php echo ($webInfo['self']['postal']); ?></dd>
                </dl>
                <dl>
                    <dt><?php if($l=='cn') : ?>信箱<?php else :?>Email<?php endif;?>：</dt>
                    <dd><?php echo ($webInfo['self']['email']); ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var map2 = null;
	//百度地图API功能
	function loadJScript() {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://api.map.baidu.com/api?v=2.0&ak=lLlooWKhUVArNOrr3K9Ox7Tm&callback=init";
		document.body.appendChild(script);
	}
	function init() {
		// 百度地图API功能
		var lng = <?php echo ($webInfo['self']['lng']); ?>;
		var lat = <?php echo ($webInfo['self']['lat']); ?>;
		var map = new BMap.Map("baidu_map")
		var new_point = new BMap.Point(lng,lat);
		map.centerAndZoom(new_point,13);
		/*		
                var navigationControl = new BMap.NavigationControl({
			// 靠左上角位置
			anchor: BMAP_ANCHOR_TOP_LEFT,
			// LARGE类型
			type: BMAP_NAVIGATION_CONTROL_LARGE,
			// 启用显示定位
			enableGeolocation: true
		  });
                map.addControl(navigationControl);
		*/
		map.enableScrollWheelZoom();
		var marker = new BMap.Marker(new_point);  // 创建标注
		map.addOverlay(marker);              // 将标注添加到地图中
		map.panTo(new_point);   
                
                //map_2(104.090996,35.875633);
	}  
	window.onload = loadJScript;  //异步加载地图
        
        function map_2(lng,lat){
            if(window.map2 == null){
                window.map2 = new BMap.Map("baidu_map2");            // 创建Map实例
                var point2 = new BMap.Point(lng,lat);  
                map2.centerAndZoom(point2,3); 
                map2.disableScrollWheelZoom();  
                map2.disableDragging(); 
                return false;
            }
            if(lng > 0 && lat > 0){
                var allOverlaya = map2.getOverlays();
                //for (var i = 0; i < allOverlaya.length -1; i++){
                    //map2.removeOverlay(allOverlaya[i]);
                //}
                map2.removeOverlay(allOverlaya[0]);
                var point2 = new BMap.Point(lng,lat);  
                //map2.centerAndZoom(point1,3); 
                //初始化地图标记
                var marker = new BMap.Marker(point2);  // 创建标注
                map2.addOverlay(marker);              // 将标注添加到地图中
            }
        }
            
        
        
            
</script>

 
<div class="footer">
    <div class="f1">
        <div class="wrap">
            <dl class="item2">
                <dd>
                    <a href="<?php echo URL('User-Login/index');?>" target="_blank"> <?php if($l=='cn') : ?>仲裁员入口<?php else :?>Arbitrators Entrance<?php endif;?></a>
                    <a href="<?php echo URL('User-Trainee/index');?>" target="_blank"> <?php if($l=='cn') : ?>实习生入口<?php else :?>Interns Entrance<?php endif;?></a>
                </dd>
            </dl>
            <dl class="item3">
                <dt><?php if($l=='cn') : ?>仲裁指南<?php else :?>Guide<?php endif;?></dt>
                <?php if($l=='cn') : ?>
                <?php  $_result=M()->query("select `catname`,`url` FROM `mz_category` WHERE 1 and lang=1 and parentid = 4 ORDER BY listorder asc,id desc limit 6"); if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>" target="_blank"><?php echo (str_cut($r["catname"],30)); ?></a></dd><?php endforeach; endif;?> 
                <?php else :?>
                <?php  $_result=M()->query("select `catname`,`url` FROM `mz_category` WHERE 1 and lang=2 and parentid = 45 ORDER BY listorder asc,id desc limit 6"); if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>" target="_blank"><?php echo (str_cut($r["catname"],30)); ?></a></dd><?php endforeach; endif;?>
                <?php endif;?>
            </dl>
            <dl class="item4">
                <dt><?php if($l=='cn') : ?>资料<?php else :?>Data<?php endif;?></dt>
                <?php if($l=='cn') : ?>
                <?php  $_result=M()->query("select `catname`,`url` FROM `mz_category` WHERE 1 and lang=1 and parentid = 8 ORDER BY listorder asc,id desc limit 4"); if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>" target="_blank"><?php echo (str_cut($r["catname"],30)); ?></a></dd><?php endforeach; endif;?> 
                <?php else :?>
                <?php  $_result=M()->query("select `catname`,`url` FROM `mz_category` WHERE 1 and lang=2 and parentid = 46 ORDER BY listorder asc,id desc limit 4"); if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>" target="_blank"><?php echo (str_cut($r["catname"],30)); ?></a></dd><?php endforeach; endif;?> 
                <?php endif;?>
            </dl>
            <dl class="item5">
                <dt><?php if($l=='cn') : ?>下载专区<?php else :?>Download<?php endif;?></dt>
                <?php if($l=='cn') : ?>
                <?php  $_result=M("Download")->field("id,title")->where(" 1  and lang=1 and website=1 AND status=1  AND catid=83")->order("listorder asc,id desc")->limit("3")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="index.php?m=Download&a=down&id=<?php echo ($r["id"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank"><?php echo (str_cut($r["title"],26)); ?></a></dd><?php endforeach; endif;?> 
                <?php else :?>
                 
                <?php endif;?>
            </dl>
            <div class="item6" style="float:right;margin-right: 20px">
                <?php if($l=='cn') : ?>
                <img src="Public/img/wx.png">
                <?php else :?>
                <img src="Public/img/wx-en.png">
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="f2"><span class="icon"></span>
        <?php if($l=='cn') : ?>
        中国国际经济贸易仲裁委员会 2015版权所有
        <?php else :?>
        
        <?php endif;?> 
    </div>
</div>
<div id="top"></div>
<script type="text/javascript" src="Public/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="Public/Js/tools.min.js"></script>
<script type="text/javascript" src="Public/Js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="Public/Js/index.js"></script>
<script type="text/javascript">
    //轮播图
    $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
    });
    /* Accordion */
    $('#left_nav .menu-link').click(function() {
        $(this).toggleClass('actived');
        $(this).next('.sub-main-menu').slideToggle('fast');
    });
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?66eb039f0cf5cd367031cffc2988f54f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>