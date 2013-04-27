<div class="span2">
  <div class="sidebar-menu">
    <a href="#userMeun" class="nav-header menu-first collapsed" data-toggle="collapse"><i class="icon-large"></i>手机号管理</a>
    <ul id="userMeun" class="nav nav-list collapse menu-second">
      <li><a href="<?php echo site_url("number/add");?>">发布手机号</a></li>
      <li><a href="<?php echo site_url("number/index/status/1");?>">销售中的手机号</a></li>
      <li><a href="<?php echo site_url("number/index");?>">未上架的手机号</a></li>
      <li><a href="<?php echo site_url("category");?>">号码自定义分类</a></li>
      <li><a href="<?php echo site_url("category/add");?>">添加分类</a></li>
    </ul>
    <a href="#articleMenu" class="nav-header menu-first collapsed" data-toggle="collapse">业务管理</a>
    <ul id="articleMenu" class="nav nav-list collapse menu-second">
      <li><a href="<?php echo site_url("offer");?>">预约管理</a></li>
      <li><a href="<?php echo site_url("trade");?>">过户管理</a></li>
      <li><a href="<?php echo site_url("admin/logout");?>">退出</a></li>
    </ul>
  </div>
</div>