<?php
  include_once 'util.php';
  
  $quest_no = isset($i) ? $i : $_GET['quest_no'];
  $opt_no = isset($o) ? $o : $_GET['opt_no'];
  $opt_txt = '';
  $opt_pic_src = '';
  $opt_pic_alt = '';
  $exp_txt = '';
  $exp_pic_src = '';
  $exp_pic_alt = '';
  
  $main_opt_id = 'q' . $quest_no . '_o' . $opt_no;
?>
  <li class="sub_sect quest_opt" id="<?php echo $main_opt_id; ?>">
    <?php addHider($main_opt_id, TRUE); ?>
    <div class="sect_head_cont"><div class="sect_head">↕ Option </div><div id="<?php echo $main_opt_id; ?>_hval" class="hval_cont">Data</div></div>
    <div class="sect">
      <div class="group">
        <?php addPic('', 'Option picture', $opt_pic_src, $opt_pic_alt, 'float_right', 'opt_pic'); ?>
        <div class="group_title">Option Text<input type="text" class="hval opt_txt" value="<?php echo $opt_txt; ?>"></div>
      </div>
      <div class="group">
        <?php addPic('', 'Explanation picture', $exp_pic_src, $exp_pic_alt, 'float_right', 'opt_exp_pic'); ?>
        <div class="group_title">Explanation Text <textarea rows="3" cols="81" class="opt_exp"><?php echo $exp_txt; ?></textarea></div>
      </div>
    </div>
  </li>
