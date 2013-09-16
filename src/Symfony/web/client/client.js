
$(document).ready(function() {


	$("#get").on("click", ["GET"], request);
	$("#post").on("click", ["POST"], request);

	$("#clear").on("click", function() {
		$("#response").val("<no request>");
	});
});

function request(event)
{
	var host = $("#host").val();
	var url =  $("#url").val();
	var type = event.data[0];

	var realurl = "http://" + host + url;
	console.log(type + " " + realurl);
	result = $.ajax({
		type: type,
		url: realurl,
		data: {},
		success: handleResponse,
		error: handleError
	});
}


function handleResponse(response)
{
	$("#response").text(JSON.stringify(response));
}

function handleError(response)
{
	$("#response").text(JSON.stringify(response));
}