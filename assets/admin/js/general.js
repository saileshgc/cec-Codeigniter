// JavaScript Document

//to show confirm box on deleting
$(function () { 
	$('a.delete_link').bind('click',function()
	{
		return confirm('Are you sure you want to delete this?');
	});
});

//to append * with required fields
$(function () { 
	$('label.required').append('&nbsp;<strong>*</strong>&nbsp;');
});