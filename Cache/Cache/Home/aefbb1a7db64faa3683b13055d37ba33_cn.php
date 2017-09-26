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


		<style type="text/css">
.search_input {
    float: left;
    width: 260px;
    height: 28px;
    line-height: 28px;
    border: 1px solid #c4c4c4;
    padding: 0 10px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
	margin:30px 0 0 200px;
}
.search_button {
    cursor: pointer;
    width: 45px;
    height: 30px;
    float: left;
    display: inline;
    margin: 30px 0 0 15px;
}
tr{
line-height:30px;
}
</style>
<div class="wrap" style="overflow:hidden;">
    <div class="list_l">
         <div id="left_nav" class="left_nav">
        	<div class="bt bt_news"><?php if($l=='cn') : ?>费用快算<?php else :?>Fee Calculator<?php endif;?></div>
        	<div class="main_menu">
                    <ul>
                    <li><a class="menu-link" href="/index.php?m=Cost&type=in2015<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>国内案件(自2015年)<?php else :?>Domestic cases(From 2015)<?php endif;?><span class="arrow"></span></a></li>
                    <li><a class="menu-link" href="/index.php?m=Cost&type=in2012<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>国内案件(自2012年)<?php else :?>Domestic cases(From 2012)<?php endif;?><span class="arrow"></span></a></li>
                    <li><a class="menu-link" href="/index.php?m=Cost&type=out2015<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>涉外案件(自2015年)<?php else :?>Foreign cases(From 2015)<?php endif;?><span class="arrow"></span></a></li>
                    <li><a class="menu-link" href="/index.php?m=Cost&type=out2012<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>涉外案件(自2012年)<?php else :?>Foreign cases(From 2012)<?php endif;?><span class="arrow"></span></a></li>
                    <li><a class="menu-link" href="/index.php?m=Cost&type=dispute<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>金融争议案件<?php else :?>Financial dispute case<?php endif;?><span class="arrow"></span></a></li>
                    </ul>
                </div>
        </div>
    </div>
    <div class="list_r">
        <div class="cm">
            <?php echo L(catpos);?><a href="<?php echo URL();?>"> <?php echo L(home_font);?></a> >> <?php  $arrparentid = array_filter(explode(',', $Categorys[$catid]['arrparentid'].','.$catid));foreach($arrparentid as $cid):$parsestr[] = '<a href="'.$Categorys[$cid]['url'].'">'.$Categorys[$cid]['catname'].'</a>'; endforeach;echo implode(" &gt; ",$parsestr);?>
        </div>
        <div class="r_con">
            <div class="bt"><?php echo ($title); ?></div>
            <div class="search" style="margin-bottom:80px;">
				<form name="searchPage" id="searchPage" method="post" action="">
					<input type="text" class="search_input" name="money" value="<?php echo ($_REQUEST['money']); ?>">
                                        <input type="submit" style="width:70px" value="<?php if($l=='cn') : ?>计算<?php else :?>Calculate<?php endif;?>" class="search_button">
				</form>
			</div>
			</br>
			</br>
			<?php if($costResult) : ?>
			<table width="400" border="0" align="center" height="30" style="color:#666666;font-size:12px;background-color:#FFFFFF;">
				<tbody>
					<tr>
						<td style="font-size:14px;">
							<hr />
						</td>
					</tr>
					<tr>
						<td align="middle" style="font-size:14px;">
							<div align="center">
								<?php if($l=='cn') : ?>案件费用计算结果<?php else :?>DisputedMoney<?php endif;?>
							</div>
						</td>
					</tr>
					<tr>
						<td style="font-size:14px;">
							<?php if($l=='cn') : ?>争议金额<?php else :?>DisputedMoney<?php endif;?>：<?php echo ($costResult["money"]); ?>
						</td>
					</tr>
					<tr>
						<td style="font-size:14px;">
							<?php echo ($name1); ?>： <?php echo ($costResult["shouli"]); ?>
						</td>
					</tr>
					<tr>
						<td style="font-size:14px;">
							<?php echo ($name2); ?>： <?php echo ($costResult["chuli"]); ?>
						</td>
					</tr>
					<tr>
						<td style="font-size:14px;">
							<?php echo ($name3); ?>： <?php echo ($costResult["all"]); ?>
						</td>
					</tr>
					<tr>
						<td>
							<hr />
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">
								<span><b style="font-size:16px;color:#CE3658">
                                                                        <?php if($l=='cn') : ?>该费用的具体交付金额以仲裁委立案书面复函为准
                                                                        <?php else :?>The cost of the specific delivery amount to the Arbitration Commission filing a written reply shall prevail<?php endif;?>
                                                                    </b></span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<?php endif;?>
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