<?php include('common_header.php');?>
<div id="content">
    <div class="main">
        <div class="filter">
            <ul>
            <?php
                if (isset($category) && $category) {
                    foreach ($category as $value) {
            ?>
                <li>
                    <div class="label"><?php echo $value['catename']?>：</div>
                    <?php
                        if ($value['option']) {
                            $option = unserialize($value['option']);
                    ?>
                    <div class="params">
                        <a href="/so" <?php if(isset($cate_prefix) && !in_array($value['cateid'], $cate_prefix) || !isset($cate_prefix)) { echo "class=\"active\"";}?>>全部</a>
                        <?php foreach ($option as $k => $v) {?>
                        <a href="<?php echo '?param='.$value['cateid'].$k;?>" <?php if(isset($param) && in_array($value['cateid'].$k, $param)) { echo "class=\"active\"";}?>><?php echo $v;?></a>
                        <?php }?>
                    </div>
                    <?php
                        }
                    ?>
                </li>
            <?php
                    }
                }
            ?>
            </ul>
            <p class="total">共有<em><?php echo $rows['num']?></em>个号码等您挑选。</p>
        </div>
        <div class="section">
            <?php if ($rows['data']) {?>
            <ul class="entry">
                <?php foreach ($rows['data'] as $value) {?>
                <li>
                    <div class="number"><a href="#"><?php echo $value['number']?></a></div>
                    <div class="ctrl">
                        <a href="#" class="collect">加入备选单</a>
                        <a href="<?php echo site_url("shouye/offer/".$value['nid']);?>" class="book">立刻预约</a>
                    </div>
                    <div class="detail">
                        <span class="fare"><b>价格：</b>¥<?php echo $value['kafei'];?></span>
                        <span class="price">¥<?php echo $value['newprice'];?></span>
                    </div>
                </li>
                <?php }?>
            </ul>
            <?php }?>
        </div>
        <?php echo $pages;?>
    </div>
    <div class="aside">
        <div class="shell">
            <h3><span>资费说明</span></h3>
            <ul class="faq">
                <li><a href="#">美图秀秀将推自拍手机 营销模式类似小米 第二代或在研发中</a></li>
                <li><a href="#">QQ号码被盗了如何申诉？</a></li>
                <li><a href="#">如何点亮“靓”字图标？</a></li>
                <li><a href="#">罗永浩锤子手机ROM今晚正式发布：大戏还是闹剧？</a></li>
                <li><a href="#">中国电信秘密研发翼信 运营商谋局自有通讯应用</a></li>
            </ul>
        </div>
        <div class="shell">
            <h3><span>热门搜索</span></h3>
            <ul class="hots">
                <li><i>1</i><a href="#">888</a></li>
                <li><i>2</i><a href="#">666</a></li>
                <li><i>3</i><a href="#">520</a></li>
                <li><i>4</i><a href="#">1314</a></li>
                <li><i>5</i><a href="#">2012</a></li>
                <li><i>6</i><a href="#">400</a></li>
            </ul>
        </div>
    </div>
</div>
<?php include('common_footer.php');?>