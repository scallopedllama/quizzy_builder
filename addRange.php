<?php
	/*
	 * DESCRIPTION: 
	 * 	 used to add a graderange to quizzyBuilder
	 * 
	 * PARAMETERS passed in GET:
	 *  _GET['startIndex']     the index to start at
	 *  _GET['numAdd']         number of ranges to return to return
	 */
  
  if(isset($_GET['startIndex']))
    $startIndex =  intval($_GET['startIndex']);
  if(isset($_GET['numAdd']))
    $numAdd = intval($_GET['numAdd']);
  
  
  function addInput($index, $field, $class=''){
    echo '<input type="text"';
    echo ' id="gr'.$index.'_'.$field.'"';
    echo ' name="gr'.$index.'_'.$field.'"';
    echo ' class="'.$field.' '.$class.'"';
    echo ' width="100%"';
    echo '>';
  }
  
  for($i = $startIndex; $i < $numAdd + $startIndex; $i++)
  {
?>

<div class="grading hidden" id="gr<?php echo $i; ?>_hidden">
  <div><?php echo 'Grade '.($i + 1); ?>:&nbsp;</div>
  <div class="value"></div>
  <span class="show">[Show Details]</span>
</div>
<table cellspacing="5px" class="graderange" id="gr<?php echo $i; ?>">
  <tr>
    <td width="60%">
      <span class="hide">[Hide Details]</span>
      <p>&nbsp;</p>
      <p>If grade is between <?php addInput($i, 'start'); ?>% and <?php addInput($i, 'end'); ?>%,</p>
      <p>assign letter grade <?php addInput($i, 'grade'); ?></p>
      <p>and rank <?php addInput($i, 'txt'); ?>.</p>
    </td>
    <td width="40%" class="pic_opts">
      <p class="title">This Grade's Picture</p>
      <p>Src: <?php addInput($i, 'pic_src'); ?></p> 
      <p>Alt: <?php addInput($i, 'pic_alt'); ?> </p>
    </td>
  </tr>
</table>

<?php } ?>