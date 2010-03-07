<?php
  include_once 'util.php';
  
  $quest_no = isset($i) ? $i : $_GET['quest_no'];
  $main_id = 'q' . $quest_no;
  $quest_pic_src = '';
  $quest_pic_alt = '';
  $quest_txt = '';
?>

<div class="main question" id="<?php echo $main_id; ?>">
  <?php addHider($main_id, TRUE); ?>
  <div class="sect_head_cont"><div class="sect_head">↕ Question </div><div id="<?php echo $main_id; ?>_hval" class="hval_cont">Data</div></div>
  <div class="sect">
    <div class="group">
      <?php addPic('', 'Question picture', $quest_pic_src, $quest_pic_alt, 'float_right', quest_pic); ?>
      <div class="group_title">Question Text <textarea rows="3" cols="82" class="hval quest_txt"><?php echo $quest_txt; ?></textarea></div>
    </div>
    <div class="group">
      <ul id="<?php echo $main_id; ?>_container" class="dragging_container">
        <?php 
          for ($o=0; $o<3; $o++) {
            include 'addOption.php'; 
          }
        ?>
      </ul>
      <div class="hider_all hide_all" id="hide_all_<?php echo $main_id; ?>_opts">[Hide All Options]</div>
      <div class="sub_sect" style="width:275px;">
        <h2 style="cursor:pointer;" id="<?php echo $main_id; ?>_opt_add">Add another option</h2>
      </div>
      <script type="text/javascript">
        $('#<?php echo $main_id; ?>_opt_add').click(function () {
            addOpt(<?php echo $quest_no; ?>);
        });
        $('#<?php echo $main_id; ?>_container').sortable({ cursor: 'n-resize', handle: '.sect_head_cont'});
        $('#hide_all_<?php echo $main_id; ?>_opts').click(function() { hideAll('#hide_all_<?php echo $main_id; ?>_opts', '#<?php echo $main_id; ?>_container ', ' Options'); });
      </script>
    </div>
  </div>
</div>
