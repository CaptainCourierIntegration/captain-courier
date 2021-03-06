
$(document).ready(function() {

	requestCreateAddress();
	requestCreateParcel();
	requestCreateItem();
	requestCreateShipment();

});

function requestCreateAddress()
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
		url: "http://192.168.2.18:8000/addresses/",
		contentType: "json",
		data: JSON.stringify(data),
		processData: false,
		timeout: 1000000,
		success: handleResponse,
		error: handleError
	});
}

function requestCreateParcel()
{
	var data = {
		width: 12.2,
		height: 10,
		length: 8.8,
		weight: 2.2,
		value: 101
	};

	// the trailing slash is required, not sure why it is different from address.
	result = $.ajax({
		type: "POST",
		url: "http://192.168.2.18:8000/parcels/",
		contentType: "json",
		data: JSON.stringify(data),
		processData: false,
		timeout: 1000000,
		success: handleResponse,
		error: handleError
	});
}

function requestCreateItem()
{
	var data = {
		description: "shoes",
		quantity: 2,
		weight: 1.5,
		origin: "GB"
	};

	// the trailing slash is required, not sure why it is different from address.
	result = $.ajax({
		type: "POST",
		url: "http://192.168.2.18:8000/items/",
		contentType: "json",
		data: JSON.stringify(data),
		processData: false,
		timeout: 1000000,
		success: handleResponse,
		error: handleError
	});
}

function requestCreateShipment()
{
	var data = {
		to: "1",
		from: "2",
		parcel: "2",
		items: ["1", "2", "3"]
	};

	// the trailing slash is required, not sure why it is different from address.
	result = $.ajax({
		type: "POST",
		url: "http://192.168.2.18:8000/shipments/",
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
	$("#response").text(JSON.stringify(response));
}

function handleError(response)
{
	console.log("HANDLING ERROR");
	console.log(response);
	$("#response").text(JSON.stringify(response));
}