
$(document).ready(function() {

	request();

});

function request()
{
	var data = {
		name: "joseph",
		email: "joseph@omlet.co.uk",
		line1: "Omlet ltd",
		line2: "Tuthill Park",
		town: "Wardington",
		region: "Oxfordshire",
		postcode: "OX17 1RR",
		countryCode: "GB"
	};

	result = $.ajax({
		type: "POST",
		url: "http://192.168.2.18:8000/addresses",
		contentType: "json",
		data: JSON.stringify(data),
		processData: false,
		timeout: 1000000,
		success: handleResponse,
		error: handleError
	});
}


function handleResponse(response)
{
	console.log("HANDLING RESPONSE");
	console.log(response);
	$("#response").text(response);
}

function handleError(response)
{
	console.log("HANDLING ERROR");
	console.log(response);
	$("#response").text(response);
}