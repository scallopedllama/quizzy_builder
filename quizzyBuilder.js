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
	
	//add hiding stuff to the grade range and data
	addHideClick('#data');
	
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
			addHideClick('#gr' + i);
			
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
		addHideClick('#q' + numQuestions);
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
			addHideClick('#q' + toQuestion + '_o' + thisOpt);
			
			//hide all but the first one
			if(thisOpt != numOpts[toQuestion] + 1)
				$('#q' + toQuestion + '_o' + thisOpt + ' .hide').click();
		}
		
		//we got all num options
		numOpts[toQuestion]+=num;
	});
}

function addHideClick(useSel) {
	//hide hidden stuff
	$(useSel + '_hidden').hide();
	
	//add click handler so that when hidden is clicked, it hides and shows
	//the deatils
	$(useSel + '_hidden').click(function() {
		$(this).slideUp(hideSpeed);
		$(useSel).slideDown(showSpeed);
	});
	
	//make it so clicking on the hide class items will hide stuff
	$(useSel + ' .hide').click(function () {
		//fill value field
		$(useSel + '_hidden .value').html($(useSel + '_txt').attr('value'));
		
		//hide all the rows that aren't the hidden one
		$(useSel).slideUp(hideSpeed);
		
		//show the hidden one
		$(useSel + '_hidden').slideDown(showSpeed);
	});
}
