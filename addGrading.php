<?php 
  include_once 'util.php';
?>

<div class="main" id="quiz_grading">
  <?php addHider('quiz_grading'); ?>
  <div class="sect_head">Grading</div>
  <div class="sect">
    <ul id="grades_container" class="dragging_container">
      <?php 
        for ($i=0; $i<5; $i++) {
          include 'addRange.php'; 
        }
      ?>
    </ul>
  </div>
</div>