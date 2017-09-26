<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<base href="<?php echo ($site_url); ?>/" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow" />
	<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($seo_description); ?>" />	
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
	<title><?php echo ($seo_title); ?>-<?php echo ($site_name); ?></title>
	
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script src="__PUBLIC__/Js/jquery.validate.js"></script>
	<script src="__PUBLIC__/Js/yourphp.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/tools.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/common.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
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
<script type="text/javascript">
var APP	 =	 '__APP__';
var ROOT =	 '__ROOT__';
var PUBLIC = '__PUBLIC__';
</script>
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script><div class="content"><script type="text/javascript">var wait=60;function time(o) {        if (wait == 0) {            o.removeAttribute("disabled");            o.innerHTML="获取验证码";            wait = 60;//失效时间        } else {             o.setAttribute("disabled", true);            o.innerHTML="重新发送(" + wait + ")";            wait--;            setTimeout(function() {                time(o)            },            1000)        }    }</script><script type="text/javascript">	function get_mobile_code(){	       $.post('http://www.cietac.org/index.php?g=User&m=ArbitratorStm&a=stm', {mobile:jQuery.trim($('#mobile').val())}, function(msg) {	        var m=jQuery.trim(unescape(msg));			var mobile=document.getElementById("mobile").value;			if(mobile.length<1){			alert("请输入手机号码");			return false;			}			time(document.getElementById("zphone"));	       var s=m.indexOf("提交成功");		   //alert (s);	       if(s==-1)		   {		   //alert("发送失败")		   }	       if(s>0){	       		//alert("发送成功")	       }		});	}</script>    <div class="form_list form_list2">        <form id="myform" method="get" action="<?php echo U('User/Arbitrator/sm');?>">            <input type="hidden" name="g" value="<?php echo (GROUP_NAME); ?>" />            <input type="hidden" name="m" value="<?php echo (MODULE_NAME); ?>" />            <input type="hidden" name="a" value="<?php echo (ACTION_NAME); ?>" />            <input type="hidden" name="l" value="<?php echo ($l); ?>" />             <div class="form_group">                <div class="form_group_left">                    <div class="form_item">                        <span class="form_label">仲裁员身份证号: </span>                        <input type="text" id="arbname" name="arbname" value="<?php echo ($arbname); ?>" class="form_text"/>                    </div>					 <div class="form_item">                        <span class="form_label">手机号码:</span>						 <input type="text" id="mobile" name="mobile" value="<?php echo ($mobile); ?>" class="form_text"/><a class="btn sendCodeBtn" type="button" id="zphone" onclick="get_mobile_code();">获取验证码</a>						 <div class="close" style="display: none;"></div>                    </div>					<div class="form_item">                        <span class="form_label">验证码:</span>						 <input type="text" id="searchSpecSkill" name="searchSpecSkill" value="<?php echo ($searchSpecSkill); ?>" class="form_text"/>						                    </div>                </div>				 <div class="form_group_left">				    <span >说明：</br>1.请输入自己的身份证号；</br>2.输入手机号，获取验证码，输入验证码；</br>3.点击查询。 </span>									  </div>                           </div>            <div class="form_group">                <div class="btns">                    <a href="javascript:;" onclick="document.getElementById('myform').submit();" class="btn_blue_long">登 录</a>                </div>				            </div>			 <div class="form_group_center">                    <div style="line-height:30px;font-size:16px;" >                        <span style="color:#F00">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp如有疑问请与我们联系:</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1.银行卡相关问题请联系，电话：010-82217606，邮箱：liuyucun@cietac.org；</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2.其他财务问题请联系，电话：010-82217638，邮箱：baoyan@cietac.org；</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp3.系统登录问题请联系，电话：010-82217622，邮箱：fuchengwei@cietac.org。 </span>					</div>			</div>        </form>    </div></div> <style>.r_con_b{border-top: 1px solid #00abd8; padding: 20px 0 0;}.r_con_b .page{ height: 25px; line-height: 25px; text-align: center;}.r_con_b .page a {color: #434343; display: inline-block; margin: 0 8px;}.r_con_b .page a:hover { color: #00abd8;}</style><div class="r_con_b"><div class="page"><?php echo ($page); ?></div></div>

<div class="footer">
    <div class="f1">
        <div class="wrap">
            <dl class="item2">
                <dd>
                    <a href="<?php echo URL('User-Login/index');?>" target="_blank"> <?php if($l=='cn') : ?>仲裁员入口<?php else :?>Arbitrators entrance<?php endif;?></a>
                    <a href="<?php echo URL('User-Trainee/index');?>" target="_blank"> <?php if($l=='cn') : ?>实习生入口<?php else :?>Interns entrance<?php endif;?></a>
                </dd>
            </dl>
            <dl class="item3">
                <dt><?php if($l=='cn') : ?>仲裁指南<?php else :?>Guidelines<?php endif;?></dt>
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