<?php include('common_header.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('common_sider.php');?>
    <div class="span10">
      <?php include('common_nav.php');?>
      <?php 
        $attr = array(
          'class' => 'form-horizontal',
          'id'    => 'category-rank'
        );
        echo form_open('category/rank', $attr);
      ?>
      <table class='table table-striped'>
        <tr>
          <th>分类</th>
          <th>排序</th>
          <th>操作</th>
        </tr>
        <?php
            $rows = $this->category->index();
            if ($rows) {
                foreach ($rows as $value) {
        ?>
        <tr>
          <td><?php echo $value['catename'];?></td>
          <td>
            <?php
              $data = array(
                'id'        => 'rank'.$value['cateid'],
                'name'      => 'rank['.$value['cateid'].']',
                'maxlength' => '4',
                'value'     => $value['rank'],
                'class'        => 'input-mini'
              );
              echo form_input($data);
            ?></td>
          <td><a href="<?php echo site_url("category/add/id/".$value['cateid']);?>">修改</a> <a href="<?php echo site_url("category/del/id/".$value['cateid']);?>">删除</a></td>
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
          'content' => '确认排序'
        );
        echo form_button($data);
        echo form_close();
      ?>
    </div>
  </div>
</div>
<?php include('common_footer.php');?>
  