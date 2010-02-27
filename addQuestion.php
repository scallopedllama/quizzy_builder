<?php
  include_once 'util.php';
  
  $quest_no = $_GET['quest_no'];
  $mainId = 'q' . $quest_no;
  $quest_pic_src = '';
  $quest_pic_alt = '';
  $quest_txt = '';
?>

<div class="main" id="<?php echo $mainId; ?>">
  <?php addHider($mainId); ?>
  <div class="sect_head_cont"><div class="sect_head">↕ Question </div><div id="<?php echo $mainId; ?>_hval" class="hval_cont">Data</div></div>
  <div class="sect">
    <div class="group">
      <?php addPic('quest', 'Question picture', $quest_pic_src, $quest_pic_alt, 'float_right'); ?>
      <div class="group_title">Question Text <textarea rows="3" cols="82" class="hval"><?php echo $quest_txt; ?></textarea></div>
    </div>
    <div class="group">
      <ul id="<?php echo $mainId; ?>_container" class="dragging_container">
      </ul>
      <div class="sub_sect" style="width:275px;">
        <h2 style="cursor:pointer;" id="<?php echo $mainId; ?>_opt_add">Add another option</h2>
      </div>
      <script type="text/javascript">
        $('#<?php echo $mainId; ?>_container').sortable({ cursor: 'n-resize'});
        $('#<?php echo $mainId; ?>_opt_add').click(function () {
            addOpt(<?php echo $quest_no; ?>);
        });
      </script>
    </div>
  </div>
</div>
