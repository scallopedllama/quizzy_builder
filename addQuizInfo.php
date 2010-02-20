<?php include 'util.php'; ?>

<div class="main" id="quiz_data">
  <?php addHider('quiz_data'); ?>
  <div class="sect_head">Quiz <span id="quiz_data_hval">Data</span></div>
  <div class="sect">
    <div class="sub_section">
      <?php addPic('quiz', 'Quiz picture', 'float_right'); ?>
      <div class="group_title">Title<input type="text" name="data_txt"  id="data_txt" class="hval"></div>
    </div>
    <div class="sub_section">
      <?php addPic('quiz_desc', 'Description picture', 'float_right'); ?>
      <p class="group_title">Description</p><textarea rows="3" cols="82" name="data_desc" id="data_desc"></textarea>
    </div>
  </div>
</div>
