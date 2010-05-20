<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Make your own quizzy quiz</title>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <!--don't even give IE8 the option for wonky-mode.-->
    <META http-equiv="X-UA-Compatible" content="IE=8"/>
    
    <script type="text/javascript" src="lib/jquery-1.4.2.js"></script>
    <script type="text/javascript" src="../quizzy/lib/jquery.loading.js"></script>
    <script type="text/javascript" src="lib/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript" src="quizzyBuilder.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="quizzyBuilder.css" charset="utf-8">

    <!-- overflow:hidden in IE is currently breaking mask calcs :( -->
    <!--[if IE]>
      <style type="text/css">
        .loading-masked { overflow: visible; }
      </style>
    <![endif]-->
    <!--[if lte IE 6]>
      <style type="text/css">
        #load_exclusive {opacity: 50;}
      </style>
    <![endif]-->
    
<?php
  //check for upload error, make sure it was an xml file
  if (isset($_FILES['file'])) {
    if ($_FILES['file']['error'] > 0)
    {
      echo '<script type="text/javascript">alert("Error opening uploaded file! Please try again.");</script>';
    }
    elseif ($_FILES['file']['type'] != 'text/xml')
    {
      echo '<script type="text/javascript">alert("Uploaded file was not an XML file. Please select the quiz XML file to upload.");</script>';
    }
    else {
      //now we know we have the uploaded file in $_FILES['file']['tmp_name'] so go ahead and open it up.
    	$quiz_XML= simplexml_load_file($_FILES['file']['tmp_name']);
    	$quiz = $quiz_XML->quiz;
?>
<script type="text/javascript">
  loadedQuiz = true;
  numQuestions = <?php echo count($quiz->question) - 1; ?>;
  numRanges = <?php echo count($quiz->grading->range) - 1; ?>;
</script>
<?php
    }
  }
?>
    
	</head>
	<body>
    <div id="load_exclusive"></div>
	  <div id="content">
      <form method="post" action="saveQuiz.php" id="quizzyBuilder" target="_blank">

        <div id="note">
          <h3><span class="new">New</span> Beta Version</h3>
          <p>In this new version of the quizzy builder, you can now re-arrange questions and their options by simply clicking and dragging the element. You can also load up a previously created quiz by clicking 'Load Quiz' below.</p>
          <p>Since this is a beta version, you may run into some problems. Please report all issues to our <a href="https://sourceforge.net/apps/trac/quizzy/wiki/WikiStart">Trac</a>.</p>
        </div>
        <?php 
          include 'addQuizInfo.php'; 
          include 'addGrading.php';
          
          echo '<ul id="questions_container" class="dragging_container">';
          $to_add_q = isset($quiz) ? count($quiz->question) : 3;
          for ($i = 0; $i < $to_add_q; ++$i) {
            include 'addQuestion.php';
          }
          echo '</ul>';
        ?>
        <div class="hide_all_cont hide_all" id="hide_all">[Hide All]</div>
        <div class="hider_all hide_all" id="hide_all_quests" style="margin-top:45px;">[Hide All Questions]</div>
        <div class="main" style="width:305px; float:left;">
          <h2 style="cursor:pointer;" id="quest_add">Add another Question</h2>
        </div>
        <div class="main" style="width:143px;clear:both; float: right; margin: 100px 0px 100px 0px;">
          <h2 style="cursor:pointer;" id="save">Save Quiz</h2>
        </div>
      </form>
      <form method="post" action="index.php" id="load_form" enctype="multipart/form-data">
        <div class="main" style="width:143px; float: left; margin: 100px 0px 100px 0px;">
          <h2 style="cursor:pointer;" id="load">Load Quiz</h2>
        </div>
        
        <div class="main" id="load_input">
          <div class="group_title">File to Load</div>
          <input type="file" name="file" id="file" />
          <div class="sect">
            <div class="float_right"><h2 style="cursor:pointer;" id="load_load">Load Quiz</h2></div>
            <div class="float_left"><h2 style="cursor:pointer;" id="load_cancel">Cancel</h2></div>
          </div>
        </div>
      </form>
      
      <div style="clear: both; margin-top: 100px;">
        <p>The fields in this form are not validated. Make sure your input makes sense.</p>
        <p><a href="../index.php">Return to quizzy main</a></p>
      </div>
      
    </div>
  </body>
</html>
