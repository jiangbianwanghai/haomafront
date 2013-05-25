<?php include('common_header.php');?>
<div id="content">
    <div class="main">
        <div class="filter">
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
    <?php if (isset($searchlog)) {?>
    <div class="aside">
        <div class="shell">
            <h3><span>热门搜索</span></h3>
            <ul class="hots">
                <?php foreach ($searchlog as $key => $value) {?>
                <li><i><?php echo $key+1;?></i><a href="<?php echo site_url("s/so?wd=".$value);?>"><?php echo $value;?></a></li>
                <?php }?>
            </ul>
        </div>
    </div>
    <?php }?>
</div>
<?php include('common_footer.php');?>