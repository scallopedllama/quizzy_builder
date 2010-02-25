<?php
  function addPic($name, $title_text, $src = '', $alt = '', $wrapper_class = '') {
    $class = ' class="pic ' . $wrapper_class . '"';
    $title = empty($title_text) ? '' : '<p class="group_title">' . $title_text . '</p>';
?>
    <div<?php echo $class; ?>>
      <?php echo $title; ?>
      <p>Src: <input type="text" name="data_<?php echo $name; ?>_src" id="data_<?php echo $name; ?>_src" value="<?php echo $src; ?>"></p> 
      <p>Alt: &nbsp;<input type="text" name="data_<?php echo $name; ?>_alt" id="data_<?php echo $name; ?>_alt" value="<?php echo $src; ?>"></p>
    </div>
<?php
  }
  
  
  function addHider($id_name)
  {
?>
    <div class="hider"><a class="hide" id="<?php echo $id_name;?>_hider">[Hide]</a></div>
    <script type="text/javascript">addHider('<?php echo $id_name; ?>');</script>
<?php
  }
  
?>
