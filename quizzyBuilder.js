/**
 * @author sl
 */

var showSpeed = 'def';
var hideSpeed = 'def';
var numQuestions = -1;
var numOpts = new Array();
var numRanges = 4;
 
//When the document is ready get things goin
$(document).ready(function() {
	$.loading.onAjax = true;
	
	//add click handlers
	$('#add_quest').click(addQuestion);
	$('#add_range').click(function () {
		addRange(1);
	});
	
	//set default range values if the browser cache didn't fill them in from last time
	if($('#gr0_start').val() == '')
		rangeDefVals();
	
	addQuestion();
	
	//hide everything except for data
	$('#grading .hide').click();
});

function addRange(num) {
	$.loading();
	$.get('addRange.php', {startIndex: numRanges + 1, numAdd: num}, function(data) {
		//add to end of grade ranges
		$('#grading_c').append(data);
		
		//add hide handlers
		for(var i = numRanges + 1; i < numRanges + num + 1; i++)
		{
			
			//hide it
			$('#gr' + i + ' .hide').click();
		}
		
		//increment number of raages
		numRanges+=num;
	});
}

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
}

function addQuestion() {
	$.loading();
	$.get('addQuestion.php', {questNo: numQuestions + 1}, function(data) {
		//add that question to the questions list
		$('#qs').append(data);
		
		//there's another question now
		++numQuestions;
		//init its options entry in that array
		numOpts[numQuestions] = -1;
		
		//add the show/hide click handler and hide it
		$('#q' + numQuestions + ' .hide').click();
		
		//add click handler for add option button
		$('#q' + numQuestions + '_add_opt').click(function(){
			addOptions(numQuestions, 1);
		});
		
		//add three options to that question
		addOptions(numQuestions, 3);
	});
}

function addOptions(toQuestion, num){
	$.loading();
	$.get('addOption.php', {questNo: toQuestion, optNo: numOpts[toQuestion] + 1, numAdd: num}, function(data) {
		//add it to the list of options
		$('#q' + toQuestion + '_opts').append(data);
		
		for(var thisOpt = numOpts[toQuestion] + 1; thisOpt < numOpts[toQuestion] + num + 1; thisOpt++ ){
			//add click handlers for the picture options
			
			//hide all but the first one
			if(thisOpt != numOpts[toQuestion] + 1)
				$('#q' + toQuestion + '_o' + thisOpt + ' .hide').click();
		}
		
		//we got all num options
		numOpts[toQuestion]+=num;
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
			  $(this).html($('#' + id + ' .hval').attr('value'));
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
        $('#' + id + '_hider').html('[Hide]').addClass('show').removeClass('hide').fadeIn(showSpeed);
      });
    });
  });
}