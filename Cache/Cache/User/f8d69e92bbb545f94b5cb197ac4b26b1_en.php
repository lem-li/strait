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
            <div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=34&l=en">About Us</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=34&l=en" >Introduction</a><a href="/index.php?m=Page&a=index&id=35&l=en" >Organization</a><a href="/index.php?m=Page&a=index&id=36&l=en" >Articles of Association</a><a href="/index.php?m=Page&a=index&id=37&l=en" >Historical Data</a><a href="/index.php?m=Article&a=index&id=38&l=en" >Working Report</a><a href="/index.php?m=Page&a=index&id=40&l=en" >Statistics</a><a href="/index.php?m=Page&a=index&id=41&l=en" >Facilities & Services</a><a href="/index.php?m=Page&a=index&id=53&l=en" >Contact Us</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=42&l=en">Rules</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=106&l=en" >CIETAC Current Arbitration Rules</a><a href="/index.php?m=Article&a=index&id=249&l=en" >CIETAC Current Arbitration Rules(multilingual)</a><a href="/index.php?m=Page&a=index&id=108&l=en" >CIETAC Financial Disputes Arbitration Rules</a><a href="/index.php?m=Page&a=index&id=156&l=en" >CIETAC Other Rules</a><a href="/index.php?m=Page&a=index&id=107&l=en" >Guidelines on Evidence</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=45&l=en">Guide</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=186&l=en" >Why Arbitration</a><a href="/index.php?m=Page&a=index&id=187&l=en" >Why CIETAC</a><a href="/index.php?m=Page&a=index&id=189&l=en" >Scope of Jurisdiction</a><a href="/index.php?m=Page&a=index&id=188&l=en" >Model Clauses</a><a href="/index.php?m=Page&a=index&id=185&l=en" >How to Start Arbitration at CIETAC</a><a href="/index.php?m=Article&a=index&id=194&l=en" >Procedure Guide</a><a href="/index.php?m=Article&a=index&id=190&l=en" >Application</a><a href="/index.php?m=Page&a=index&id=191&l=en" >Fee Schedule</a><a href="/index.php?m=Cost&l=en" >Fee Calculator</a><a href="/index.php?m=Page&a=index&id=192&l=en" >Refund of Arbitration Fee due to Case Withdrawal</a><a href="/index.php?m=Download&a=index&id=195&l=en" >Documents Download</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=43&l=en">Arbitrators</a><span></span><div class="drop_list"><a href="/index.php?m=Page&a=index&id=64&l=en" >Panel of Arbitrators</a><a href="/index.php?m=Page&a=index&id=113&l=en" >Code of Conduct for Arbitrators</a><a href="/index.php?m=Page&a=index&id=169&l=en" >Rules for Appointment of Arbitrators</a><a href="/index.php?m=Article&a=index&id=170&l=en" >Rules for Training of Arbitrators</a><a href="/index.php?m=Page&a=index&id=112&l=en" >Rules for Evaluating the Behavior of Arbitrators</a><a href="/index.php?m=Page&a=index&id=171&l=en" >Arbitrator Search</a><a href="/index.php?g=User&m=Login&a=index&l=en" >CIETAC Arbitrator Online Application System</a><a href="/index.php?m=Article&a=index&id=172&l=en" >Honorary Arbitrator</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Page&a=index&id=44&l=en">Multi-Service</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=179&l=en" >Online Arbitration</a><a href="/index.php?m=Page&a=index&id=267&l=en" >Domain Name Dispute</a><a href="/index.php?m=Article&a=index&id=268&l=en" >Construction Project Disputes Review</a><a href="/index.php?m=Article&a=index&id=183&l=en" >Investment Disputes Conciliation</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=48&l=en&year=2017">News</a></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=49&l=en">Activities</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=257&l=en" >Cross-Straits Economic and Trade Arbitration Symposium</a><a href="/index.php?m=Article&a=index&id=258&l=en" >CIETAC CUP</a><a href="/index.php?m=Article&a=index&id=259&l=en" >China Arbitration Week</a></div></div><div style="padding:0;" class="nav_item"><a class="nav_a" href="/index.php?m=Article&a=index&id=46&l=en">Data</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=196&l=en" >Chinese Laws and Regulations</a><a href="/index.php?m=Article&a=index&id=197&l=en" >International and Foreign Reference Materials</a><a href="/index.php?m=Article&a=index&id=198&l=en" >Rules of Foreign Arbitration</a><a href="/index.php?m=Article&a=index&id=199&l=en" >International Conventions and Practices</a><a href="/index.php?m=Article&a=index&id=200&l=en" >Model Contract</a><a href="/index.php?m=Article&a=index&id=201&l=en" >Law Data Bank(Chinese)</a><a href="/index.php?m=Article&a=index&id=202&l=en" >Law Data Bank(English)</a><a href="/index.php?m=Article&a=index&id=203&l=en" >Meeting Documents</a></div></div><div style="padding:0;" class="nav_item last"><a class="nav_a" href="/index.php?m=Article&a=index&id=47&l=en">Research</a><span></span><div class="drop_list"><a href="/index.php?m=Article&a=index&id=256&l=en" >Paper Selection</a><a href="/index.php?m=Article&a=index&id=255&l=en" >Annual Report</a><a href="/index.php?m=Article&a=index&id=205&l=en" >Case Analyses</a><a href="/index.php?m=Article&a=index&id=207&l=en" >CIETAC Publication</a></div></div>
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
	<form id="myform" method="post" action="<?php echo U('User/Trainee/doapply?l=en');?>">
