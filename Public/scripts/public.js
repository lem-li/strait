/*系统函数*/

/*自定义trim*/
String.prototype.trim = function() {
	return this.replace(/(^\s*)|(\s*$)/g, "");
}
String.prototype.ltrim = function() {
	return this.replace(/(^\s*)/g, "");
}
String.prototype.rtrim = function() {
	return this.replace(/(\s*$)/g, "");
}
String.prototype.strim = function() { 
	var vStr = "";
	vArr=this.split(" ");
	for(i=0; i<vArr.length; i++) vStr+=vArr[i];
	return vStr;
} 

/*自定义request*/
function request(paras){ 
	var url = location.href+"#";
			url = url.substring(0,url.indexOf("#"));
	var paraString = url.substring(url.indexOf("?")+1,url.length).split("&");
	var paraObj = {}
	for (i=0; j=paraString[i]; i++){paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length);}
	var returnValue = paraObj[paras.toLowerCase()]; 
	if(typeof(returnValue)=="undefined") return ""; else return returnValue;
}

/*生成随机数rand(数值)*/
rnd.today=new Date();  
rnd.seed=rnd.today.getTime(); 
function rnd() {  
	rnd.seed = (rnd.seed*9301+49297) % 233280;  
　return rnd.seed(233280.0);  
}  
function rand(number) {  
　return Math.ceil(rnd()*number);  
}  

/*判断对象存在*/
function getID(vobj){
	var vgetID = document.getElementById(vobj);
	if (null != vgetID && vgetID) return true; else return false;
}

/*页面函数*/
/*公用loading*/
function showLoading(vobj,vstr) {
	if (vstr==undefined) vstr="正在加载...";
	$(vobj).html('<div id="loading">'+vstr+'</div>');
}

function openwindow(url,name,iWidth,iHeight){
  var url; //转向网页的地址;
  var name; //网页名称，可为空;
  var iWidth; //弹出窗口的宽度;
  var iHeight; //弹出窗口的高度;
  var iTop = (window.screen.availHeight-30-iHeight)/2; //获得窗口的垂直位置;
  var iLeft = (window.screen.availWidth-10-iWidth)/2; //获得窗口的水平位置;
  window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
}

/*跨框架数据共享接口*/
var share = {
    /** 
	* 跨框架数据共享接口 
	* @param {String} 存储的数据名 
	* @param {Any} 将要存储的任意数据(无此项则返回被查询的数据) 
	*/
    data:function(name, value) {
        var top = window.top, cache = top["_CACHE"] || {};
        top["_CACHE"] = cache;
        return value ? cache[name] = value :cache[name];
    },
    /** 
	* 数据共享删除接口 
	* @param {String} 删除的数据名 
	*/
    removeData:function(name) {
        var cache = window.top["_CACHE"];
        if (cache && cache[name]) delete cache[name];
    }
};