/** resolver
{
	"depends": ["captain", "Shipment", "Label"],
	"searchPath": "captain"
}
*/


CREATE SEQUENCE "seq_Recipt_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;


CREATE TABLE "Recipt" (
	"id" int DEFAULT nextval('"seq_Recipt_id"'::regclass),
	"shipmentId" int,
	"labelId" int,
	CONSTRAINT "pk_Recipt" PRIMARY KEY ("id"),
	CONSTRAINT "fk_Recipt_shipmentId" FOREIGN KEY ("shipmentId") REFERENCES "Shipment" ("id"),
	CONSTRAINT "fk_Recipt_labelId" FOREIGN KEY ("labelId") REFERENCES "Label" ("id")
);

ALTER SEQUENCE "seq_Recipt_id" OWNED BY "Recipt"."id";

CREATE INDEX "idx_Recipt_shipmentId" ON "Recipt" USING BTREE("shipmentId");
CREATE INDEX "idx_Recipt_labelId" ON "Recipt" USING BTREE("labelId");
