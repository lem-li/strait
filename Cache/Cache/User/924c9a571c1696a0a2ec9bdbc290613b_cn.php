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
	<?php$arb=$_SESSION['searchName'] ; $handmobile=$_SESSION['searchType']; ?><div class="content">    <div class="form_list form_list2">        <form id="myform" method="get" action="<?php echo U('User/Arbitrator/before');?>">            <input type="hidden" name="g" value="<?php echo (GROUP_NAME); ?>" />            <input type="hidden" name="m" value="<?php echo (MODULE_NAME); ?>" />            <input type="hidden" name="a" value="<?php echo (ACTION_NAME); ?>" />            <input type="hidden" name="l" value="<?php echo ($l); ?>" />             <div class="form_group">                <div class="form_group_left">                    <div class="form_item">                        <span class="form_label">案件编号: </span>                        <input type="text" id="caseno" name="caseno" value="<?php echo ($caseno); ?>" class="form_text"/>                    </div>					                    <div class="form_item">					                        <span class="form_label">年份: </span>						<select class="form_text" name="searchType" id="searchType">                            <option value="">--请选择--</option>                           <option <?php if($searchType=='2004'){ echo 'selected';}?> value="2004" >2004</option>						   <option <?php if($searchType=='2005'){ echo 'selected';}?> value="2005" >2005</option>						   <option <?php if($searchType=='2006'){ echo 'selected';}?> value="2006" >2006</option>						   <option <?php if($searchType=='2007'){ echo 'selected';}?> value="2007" >2007</option>						   <option <?php if($searchType=='2008'){ echo 'selected';}?> value="2008" >2008</option>						   <option <?php if($searchType=='2009'){ echo 'selected';}?> value="2009" >2009</option>						   <option <?php if($searchType=='2010'){ echo 'selected';}?> value="2010" >2010</option>						   <option <?php if($searchType=='2011'){ echo 'selected';}?> value="2011" >2011</option>						   <option <?php if($searchType=='2012'){ echo 'selected';}?> value="2012" >2012</option>						   <option <?php if($searchType=='2013'){ echo 'selected';}?> value="2013" >2013</option>						   <option <?php if($searchType=='2014'){ echo 'selected';}?> value="2014" >2014</option>						   <option <?php if($searchType=='2015'){ echo 'selected';}?> value="2015" >2015</option>                        </select>                    </div>                </div>                <div class="form_group_right">                    <div class="form_item">                        <span class="form_label">当事人名称: </span>						<input class="form_text" name="searchSpecSkill" type="text" value="<?php echo ($searchSpecSkill); ?>">                    </div>					 <div class="form_item">                        <span class="form_label">经办人姓名: </span>                        <input class="form_text" name="searchLanguage" type="text" value="<?php echo ($searchLanguage); ?>">                    </div>                </div>            </div><?php function num_format($num){ if (!is_numeric($num)) { return false; } $num = explode('.', $num); $rl = $num[1]; $j = strlen($num[0]) % 3; $sl = substr($num[0], 0, $j); $sr = substr($num[0], $j); $i = 0; while ($i <= strlen($sr)) { $rvalue = $rvalue . ',' . substr($sr, $i, 3); $i = $i + 3; } $rvalue = $sl . $rvalue; $rvalue = substr($rvalue, 0, strlen($rvalue) - 1); $rvalue = explode(',', $rvalue); if ($rvalue[0] == 0) { array_shift($rvalue); } $rv = $rvalue[0]; for ($i = 1; $i < count($rvalue); $i++) { $rv = $rv . ',' . $rvalue[$i]; } if (!empty($rl)) { $rvalue = $rv . '.' . $rl; } else { $rvalue = $rv; } return $rvalue; } ?>            <div class="form_group">                <div class="btns">                    <a href="javascript:;" onclick="document.getElementById('myform').submit();" class="btn_blue_long">查询</a>                </div>            </div>        </form>    </div></div> <table class="table_c" border="0" cellpadding="0" cellspacing="0">	<thead>	<tr>          <th class="center" colspan=7>2016年以前报酬对账单（不含2016年）</th>    </tr>    <tr bgcolor="#C2C287">          <th colspan=7>尊敬的仲裁员：<?php echo ($arb); ?>      手机号：<?php echo ($handmobile); ?></th>    </tr>  </thead>    <tr>		<th class="center"> 序号 </th>        <th class="center"> 财务编号 </th>        <th class="p60"> 案件编号 </th>        <th class="center"> 税前所得 </th>        <th class="center"> 个人所得税 </th>		 <th class="center"> 实领金额 </th>		  <th class="center"> 状态 </th>    </tr>	<?php $sum1=""; $sum2=""; $sum3=""; $sum4=""; $sum5=""; $sum6=""; $state=""; ?>    <?php if(is_array($ulist)): $k = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!=0 ) : ?>class="blue"<?php endif;?>>        <td class="center"style="cursor: pointer;" ><?php echo ($k); ?></td>		<td class="center"style="cursor: pointer;" ><?php echo ($user['fncNo']); ?></td>        <td class="p60"style="cursor: pointer;" ><?php echo ($user['caseNo']); ?></td>		<?php  $sum4=number_format($user['sumAll'],2); $sum5=number_format($user['sumTax'],2); $sum6=number_format($user['sumGet'],2); if(!empty($user['fncNo'])) { $state="已发"; } else { $state="未发"; } ?>        <td class="center"style="cursor: pointer;" ><?php echo ($sum4); ?> </td> 		        <td class="center"style="cursor: pointer;" ><?php echo ($sum5); ?></td>		<td class="center"style="cursor: pointer;" ><?php echo ($sum6); ?></td>		<td class="center"style="cursor: pointer;" ><?php echo ($state); ?></td>		<?php $sum1=$sum1+$user['sumAll']; $sum2=$sum2+$user['sumTax']; $sum3=$sum3+$user['sumGet']; ?>    </tr><?php endforeach; endif; else: echo "" ;endif; ?>	<?php $sum1=number_format($sum1,2); $sum2=number_format($sum2,2); $sum3=number_format($sum3,2); ?>		<tr bgcolor="#97CBFF">	<td class="center" style="cursor: pointer;" colspan=3>合 计</td>	<td class="center"style="cursor: pointer;" ><?php echo ($sum1); ?></td>	<td class="center"style="cursor: pointer;" ><?php echo ($sum2); ?></td>	<td class="center"style="cursor: pointer;" ><?php echo ($sum3); ?></td>	<td class="center"style="cursor: pointer;" > </td>	</tr>	<tr bgcolor="#C2C287">	<td class="center" style="cursor: pointer;" colspan=7>此报酬对账单仅作参考，以实际收到为准！</td>		</tr></table><style>.r_con_b{border-top: 1px solid #00abd8; padding: 20px 0 0;}.r_con_b .page{ height: 25px; line-height: 25px; text-align: center;}.r_con_b .page a {color: #434343; display: inline-block; margin: 0 8px;}.r_con_b .page a:hover { color: #00abd8;}</style><div class="r_con_b"><div class="page"><?php echo ($page); ?></div></div>

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