<div class="content">
    <div class="form_list">
        <div class="bt">Personal basic information</div>
        <div class="form_group">
            <div class="form_item">
                <span class="form_label"><span>*</span>Name: </span>
                <input class="form_text varlidate" for="Name" id="name" name="name" type="text" />
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Gender: </span>
                <select class="form_text varlidate" for="Gender" name="sex" id="sex">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Date of birth: </span>
                <input type="text" id="birthday" name="birthday" class="form_text varlidate Wdate" for="Date of birth" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',lang:'en'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Start work: </span>
                <input type="text" id="workstarttime" name="workstarttime" style="width: 140px;" class="form_text varlidate Wdate" for="Start work" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
                -
                <input type="text" id="workendtime" name="workendtime" style="width: 140px;" class="form_text varlidate Wdate" for="Start work" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>HuKou: </span>
                <input class="form_text varlidate" for="HuKou" id="hukou" name="hukou" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Current city: </span>
                <input class="form_text varlidate" for="Current city" id="currentcity" name="currentcity" type="text">
            </div>
            <div class="form_item">
                <span class="form_label">ID card number: </span>
                <input class="form_text" id="identityid" name="identityid" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Mobile: </span>
                <input class="form_text varlidate" for="Mobile" id="mobile" name="mobile" type="text">
            </div>
            <div class="form_item">
                <span class="form_label">Tel: </span>
                <input class="form_text" id="tel" name="tel" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Email: </span>
                <input class="form_text varlidate" for="Email" id="email" name="email" type="text">
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="form_list">
        <div class="bt">Working experience</div>
        <div class="form_group">
            <div class="form_item">
                <span class="form_label"><span>*</span>Working/practice experience: </span>
                <span style="color: rgb(102, 102, 102); font-size: 14px; height: 32px; display: inline; line-height: 32px;">
                    <input onclick="aaa(1);" type="radio" name="isexperience" id="work_experience_have" checked="checked" value="1">
                    <span class="">Have</span>
                    <input type="radio" onclick="aaa(2);" name="isexperience" id="work_experience_no" value="2">
                    <span class="">Not have</span>
                </span>
            </div>
            <div id="workdiv">
                <div class="form_item">
                    <span class="form_label"><span>*</span>Company name: </span>
                    <input class="form_text varlidate" for="Company name" id="company_name" name="company_name" type="text" />
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>Job category: </span>
                    <input class="form_text varlidate" for="Job category" id="jobtitle" name="jobtitle" type="text" />
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>Work date: </span>
                    <input type="text" id="workstime" name="workstime" style="width: 140px;" class="form_text varlidate Wdate" for="Work date" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
                    -
                    <input type="text" id="worketime" name="worketime" style="width: 140px;" class="form_text varlidate Wdate" for="Work date" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>Monthly income: </span>
                    <select class="form_text varlidate" for="Monthly income" name="salary" id="salary">
                        <option value="">--Please choose--</option>
                        <option value="Confidential">Confidential</option>
                        <option value="Below 1000RMB/Month">Below 1000RMB/Month</option>
                        <option value="1000-2000RMB/Month">1000-2000RMB/Month</option>
                        <option value="2001-4000RMB/Month">2001-4000RMB/Month</option>
                        <option value="4001-6000RMB/Month">4001-6000RMB/Month</option>
                        <option value="6001-8000RMB/Month">6001-8000RMB/Month</option>
                        <option value="8001-10000RMB/Month">8001-10000RMB/Month</option>
                        <option value="10001-15000RMB/Month">10001-15000RMB/Month</option>
                        <option value="15000-25000RMB/Month">15000-25000RMB/Month</option>
                        <option value="Above 25000RMB/Month">Above 25000RMB/Month</option>
                    </select>
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>Work description: </span>
                    <textarea id="workdescription" class="form_textarea varlidate" for="Work description" name="workdescription" onchange="this.value=this.value.substring(0, 600)" onkeydown="this.value=this.value.substring(0, 600)" onkeyup="this.value=this.value.substring(0, 600)"></textarea>
                    <p class="txt">not more than 600.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="form_list">
        <div class="bt">Education experience</div>
        <div class="form_group">
            <div class="form_item">
                <span class="form_label"><span>*</span>Degree: </span>
                <select class="form_text varlidate" for="Degree" name="education_level" id="education_level">
                    <option value="">--Please choose--</option>
                    <option value="Associate">Associate</option>
                    <option value="Bachelor">Bachelor</option>
                    <option value="Master">Master</option>
                    <option value="Doctor">Doctor</option>
                    <option value="MBA">MBA</option>
                    <option value="EMBA">EMBA</option>
                    <option value="Secondary Specialized">Secondary Specialized</option>
                    <option value="Skilled Workers Training">Skilled Workers Training</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="Junior High School">Junior High School</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Unified enrollment: </span>
                <span style="color: rgb(102, 102, 102); font-size: 14px; height: 32px; display: inline; line-height: 32px;">
                    <input type="radio" name="istongzhao" checked="checked" value="1">
                    <span class="">是</span>
                    <input type="radio" name="istongzhao" value="2">
                    <span class="">否</span>
                </span>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Study date: </span>
                <input type="text" id="studystartdate" name="studystartdate" style="width: 140px;" class="form_text varlidate Wdate" for="Study date" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
                -
                <input type="text" id="studyenddate" name="studyenddate" style="width: 140px;" class="form_text varlidate Wdate" for="Study date" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'en'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>School name: </span>
                <input class="form_text varlidate" for="School name" id="schoolname" name="schoolname" type="text" />
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>Major: </span>
                <input class="form_text varlidate" for="Major" id="profession_name" name="profession_name" type="text" />
            </div>
        </div>
        <div class="form_group">
            <div class="btns">
                <a href="javascript:;" id="submit_on" class="btn_blue">OK</a>
            </div>
        </div>
    </div>
