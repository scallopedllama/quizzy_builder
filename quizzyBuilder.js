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
	$('#grades_container').sortable({ cursor: 'n-resize'});
  $('#questions_container').sortable({ cursor: 'n-resize'});
	
	//add click handler for the addQuiz feature
	$('#grading_add').click(addRange);
	$('#quest_add').click(addQuest);
	
	 //$('.hide').click();
	 
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