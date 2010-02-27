/**
 * @author sl
 */

var showSpeed = 'def';
var hideSpeed = 'def';
var numQuestions = 2;
var numOpts = new Array();
var numRanges = 4;
 
//When the document is ready get things goin
$(document).ready(function() {
	//all loading stuff is triggered by ajax
	$.loading.onAjax = true;
	
	//make sortable stuff sortable
	$('#grades_container').sortable({ cursor: 'n-resize', handle: '.sect_head_cont'});
  $('#questions_container').sortable({ cursor: 'n-resize', handle: '.sect_head_cont:first'});
	
	//add click handler for adding quizRanges and Questions
	$('#grading_add').click(addRange);
	$('#quest_add').click(addQuest);
	
	//click handler for saving quizzes
	$('#save').click(save);
	 
	 //already added 3 questions with 3 opts each so...
	 for (var i = 0; i < 3; i++) {
	 	 numOpts[i] = 2;
	 }
	
	/*
	//set default range values if the browser cache didn't fill them in from last time
	if($('#gr0_start').val() == '')
		rangeDefVals();
	
	//hide everything except for data
	$('#grading .hide').click();*/
});

function addRange() {
	$.loading();
	$.get('addRange.php', {range_no: numRanges + 1}, function(data) {
		//add to end of grade ranges
		$('#grades_container').append(data);
		
		//increment number of ranges
		numRanges++;
	});
}
/*

//puts some default values in the range fields
function rangeDefVals() {
	$('#gr0_start').val('90');
	$('#gr0_end').val('100');
	$('#gr0_grade').val('A');
	$('#gr0_txt').val('Awesome');
	
	$('#gr1_start').val('80');
	$('#gr1_end').val('90');
	$('#gr1_grade').val('B');
	$('#gr1_txt').val('Basically good');
	
	$('#gr2_start').val('70');
	$('#gr2_end').val('80');
	$('#gr2_grade').val('C');
	$('#gr2_txt').val('Crappy indeed');
	
	$('#gr3_start').val('60');
	$('#gr3_end').val('70');
	$('#gr3_grade').val('D');
	$('#gr3_txt').val('Definitely Bad');
	
	$('#gr4_start').val('0');
	$('#gr4_end').val('60');
	$('#gr4_grade').val('F');
	$('#gr4_txt').val('You Fail!');
}*/

function addQuest() {
	$.loading();
	
  numQuestions++;
	$.get('addQuestion.php', {quest_no: numQuestions}, function(data) {
		//add that question to the questions list
		$('#questions_container').append(data);
		
		//init its options entry in that array
		numOpts[numQuestions] = 3;
	});
}

function addOpt(toQuestion){
	$.loading();
  numOpts[toQuestion]++;
	$.get('addOption.php', {quest_no: toQuestion, opt_no: numOpts[toQuestion]}, function(data) {
		//add it to the list of options
		$('#q' + toQuestion + '_container').append(data);
	});
}


function addHider(id) {
	//add click handler for this thing
	$('#' + id + '_hider').click(function () {
		$('#' + id + '_hider').unbind();
	   //grab all the children divs of id where their class is not sect_head and slide them up
		$('#' + id + ' > .sect').slideUp(hideSpeed, function(){
      //get old hval
      var oldHval = $('#' + id + '_hval').html();
			//fade out the id_hval, change its contents, and fade it back in
			$('#' + id + '_hval').fadeOut(hideSpeed, function() {
				//get the value to use from id .hval
			  $(this).html("'" + $('#' + id + ' .hval').attr('value') + "'");
			  $(this).fadeIn(showSpeed);
			});
				
      //then fade out the hider 
			$('#' + id + '_hider').fadeOut(hideSpeed, function() {
				//change click handler
				addShower(id, oldHval);
        // change the hider's text, change its class show it and change its click handeler
        $('#' + id + '_hider').html('[Show]').removeClass('hide').addClass('show').fadeIn(showSpeed);
			});
		});
		return false;
	});
}