</div>

</form>
<script src="__PUBLIC__/Js/MyDate/WdatePicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
　　if($("#work_experience_no").attr("checked")){
        $("#workdiv").css('display','none'); 
    }else{
        $("#workdiv").css('display','block'); 
    }
});
function aaa(type){
    if(type == '1'){
        $("#workdiv").show(100);
    }else if(type == '2'){
        $("#workdiv").hide(100);
    }
}
$("#submit_on").on('click', function(){
    var flag = 0;
    $(".varlidate").each(function(){
        var val = $.trim($(this).val());
        if(val.length<1){
            var fname = $(this).attr("name");
            if( fname == "company_name" || fname == "jobtitle" || fname == "workstime" || fname == "worketime" || fname == "salary" || fname == "workdescription"){
                if(!$("#work_experience_no").attr("checked")){
                    var hin = $(this).attr("for");
                    flag = 1;
                    alert(hin+" Is empty！！");
                    return false;
                }
                
            }else{
                var hin = $(this).attr("for");
                flag = 1;
                alert(hin+" Is empty！！");
                return false;
            }
        }
    });
    if(flag <= 0){
        $('#myform').submit();
    }
});
    
</script>

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
                 
                <?php else :?>
                <?php  $_result=M("Download")->field("id,title")->where(" 1  and lang=2 and website=22 AND status=1  AND catid=220")->order("listorder asc,id desc")->limit("3")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><dd><a href="index.php?m=Download&a=down&id=<?php echo ($r["id"]); ?>" title="<?php echo ($r["title"]); ?>" target="_blank"><?php echo (str_cut($r["title"],26)); ?></a></dd><?php endforeach; endif;?> 
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