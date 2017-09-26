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
            <div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=34&l=en">About Us</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=34&l=en" >Introduction</a><a href="/index.php?m=Page&a=index&id=35&l=en" >Organization</a><a href="/index.php?m=Page&a=index&id=36&l=en" >Articles of Association</a><a href="/index.php?m=Page&a=index&id=37&l=en" >Historical Data</a><a href="/index.php?m=Article&a=index&id=38&l=en" >Working Report</a><a href="/index.php?m=Page&a=index&id=40&l=en" >Statistics</a><a href="/index.php?m=Page&a=index&id=41&l=en" >Facilities & Services</a><a href="/index.php?m=Page&a=index&id=53&l=en" >Contact Us</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=42&l=en">Rules</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=106&l=en" >CIETAC Current Arbitration Rules</a><a href="/index.php?m=Article&a=index&id=249&l=en" >CIETAC Current Arbitration Rules(multilingual)</a><a href="/index.php?m=Page&a=index&id=108&l=en" >CIETAC Financial Disputes Arbitration Rules</a><a href="/index.php?m=Page&a=index&id=156&l=en" >CIETAC Other Rules</a><a href="/index.php?m=Page&a=index&id=107&l=en" >Guidelines on Evidence</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=45&l=en">Guide</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=186&l=en" >Why Arbitration</a><a href="/index.php?m=Page&a=index&id=187&l=en" >Why CIETAC</a><a href="/index.php?m=Page&a=index&id=189&l=en" >Scope of Jurisdiction</a><a href="/index.php?m=Page&a=index&id=188&l=en" >Model Clauses</a><a href="/index.php?m=Page&a=index&id=185&l=en" >How to Start Arbitration at CIETAC</a><a href="/index.php?m=Article&a=index&id=194&l=en" >Procedure Guide</a><a href="/index.php?m=Article&a=index&id=190&l=en" >Application</a><a href="/index.php?m=Page&a=index&id=191&l=en" >Fee Schedule</a><a href="/index.php?m=Cost&l=en" >Fee Calculator</a><a href="/index.php?m=Page&a=index&id=192&l=en" >Refund of Arbitration Fee due to Case Withdrawal</a><a href="/index.php?m=Download&a=index&id=195&l=en" >Documents Download</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=43&l=en">Arbitrators</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=64&l=en" >Panel of Arbitrators</a><a href="/index.php?m=Page&a=index&id=113&l=en" >Code of Conduct for Arbitrators</a><a href="/index.php?m=Page&a=index&id=169&l=en" >Rules for Appointment of Arbitrators</a><a href="/index.php?m=Article&a=index&id=170&l=en" >Rules for Training of Arbitrators</a><a href="/index.php?m=Page&a=index&id=112&l=en" >Rules for Evaluating the Behavior of Arbitrators</a><a href="/index.php?m=Page&a=index&id=171&l=en" >Arbitrator Search</a><a href="/index.php?g=User&m=Login&a=index&l=en" >CIETAC Arbitrator Online Application System</a><a href="/index.php?m=Article&a=index&id=172&l=en" >Honorary Arbitrator</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=44&l=en">Multi-Service</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=179&l=en" >Online Arbitration</a><a href="/index.php?m=Page&a=index&id=267&l=en" >Domain Name Dispute</a><a href="/index.php?m=Article&a=index&id=268&l=en" >Construction Project Disputes Review</a><a href="/index.php?m=Article&a=index&id=183&l=en" >Investment Disputes Conciliation</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=48&l=en&year=2017">News</a></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=49&l=en">Activities</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=257&l=en" >Cross-Straits Economic and Trade Arbitration Symposium</a><a href="/index.php?m=Article&a=index&id=258&l=en" >CIETAC CUP</a><a href="/index.php?m=Article&a=index&id=259&l=en" >China Arbitration Week</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=46&l=en">Data</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=196&l=en" >Chinese Laws and Regulations</a><a href="/index.php?m=Article&a=index&id=197&l=en" >International and Foreign Reference Materials</a><a href="/index.php?m=Article&a=index&id=198&l=en" >Rules of Foreign Arbitration</a><a href="/index.php?m=Article&a=index&id=199&l=en" >International Conventions and Practices</a><a href="/index.php?m=Article&a=index&id=200&l=en" >Model Contract</a><a href="/index.php?m=Article&a=index&id=201&l=en" >Law Data Bank(Chinese)</a><a href="/index.php?m=Article&a=index&id=202&l=en" >Law Data Bank(English)</a><a href="/index.php?m=Article&a=index&id=203&l=en" >Meeting Documents</a></div></div><div style="padding:0;" class="nav_item last"><a class="nav_a" href="/index.php?m=Article&a=index&id=47&l=en">Research</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=256&l=en" >Paper Selection</a><a href="/index.php?m=Article&a=index&id=255&l=en" >Annual Report</a><a href="/index.php?m=Article&a=index&id=205&l=en" >Case Analyses</a><a href="/index.php?m=Article&a=index&id=207&l=en" >CIETAC Publication</a></div></div>
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


		<!--div class="banner">
    <div class="banner_wrap">
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
</div-->
<div class="wrap" style="overflow:hidden;">
    <div class="list_l">
        <div id="left_nav" class="left_nav">
        	<div class="bt <?php if($bcid == 30) : ?>bt_news<?php elseif($bcid == 1): ?>bt_about<?php else :?>bt_other<?php endif;?>"><?php echo ($Categorys[$bcid]['catname']); ?></div>
        	<div class="main_menu">
        		<ul>
        			<?php if(is_array($news_years)): $i = 0; $__LIST__ = $news_years;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li><a href="<?php if($l=='cn') : echo U('Article/index?id=30&year='.$r); else : echo U('Article/index?id=48&year='.$r.'&l=en'); endif;?>">● <?php echo ($r); if($l=='cn') : ?>年<?php endif;?><span class="arrow">></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
        		</ul>
	            <?php echo ($leftmenu); ?>
            </div>
        </div>
        <!--div class="left_b">
            <div class="bt">
                <span>在线公告</span>
                <a href="#" target="_blank" class="more">MORE</a>
            </div>
            <ul class="left_list">
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
                <li><a href="#" target="_blank">> 关于开展《医患的故事征集故事》 </a> </li>
            </ul>
        </div-->
    </div>
    <div class="list_r">
        <div class="cm">
            <?php echo L(catpos);?><a href="<?php echo URL();?>"> <?php echo L(home_font);?></a> >> <?php  $arrparentid = array_filter(explode(',', $Categorys[$catid]['arrparentid'].','.$catid));foreach($arrparentid as $cid):$parsestr[] = '<a href="'.$Categorys[$cid]['url'].'">'.$Categorys[$cid]['catname'].'</a>'; endforeach;echo implode(" &gt; ",$parsestr); if($currentyear) : ?>>> <?php echo ($currentyear); if($l=='cn') : ?>年<?php endif; endif;?>
        </div>
        <div class="r_con">
            <div class="bt"><?php echo ($title); if($catid==30) : ?><br><span class="p_content" style="float:right"><?php echo L(time);?>: <?php echo (todate($createtime,'Y-m-d')); ?> <!--&nbsp;&nbsp;&nbsp;&nbsp;<?php echo L(copyfrom);?>: <?php if( $copyfrom) : echo ($copyfrom); else : echo ($site_name); endif;?>--></span><?php endif;?> </div>
            <br/>
            <div class="p_content" style="<?php if($l=='en') : ?>text-indent: 0em;<?php endif;?>"><?php echo ($content); ?></div>
        </div>
        <div class="r_con_b">
            <ul>
                <?php if($predata) : ?>
                <li><span><?php if($l=='cn') : ?>上一篇<?php else :?>Prev<?php endif;?>：</span><a href="<?php echo ($predata['url']); ?>" title="<?php echo ($predata['title']); ?>" ><?php echo (str_cut($predata['title'],90)); ?></a><?php if($catid==30) : ?> (<?php echo (todate($predata['createtime'],'Y-m-d')); ?>)<?php endif;?></li>
                <?php endif;?>
                <?php if($lastdata) : ?>
                <li><span><?php if($l=='cn') : ?>下一篇<?php else :?>Next<?php endif;?>：</span><a href="<?php echo ($lastdata['url']); ?>" title="<?php echo ($lastdata['title']); ?>" ><?php echo (str_cut($lastdata['title'],90)); ?></a> <?php if($catid==30) : ?> (<?php echo (todate($lastdata['createtime'],'Y-m-d')); ?>)<?php endif;?></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>
 
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
                 
                <?php else :?>
                <?php  $_result=M("Download")->field("id,title")->where(" 1  and lang=2 and website=1 AND status=1  AND catid=220")->order("listorder asc,id desc")->limit("3")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="index.php?m=Download&a=down&id=<?php echo ($r["id"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank"><?php echo (str_cut($r["title"],26)); ?></a></dd><?php endforeach; endif;?> 
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
        
        <?php else :?>
        Copyright 2015&copy; China International Economic and Trade Arbitration Commission
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