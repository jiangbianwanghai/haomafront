<?php include('common_header.php');?>
<div id="content">
    <div class="layout buy">
        <h2>预约靓号<span>请与10分钟内完成提交，避免被人抢到</span></h2>
        <div class="number-info">
            <h1><?php echo $row['number']?></h1>
            <ul>
                <li>
                    <h3>资费说明：</h3>
                    <p>话费：¥<?php echo $row['huafei']?></p>
                    <p>卡费：¥<?php echo $row['kafei']?></p>
                    <p>合计：¥<?php echo $row['newprice']?></p>
                </li>
                <li>
                    <h3>拥有此号码，你可以获得：</h3>
                    <p>一个号码</p>
                    <p>号码说明啊使地方</p>
                </li>
            </ul>
        </div>
        <div class="book-form">
            <h3>提供您的联系方式了，以供我们及时与您取得联系。</h3>
                <?php 
                  $attr = array('id' => 'offer-add');
                  echo form_open('shouye/offer', $attr, array('nid' => $row['nid']));
                ?>
                <div class="row">
                    <div class="label">姓名</div>
                    <?php
                      $data = array('id' => 'username', 'name' => 'username', 'class' => 'input');
                      echo form_input($data);
                      echo form_error('username', '<span class="error">', '</span>');
                    ?>
                </div>
                <div class="row">
                    <div class="label">称呼</div>
                    <select name="sex">
                        <option value="1">先生</option>
                        <option value="-1">女士</option>
                    </select>
                </div>
                <div class="row">
                    <div class="label">联系电话</div>
                    <?php
                      $data = array('id' => 'mobile', 'name'  => 'mobile', 'class' => 'input');
                      echo form_input($data);
                      echo form_error('mobile', '<span class="error">', '</span>');
                    ?>
                </div>
                <div class="row">
                    <div class="label">QQ号码</div>
                    <?php
                      $data = array('id' => 'qq', 'name' => 'qq', 'class' => 'input');
                      echo form_input($data);
                      echo form_error('qq', '<span class="error">', '</span>');
                    ?>
                </div>
                <div class="row">
                    <div class="label">预约备注</div>
                    <?php
                      $data = array('id' => 'note', 'name'  => 'note', 'class' => 'input');
                      echo form_input($data);
                      echo form_error('note', '<span class="error">', '</span>');
                    ?>
                </div>
                <div class="row">
                    <div class="label">验证字符</div>
                    <img src="<?php echo site_url("shouye/captcha");?>" /><br />
                    <?php
                      $data = array('id' => 'captcha', 'name'  => 'captcha', 'class' => 'input');
                      echo form_input($data);
                      echo form_error('note', '<span class="error">', '</span>');
                    ?>
                </div>
                <div class="submit">
                    <input type="submit" value="提交预约" name="button" class="submit-button" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('common_footer.php');?>