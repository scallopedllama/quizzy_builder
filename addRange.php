<?php
	/*
	 * DESCRIPTION: 
	 * 	 used to add a graderange to quizzyBuilder
	 * 
	 * PARAMETERS passed in GET:
	 */
  
  include_once 'util.php';
  
  //this is kind of an ugly hack, but it works.
  $range_no = isset($i) ? $i : $_GET['range_no'];
  $grade_pic_src = '';
  $grade_pic_alt = '';
  $range_start = '';
  $range_end = '';
  $rank_name = '';
  $rank_letter = '';
  $main_id = 'grade_range' . $range_no;
?>
  <li class="grade_range sub_sect" id="<?php echo $main_id; ?>">
    <?php addHider($main_id, TRUE); ?>
    <div class="sect_head_cont"><div class="sect_head">↕ Grade Range </div><div id="<?php echo $main_id; ?>_hval" class="hval_cont">Data</div></div>
    <div class="sect">
      <div class="group">
        <?php addPic('', 'Rank picture', $grade_pic_src, $grade_pic_alt, 'float_right'); ?>
        <div>If user's final grade is between <input type="text" class="short_input grade_start" value="<?php echo $range_start; ?>">% and <input type="text" class="short_input grade_end" value="<?php echo $range_end; ?>">%,</div>
        <div>give letter grade <input type="text" class="short_input grade_letter" value="<?php echo $rank_letter; ?>"> and assign the following rank:</div>
        <div><input type="text" class="hval grade_rank" value="<?php echo $rank_name; ?>"></div>
      </div>
    </div>
  </li>
