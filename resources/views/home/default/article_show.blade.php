<?php
/**
 * Created by PhpStorm.
 * User: lsshu
 * Date: 2019/5/15
 * Time: 下午8:27
 */
?>
@extends($config['prefix'].'layouts.frame')
@section('content')
    <article>
        <div class="left-box">
            <div class="whitebg">
                <div class="news-title"><span class="weizhi">您现在的位置是：<a href="/">首页</a>><a href="/">图片内容页</a></span>
                    <h2>图片列表</h2>
                </div>
                <div class="newstext-box">
                    <h1 class="news-title-h1">做一时间的旅行者，追溯一个宛如凤凰涅槃的动人故事</h1>
                    <div class="keywords"> <a href="/">时间</a><a href="/">旅行者</a><a href="/">故事</a> </div>
                    <div class="picview-other"> <span class="po-from">青于蓝</span><span class="po-date">2019-4-23</span><span class="po-classname">个人博客</span><span class="po-view">4636</span> </div>
                    <div class="smalltext"><i></i>每一套模板，我都是利用了一些碎片化的时间慢慢做的，前后大概持续了一周多的时间，因为每个人的逻辑思维方式不一样，我想要更简洁明了的代码，所以每一套模板我都是自己一个个用键盘敲出来的。 </div>
                    <div class="newstext">
                        <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。每当看到自己喜欢的配色图片或者布局，惊艳的js或者css3效果的时候，就有了做模板的冲动。</p>
                        <h2>个人博客模板</h2>
                        <p>每一套模板，我都是利用了一些碎片化的时间慢慢做的，前后大概持续了一周多的时间，因为每个人的逻辑思维方式不一样，我想要更简洁明了的代码，所以每一套模板我都是自己一个个用键盘敲出来的。</p>
                        <p><img alt="" src="http://www.yangqq.com/d/file/news/life/2018-06-17/917d732926d79cc2ae1012831ce51d1e.jpg"></p>
                        <p>对于个人博客模板，我一直坚持这样一个原则，那就是不仅漂亮，而且代码要少！因为要做出精美的个人博客模板是需要大量的时间投入的，没有一个人可以轻而易举的搞定一套个人博客模板，尤其是针对性（或专业性）极强的模板，一份好的模板，要求其代码在精炼的同时还要漂亮，后期内容上了，还要利于网站收录。</p>
                        <p>个人博客模板除了布局，颜色选择，图片修饰都是需要花时间和精力的，其实，制作博客模板最花时间的不是提炼代码，而是页面的排版设计，这里包含了多个方面，分别是排版、配色、图片，在处理这么多问题的同时还要求突出重点，确保每一页只有一个中心论点，这对于本身功底差的人来说是一件困难的事情！</p>
                        <p><img alt="" src="http://www.yangqq.com/d/file/download/div/2018-06-16/3677b3c727d123133baea93a4852456b.jpg"></p>
                        <p>很多人熬几个通宵，也还是做不出满意的作品，而我，对每一套个人博客模板，我都会经过反复的修改，测试兼容，寻找更简洁的写法。不是tu快，而是要更精美，实用！这也是为什么我设计的模板比较受欢迎的原因。好吧，我承认自己是个话唠，一开口就停不下来，但我更想说的是，只要你用的开心，就是我最大的收获！2018，杨青博客，原创个人博客模板，专业为你而来。</p>
                        <p>关注杨青博客，更多精彩分享，敬请期待！</p>
                    </div>
                    <div class="diggit"><a href="JavaScript:makeRequest('https://www.yangqq.com/e/public/digg/?classid=3&amp;id=900&amp;dotop=1&amp;doajax=1&amp;ajaxarea=diggnum','EchoReturnedText','GET','');"> 很赞哦！ </a>(<b id="diggnum"><script type="text/javascript" src="https://www.yangqq.com/e/public/ViewClick/?classid=3&amp;id=900&amp;down=5"></script></b>)</div>
                    <div class="clear"></div>
                    <div class="share"><img src="https://www.yangqq.com/skin/jxhx/{{$config['img']}}wxgzh.jpg">
                        <div class="share-text">
                            <p>扫描关注青于蓝微信公众号，第一时间获取网站模板更新动态</p>
                            <p>转载请说明来源于"青于蓝排名建站"</p>
                            <p>本文地址：<a href="https://www.yangqq.com/news/s/900.html" target="_blank">https://www.yangqq.com/news/s/900.html</a></p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="info-pre-next">
                        <ul>
                            <li><a href="/"><i><em>上一篇</em><img src="{{$config['img']}}pic02.jpg"></i>
                                    <h2>为什么说10月24日是程序员的节日？</h2>
                                    <p>不知道自己以后还能不能继续干这一行，结婚不到一年，也许某天开始会离开一两年，当再回来工作的时候，不知道是否能有单位再愿意聘请我，或者说自己能否再胜任这工作</p>
                                </a></li>
                            <li><a href="/"><i><em>下一篇</em><img src="{{$config['img']}}pic03.jpg"></i>
                                    <h2>十条设计原则教你学会如何设计网页布局!</h2>
                                    <p>网页常见的布局有很多种,单列布局,多列布局.其中单列布局是国外很多网站比较常用的.咱们很多站长以及门户网站都使用的是是两列布局,很少用三列布局的.下面我来分享下我们常用的网页布局格式</p>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear blank"></div>
            <div class="otherlink whitebg">
                <div class="news-title">
                    <h2>相关文章</h2>
                </div>
                <ul>
                    <li><a target="_blank" href="https://www.yangqq.com/news/life/2018-06-17/873.html">安静地做一个爱设计的女子</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/900.html">网易博客关闭，何不从此开始潇洒行走江湖！</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/923.html">【排名技术建站】杨青助你快速实现主站为核心的搜索排名霸屏</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/876.html">个人博客，我为什么要用帝国cms？</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/life/2018-04-27/816.html">个人博客，属于我的小世界！</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/qiyewangzhanmuban/963.html">蓝色企业网站模板超实用，完美符合SEO优化，适合企业公司建站的模板</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/884.html">制作个人博客，我是这么收费的？</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/944.html">【告别2018】耕耘才有所得，付出才有收获</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/885.html">帝国cms结合项如何实现多条件查询</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/919.html">帝国CMS灵动标签调用昨天、今天、某天及以前以后等特定时间发布的文章</a></li>
                </ul>
            </div>
            <div class="ad ad-big"> <a href="https://www.yangqq.com/jstt/web/945.html" target="_blank"><img src="https://www.yangqq.com/d/file/p/2018-12-29/8793672fca8dae2ce093aa46546f8e22.gif"></a> </div>
            <div class="pinglun-box whitebg">
                <div class="news-title">
                    <h2>文章评论</h2>
                </div>
                <div class="pinglun">
                    <div id="plpost">
                        <p class="saying"><span><a href="/">共有5条评论</a></span>来说两句吧...</p>
                        <input name="username" type="text"  class="pl-name" id="username" value="" size="16" placeholder="用户名">
                        <input name="key" type="text"  class="pl-yzm" size="16" placeholder="验证码">
                        <textarea name="saytext" rows="6" id="saytext"></textarea>
                        <input name="imageField" type="submit" value="提交">
                    </div>
                </div>
            </div>
        </div>
        <aside class="side-section right-box">
            <div class="side-tab">
                <ul id="sidetab">
                    <li class="sidetab-current">站长推荐</li>
                    <li>点击排行</li>
                </ul>
                <div id="sidetab-content">
                    <section>
                        <div class="tuijian">
                            <section class="topnews imgscale"><a href="/xd/23.html"><img src="{{$config['img']}}pic03.jpg"><span>作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</span></a></section>
                            <ul>
                                <li><a href="/notice/29.html" title="双十一，阿里云特惠活动，快来领券啦" target="_blank"><i><img src="{{$config['img']}}pic05.jpg"></i>
                                        <p>双十一，阿里云特惠活动，快来领券啦</p>
                                    </a></li>
                                <li><a href="/notice/28.html" title="第二届 优秀个人博客模板比赛参选活动" target="_blank"><i><img src="{{$config['img']}}pic06.jpg"></i>
                                        <p>第二届 优秀个人博客模板比赛参选活动</p>
                                    </a></li>
                                <li><a href="/notice/27.html" title="为什么说10月24日是程序员的节日？" target="_blank"><i><img src="{{$config['img']}}pic07.jpg"></i>
                                        <p>为什么说10月24日是程序员的节日？</p>
                                    </a></li>
                                <li><a href="/web/html/14.html" title="十条设计原则教你学会如何设计网页布局!" target="_blank"><i><img src="{{$config['img']}}pic03.jpg"></i>
                                        <p>十条设计原则教你学会如何设计网页布局!</p>
                                    </a></li>
                                <li><a href="/notice/30.html" title="【个人博客空间申请】金牛云服，免费领空间啦" target="_blank"><i><img src="{{$config['img']}}pic04.jpg"></i>
                                        <p>【个人博客空间申请】金牛云服，免费领空间啦</p>
                                    </a></li>
                            </ul>
                        </div>
                    </section>
                    <section>
                        <div class="paihang">
                            <section class="topnews imgscale"><a href="/xd/23.html"><img src="{{$config['img']}}pic06.jpg"><span>作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</span></a></section>
                            <ul>
                                <li><i></i><a href="https://www.yangqq.com/news/life/2018-04-27/816.html" title="个人博客，属于我的小世界！" target="_blank">个人博客，属于我的小世界！</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/life/2018-06-17/873.html" title="安静地做一个爱设计的女子" target="_blank">安静地做一个爱设计的女子</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/884.html" title="制作个人博客，我是这么收费的？" target="_blank">制作个人博客，我是这么收费的？</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/876.html" title="个人博客，我为什么要用帝国cms？" target="_blank">个人博客，我为什么要用帝国cms？</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/900.html" title="网易博客关闭，何不从此开始潇洒行走江湖！" target="_blank">网易博客关闭，何不从此开始潇洒行走江湖！</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/944.html" title="【告别2018】耕耘才有所得，付出才有收获" target="_blank">【告别2018】耕耘才有所得，付出才有收获</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/2018-05-30/859.html" title="张建华 一个90后年轻站长！我们是对手亦是朋友！" target="_blank">张建华 一个90后年轻站长！我们是对手亦是朋友！</a></li>
                                <li><i></i><a href="https://www.yangqq.com/news/s/899.html" title="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。" target="_blank">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="ad ad-small">小图广告（320*140）</div>
            <div class="whitebg cloud">
                <h2 class="side-title">标签云</h2>
                <ul>
                    <a href="https://www.yangqq.com/e/tags/?tagid=118&amp;tempid=8" target="_blank">打开</a> <a href="https://www.yangqq.com/e/tags/?tagid=137&amp;tempid=8" target="_blank">链接</a> <a href="https://www.yangqq.com/e/tags/?tagid=302&amp;tempid=8" target="_blank">程序安装</a> <a href="https://www.yangqq.com/e/tags/?tagid=160&amp;tempid=8" target="_blank">站内搜索</a> <a href="https://www.yangqq.com/e/tags/?tagid=45&amp;tempid=8" target="_blank">静态模板</a> <a href="https://www.yangqq.com/e/tags/?tagid=108&amp;tempid=8" target="_blank">查询</a> <a href="https://www.yangqq.com/e/tags/?tagid=223&amp;tempid=8" target="_blank">赛跑</a> <a href="https://www.yangqq.com/e/tags/?tagid=158&amp;tempid=8" target="_blank">google</a> <a href="https://www.yangqq.com/e/tags/?tagid=177&amp;tempid=8" target="_blank">css3背景</a> <a href="https://www.yangqq.com/e/tags/?tagid=68&amp;tempid=8" target="_blank">搭配</a> <a href="https://www.yangqq.com/e/tags/?tagid=103&amp;tempid=8" target="_blank">固定</a> <a href="https://www.yangqq.com/e/tags/?tagid=111&amp;tempid=8" target="_blank">asp</a> <a href="https://www.yangqq.com/e/tags/?tagid=188&amp;tempid=8" target="_blank">background-size</a> <a href="https://www.yangqq.com/e/tags/?tagid=49&amp;tempid=8" target="_blank">IP</a> <a href="https://www.yangqq.com/e/tags/?tagid=39&amp;tempid=8" target="_blank">花</a> <a href="https://www.yangqq.com/e/tags/?tagid=277&amp;tempid=8" target="_blank">繁花</a> <a href="https://www.yangqq.com/e/tags/?tagid=219&amp;tempid=8" target="_blank">倒计时</a> <a href="https://www.yangqq.com/e/tags/?tagid=105&amp;tempid=8" target="_blank">配色</a> <a href="https://www.yangqq.com/e/tags/?tagid=288&amp;tempid=8" target="_blank">个人建站空间</a> <a href="https://www.yangqq.com/e/tags/?tagid=228&amp;tempid=8" target="_blank">职业生涯</a>
                </ul>
            </div>
            <div class="clear blank"></div>
            <div class="whitebg suiji">
                <h2 class="side-title">猜你喜欢</h2>
                <ul>
                    <li><a target="_blank" href="https://www.yangqq.com/news/life/2018-06-17/873.html">安静地做一个爱设计的女子</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/900.html">网易博客关闭，何不从此开始潇洒行走江湖！</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/923.html">【排名技术建站】杨青助你快速实现主站为核心的搜索排名霸屏</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/876.html">个人博客，我为什么要用帝国cms？</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/life/2018-04-27/816.html">个人博客，属于我的小世界！</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/qiyewangzhanmuban/963.html">蓝色企业网站模板超实用，完美符合SEO优化，适合企业公司建站的模板</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/884.html">制作个人博客，我是这么收费的？</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/944.html">【告别2018】耕耘才有所得，付出才有收获</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/885.html">帝国cms结合项如何实现多条件查询</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/news/s/894.html">华仔seo 一个专业网站优化的站长展示技能的平台</a></li>
                    <li><a target="_blank" href="https://www.yangqq.com/jstt/web/919.html">帝国CMS灵动标签调用昨天、今天、某天及以前以后等特定时间发布的文章</a></li>
                </ul>
            </div>
        </aside>
    </article>
@endsection