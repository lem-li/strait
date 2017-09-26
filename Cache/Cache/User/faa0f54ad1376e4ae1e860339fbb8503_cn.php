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
	<form id="myform" method="post" action="<?php echo U('User/Trainee/doapply?l=cn');?>">
<div class="content">
    <div class="form_list">
		<div class="bt">个人基本信息</div>
		<div class="form_group">
			<div class="form_item">
                <span class="form_label"><span>*</span>姓名: </span>
                <input class="form_text varlidate" for="姓名" id="name" name="name" type="text" />
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>性别: </span>
                <select class="form_text varlidate" for="性别" name="sex" id="sex">
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>出生日期: </span>
                <input type="text" id="birthday" name="birthday" class="form_text varlidate Wdate" for="出生日期" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',lang:'cn'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>参加工作年份: </span>
                <input type="text" id="workstarttime" name="workstarttime" style="width: 140px;" class="form_text varlidate Wdate" for="参加工作年份" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
                -
                <input type="text" id="workendtime" name="workendtime" style="width: 140px;" class="form_text varlidate Wdate" for="参加工作年份" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>户口所在地: </span>
                <input class="form_text varlidate" for="户口所在地" id="hukou" name="hukou" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>现居住城市: </span>
                <input class="form_text varlidate" for="现居住城市" id="currentcity" name="currentcity" type="text">
            </div>
            <div class="form_item">
                <span class="form_label">身份证号: </span>
                <input class="form_text" id="identityid" name="identityid" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>手机号: </span>
                <input class="form_text varlidate" for="手机号" id="mobile" name="mobile" type="text">
            </div>
            <div class="form_item">
                <span class="form_label">座机: </span>
                <input class="form_text" id="tel" name="tel" type="text">
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>电子邮箱: </span>
                <input class="form_text varlidate" for="电子邮箱" id="email" name="email" type="text">
            </div>
		</div>
    </div>
</div>
<div class="content">
    <div class="form_list">
        <div class="bt">最近工作/实习经历</div>
        <div class="form_group">
            <div class="form_item">
                <span class="form_label"><span>*</span>是否有工作/实习经验: </span>
                <span style="color: rgb(102, 102, 102); font-size: 14px; height: 32px; display: inline; line-height: 32px;">
                    <input onclick="aaa(1);" type="radio" name="isexperience" id="work_experience_have" checked="checked" value="1">
                    <span class="">有</span>
                    <input type="radio" onclick="aaa(2);" name="isexperience" id="work_experience_no" value="2">
                    <span class="">无</span>
                </span>
            </div>
            <div id="workdiv">
                <div class="form_item">
                    <span class="form_label"><span>*</span>公司名称: </span>
                    <input class="form_text varlidate" for="公司名称" id="company_name" name="company_name" type="text" />
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>职位名称: </span>
                    <input class="form_text varlidate" for="职位名称" id="jobtitle" name="jobtitle" type="text" />
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>工作时间: </span>
                    <input type="text" id="workstime" name="workstime" style="width: 140px;" class="form_text varlidate Wdate" for="工作时间" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
                    -
                    <input type="text" id="worketime" name="worketime" style="width: 140px;" class="form_text varlidate Wdate" for="工作时间" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>职位月薪（税前）: </span>
                    <select class="form_text varlidate" for="职位月薪" name="salary" id="salary">
                        <option value="">--请选择--</option>
                        <option value="保密">保密</option>
                        <option value="1000元/月以下">1000元/月以下</option>
                        <option value="1000-2000元/月">1000-2000元/月</option>
                        <option value="2001-4000元/月">2001-4000元/月</option>
                        <option value="4001-6000元/月">4001-6000元/月</option>
                        <option value="6001-8000元/月">6001-8000元/月</option>
                        <option value="8001-10000元/月">8001-10000元/月</option>
                        <option value="10001-15000元/月">10001-15000元/月</option>
                        <option value="15000-25000元/月">15000-25000元/月</option>
                        <option value="25000元/月以上">25000元/月以上</option>
                    </select>
                </div>
                <div class="form_item">
                    <span class="form_label"><span>*</span>工作描述: </span>
                    <textarea id="workdescription" class="form_textarea varlidate" for="工作描述" name="workdescription" onchange="this.value=this.value.substring(0, 300)" onkeydown="this.value=this.value.substring(0, 300)" onkeyup="this.value=this.value.substring(0, 300)"></textarea>
                    <p class="txt">不超过300字</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="form_list">
        <div class="bt">教育经历</div>
        <div class="form_group">
            <div class="form_item">
                <span class="form_label"><span>*</span>学历/学位: </span>
                <select class="form_text varlidate" for="学历/学位" name="education_level" id="education_level">
                    <option value="">--请选择--</option>
                    <option value="大专">大专</option>
                    <option value="本科">本科</option>
                    <option value="硕士">硕士</option>
                    <option value="博士">博士</option>
                    <option value="MBA">MBA</option>
                    <option value="EMBA">EMBA</option>
                    <option value="中专">中专</option>
                    <option value="中技">中技</option>
                    <option value="高中">高中</option>
                    <option value="初中">初中</option>
                    <option value="其他">其他</option>
                </select>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>是否统招: </span>
                <span style="color: rgb(102, 102, 102); font-size: 14px; height: 32px; display: inline; line-height: 32px;">
                    <input type="radio" name="istongzhao" checked="checked" value="1">
                    <span class="">是</span>
                    <input type="radio" name="istongzhao" value="2">
                    <span class="">否</span>
                </span>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>就读时间: </span>
                <input type="text" id="studystartdate" name="studystartdate" style="width: 140px;" class="form_text varlidate Wdate" for="就读时间" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
                -
                <input type="text" id="studyenddate" name="studyenddate" style="width: 140px;" class="form_text varlidate Wdate" for="就读时间" onfocus="WdatePicker({dateFmt:'yyyy-MM',lang:'cn'})"/>
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>学校名称: </span>
                <input class="form_text varlidate" for="学校名称" id="schoolname" name="schoolname" type="text" />
            </div>
            <div class="form_item">
                <span class="form_label"><span>*</span>专业名称: </span>
                <input class="form_text varlidate" for="专业名称" id="profession_name" name="profession_name" type="text" />
            </div>
        </div>
        <div class="form_group">
            <div class="btns">
                <a href="javascript:;" id="submit_on" class="btn_blue">创建</a>
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
                    alert(hin+"为空！！");
                    return false;
                }
                
            }else{
                var hin = $(this).attr("for");
                flag = 1;
                alert(hin+"为空！！");
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