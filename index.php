<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>quizzy builder!</title>
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
	</head>
	<body>
	  <div id="content">
      <form method="get" action="saveQuiz.php" id="quizzyBuilder" target="_blank">

        <?php 
          include 'addQuizInfo.php'; 
          include 'addGrading.php';
          
          echo '<ul id="questions_container" class="dragging_container">';
          for ($i = 0; $i < 3; ++$i) {
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
      <form method="get" action="index.php">
        <div class="main" style="width:143px; float: left; margin: 100px 0px 100px 0px;">
          <h2 style="cursor:pointer;" id="load">Load Quiz</h2>
        </div>
      </form>
        <div style="clear: both; margin-top: 100px;">
          foobar. this was made by me. blah blah.
        </div>
    </div>
  </body>
</html>
