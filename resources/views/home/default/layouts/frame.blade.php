<?php
/**
 * Created by PhpStorm.
 * User: lsshu
 * Date: 2019/5/15
 * Time: 下午7:46
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>青于蓝_排名技术建站_网站模板设计_个人网站制作_企业网站制作</title>
    <meta name="keywords" content="青于蓝,排名技术建站,网站模板设计,个人网站制作,企业网站制作" />
    <meta name="description" content="青于蓝,如何建立个人网站制作_企业网站建设方案_独立个人博客模板源码程序下载哪个比较好_SEO排名技术建站cms系统制作企业网站个人网站价格_个人博客网站制作视频教学快速建站" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{$config['css']}}base.css" rel="stylesheet">
    <link href="{{$config['css']}}m.css" rel="stylesheet">
    <script src="{{$config['js']}}jquery-1.8.3.min.js" ></script>
    <script src="{{$config['js']}}main.js"></script>
    <!--[if lt IE 9]>
    <script src="{{$config['js']}}modernizr.js"></script>
    <![endif]-->
    @yield('head')
</head>
<body>
<header>
    <div class="logo-section box">
        <div class="search">
            <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
                <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
                <input name="show" value="title" type="hidden">
                <input name="tempid" value="1" type="hidden">
                <input name="tbname" value="news" type="hidden">
                <input name="Submit" class="input_submit" value="搜索" type="submit">
            </form>
        </div>
        <div class="logo"><a href="#"><img src="{{$config['img']}}logo.png">
                <h2 class="logo-title">青于蓝</h2>
                <p class="logo-text">排名技术建站，让你对手追赶</p>
            </a> </div>
    </div>
    <div class="clear"></div>
    <div class="topnav">
        <h2>青于蓝</h2>
        <nav>

            <ul id="starlist">
                <li><a href="/">网站首页</a></li>
                <li class="menu"><a href="article">新闻资讯</a>
                    <ul class="sub">
                        <li><a href="article">资讯列表</a></li>
                        <li><a href="article_show">资讯内容</a></li>
                    </ul>
                    <span></span></li>
                <li class="menu"><a href="down">资源分享</a>
                    <ul class="sub">
                        <li><a href="down">下载列表</a></li>
                        <li><a href="down_show">下载内容</a></li>
                    </ul>
                    <span></span></li>
                <li class="menu"><a href="picture">图片展示</a>
                    <ul class="sub">
                        <li><a href="pictures">图片列表</a></li>
                        <li><a href="picturesb">多图列表</a></li>
                        <li><a href="picture_show">图片内容</a></li>
                    </ul>
                    <span></span></li>
                <li class="menu"><a href="shop">商城中心</a>
                    <ul class="sub">
                        <li><a href="shop">商城列表</a></li>
                        <li><a href="shop_show">商品详情</a></li>
                    </ul>
                    <span></span></li>
                <li class="menu"><a href="video">视频教程</a>
                    <ul class="sub">
                        <li><a href="videos">视频列表</a></li>
                        <li><a href="video_show">视频内容</a></li>
                    </ul>
                    <span></span></li>
                <li><a href="wenzi">文字列表</a></li>
                <li><a href="page">关于我们</a></li>
                <li><a href="contact">联系我们</a></li>
            </ul>
        </nav>
        <h2 id="mnavh"><span class="navicon"></span></h2>
    </div>
    <div class="is-search">
        <section><i></i>请输入关键字词</section>
    </div>



    <div class="search-page">
        <div class="go-left"></div>
        <div class="search">
            <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
                <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
                <input name="show" value="title" type="hidden">
                <input name="tempid" value="1" type="hidden">
                <input name="tbname" value="news" type="hidden">
                <input name="Submit" class="input_submit" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
        <div class="hot-search">
            <p>热门搜索排行</p>
            <ul class="search-paihang">
                <li><a href="/"><i>1</i>帝国</a></li>
                <li><a href="/"><i>2</i>模板</a></li>
                <li><a href="/"><i>3</i>博客</a></li>
                <li><a href="/"><i>4</i>后台</a></li>
                <li><a href="/"><i>5</i>html</a></li>
                <li><a href="/"><i>6</i>绅士</a></li>
                <li><a href="/"><i>7</i>cms</a></li>
                <li><a href="/"><i>8</i>支持</a></li>
                <li><a href="/"><i>9</i>早安</a></li>
                <li><a href="/"><i>10</i>个人</a></li>
            </ul>
        </div>
        <div class="new-search">
            <p>最新搜索排行</p>
            <ul class="search-paihang">
                <li><a href=""><i>1</i>函数</a></li>
                <li><a href="/"><i>2</i>博客程序</a></li>
                <li><a href="/"><i>3</i>解析</a></li>
                <li><a href="/"><i>4</i>红色</a></li>
                <li><a href="/"><i>5</i>告别2018</a></li>
                <li><a href="/"><i>6</i>插件</a></li>
                <li><a href="/"><i>7</i>网页布局</a></li>
                <li><a href="/"><i>8</i>云服务器</a></li>
                <li><a href="/"><i>9</i>with love for you</a></li>
                <li><a href="/"><i>10</i>评论插件</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="clear blank"></div>

@yield('content')

<footer>
    <div class="footer box">
        <div class="wxbox">
            <ul>
                <li><img src="{{$config['img']}}wxgzh.jpg"><span>微信公众号</span></li>
                <li><img src="{{$config['img']}}wx.png"><span>我的微信</span></li>
            </ul>
        </div>
        <div class="endnav">
            <p><b>站点声明：</b></p>
            <p>1、本站个人博客模板，均为杨青青本人设计，个人可以使用，但是未经许可不得用于任何商业目的。</p>
            <p>2、所有文章未经授权禁止转载、摘编、复制或建立镜像，如有违反，追究法律责任。举报邮箱：<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=HHh9cn95b3F1cHVye1xtbTJ-c3E" target="_blank">dacesmiling@qq.com</a></p>
            <p>Copyright © <a href="https://www.yangqq.com" target="_blank">www.yangqq.com</a> All Rights Reserved. 备案号：<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">蜀ICP备11002373号-1</a> <a href="" target="_blank">网站地图</a></p>
        </div>
    </div>
</footer>
<div class="toolbar-open"></div>
<div class="toolbar">
    <div class="toolbar-close"><span id="closed"></span></div>
    <div class="toolbar-nav">
        <ul id="toolbar-menu">
            <li><i class="side-icon-user"></i>
                <section>
                    <div class="userinfo">
                        <form name=login method=post action="[!--news.url--]e/member/doaction.php">
                            <input type=hidden name=enews value=login>
                            <input type=hidden name=ecmsfrom value=9>
                            <input name="username" type="text" class="inputText" size="16" placeholder="用户名"/>
                            <input name="password" type="password" class="inputText" size="16" placeholder="密码"/>
                            <input type="submit" name="Submit" value="登陆" class="inputsub-dl" />
                            <a href="[!--news.url--]e/member/register/index.php?tobind=0&groupid=1" class="inputsub-zc">注册</a>
                        </form>
                        <!--登陆后状态-->
                        <!--<div class="clear"></div>
                          <div class="logged">
                            <b>青于蓝管理员，您好！</b> <a href="[!--news.url--]e/member/cp/" target="_parent">会员中心</a> <a href="[!--news.url--]e/member/doaction.php?enews=exit&ecmsfrom=9" onclick="return confirm('确认要退出?');">退出</a>
                          </div>-->
                    </div>
                </section>
            </li>
            <li><i class="side-icon-qq"></i>
                <section class="qq-section">
                    <div class="qqinfo"><a href="https://jq.qq.com/?_wv=1027&k=5EH6xZg">前端设计交流群①</a><a href="https://jq.qq.com/?_wv=1027&k=52fM36y">前端设计交流群②</a><a href="http://wpa.qq.com/msgrd?v=3&uin=476847113&site=qq&menu=yes">站长QQ</a></div>
                </section>
            </li>
            <li><i class="side-icon-weixin"></i>
                <section class="weixin-section">
                    <div class="weixin-info">
                        <p>个人微信扫码</p>
                        <img src="{{$config['img']}}wx.png">
                        <p class="text12">工作时间</p>
                        <p class="text12">周一至周日 9:00-21:00</p>
                    </div>
                </section>
            </li>
            <li><i class="side-icon-dashang"></i>
                <section class="dashang-section">
                    <p>如果你觉得本站很棒，可以通过扫码支付打赏哦！</p>
                    <ul>
                        <li><img src="{{$config['img']}}weipayimg.jpg">微信收款码</li>
                        <li><img src="{{$config['img']}}alipayimg.jpg">支付宝收款码</li>
                    </ul>
                </section>
            </li>

        </ul>
    </div>
</div>
<div class="endmenu">
    <ul>
        <li><a href="index.html"><i class="iconfont icon-shouye"></i>首页</a></li>
        <li><a href="phone-fenlei.html"><i class="iconfont icon-fenlei"></i>分类</a></li>
        <li><a href="phone-list.html"><i class="iconfont icon-navicon-wzgl"></i>所有</a></li>
        <li><a href="phone-user.html"><i class="iconfont icon-My"></i>我的</a></li>
    </ul>
</div>
<a href="#" title="返回顶部" class="icon-top"></a>
@yield('footer')
</body>
</html>

