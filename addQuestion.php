<?php
	/*
	 * DESCRIPTION: 
	 * 	 used to add a question to the quizzyBuilder
	 * 
	 * PARAMETERS passed in GET:
	 *  _GET['questNo']        current question being worked on
	 *   
	 */
  $questNo = $_GET['questNo'];

  function addInput($questNo, $type, $field, $class = ''){
    echo '<input type="'.$type.'"';
    echo ' id="q'.$questNo.'_'.$field.'"';
    echo ' name="q'.$questNo.'_'.$field.'"';
    echo ' class="'.$class.'"';
    echo '>';
  }
?>
    
<div class="quest hidden" id="<?php echo 'q'.$questNo.'_hidden'; ?>">
  <div><?php echo 'Question '.($questNo + 1); ?>:&nbsp;</div>
  <div class="value"></div>
  <span class="show">[Show Details]</span>
</div>
<table cellspacing="5px" class="quest" id="<?php echo 'q'.$questNo; ?>" >
  <tr>
    <td width="60%">
      <span class="hide">[Hide Details]</span>
      <p>Question <?php echo ($questNo + 1);?> </p>
      <?php echo '<textarea rows="6" cols="57" name="q'.$questNo.'_txt" id="q'.$questNo.'_txt"></textarea>'; ?> 
    </td>
    <td class="pic_opts" width="40%">
      <p class="title">Question Text's Picture:</p>
      <p>Src: <?php addInput($questNo, 'text', 'pic_src', 'pic_src'); ?></p>
      <p>Alt: <?php addInput($questNo, 'text', 'pic_alt', 'pic_src'); ?></p>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <table id="q<?php echo $questNo;?>_opts" class="clear"></table>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" id="q<?php echo $questNo;?>_add_opt" value="Add Another Option">
    </td>
  </tr>
</table>