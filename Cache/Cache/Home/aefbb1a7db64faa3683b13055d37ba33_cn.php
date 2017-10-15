<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="lt-ie10" lang="en"><![endif]-->
<html class="no-js" lang="zh">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
    <link rel="shortcut icon" href="__PUBLIC__/images/fav.ico" type="image/x-icon">
    <title>中国海事仲裁委员会</title>
    <link rel="stylesheet" href="__PUBLIC__/styles/normalize.css"/>
    <link rel="stylesheet" href="__PUBLIC__/styles/foundation5/app.css"/>
    <link rel="stylesheet" href="__PUBLIC__/styles/foundation5/style.css"/>
    <link rel="stylesheet" href="__PUBLIC__/styles/pagetion.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/styles/jquery.bxslider.css"/>
    <link href="__PUBLIC__/styles/rotaion.css" rel="stylesheet" type="text/css"/>
    <script src="__PUBLIC__/scripts/jquery.js"></script>
</head>
<body id="home-page">
<div id="container">
    <div id="header">
        <div class="row">
            <div class="large-6 medium-6 columns logo">
                <a href="/">
                    <img src="__PUBLIC__/images/logo.png" alt=""/>
                </a>
            </div>
            <div class="large-6 medium-6 columns">
                <ul id="login" class="inline-list">
                    <li><a href="/" class="button selected" title="中文版">中文版</a></li>
                    <li><a href="/?l=en" class="button" title="English">English</a></li>
                    <li><a href="/?l=fc" class="button" title="繁体版">繁体版</a></li>
                </ul>
                <div id="searchBar">
                    <form name="searchPage" id="searchPage" method="get" action="index.php?" onsubmit="return validatek();">
                        <input type="hidden" id="" name="m" value="Search"/>
                        <input type="hidden" name="l" value="cn"/>
                        <input type="text" name="keyword" id="searchBarText" value="" placeholder="请输入要搜索的内容">
                        <input type="submit" value="" id="searchBarBtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 菜单 -->
    <div id="top-menu">
        <div id="top-nav" class="row collapse">
            <div class="large-12 medium-12">
                <nav class="top-bar">
                    <section class="top-bar-section">
                        <ul class="nav">
                            <li  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=2">关于我们</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=2" >贸仲简介</a><a href="/index.php?m=Page&a=index&id=20" >组织机构</a><a href="/index.php?m=Page&a=index&id=21" >贸仲章程</a><a href="/index.php?m=Article&a=index&id=22" >历史资料</a><a href="/index.php?m=Article&a=index&id=23" >工作报告</a><a href="/index.php?m=Page&a=index&id=24" >统计数据</a><a href="/index.php?m=Page&a=index&id=25" >服务设施</a><a href="/index.php?m=Page&a=index&id=26" >联系我们</a></div></li><li  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=14">规则</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=65" >贸仲委现行仲裁规则</a><a href="/index.php?m=Article&a=index&id=248" >现行仲裁规则（其他语言译本）</a><a href="/index.php?m=Page&a=index&id=66" >贸仲委现行金融仲裁规则</a><a href="/index.php?m=Article&a=index&id=67" >贸仲委其他仲裁规则</a><a href="/index.php?m=Page&a=index&id=68" >贸仲委证据指引</a></div></li><li  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=4">仲裁指南</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=116" >为何选择仲裁</a><a href="/index.php?m=Page&a=index&id=117" >为何选择CIETAC</a><a href="/index.php?m=Page&a=index&id=119" >CIETAC受案范围</a><a href="/index.php?m=Page&a=index&id=118" >示范仲裁条款</a><a href="/index.php?m=Page&a=index&id=115" >申请仲裁须知</a><a href="/index.php?m=Article&a=index&id=124" >程序指南</a><a href="/index.php?m=Article&a=index&id=120" >申请仲裁</a><a href="/index.php?m=Page&a=index&id=121" >仲裁费用表</a><a href="/index.php?m=Cost" >费用快算</a><a href="/index.php?m=Page&a=index&id=122" >撤案仲裁费用的退费</a><a href="/index.php?m=Download&a=index&id=125" >仲裁文书下载</a></div></li><li  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=17">仲裁员</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=27" >仲裁员名册</a><a href="/index.php?m=Page&a=index&id=28" >仲裁员守则</a><a href="/index.php?m=Page&a=index&id=57" >仲裁员聘任规定</a><a href="/index.php?m=Page&a=index&id=58" >仲裁员培训规定</a><a href="/index.php?m=Page&a=index&id=59" >仲裁员行为考察规定</a><a href="/index.php?g=User&m=Arbitrator&a=index" >仲裁员查询</a><a href="/index.php?m=Article&a=index&id=324" >通知公告</a><a href="/index.php?g=User&m=Login&a=index" >仲裁员在线申请</a><a href="/index.php?m=Article&a=index&id=63" >荣誉仲裁员</a></div></li><li  class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=19">多元服务</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=262" >域名争议</a><a href="/index.php?m=Article&a=index&id=261" >网上仲裁</a><a href="/index.php?m=Article&a=index&id=263" >建设工程争议评审</a><a href="/index.php?m=Page&a=index&id=104" >投资争端调解</a></div></li><li  class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=30&year=2017">新闻</a></li><li  class="nav_item"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=245">专题活动</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=241" >海峡两岸经贸仲裁研讨会</a><a href="/index.php?m=Article&a=index&id=242" >贸仲杯</a><a href="/index.php?m=Article&a=index&id=245" >中国仲裁周</a></div></li><li  class="nav_item"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=73">资料</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=73" >中国法资料</a><a href="/index.php?m=Article&a=index&id=74" >外国法资料</a><a href="/index.php?m=Article&a=index&id=75" >外国仲裁机构仲裁规则</a><a href="/index.php?m=Article&a=index&id=76" >国际公约及惯例</a><a href="/index.php?m=Article&a=index&id=77" >格式合同</a><a href="http://cietac.chinalawinfo.com/" >法律资料库（中文）</a><a href="http://www.lawinfochina.com/" >法律资料库（英文）</a><a href="/index.php?m=Article&a=index&id=80" >会议资料</a></div></li><li  class="nav_item last"><a class="nav_a" href="http://www.cietac.org/index.php?m=Article&a=index&id=71">研究</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=71" >论文精选</a><a href="/index.php?m=Article&a=index&id=251" >年度报告</a><a href="/index.php?m=Page&a=index&id=72" >贸仲出版物</a><a href="/index.php?m=Article&a=index&id=93" >案例评析</a><a href="" >中国仲裁评论</a></div></li>
                        </ul>
                    </section>
                </nav>
            </div>
        </div>
    </div>
    <!-- 菜单 -->

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


