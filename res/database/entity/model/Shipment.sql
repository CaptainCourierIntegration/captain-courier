/** resolver
{
	"depends": ["captain", "Address", "Parcel", "citext"],
	"searchPath": "captain, extension"
}
*/


CREATE SEQUENCE "seq_Shipment_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE "Shipment" (
	id int DEFAULT nextval('"seq_Shipment_id"'::regclass),
	"collectionAddressId" int NOT NULL,
	"deliveryAddressId" int NOT NULL,
	"parcelId" int NOT NULL,
	CONSTRAINT "pk_Shipment" PRIMARY KEY (id),
	CONSTRAINT "fk_Shipment_collectionAddressId" FOREIGN KEY ("collectionAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Shipment_deliveryAddressId" FOREIGN KEY ("deliveryAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Shipment_parcelId" FOREIGN KEY ("parcelId") REFERENCES "Parcel" ("id")
);

ALTER SEQUENCE "seq_Shipment_id" OWNED BY "Shipment".id;

CREATE INDEX "idx_Shipment_collectionAddressId" ON "Shipment" USING BTREE("collectionAddressId");
CREATE INDEX "idx_Shipment_deliveryAddressId" ON "Shipment" USING BTREE("deliveryAddressId");
