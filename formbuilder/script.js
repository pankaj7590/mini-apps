var addedQuestions = {};
var commonOptions = "<div class='common-options options-settings-container'>Label : <br/><input type='text' name='label' title='Your question' data-label='label'/><br/>" + 
									"Hint : <br/><textarea name='hint' title='Hint to be shown below the input field'></textarea><br/>" + 
									"Image : <br/><input type='file' name='image' title='Image to be shown along with the question'/><br/>" + 
									"Required : <br/><input type='checkbox' checked name='required' title='Is the question compulsory?'><br/></div>";

var textboxOptions = "<div class='textbox-options options-settings-container'>Max Length : <br/><input type='number' min='0' name='textbox_maxlength' title='Maximum allowed length of the answer'><br/></div>";

var textareaOptions = "<div class='common-options options-settings-container'>Max Length : <br/><input type='number' min='0' name='textarea_maxlength' title='Maximum allowed length of the answer'><br/></div>";

var checkboxOptions = "<div class='common-options options-settings-container'>Options : <br/><div class='answer-options'><input type='checkbox' title='Select to show default checked'>" +
									"<input type='text' title='Label for the option' name='checkbox_option_'>" + 
									"<input type='file' title='Image to be shown along with the option'/>" +
									"<a class='' title='Add Option'>+</a><a class='' title='Remove Option'>-</a></div>" +
									"<label><input type='checkbox' class='include-other-option' title='Select to add extra 'other' option'>Include 'other'</label></div>";

var radioOptions = "<div class='common-options options-settings-container'>Options : <div class='answer-options'><input type='checkbox' title='Select to show default selected'>" +
								"<input type='text' title='Label for the option'>" +
								"<input type='file' title='Image to be shown along with the option'/>" +
								"<a class='' title='Add Option'>+</a><a class='' title='Remove Option'>-</a></div>" +
								"<label><input type='checkbox' class='include-other-option' title='Select to add extra 'other' option'>Include 'other'</label></div>";

var dropdownOptions = "<div class='common-options options-settings-container'>Options : <div class='answer-options'><input type='checkbox' title='Select to show default selected'>" +
										"<input type='text' title='Label for the option'>" +
										"<input type='file' title='Image to be shown along with the option'/>" +
										"<a class='' title='Add Option'>+</a><a class='' title='Remove Option'>-</a></div>" +
										"<label><input type='checkbox' class='include-other-option' title='Select to add extra 'blank' option'>Include 'blank'</label>" +
										"<label><input type='checkbox' title='Select to allow multiple selections' option'>Multiple selections</label></div>";

var dateOptions = "<div class='common-options options-settings-container'>No previous : <br/><input type='checkbox' name='date_previous' title='Select to prevent previous date selection'/></div>";

var emailOptions = "<div class='common-options options-settings-container'></div>";

var numberOptions = "<div class='common-options options-settings-container'>Min : <br/><input type='number' name='number_min' title='Minimum value of answer'/><br/>" +
									"Max : <br/><input type='number' name='number_max' title='Maximum value of answer'/></div>";

var ratingOptions = "<div class='common-options options-settings-container'>Count : <br/><input type='number' name='rating_count' min='1' max='10' title='Number of icons to be shown'/><br/>" +
								"Icon : <br/><select name='rating_icon' title='Icon to be used'><option value='+'>+</option><option value='*'>*</option></select></div>";

var scaleOptions = "<div class='common-options'>Start Label : <br/><input name='scale_start_label' title='Label to be shown at the start of the scale'/><br/>" +
								"Center Label : <br/><input name='scale_center_label' title='Label to be shown at the middle of the scale'><br/>" +
								"End Label : <br/><input name='scale_end_label' title='Label to be shown at the end of the scale'/></div>";

var matrixOptions = "<div class='common-options options-settings-container'>Type : <br/><select name='matrix_type' title='Type of input to be shown for answer'><option>Checkbox</option><option>Radio</option><option>Dropdown</option></select><br/>" +
													"Column Labels : <br/><div class='answer-options'><div class='matrix_column_label_container'><input type='text' name='matrix_column_label[]' title='Label for column of the matrix'>" +
													"<a class='' title='Add Column'>+</a><a class='' title='Remove Column'>-</a></div></div><br/>" +
													"Row Labels : <br/><div class='answer-options'><input type='text' name='matrix_row_label' title='Label for row of the matrix'>" +
													"<a class='' title='Add Row'>+</a><a class='' title='Remove Row'>-</a></div></div>";

var matrixDropdownOptions = "<input type='text' name='matrix_column_option[]' title='Option for when input field is a dropdown'>" +
												"<a class='' title='Add Column'>+</a><a class='' title='Remove Column'>-</a></div><br/></div>";

$(document).ready(function(){
	var questionType = ["Textbox", "Textarea", "Checkbox", "Radio", "Dropdown", "Date", "Email", "Number", "Rating", "Scale", "Matrix"];
	var typeStr = "";
	$.each(questionType,function(k,v){
		typeStr += "<option value='"+k+"'>"+v+"</option>";
	})
	$("#question-type").append(typeStr);
	var questionId = 0;
	$("#add-question").off("click").on("click",function(){
		var type = $("#question-type").val();
		if(type !=""){
			switch(type){
				case "0" :
					$("#options-container").html(commonOptions + textboxOptions);
					addTextbox("q"+questionId);
					break;
				case "1" :
					$("#options-container").html(commonOptions + textareaOptions);
					addTextarea("q"+questionId);
					break;
				case "2" :
					$("#options-container").html(commonOptions + checkboxOptions);
					addCheckbox("q"+questionId);
					break;
				case "3" :
					$("#options-container").html(commonOptions + radioOptions);
					addRadio("q"+questionId);
					break;
				case "4" :
					$("#options-container").html(commonOptions + dropdownOptions);
					addDropdown("q"+questionId);
					break;
				case "5" :
					$("#options-container").html(commonOptions + dateOptions);
					addDate("q"+questionId);
					break;
				case "6" :
					$("#options-container").html(commonOptions + emailOptions);
					addEmail("q"+questionId);
					break;
				case "7" :
					$("#options-container").html(commonOptions + numberOptions);
					addNumber("q"+questionId);
					break;
				case "8" :
					$("#options-container").html(commonOptions + ratingOptions);
					addRating("q"+questionId);
					break;
				case "9" :
					$("#options-container").html(commonOptions + scaleOptions);
					addScale("q"+questionId);
					break;
				case "10" :
					$("#options-container").html(commonOptions + matrixOptions);
					addMatrix("q"+questionId);
					break;
				default :
					$("#options-container").html("");
			}
			questionId++;
		}
	});
});

function addToJson(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
}

function addTextbox(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
		$(v).off("change").on("change",function(){
			addToJson(questionId);
		});
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div class='input-field-container' data-question-id='q"+questionId+"'><div data-question-label></div><div data-question-image></div><input ><div data-question-hint></div></div>");
}

function addTextarea(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addCheckbox(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addRadio(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addDropdown(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addNumber(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addDate(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addEmail(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addRating(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addScale(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}

function addMatrix(questionId){
	var cO = $(".options-settings-container").find("input,textarea");
	var q = [];
	$.each(cO,function(k,v){
		var name = $(v).attr("name");
		var value = $(v).val();
		q[name] = value;
	});
	addedQuestions[questionId] = q;
	console.log(addedQuestions);
	$("#preview-container").append("<div data-question-id='q"+questionId+"'><input type></div>");
}