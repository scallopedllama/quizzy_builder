<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>quizzy builder!</title>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <!--don't even give IE8 the option for wonky-mode.-->
    <META http-equiv="X-UA-Compatible" content="IE=8"/>
    
    <script type="text/javascript" src="../quizzy/lib/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../quizzy/lib/jquery.loading.js"></script>
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
        <!--quiz data container-->
        <?php include 'addQuizInfo.php'; /*?>
        
        <!--grading container-->
        <div class="grading hidden" id="grading_hidden">
          <span class="show">[Show Details]</span>
          <p>Grading</p>
        </div>
        <table class="grading" id="grading" cellspacing="5px">
          <tr>
            <td colspan="2">
              <span class="hide">[Hide Details]</span>
              <p class="title">Grading</p>
            </td>
          </tr>
          <tr>
            <td id="grading_c" colspan="2">
              <script type="text/javascript">
                //need to add cilck handeler for the whole before the parts
  	            addHideClick('#grading');
              </script>
              <?php
                $startIndex = 0;
                $numAdd = 5;
                include 'addRange.php';
              ?>
              <script type="text/javascript">
                //show/hid click handlers for the grades
                for(var i = 0; i < 5; i++)
                  addHideClick('#gr' + i);
              </script>
            </td>
          </tr>
          <tr id="gr_foot">
            <td><input type="button" id="use_def" value="Default Values" onClick="rangeDefVals();"></td>
            <td align="right"><input type="button" id="add_range" value="Add Another Grade"></td>
           </td>
          </tr>
        </table>
    
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