<!-- 内容 -->
<section id="page-content">
	<div class="row page-sub-content">
		<aside id="left" class="left-menu">
			<!-- =========修改添加样式 -->
			<nav id="main-menu">
				<div class="menu-caption"><?php if($l=='cn') : ?>费用快算<?php else :?>Fee Calculator<?php endif;?></div>
				<div id="Main_DropDownMenu">
					<div id="Main_DropDownMenu_Start"></div>
					<div class="main_menu">
                        <ul>
                            <li><a class="menu-link" href="/index.php?m=Cost&type=in2015<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>国内案件(自2015年)<?php else :?>Domestic cases(From 2015)<?php endif;?><span class="arrow"></span></a></li>
                            <li><a class="menu-link" href="/index.php?m=Cost&type=in2012<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>国内案件(自2012年)<?php else :?>Domestic cases(From 2012)<?php endif;?><span class="arrow"></span></a></li>
                            <li><a class="menu-link" href="/index.php?m=Cost&type=out2015<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>涉外案件(自2015年)<?php else :?>Foreign cases(From 2015)<?php endif;?><span class="arrow"></span></a></li>
                            <li><a class="menu-link" href="/index.php?m=Cost&type=out2012<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>涉外案件(自2012年)<?php else :?>Foreign cases(From 2012)<?php endif;?><span class="arrow"></span></a></li>
                            <li><a class="menu-link" href="/index.php?m=Cost&type=dispute<?php if($l=='en') : ?>&l=en<?php endif;?>"><?php if($l=='cn') : ?>金融争议案件<?php else :?>Financial dispute case<?php endif;?><span class="arrow"></span></a></li>
                        </ul>
					</div>
					<div id="Main_DropDownMenu_End"></div>
				</div>
			</nav>
		</aside>

		<article id="right" class="main-content">
			<div id="main-content" class="main-content">
				<div id="main-heading">
					<h1><?php echo ($title); ?></h1>
				</div>
				<!-- 内容 -->
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
				<!-- 内容 -->
			</div>
		</article>
	</div>
