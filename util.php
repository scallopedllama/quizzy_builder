<?php
  function addPic($name, $title_text, $src = '', $alt = '', $wrapper_class = '', $txt_class='') {
    $class = empty($wrapper_class) ? '' :  ' class="pic ' . $wrapper_class . '"';
    $src_name = empty($name) ? '' : ' name="' . $name . '_pic_src" id="data_' . $name . '_src"'; 
    $alt_name = empty($name) ? '' : ' name="' . $name . '_pic_alt" id="data_' . $name . '_alt"'; 
    $title = empty($title_text) ? '' : '<p class="group_title">' . $title_text . '</p>';
?>
    <div<?php echo $class; ?>>
      <?php echo $title; ?>
      <p>Src: <input type="text"<?php echo $src_name; ?> class="pic_src <?php echo $txt_class; ?>_src" value="<?php echo $src; ?>"></p> 
      <p>Alt: &nbsp;<input type="text"<?php echo $alt_name; ?> class="pic_alt <?php echo $txt_class; ?>_alt" value="<?php echo $alt; ?>"></p>
    </div>
<?php
  }
  
  
  function addHider($id_name, $show_del = FALSE) {
?>
    <div class="hider hide" id="<?php echo $id_name;?>_hider">[Hide]</div>
<?php
    if ($show_del) {
?>
    <div class="delete" id="<?php echo $id_name; ?>_del">[Delete]</div>
    <script type="text/javascript">addDeleter('<?php echo $id_name; ?>');</script>
<?php } ?>
    <script type="text/javascript">addHider('<?php echo $id_name; ?>');</script>
<?php
  }
  
?>
