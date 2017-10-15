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
                            <li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=34&l=en">About Us</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=34&l=en" >Introduction</a><a href="/index.php?m=Page&a=index&id=35&l=en" >Organization</a><a href="/index.php?m=Page&a=index&id=36&l=en" >Articles of Association</a><a href="/index.php?m=Page&a=index&id=37&l=en" >Historical Data</a><a href="/index.php?m=Article&a=index&id=38&l=en" >Working Report</a><a href="/index.php?m=Page&a=index&id=40&l=en" >Statistics</a><a href="/index.php?m=Page&a=index&id=41&l=en" >Facilities & Services</a><a href="/index.php?m=Page&a=index&id=53&l=en" >Contact Us</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=42&l=en">Rules</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=106&l=en" >CIETAC Current Arbitration Rules</a><a href="/index.php?m=Article&a=index&id=249&l=en" >CIETAC Current Arbitration Rules(multilingual)</a><a href="/index.php?m=Page&a=index&id=108&l=en" >CIETAC Financial Disputes Arbitration Rules</a><a href="/index.php?m=Page&a=index&id=156&l=en" >CIETAC Other Rules</a><a href="/index.php?m=Page&a=index&id=107&l=en" >Guidelines on Evidence</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=45&l=en">Guide</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=186&l=en" >Why Arbitration</a><a href="/index.php?m=Page&a=index&id=187&l=en" >Why CIETAC</a><a href="/index.php?m=Page&a=index&id=189&l=en" >Scope of Jurisdiction</a><a href="/index.php?m=Page&a=index&id=188&l=en" >Model Clauses</a><a href="/index.php?m=Page&a=index&id=185&l=en" >How to Start Arbitration at CIETAC</a><a href="/index.php?m=Article&a=index&id=194&l=en" >Procedure Guide</a><a href="/index.php?m=Article&a=index&id=190&l=en" >Application</a><a href="/index.php?m=Page&a=index&id=191&l=en" >Fee Schedule</a><a href="/index.php?m=Cost&l=en" >Fee Calculator</a><a href="/index.php?m=Page&a=index&id=192&l=en" >Refund of Arbitration Fee due to Case Withdrawal</a><a href="/index.php?m=Download&a=index&id=195&l=en" >Documents Download</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=43&l=en">Arbitrators</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=64&l=en" >Panel of Arbitrators</a><a href="/index.php?m=Page&a=index&id=113&l=en" >Code of Conduct for Arbitrators</a><a href="/index.php?m=Page&a=index&id=169&l=en" >Rules for Appointment of Arbitrators</a><a href="/index.php?m=Article&a=index&id=170&l=en" >Rules for Training of Arbitrators</a><a href="/index.php?m=Page&a=index&id=112&l=en" >Rules for Evaluating the Behavior of Arbitrators</a><a href="/index.php?m=Page&a=index&id=171&l=en" >Arbitrator Search</a><a href="/index.php?g=User&m=Login&a=index&l=en" >CIETAC Arbitrator Online Application System</a><a href="/index.php?m=Article&a=index&id=172&l=en" >Honorary Arbitrator</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=44&l=en">Multi-Service</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=179&l=en" >Online Arbitration</a><a href="/index.php?m=Page&a=index&id=267&l=en" >Domain Name Dispute</a><a href="/index.php?m=Article&a=index&id=268&l=en" >Construction Project Disputes Review</a><a href="/index.php?m=Article&a=index&id=183&l=en" >Investment Disputes Conciliation</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=48&l=en&year=2017">News</a></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=49&l=en">Activities</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=257&l=en" >Cross-Straits Economic and Trade Arbitration Symposium</a><a href="/index.php?m=Article&a=index&id=258&l=en" >CIETAC CUP</a><a href="/index.php?m=Article&a=index&id=259&l=en" >China Arbitration Week</a></div></li><li style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=46&l=en">Data</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=196&l=en" >Chinese Laws and Regulations</a><a href="/index.php?m=Article&a=index&id=197&l=en" >International and Foreign Reference Materials</a><a href="/index.php?m=Article&a=index&id=198&l=en" >Rules of Foreign Arbitration</a><a href="/index.php?m=Article&a=index&id=199&l=en" >International Conventions and Practices</a><a href="/index.php?m=Article&a=index&id=200&l=en" >Model Contract</a><a href="/index.php?m=Article&a=index&id=201&l=en" >Law Data Bank(Chinese)</a><a href="/index.php?m=Article&a=index&id=202&l=en" >Law Data Bank(English)</a><a href="/index.php?m=Article&a=index&id=203&l=en" >Meeting Documents</a></div></li><li style="padding:0;" class="nav_item last"><a class="nav_a" href="/index.php?m=Article&a=index&id=47&l=en">Research</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=256&l=en" >Paper Selection</a><a href="/index.php?m=Article&a=index&id=255&l=en" >Annual Report</a><a href="/index.php?m=Article&a=index&id=205&l=en" >Case Analyses</a><a href="/index.php?m=Article&a=index&id=207&l=en" >CIETAC Publication</a></div></li>
                        </ul>
                    </section>
                </nav>
            </div>
        </div>
    </div>
    <!-- 菜单 -->

		
<!-- 内容 -->
<section id="page-content">
    <div class="row page-sub-content">
        <aside id="left" class="left-menu">
            <!-- =========修改添加样式 -->
            <nav id="main-menu">
                <div class="menu-caption"><?php echo ($Categorys[$bcid]['catname']); ?></div>
                <div id="Main_DropDownMenu">
                    <div id="Main_DropDownMenu_Start"></div>
                    <div class="main_menu">
                        <ul>
                            <?php if(is_array($news_years)): $i = 0; $__LIST__ = $news_years;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li><a href="<?php if($l=='cn') : echo U('Article/index?id=30&year='.$r); else : echo U('Article/index?id=48&year='.$r.'&l=en'); endif;?>">● <?php echo ($r); if($l=='cn') : ?>年<?php endif;?><span class="arrow">></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php echo ($leftmenu); ?>
                    </div>
                    <div id="Main_DropDownMenu_End"></div>
                </div>
            </nav>
        </aside>

        <article id="right" class="main-content">
            <!-- =========修改添加样式 -->
            <div id="main-content">
                <div id="main-heading">
                    <h1><?php echo ($Categorys[$bcid]['catname']); ?></h1>
                </div>
                <!-- 内容 -->
                <ul class="blue-bullet">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank">> <?php echo (str_cut($r["title"],90)); ?></a><?php if($catid==30) : ?><span class="date">[<?php echo (todate($r["createtime"],'Y-m-d')); ?>]</span><?php endif;?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <!-- 内容 -->

                <!-- 页码部分开始-->

                <div class="pagetion">
                    <div class="page">
                        <?php echo ($pages); ?>
                    </div>
                </div>
                <!-- 页码部分结束-->
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