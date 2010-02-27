<?php
  include_once 'util.php';
  
  $quest_no = $_GET['quest_no'];
  $opt_no = $_GET['opt_no'];
  $opt_txt = '';
  $opt_pic_src = '';
  $opt_pic_alt = '';
  $exp_txt = '';
  $exp_pic_src = '';
  $exp_pic_alt = '';
  
  $main_id = 'q' . $quest_no . '_o' . $opt_no;
?>
  <li class="sub_sect" id="<?php echo $main_id; ?>">
    <?php addHider($main_id); ?>
    <div class="sect_head_cont"><div class="sect_head">↕ Option </div><div id="<?php echo $main_id; ?>_hval" class="hval_cont">Data</div></div>
    <div class="sect">
      <div class="group">
        <?php addPic('opt', 'Option picture', $opt_pic_src, $opt_pic_alt, 'float_right'); ?>
        <div class="group_title">Option Text<input type="text" class="hval" value="<?php echo $opt_txt; ?>"></div>
      </div>
      <div class="group">
        <?php addPic('opt_exp', 'Explanation picture', $exp_pic_src, $exp_pic_alt, 'float_right'); ?>
        <div class="group_title">Explanation Text <textarea rows="3" cols="81"><?php echo $exp_txt; ?></textarea></div>
      </div>
    </div>
  </li>