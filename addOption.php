<?php
	/*
	 * DESCRIPTION: 
	 * 	 used to add an option to the quizzyBuilder
	 * 
	 * PARAMETERS passed in GET:
	 *  _GET['questNo']        current question being worked on
	 *  _GET['optNo']          the index of the option TO RETURN
	 *  _GET['numAdd']         number of options to return
	 */
  
  $questNo = intval($_GET['questNo']);
  $optNo = intval($_GET['optNo']);
  $numAdd = intval($_GET['numAdd']);
  
  
  function addOptInput($questNo, $optNo, $type, $field, $class = ''){
    echo '<input type="'.$type.'"';
    echo ' id="q'.$questNo.'_o'.$optNo.'_'.$field.'"';
    echo ' name="q'.$questNo.'_o'.$optNo.'_'.$field.'"';
    echo ' class="'.$class.'"';
    echo ' width="100%"';
    echo '>';
  }
  
  $goal = $optNo + $numAdd;
  for(; $optNo < $goal; $optNo++)
  {
?>
<tr>
  <td>
    <div class="opt hidden" id="<?php echo 'q'.$questNo.'_o'.$optNo.'_hidden'; ?>">
      <div><?php echo 'Option '.($optNo + 1); ?>:&nbsp;</div>
      <div class="value"></div>
      <span class="show">[Show Details]</span>
    </div>
    <table class="opt" id="<?php echo 'q'.$questNo.'_o'.$optNo; ?>" cellspacing="5px">
      <tr>
        <td width="60%">
          <span class="hide">[Hide Details]</span>
          <p class="title opt_title">Option Text:</p>
          <ul><li>
            <?php addOptInput($questNo, $optNo, 'text', 'txt', 'opt_txt'); ?><br>
            <u>Score assigned if user picks this option:</u><br>
            <?php addOptInput($questNo, $optNo, 'text', 'score', 'opt_score number'); ?>
          </li></ul>
        </td>
        <td width="40%" class="pic_opts">
          <p class="title">This Option's Picture</p>
          <p>Src: <?php addOptInput($questNo, $optNo, 'text', 'pic_src', 'pic_src'); ?></p> 
          <p>Alt: <?php addOptInput($questNo, $optNo, 'text', 'pic_alt', 'pic_alt'); ?> </p>
        </td>
      </tr>
      <tr>
        <td class="exp">
          <p><u>Explanation of the scoring for this Option:</u></p>
          <?php echo '<textarea rows="6" cols="50" id="q'.$questNo.'_o'.$optNo.'_exp_txt"></textarea>'; ?></td>
        <td class="pic_opts">
          <p class="title">The Explanation's Picture</p>
          <p>Src: <?php addOptInput($questNo, $optNo, 'text', 'exp_pic_src', 'pic_src'); ?></p>
          <p>Alt: <?php addOptInput($questNo, $optNo, 'text', 'exp_pic_alt', 'pic_src'); ?></p>
        </td>
      </tr>
    </table>
  </td>
</tr>
  
<?php } ?>