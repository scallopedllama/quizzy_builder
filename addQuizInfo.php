<?php 
  include_once 'util.php';
  //get stuff passed in get or use default empties
  $title_txt = isset($quiz) ? addElem($quiz->title) : '';
  $title_pic_src = isset($quiz) ? addElem($quiz->img['src']) : '';
  $title_pic_alt = isset($quiz) ? addElem($quiz->img['alt']) : '';
  $desc_txt = isset($quiz) ? addElem($quiz->description->text) : '';
  $desc_pic_src = isset($quiz) ? addElem($quiz->description->img['src']) : '';
  $desc_pic_alt = isset($quiz) ? addElem($quiz->description->img['alt']) : '';
   
?>

<div class="main" id="quiz_data">
  <?php addHider('quiz_data'); ?>
  <div class="sect_head_cont"><div class="sect_head">Quiz </div><div id="quiz_data_hval" class="hval_cont">Data</div></div>
  <div class="sect">
    <div class="group">
      <?php addPic('quiz', 'Quiz picture', $title_pic_src, $title_pic_alt, 'float_right'); ?>
      <div class="group_title">Title<input type="text" name="data_txt"  id="data_txt" class="hval" value="<?php echo $title_txt; ?>"></div>
    </div>
    <div class="group">
      <?php addPic('quiz_desc', 'Description picture', $desc_pic_src, $desc_pic_alt, 'float_right'); ?>
      <p class="group_title">Description</p><textarea rows="3" cols="82" name="data_desc" id="data_desc"><?php echo $desc_txt; ?></textarea>
    </div>
  </div>
</div>