function addShower(id, oldHval) {
  //add click handler for this thing
  $('#' + id + '_hider').click(function () {
  	$('#' + id + '_hider').unbind();
     //grab all the children divs of id where their class is not sect_head and slide them up
    $('#' + id + ' > .sect').slideDown(hideSpeed, function(){
        //fade out the id_hval, change its contents, and fade it back in
        $('#' + id + '_hval').fadeOut(hideSpeed, function() {
          //get the value to use from id > .hval
          $(this).html(oldHval);
          $(this).fadeIn(showSpeed);
        });
        
      //then fade out the hider 
      $('#' + id + '_hider').fadeOut(hideSpeed, function() {
      	//change its click handeler
        addHider(id);
        // change the hider's text, change its class show it
        $('#' + id + '_hider').html('[Hide]').removeClass('show').addClass('hide').fadeIn(showSpeed);
      });
    });
    return false;
  });
}

function addDeleter(id) {
	//add click handler
	$('#' + id + '_del').click(function() {
		//make sure they do want to
		var answer = confirm('Are you sure you want to delete this? You cannot undo this.');
		
		if(answer) {
			//remove it
			$(this).parent().fadeOut(hideSpeed, function() {
				$(this).parent().remove();
			});
		}
	});
}


function save() {
	// essentially, we need to loop through all the quiz ranges, questions, and the questions' options
	// setting names for everything. then we can submit the form.
	
	//grab all of the grade_ranges and get their ids into an array
	var gradeStarts = $('.grade_range').map(getId).get();
	for (var i in gradeStarts) {
		//set name for the fields in this grade_range.
		// range start
		$('#' + gradeStarts[i] + ' .grade_start').attr('name', 'gr' + i + '_start');
		// range end
		$('#' + gradeStarts[i] + ' .grade_end').attr('name', 'gr' + i + '_end');
		// range letter
		$('#' + gradeStarts[i] + ' .grade_letter').attr('name', 'gr' + i + '_grade');
		// range rank
		$('#' + gradeStarts[i] + ' .grade_rank').attr('name', 'gr' + i + '_txt');
		// pic src
		$('#' + gradeStarts[i] + ' .pic_src').attr('name', 'gr' + i + '_pic_src');
		// pic alt
		$('#' + gradeStarts[i] + ' .pic_alt').attr('name', 'gr' + i + '_pic_alt');
	}
	
	//grab all of the questions and get their ids into an array
	var questions = $('.question').map(getId).get();
	for(var i in questions) {
		// set the name for the fields
		// question text
		$('#' + questions[i] + ' .quest_txt').attr('name', 'q' + i + '_txt');
		
		// pic src
		$('#' + questions[i] + ' .quest_pic_src').attr('name', 'q' + i + '_pic_src');
		// pic alt
		$('#' + questions[i] + ' .quest_pic_alt').attr('name', 'q' + i + '_pic_alt');
		
		//get all the options for this question and get their ids into an array
		var opts = $('#' + questions[i] + ' .quest_opt').map(getId).get();
		for(var j in opts) {
			// set all the names
			var sel = '#' + questions[i] + ' #' + opts[j];
			var name = 'q' + i + '_o' + j;
			console.log(sel);
			console.log(name);
			// option text
			$(sel + ' .opt_txt').attr('name', name + '_txt');
			// pic src
			$(sel + ' .opt_pic_src').attr('name', name + '_pic_src');
			// pic alt
			$(sel + ' .opt_pic_alt').attr('name', name + '_pic_alt');
			// range rank
			$(sel + ' .opt_exp').attr('name', name + '_exp');
			// pic src
			$(sel + ' .opt_exp_pic_src').attr('name', name + '_opt_pic_src');
			// pic alt
			$(sel + ' .opt_exp_pic_alt').attr('name', name + '_opt_pic_alt');
		}
	}
	
	// everything is properly named now. Just need to submit the form.
	$('#quizzyBuilder').submit();
}

function getId() {
	return $(this).attr('id');
}