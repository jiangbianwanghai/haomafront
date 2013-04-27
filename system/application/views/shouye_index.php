<?php include('common_header.php');?>
	<div id="content">
		<div class="main">
			<div class="slider">
				<ul>
					<li><a href="#"><img src="http://img1.gtimg.com/tech/pics/hv1/149/91/1291/83970629.jpg" /></a></li>
				</ul>
			</div>
			<div class="section">
				<h3><span>顶级靓号</span><a href="#">更多</a></h3>
				<ul class="entry">
                    <?php
                        $rows = $this->number->index(1);
                        if ($rows) {
                            foreach ($rows as $value) {
                    ?>
					<li>
						<div class="number"><a href="#"><?php echo $value['number']?></a></div>
						<div class="ctrl">
							<a href="#" class="collect">加入备选单</a>
							<a href="#" class="book">立刻预约</a>
						</div>
						<div class="detail">
							<span class="fare"><b>价格：</b>¥200</span>
							<span class="price">¥100</span>
						</div>
					</li>
                    <?php
                        }
                    }
                    ?>
				</ul>
			</div>
			<div class="section">
				<h3><span>最新推荐</span><a href="#">更多</a></h3>
				<ul class="entry">
                    <?php
                        $rows = $this->number->index(1);
                        if ($rows) {
                            foreach ($rows as $value) {
                    ?>
					<li>
						<div class="number"><a href="#"><?php echo $value['number']?></a></div>
						<div class="ctrl">
							<a href="#" class="collect">加入备选单</a>
							<a href="#" class="book">立刻预约</a>
						</div>
						<div class="detail">
							<span class="fare"><b>话费：</b>¥200</span>
							<span class="price">¥100</span>
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
				<h3><span>常见问题</span></h3>
				<ul class="faq">
					<li><a href="#">美图秀秀将推自拍手机 营销模式类似小米 第二代或在研发中</a></li>
					<li><a href="#">QQ号码被盗了如何申诉？</a></li>
					<li><a href="#">如何点亮“靓”字图标？</a></li>
					<li><a href="#">罗永浩锤子手机ROM今晚正式发布：大戏还是闹剧？</a></li>
					<li><a href="#">中国电信秘密研发翼信 运营商谋局自有通讯应用</a></li>
				</ul>
			</div>
			<div class="shell">
				<h3><span>已售靓号</span></h3>
				<ul class="history">
                    <?php
                        $rows = $this->number->index(1);
                        if ($rows) {
                            foreach ($rows as $value) {
                    ?>
					<li><span><?php echo $value['number']?></span><span class="price">¥100</span></li>
                    <?php
                        }
                    }
                    ?>
				</ul>
			</div>
		</div>
	</div>
<?php include('common_footer.php');?>