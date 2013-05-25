<?php include('common_header.php');?>
<div id="content">
    <div class="main">
        <div class="slider">
            <ul>
                <li><a href="#"><img src="http://img1.gtimg.com/tech/pics/hv1/149/91/1291/83970629.jpg" /></a></li>
            </ul>
        </div>
        <div class="section">
            <h3><span>顶级靓号</span><a href="<?php echo site_url("so?param=73");?>">更多</a></h3>
            <ul class="entry">
                <?php
                    if ($tops) {
                        foreach ($tops as $value) {
                ?>
                <li>
                    <div class="number"><a href="#"><?php echo $value['number']?></a></div>
                    <div class="ctrl">
                        <a href="#" class="collect">加入备选单</a>
                        <a href="<?php echo site_url("shouye/offer/".$value['nid']);?>" class="book">立刻预约</a>
                    </div>
                    <div class="detail">
                        <span class="fare"><b>价格：</b>¥<?php echo $value['kafei']?></span>
                        <?php if ($value['newprice']) {?><span class="price">¥<?php echo $value['newprice']?></span><?php }?>
                    </div>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="section">
            <h3><span>最新推荐</span><a href="<?php echo site_url("so?param=74");?>">更多</a></h3>
            <ul class="entry">
                <?php
                    if ($recom) {
                        foreach ($recom as $value) {
                ?>
                <li>
                    <div class="number"><a href="#"><?php echo $value['number']?></a></div>
                    <div class="ctrl">
                        <a href="#" class="collect">加入备选单</a>
                        <a href="<?php echo site_url("shouye/offer/".$value['nid']);?>" class="book">立刻预约</a>
                    </div>
                    <div class="detail">
                        <span class="fare"><b>话费：</b>¥<?php echo $value['kafei']?></span>
                        <?php if ($value['newprice']) {?><span class="price">¥<?php echo $value['newprice']?></span><?php }?>
                    </div>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="aside">
        <div class="shell">
            <h3>三步快速拥有靓号</h3>
            <div class="go">挑选靓号<span>></span>在线预约<span>></span>送货上门</div>
        </div>
        <div class="shell">
            <h3><span>已售靓号</span></h3>
            <ul class="history">
                <?php
                    if ($trade['data']) {
                        foreach ($trade['data'] as $value) {
                ?>
                <li><span><?php echo preg_replace("/(1\d{1,3})\d\d(\d{0,2})/", "\$1****\$3", $value['number']);?></span><?php if ($value['newprice']) {?><span class="price">¥<?php echo $value['newprice']?></span><?php }?></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php include('common_footer.php');?>