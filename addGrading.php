<?php 
  include_once 'util.php';
?>

<div class="main" id="quiz_grading">
  <?php addHider('quiz_grading'); ?>
  <div class="sect_head_cont">Grading</div>
  <div class="sect">
    <ul id="grades_container" class="dragging_container">
      <?php 
        $to_add_r = isset($quiz) ? count($quiz->grading->range) : 5;
        for ($i=0; $i < $to_add_r; $i++) {
          include 'addRange.php'; 
        }
      ?>
    </ul>
    <div class="hider_all hide_all" id="hide_all_grades">[Hide All Grades]</div>
    <div class="sub_sect" style="width:275px;">
      <h2 style="cursor:pointer;" id="grading_add">Add another range</h2>
    </div>
  </div>
</div>