(function(global,undefined){if(global.seajs){return}var seajs=global.seajs={version:"2.2.1"};var data=seajs.data={};var cache={};function isType(type){return function(obj){return{}.toString.call(obj)=="[object "+type+"]"}}var isObject=isType("Object");var isString=isType("String");var isArray=Array.isArray||isType("Array");var isFunction=isType("Function");var _cid=0;function cid(){return _cid++}var events=data.events={};seajs.on=function(name,callback){var list=events[name]||(events[name]=[]);list.push(callback);return seajs};seajs.off=function(name,callback){if(!(name||callback)){events=data.events={};return seajs}var list=events[name];if(list){if(callback){for(var i=list.length-1;i>=0;i--){if(list[i]===callback){list.splice(i,1)}}}else{delete events[name]}}return seajs};var emit=seajs.emit=function(name,data){var list=events[name],fn;if(list){list=list.slice();while(fn=list.shift()){fn(data)}}return seajs};var DIRNAME_RE=/[^?#]*\//;var DOT_RE=/\/\.\//g;var DOUBLE_DOT_RE=/\/[^/]+\/\.\.\//;var DOUBLE_SLASH_RE=/([^:/])\/\//g;function dirname(path){return path.match(DIRNAME_RE)[0]}function realpath(path){path=path.replace(DOT_RE,"/");while(path.match(DOUBLE_DOT_RE)){path=path.replace(DOUBLE_DOT_RE,"/")}path=path.replace(DOUBLE_SLASH_RE,"$1/");return path}function normalize(path){var last=path.length-1;var lastC=path.charAt(last);if(lastC==="#"){return path.substring(0,last)}return path.substring(last-2)===".js"||path.indexOf("?")>0||path.substring(last-3)===".css"||lastC==="/"?path:path+".js"}var PATHS_RE=/^([^/:]+)(\/.+)$/;var VARS_RE=/{([^{]+)}/g;function parseAlias(id){var alias=data.alias;return alias&&isString(alias[id])?alias[id]:id}function parsePaths(id){var paths=data.paths;var m;if(paths&&(m=id.match(PATHS_RE))&&isString(paths[m[1]])){id=paths[m[1]]+m[2]}return id}function parseVars(id){var vars=data.vars;if(vars&&id.indexOf("{")>-1){id=id.replace(VARS_RE,function(m,key){return isString(vars[key])?vars[key]:m})}return id}function parseMap(uri){var map=data.map;var ret=uri;if(map){for(var i=0,len=map.length;i<len;i++){var rule=map[i];ret=isFunction(rule)?rule(uri)||uri:uri.replace(rule[0],rule[1]);if(ret!==uri)break}}return ret}var ABSOLUTE_RE=/^\/\/.|:\//;var ROOT_DIR_RE=/^.*?\/\/.*?\//;function addBase(id,refUri){var ret;var first=id.charAt(0);if(ABSOLUTE_RE.test(id)){ret=id}else if(first==="."){ret=realpath((refUri?dirname(refUri):data.cwd)+id)}else if(first==="/"){var m=data.cwd.match(ROOT_DIR_RE);ret=m?m[0]+id.substring(1):id}else{ret=data.base+id}if(ret.indexOf("//")===0){ret=location.protocol+ret}return ret}function id2Uri(id,refUri){if(!id)return"";if(cache[id])return cache[id];id=parseAlias(id);id=parsePaths(id);id=parseVars(id);id=normalize(id);var uri=addBase(id,refUri);uri=parseMap(uri);return uri}var doc=document;var cwd=dirname(doc.URL);var scripts=doc.scripts;var loaderScript=doc.getElementById("seajsnode")||scripts[scripts.length-1];var loaderDir=dirname(getScriptAbsoluteSrc(loaderScript)||cwd);function getScriptAbsoluteSrc(node){return node.hasAttribute?node.src:node.getAttribute("src",4)}seajs.resolve=id2Uri;var head=doc.head||doc.getElementsByTagName("head")[0]||doc.documentElement;var baseElement=head.getElementsByTagName("base")[0];var IS_CSS_RE=/\.css(?:\?|$)/i;var currentlyAddingScript;var interactiveScript;var isOldWebKit=+navigator.userAgent.replace(/.*(?:AppleWebKit|AndroidWebKit)\/(\d+).*/,"$1")<536;function request(url,callback,charset){var isCSS=IS_CSS_RE.test(url);var node=doc.createElement(isCSS?"link":"script");if(charset){var cs=isFunction(charset)?charset(url):charset;if(cs){node.charset=cs}}addOnload(node,callback,isCSS,url);if(isCSS){node.rel="stylesheet";node.href=url}else{node.async=true;node.src=url}currentlyAddingScript=node;baseElement?head.insertBefore(node,baseElement):head.appendChild(node);currentlyAddingScript=null}function addOnload(node,callback,isCSS,url){var supportOnload="onload"in node;if(isCSS&&(isOldWebKit||!supportOnload)){setTimeout(function(){pollCss(node,callback)},1);return}if(supportOnload){node.onload=onload;node.onerror=function(){emit("error",{uri:url,node:node});onload()}}else{node.onreadystatechange=function(){if(/loaded|complete/.test(node.readyState)){onload()}}}function onload(){node.onload=node.onerror=node.onreadystatechange=null;if(!isCSS&&!data.debug){head.removeChild(node)}node=null;callback()}}function pollCss(node,callback){var sheet=node.sheet;var isLoaded;if(isOldWebKit){if(sheet){isLoaded=true}}else if(sheet){try{if(sheet.cssRules){isLoaded=true}}catch(ex){if(ex.name==="NS_ERROR_DOM_SECURITY_ERR"){isLoaded=true}}}setTimeout(function(){if(isLoaded){callback()}else{pollCss(node,callback)}},20)}function getCurrentScript(){if(currentlyAddingScript){return currentlyAddingScript}if(interactiveScript&&interactiveScript.readyState==="interactive"){return interactiveScript}var scripts=head.getElementsByTagName("script");for(var i=scripts.length-1;i>=0;i--){var script=scripts[i];if(script.readyState==="interactive"){interactiveScript=script;return interactiveScript}}}seajs.request=request;var REQUIRE_RE=/"(?:\\"|[^"])*"|'(?:\\'|[^'])*'|\/\*[\S\s]*?\*\/|\/(?:\\\/|[^\/\r\n])+\/(?=[^\/])|\/\/.*|\.\s*require|(?:^|[^$])\brequire\s*\(\s*(["'])(.+?)\1\s*\)/g;var SLASH_RE=/\\\\/g;function parseDependencies(code){var ret=[];code.replace(SLASH_RE,"").replace(REQUIRE_RE,function(m,m1,m2){if(m2){ret.push(m2)}});return ret}var cachedMods=seajs.cache={};var anonymousMeta;var fetchingList={};var fetchedList={};var callbackList={};var STATUS=Module.STATUS={FETCHING:1,SAVED:2,LOADING:3,LOADED:4,EXECUTING:5,EXECUTED:6};function Module(uri,deps){this.uri=uri;this.dependencies=deps||[];this.exports=null;this.status=0;this._waitings={};this._remain=0}Module.prototype.resolve=function(){var mod=this;var ids=mod.dependencies;var uris=[];for(var i=0,len=ids.length;i<len;i++){uris[i]=Module.resolve(ids[i],mod.uri)}return uris};Module.prototype.load=function(){var mod=this;if(mod.status>=STATUS.LOADING){return}mod.status=STATUS.LOADING;var uris=mod.resolve();emit("load",uris);var len=mod._remain=uris.length;var m;for(var i=0;i<len;i++){m=Module.get(uris[i]);if(m.status<STATUS.LOADED){m._waitings[mod.uri]=(m._waitings[mod.uri]||0)+1}else{mod._remain--}}if(mod._remain===0){mod.onload();return}var requestCache={};for(i=0;i<len;i++){m=cachedMods[uris[i]];if(m.status<STATUS.FETCHING){m.fetch(requestCache)}else if(m.status===STATUS.SAVED){m.load()}}for(var requestUri in requestCache){if(requestCache.hasOwnProperty(requestUri)){requestCache[requestUri]()}}};Module.prototype.onload=function(){var mod=this;mod.status=STATUS.LOADED;if(mod.callback){mod.callback()}var waitings=mod._waitings;var uri,m;for(uri in waitings){if(waitings.hasOwnProperty(uri)){m=cachedMods[uri];m._remain-=waitings[uri];if(m._remain===0){m.onload()}}}delete mod._waitings;delete mod._remain};Module.prototype.fetch=function(requestCache){var mod=this;var uri=mod.uri;mod.status=STATUS.FETCHING;var emitData={uri:uri};emit("fetch",emitData);var requestUri=emitData.requestUri||uri;if(!requestUri||fetchedList[requestUri]){mod.load();return}if(fetchingList[requestUri]){callbackList[requestUri].push(mod);return}fetchingList[requestUri]=true;callbackList[requestUri]=[mod];emit("request",emitData={uri:uri,requestUri:requestUri,onRequest:onRequest,charset:data.charset});if(!emitData.requested){requestCache?requestCache[emitData.requestUri]=sendRequest:sendRequest()}function sendRequest(){seajs.request(emitData.requestUri,emitData.onRequest,emitData.charset)}function onRequest(){delete fetchingList[requestUri];fetchedList[requestUri]=true;if(anonymousMeta){Module.save(uri,anonymousMeta);anonymousMeta=null}var m,mods=callbackList[requestUri];delete callbackList[requestUri];while(m=mods.shift())m.load()}};Module.prototype.exec=function(){var mod=this;if(mod.status>=STATUS.EXECUTING){return mod.exports}mod.status=STATUS.EXECUTING;var uri=mod.uri;function require(id){return Module.get(require.resolve(id)).exec()}require.resolve=function(id){return Module.resolve(id,uri)};require.async=function(ids,callback){Module.use(ids,callback,uri+"_async_"+cid());return require};var factory=mod.factory;var exports=isFunction(factory)?factory(require,mod.exports={},mod):factory;if(exports===undefined){exports=mod.exports}delete mod.factory;mod.exports=exports;mod.status=STATUS.EXECUTED;emit("exec",mod);return exports};Module.resolve=function(id,refUri){var emitData={id:id,refUri:refUri};emit("resolve",emitData);return emitData.uri||seajs.resolve(emitData.id,refUri)};Module.define=function(id,deps,factory){var argsLen=arguments.length;if(argsLen===1){factory=id;id=undefined}else if(argsLen===2){factory=deps;if(isArray(id)){deps=id;id=undefined}else{deps=undefined}}if(!isArray(deps)&&isFunction(factory)){deps=parseDependencies(factory.toString())}var meta={id:id,uri:Module.resolve(id),deps:deps,factory:factory};if(!meta.uri&&doc.attachEvent){var script=getCurrentScript();if(script){meta.uri=script.src}}emit("define",meta);meta.uri?Module.save(meta.uri,meta):anonymousMeta=meta};Module.save=function(uri,meta){var mod=Module.get(uri);if(mod.status<STATUS.SAVED){mod.id=meta.id||uri;mod.dependencies=meta.deps||[];mod.factory=meta.factory;mod.status=STATUS.SAVED}};Module.get=function(uri,deps){return cachedMods[uri]||(cachedMods[uri]=new Module(uri,deps))};Module.use=function(ids,callback,uri){var mod=Module.get(uri,isArray(ids)?ids:[ids]);mod.callback=function(){var exports=[];var uris=mod.resolve();for(var i=0,len=uris.length;i<len;i++){exports[i]=cachedMods[uris[i]].exec()}if(callback){callback.apply(global,exports)}delete mod.callback};mod.load()};Module.preload=function(callback){var preloadMods=data.preload;var len=preloadMods.length;if(len){Module.use(preloadMods,function(){preloadMods.splice(0,len);Module.preload(callback)},data.cwd+"_preload_"+cid())}else{callback()}};seajs.use=function(ids,callback){Module.preload(function(){Module.use(ids,callback,data.cwd+"_use_"+cid())});return seajs};Module.define.cmd={};global.define=Module.define;seajs.Module=Module;data.fetchedList=fetchedList;data.cid=cid;seajs.require=function(id){var mod=Module.get(Module.resolve(id));if(mod.status<STATUS.EXECUTING){mod.onload();mod.exec()}return mod.exports};var BASE_RE=/^(.+?\/)(\?\?)?(seajs\/)+/;data.base=(loaderDir.match(BASE_RE)||["",loaderDir])[1];data.dir=loaderDir;data.cwd=cwd;data.charset="utf-8";data.preload=function(){var plugins=[];var str=location.search.replace(/(seajs-\w+)(&|$)/g,"$1=1$2");str+=" "+doc.cookie;str.replace(/(seajs-\w+)=1/g,function(m,name){plugins.push(name)});return plugins}();seajs.config=function(configData){for(var key in configData){var curr=configData[key];var prev=data[key];if(prev&&isObject(prev)){for(var k in curr){prev[k]=curr[k]}}else{if(isArray(prev)){curr=prev.concat(curr)}else if(key==="base"){if(curr.slice(-1)!=="/"){curr+="/"}curr=addBase(curr)}data[key]=curr}}emit("config",configData);seajs.predefine();return seajs};seajs.predefine=function(){var scripts=document.getElementsByTagName("script");for(var i=0,script,src,l=scripts.length;i<l;i++){script=scripts[i];var src=script.getAttribute("data-src");if(!src)continue;var mod=script.getAttribute("data-mod");if(mod&&mod.length){}else{var res=src.match(/http:\/\/[h5|h5-pic|h5-js|h5-css]+\.lietou-static.com\/(\d*)\/m\/(.+)\.js/);if(res&&res[2]){cache[res[2]]=res[0]}}}}})(this);if(document.domain.indexOf("liepin.com")>0){document.domain="liepin.com"}function stat(str){tlog=window.tlog||[];tlog.push("c:m_"+str)}document.addEventListener("WeixinJSBridgeReady",function(){WeixinJSBridge.on("menu:share:timeline",function(argv){var $weixinParams=$(".weixinParams"),weixinParams={title:$weixinParams.attr("data-title")||document.title,link:$weixinParams.attr("data-link")||location.href,img_url:$weixinParams.attr("data-img_url")+"?"+(new Date).getTime()||"",desc:$weixinParams.attr("data-desc")||""};WeixinJSBridge.invoke("shareTimeline",weixinParams,function(d){WeixinJSBridge.log(d.err_msg)})});WeixinJSBridge.on("menu:share:appmessage",function(argv){var $weixinParams=$(".weixinParams"),weixinParams={appid:"",title:$weixinParams.attr("data-title")||document.title,link:$weixinParams.attr("data-link")||location.href,img_url:$weixinParams.attr("data-img_url")+"?"+(new Date).getTime()||"",desc:$weixinParams.attr("data-desc")||""};WeixinJSBridge.invoke("sendAppMessage",weixinParams,function(){})})});
