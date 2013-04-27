<?php include('common_header.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('common_sider.php');?>
    <div class="span10">
      <?php include('common_nav.php');?>
      <div class="span6">
        <?php 
          $attr = array(
            'class' => 'form-horizontal',
            'id'    => 'category-add'
          );
          if ($this->uri->segment(4)) {
            echo form_open('category/add', $attr, array('id' => $this->uri->segment(4)));
          } else {
            echo form_open('category/add', $attr);
          }
        ?>
        <div class="control-group">
          <?php echo form_label('分类名称', 'catename', array('class' => 'control-label'));?>
          <div class="controls">
            <?php
              $row = array();
              if ($this->uri->segment(4)) {
                $row = $this->category->fetch_one($this->uri->segment(4));
              }
              $data = array(
                'id'          => 'catename',
                'name'        => 'catename',
                'maxlength'   => '12',
                'placeholder' => '最大长度12位'
              );
              $row && $data['value'] = $row['catename'];
              echo form_input($data);
              echo form_error('catename', '<span class="error">', '</span>');
            ?>
          </div>
        </div>
        <?php if ($this->uri->segment(4)) {?>
          <div class="control-group">
            <?php echo form_label('排序', 'rank', array('class' => 'control-label'));?>
            <div class="controls">
              <?php
                $data = array(
                  'id'        => 'rank',
                  'name'      => 'rank',
                  'maxlength' => '4',
                  'value'     => $row['rank'],
                  'class'     => 'input-mini'
                );
                echo form_input($data);
                echo form_error('catename', '<span class="error">', '</span>');
              ?>
            </div>
          </div>
        <?php }?>
        <div class="control-group">
          <div class="controls">
            <?php
              $data = array(
                'name'    => 'button',
                'id'      => 'button',
                'value'   => 'true',
                'type'    => 'submit',
                'class'   => 'btn btn-primary',
                'content' => '确认发布'
              );
              echo form_button($data);
            ?>
          </div>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<?php include('common_footer.php');?>