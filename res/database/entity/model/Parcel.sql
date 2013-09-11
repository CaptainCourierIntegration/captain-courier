/** resolver
{
	"depends": ["captain"],
	"searchPath": "captain"
}
 */


CREATE SEQUENCE "seq_Parcel_id"
START WITH 1
INCREMENT BY 1
NO MAXVALUE
NO MINVALUE
CACHE 1;

CREATE TABLE "Parcel" (
	"id" int,
	width decimal(4, 2) NOT NULL CHECK (width >= 0),
	height decimal(4, 2) NOT NULL CHECK (height >= 0),
	length decimal(4, 2) NOT NULL CHECK (length >= 0),
	weight decimal(4, 2) NOT NULL CHECK (weight >= 0),
	"value" decimal(4, 2) NOT NULL CHECK ("value" >= 0),
	CONSTRAINT "pk_Parcel" PRIMARY KEY (id)
);

ALTER SEQUENCE "seq_Parcel_id" OWNED BY "Parcel"."id";


