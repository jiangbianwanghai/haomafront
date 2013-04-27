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
            'id'    => 'number-add'
          );
          if ($this->uri->segment(4)) {
            echo form_open('number/add', $attr, array('id' => $this->uri->segment(4)));
          } else {
            echo form_open('number/add', $attr);
          }
        ?>
        <div class="control-group">
          <?php echo form_label('手机号', 'number', array('class' => 'control-label'));?>
          <div class="controls">
            <?php
              $row = array();
              if ($this->uri->segment(4)) {
                $row = $this->number->fetch_one($this->uri->segment(4));
              }
              $data = array(
                'id'          => 'number',
                'name'        => 'number',
                'maxlength'   => '11',
                'placeholder' => '最大长度11位',
              );
              $row && $data['value'] = $row['number'];
              echo form_input($data);
              echo form_error('number', '<span class="error">', '</span>');
            ?>
          </div>
        </div>
        <div class="control-group">
          <?php echo form_label('话费', 'huafei', array('class' => 'control-label'));?>
          <div class="controls">
            <?php
              $data = array(
                'id'        => 'huafei',
                'name'      => 'huafei',
                'maxlength' => '6',
                'class'     => 'input-mini'
              );
              $row && $data['value'] = $row['huafei'];
              echo form_input($data).' 元';
            ?>
          </div>
        </div>
        <div class="control-group">
          <?php echo form_label('卡费', 'kafei', array('class' => 'control-label'));?>
          <div class="controls">
            <?php
              $data = array(
                'id'        => 'kafei',
                'name'        => 'kafei',
                'maxlength'   => '6',
                'class'        => 'input-mini'
              );
              $row && $data['value'] = $row['kafei'];
              echo form_input($data).' 元';
            ?>
          </div>
        </div>
        <div class="control-group">
          <?php echo form_label('运营商', 'operator', array('class' => 'control-label'));?>
          <div class="controls">
            <select id="operator" name="operator" class="span5">
              <option value="1" <?php if (isset($row['operator']) && $row['operator'] == 1) {?>selected="selected"<?php }?>>中国移动</option>
              <option value="2" <?php if (isset($row['operator']) && $row['operator'] == 2) {?>selected="selected"<?php }?>>中国联通</option>
              <option value="3" <?php if (isset($row['operator']) && $row['operator'] == 3) {?>selected="selected"<?php }?>>中国电信</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <?php echo form_label('初始套餐', 'taocan', array('class' => 'control-label'));?>
          <div class="controls">
            <select name="taocan" class="span7">
              <option value="1" <?php if (isset($row['taocan']) && $row['taocan'] == 1) {?>selected="selected"<?php }?>>5元省内手机上网套餐</option>
              <option value="2" <?php if (isset($row['taocan']) && $row['taocan'] == 2) {?>selected="selected"<?php }?>>10元省内手机上网套餐</option>
              <option value="3" <?php if (isset($row['taocan']) && $row['taocan'] == 3) {?>selected="selected"<?php }?>>20元省内手机上网套餐</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <?php echo form_label('合约限制', 'offer', array('class' => 'control-label'));?>
          <div class="controls">
            <label class="radio inline">
              <input type="radio" name="offer" id="offer1" value="1" <?php if (isset($row['offer']) && $row['offer'] == 1) {?>checked<?php }?>> 是
            </label>
            <label class="radio inline">
              <input type="radio" name="offer" id="offer2" value="0" <?php if (isset($row['offer']) && $row['offer'] == 0) {?>checked<?php }?>> 否
            </label>
          </div>
        </div>
        <?php 
          if (file_exists('./cache/'.$this->input->cookie('uid').'/category.php')) {
            require './cache/'.$this->input->cookie('uid').'/category.php';
            $row && $catemap_row = $this->catemap->fetch_all_by_nid($row['nid']);
        ?>
        <div class="control-group">
          <?php echo form_label('选择分类', 'category', array('class' => 'control-label'));?>
          <div class="controls">
            <?php foreach($category as $value) {?>
            <label class="radio inline">
              <?php
                $checked = isset($catemap_row[$value['cateid']]) ? TRUE : FALSE;
                echo form_checkbox('category[]', $value['cateid'], $checked);?> <?php echo $value['catename']?>
            </label>
            <?php }?>
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
              echo form_close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('common_footer.php');?>