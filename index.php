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
      <form method="get" action="saveQuiz.php" id="quizzyBuilder">

        <?php 
          include 'addQuizInfo.php'; 
          include 'addGrading.php';
          
          echo '<ul id="questions_container" class="dragging_container">';
          for ($i = 0; $i < 3; ++$i) {
            include 'addQuestion.php';
          }
          echo '</ul>';
        ?>
        <div class="sub_sect" style="width:305px;">
          <h2 style="cursor:pointer;" id="quest_add">Add another Question</h2>
        </div>
        
        <?php /*?>
        <!--questions container-->
        <div id="qs"></div>
        <div>
          <input type="button" id="add_quest" value="Add Another Question">
        </div>
        
        <div class="loadsave">
          <input type="button" id="load_quiz" onClick="alert('Coming soon!');" value="Load Quiz"> &nbsp; &nbsp;
          <input type="submit" id="save_quiz" value="Save Quiz">
        </div>
      </form>
      <p>Note: If a grade's start value is empty, that grade will be ignored. 
      <br>For each question, either a question text or picture must be specified or that question will be ignored. 
      <br>Finally, question options that don't have either a text or picture set will be ignored.</p> 
      <p>This form is not validated so make sure the values you entered make sense.</p> 
      <p>The quizzyBuilder is still pretty rough. Things will get better eventually, when I get the time to make them better.</p>
      <p><a href="http://sourceforge.net/projects/quizzy/files">Click here</a> to download the current stable version of quizzy</p>
      <?php */ ?>
    </div>
  </body>
</html>
