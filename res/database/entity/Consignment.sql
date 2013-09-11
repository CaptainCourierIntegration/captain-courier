/** Resolver
{
}
 */


CREATE SEQUENCE "seq_Consignment_id"
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;

CREATE TABLE "Consignment" (
	id int DEFAULT nextval('"seq_Consignment_id"' :: regclass),
	"collectionAddress" int,
	"collectionContact" int,
	"collectionTime" timestamp NOT NULL,
	"deliveryAddress" int,
	"deliveryContact" int,
	"deliveryTime" timestamp NOT NULL,
	"contractNumber" text NOT NULL,
	"serviceCode" text NOT NULL,
	CONSTRAINT "pk_Consignment" PRIMARY KEY (id)
);

