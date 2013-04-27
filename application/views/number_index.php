<?php include('common_header.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('common_sider.php');?>
    <div class="span10">
      <?php include('common_nav.php');?>
      <?php 
        $attr = array(
          'class' => 'form-horizontal',
          'id'    => 'number-status'
        );
        if ($this->uri->segment(4)) {
          echo form_open('number/status', $attr, array('status' => 0));
        } else {
          echo form_open('number/status', $attr, array('status' => 1));
        }
      ?>
      <table class='table table-striped'>
        <tr>
          <th></th>
          <th>号码</th>
          <th>话费</th>
          <th>卡费</th>
          <th>发布时间</th>
          <th>合约限制</th>
          <th>操作</th>
        </tr>
        <?php
            if ($this->uri->segment(4)) {
                $rows = $this->number->index(1);
            } else {
                $rows = $this->number->index();
            }
            if ($rows) {
                foreach ($rows as $value) {
        ?>
        <tr>
          <td>
            <?php
              $data = array(
                'id'        => 'id'.$value['nid'],
                'name'      => 'id['.$value['nid'].']',
                'value'     => $value['nid']
              );
              echo form_checkbox($data);
            ?>
          </td>
          <td><?php echo $value['number'];?></td>
          <td><?php echo $value['huafei'];?></td>
          <td><?php echo $value['kafei'];?></td>
          <td><?php echo date('Y-m-d H:i:s',$value['pubtime']);?></td>
          <td><?php echo $value['offer'] ? '是' : '否';?></td>
          <td><a href="<?php echo site_url("number/add/id/".$value['nid']);?>">修改</a></td>
        </tr>
        <?php
                }
            }
        ?>
      </table>
      <?php
        $data = array(
          'name'    => 'button',
          'id'      => 'button',
          'value'   => 'true',
          'type'    => 'submit',
          'class'   => 'btn btn-primary',
          'content' => '下架'
        );
        if ($this->uri->segment(4)) {
            $data['content'] = '下架';
        } else {
            $data['content'] = '上架';
        }
        echo form_button($data);
        echo form_close();
      ?>
    </div>
  </div>
</div>
<?php include('common_footer.php');?>
  