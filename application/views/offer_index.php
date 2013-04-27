<?php 
$status = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
include('common_header.php');
?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('common_sider.php');?>
    <div class="span10">
      <?php include('common_nav.php');?>
      <ul class="nav nav-tabs">
        <li <?php if (!$status) {echo 'class="active"';}?>>
        <a href="<?php echo !$status ? '#' : site_url("offer");?>">首页</a>
        </li>
        <li <?php if ($status == 2 && $status) {echo 'class="active"';}?>><a href="<?php echo $status == 2 && $status ? '#' : site_url("offer/index/status/2");?>">已挂起</a></li>
        <li <?php if ($status == 1 && $status) {echo 'class="active"';}?>><a href="<?php echo $status == 1 && $status ? '#' : site_url("offer/index/status/1");?>">已回访</a></li>
      </ul>
      <table class='table table-striped'>
        <tr>
          <th>预约号码</th>
          <th>话费</th>
          <th>卡费</th>
          <th>预约时间</th>
          <th>操作</th>
        </tr>
        <?php
            $rows = $this->offer->fetch_all_by_status($status, array('oid', 'nid', 'addtime'));
            if ($rows) {
                foreach ($rows as $value) {
                    $nids[] = $value['nid'];
                }
                $number_rows = $this->number->fetch_all_by_nids($nids, array('nid', 'number', 'huafei', 'kafei'));
                foreach ($rows as $key => $value) {
                    $rows[$key] = array_merge($value, array('number' => $number_rows[$value['nid']]['number'], 'huafei' => $number_rows[$value['nid']]['huafei'], 'kafei' => $number_rows[$value['nid']]['kafei']));
                }
            }
            if ($rows) {
                foreach ($rows as $value) {
        ?>
        <tr>
          <td><?php echo $value['number'];?></td>
          <td><?php echo $value['huafei'];?></td>
          <td><?php echo $value['kafei'];?></td>
          <td><?php echo date('Y-m-d H:i:s',$value['addtime']);?></td>
          <td><a href="<?php echo site_url("offer/checked/id/".$value['oid']);?>">回访</a> <a href="<?php echo site_url("offer/del/id/".$value['oid']);?>">删除</a></td>
        </tr>
        <?php
                }
            }
        ?>
      </table>
    </div>
  </div>
</div>
<?php include('common_footer.php');?>
  