</section>
 

<!-- 页面底部 -->
<div class="footer">
    <div class="f1">
        <div class="wrap">
            <dl class="item2">
                <dd>
                    <a href="/index.php?g=User&amp;m=Login&amp;a=index" target="_blank"> 仲裁员入口</a>
                    <a href="/index.php?g=User&amp;m=Trainee&amp;a=index" target="_blank"> 实习生入口</a>
                </dd>
            </dl>
            <dl class="item3">
                <dt>仲裁指南</dt>
                <dd><a href="/index.php?m=Page&amp;a=index&amp;id=116" title="为何选择仲裁" target="_blank">为何选择仲裁</a></dd>
                <dd><a href="/index.php?m=Page&amp;a=index&amp;id=117" title="为何选择CIETAC" target="_blank">为何选择CIETAC</a></dd>
                <dd><a href="/index.php?m=Page&amp;a=index&amp;id=119" title="CIETAC受案范围" target="_blank">CIETAC受案范围</a></dd>
                <dd><a href="/index.php?m=Page&amp;a=index&amp;id=118" title="示范仲裁条款" target="_blank">示范仲裁条款</a></dd>
                <dd><a href="/index.php?m=Page&amp;a=index&amp;id=115" title="申请仲裁须知" target="_blank">申请仲裁须知</a></dd>
            </dl>
            <dl class="item4">
                <dt>资料</dt>
                <dd><a href="/index.php?m=Article&amp;a=index&amp;id=73" title="中国法资料" target="_blank">中国法资料</a></dd>
                <dd><a href="/index.php?m=Article&amp;a=index&amp;id=74" title="外国法资料" target="_blank">外国法资料</a></dd>
                <dd><a href="/index.php?m=Article&amp;a=index&amp;id=75" title="外国仲裁机构仲裁规则" target="_blank">外国仲裁机构仲裁规则</a></dd>
                <dd><a href="/index.php?m=Article&amp;a=index&amp;id=76" title="国际公约及惯例" target="_blank">国际公约及惯例</a></dd>
            </dl>
            <dl class="item5">
                <dt>下载专区</dt>
                <dd><a href="index.php?m=Download&amp;a=down&amp;id=2" title="申请仲裁须知" target="_blank">申请仲裁须知</a></dd>
                <dd><a href="index.php?m=Download&amp;a=down&amp;id=4" title="仲裁申请书示范文本" target="_blank">仲裁申请书示范文本</a></dd>
                <dd><a href="index.php?m=Download&amp;a=down&amp;id=5" title="答辩书示范文本" target="_blank">答辩书示范文本</a></dd>
            </dl>
            <div class="item6 wxcode">
                <img src="__PUBLIC__/images/wx.png">
            </div>
        </div>
    </div>
    <div class="f2">
        <span class="icon"></span>海峡两岸仲裁中心 2013版权所有
    </div>
</div>
<!-- 页面底部 -->
</div>
<a href="#0" class="cd-top">Top</a>

<script src="__PUBLIC__/scripts/jquery.bxslider.min.js"></script>
<script src="__PUBLIC__/scripts/jquery.yx_rotaion.js" type="text/javascript"></script>
<script src="__PUBLIC__/scripts/base.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        $('.top-banner .banners').bxSlider({
            pager: false,
            speed: 1000,
            auto: true,
            mode: 'fade'
        });

        //新闻图片轮播
        $(".newpic_list").yx_rotaion({
            auto: true
        });
    });
</script>

</body>
</html>