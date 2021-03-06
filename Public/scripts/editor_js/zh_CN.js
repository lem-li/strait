/*******************************************************************************
* WYSIWYG HTML Editor for Internet
*
* @author Roddy <luolonghao@gmail.com>
* @site http://www.kindsoft.net/
* @licence LGPL(http://www.opensource.org/licenses/lgpl-license.php)
* @version 3.0
*******************************************************************************/

var KE = {};

KE.lang = {
    source : '切换模式',
    preview : '预览',
    zoom : '放大',
    undo : '后退',
    redo : '前进',
    cut : '剪切',
    copy : '复制',
    paste : '粘贴',
    plainpaste : '粘贴为无格式文本',
    wordpaste : '从Word粘贴',
    selectall : '全选',
    justifyleft : '左对齐',
    justifycenter : '居中',
    justifyright : '右对齐',
    justifyfull : '两端对齐',
    insertorderedlist : '编号',
    insertunorderedlist : '项目符号',
    indent : '增加缩进',
    outdent : '减少缩进',
    subscript : '下标',
    superscript : '上标',
    date : '插入当前日期',
    time : '插入当前时间',
    title : '标题',
    fontname : '字体',
    fontsize : '文字大小',
    textcolor : '文字颜色',
    bgcolor : '文字背景',
    bold : '粗体',
    italic : '斜体',
    underline : '下划线',
    strikethrough : '删除线',
    removeformat : '删除格式',
    image : '插入图片',
    flash : '插入Flash',
    media : '插入多媒体',
    layer : '插入层',
    table : '插入表格',
    specialchar : '插入特殊字符',
    hr : '插入横线',
    emoticons : '插入笑脸',
    link : '超级连接',
    unlink : '取消超级连接',
    fullscreen : '全屏显示',
    about : '关于',
    print : '打印',
    yes : '确定',
    no : '取消',
    close : '关闭',
    fontTable : {
        'SimSun'             : '宋体',
        'SimHei'             : '黑体',
        'FangSong_GB2312'    : '仿宋体',
        'KaiTi_GB2312'       : '楷体',
        'NSimSun'            : '新宋体',
        'Arial'              : 'Arial',
        'Arial Black'        : 'Arial Black',
        'Times New Roman'    : 'Times New Roman',
        'Courier New'        : 'Courier New',
        'Tahoma'             : 'Tahoma',
        'Verdana'            : 'Verdana'
    },
    titleTable : {
        'H1' : '标题 1',
        'H2' : '标题 2',
        'H3' : '标题 3',
        'H4' : '标题 4',
        'H5' : '标题 5',
        'H6' : '标题 6'
    },
    charTable : [
        ['§','№','☆','★','○','●','◎','◇','◆','□'],
        ['℃','‰','■','△','▲','※','→','←','↑','↓'],
        ['〓','¤','°','＃','＆','＠','＼','︿','＿','￣'],
        ['―','α','β','γ','δ','ε','ζ','η','θ','ι'],
        ['κ','λ','μ','ν','ξ','ο','π','ρ','σ','τ'],
        ['υ','φ','χ','ψ','ω','≈','≡','≠','＝','≤'],
        ['≥','＜','＞','≮','≯','∷','±','＋','－','×'],
        ['÷','／','∫','∮','∝','∞','∧','∨','∑','∏'],
        ['∪','∩','∈','∵','∴','⊥','∥','∠','⌒','⊙'],
        ['≌','∽','〖','〗','【','】','（','）','［','］']
    ],
    colorTable : [
        ["#FFFFFF","#E5E4E4","#D9D8D8","#C0BDBD","#A7A4A4","#8E8A8B","#827E7F","#767173","#5C585A","#000000"],
        ["#FEFCDF","#FEF4C4","#FEED9B","#FEE573","#FFED43","#F6CC0B","#E0B800","#C9A601","#AD8E00","#8C7301"],
        ["#FFDED3","#FFC4B0","#FF9D7D","#FF7A4E","#FF6600","#E95D00","#D15502","#BA4B01","#A44201","#8D3901"],
        ["#FFD2D0","#FFBAB7","#FE9A95","#FF7A73","#FF483F","#FE2419","#F10B00","#D40A00","#940000","#6D201B"],
        ["#FFDAED","#FFB7DC","#FFA1D1","#FF84C3","#FF57AC","#FD1289","#EC0078","#D6006D","#BB005F","#9B014F"],
        ["#FCD6FE","#FBBCFF","#F9A1FE","#F784FE","#F564FE","#F546FF","#F328FF","#D801E5","#C001CB","#8F0197"],
        ["#E2F0FE","#C7E2FE","#ADD5FE","#92C7FE","#6EB5FF","#48A2FF","#2690FE","#0162F4","#013ADD","#0021B0"],
        ["#D3FDFF","#ACFAFD","#7CFAFF","#4AF7FE","#1DE6FE","#01DEFF","#00CDEC","#01B6DE","#00A0C2","#0084A0"],
        ["#EDFFCF","#DFFEAA","#D1FD88","#BEFA5A","#A8F32A","#8FD80A","#79C101","#3FA701","#307F00","#156200"],
        ["#D4C89F","#DAAD88","#C49578","#C2877E","#AC8295","#C0A5C4","#969AC2","#92B7D7","#80ADAF","#9CA53B"]
    ],
    invalidSwf : "请输入有效的URL地址。\n只允许swf格式。",
    invalidImg : "请输入有效的URL地址。\n只允许jpg,gif,bmp,png格式。",
    invalidMedia : "请输入有效的URL地址。\n只允许mp3,wav,wma,wmv,mid,avi,mpg,asf,rm,rmvb格式。",
    invalidWidth : "宽度必须为数字。",
    invalidHeight : "高度必须为数字。",
    invalidBorder : "边框必须为数字。",
    pleaseInput : "请输入内容"
};
