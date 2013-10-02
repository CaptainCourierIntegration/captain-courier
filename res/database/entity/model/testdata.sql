/** resolver
{
	"depends": ["captain", "Courier", "Service", "Address", "Item", "Parcel"],
	"searchPath": "captain, extension"
}
*/

INSERT INTO "Courier" ("name") VALUES ('ParcelForce');

INSERT INTO "Service" ("courierId", "name", "serviceCode")
(
	SELECT "Courier"."id", 'express48', 'SUP'
	FROM "Courier"
	WHERE "Courier"."name" = 'ParcelForce'
);

INSERT INTO "Address" ("companyName", "phone", "line1", "town", "county", "postcode", "cc") VALUES 
(
	'Tesco',
	'08456719255',
	'10 SMITHFIELD STREET',
	'LONDON',
	'GREATER LONDON',
	'EC1A 9LR',
	'GB'
),
(
	'Tesco',
	'08450269874',
	'21 HOLBORN VIADUCT',
	'LONDON',
	'GREATER LONDON',
	'EC1A 2AT',
	'GB'
);

INSERT INTO "Item" ("description", "quantity", "weight", "originCountryCode") VALUES 
('Penis Enlarger - Large', 1, 2, 'GB'),
('Speedo - Medium', 1, 0.5, 'GB'),
('Austin Powers Wig', 1, 0.75, 'GB');


INSERT INTO "Parcel" ("width", "height", "length", "weight", "value") VALUES
(10, 10, 10, 10, 10),
(1, 2, 3, 4, 5);