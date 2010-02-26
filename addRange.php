<?php
	/*
	 * DESCRIPTION: 
	 * 	 used to add a graderange to quizzyBuilder
	 * 
	 * PARAMETERS passed in GET:
	 */
  
  $range_no = isset($i) ? $i : $_GET['range_no'];
  $grade_pic_src = '';
  $grade_pic_alt = '';
  $range_start = '';
  $range_end = '';
  $rank_name = '';
  $rank_letter = '';
?>
  <li class="grade_range sub_sect" id="grade_range<?php echo $range_no; ?>">
    <?php addHider('grade_range' . $range_no); ?>
    <div class="sect_head">↕ Grade Range <span id="grade_range<?php echo $range_no; ?>_hval">Data</span></div>
    <div class="sect">
      <div class="group">
      <?php addPic('grade', 'Rank picture', $grade_pic_src, $grade_pic_alt, 'float_right'); ?>
      <div>If grade is between <input type="text" name="rank_start" class="short_input" value="<?php echo $range_start; ?>">% and <input type="text" name="rank_end" class="short_input" value="<?php echo $range_end; ?>">%,</div>
      <div>give letter grade <input type="text" name="rank_letter" class="short_input" value="<?php echo $rank_letter; ?>"> and assign the following rank:</div>
      <div><input type="text" name="rank_txt" class="hval" value="<?php echo $rank_name; ?>"></div>
    </div>
    </div>
  </li>