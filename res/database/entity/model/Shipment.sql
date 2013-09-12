/** resolver
{
	"depends": ["captain", "Address", "citext"],
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
	id int DEFAULT nextval('"seq_Shipment_id"' :: regclass),
	"collectionAddressId" int NOT NULL,
	"collectionTime" tsrange NOT NULL,
	"deliveryAddressId" int NOT NULL,
	"deliveryTime" tsrange NOT NULL,
	"contractNumber" citext NOT NULL,
	"serviceCode" citext NOT NULL,
	CONSTRAINT "pk_Shipment" PRIMARY KEY (id),
	CONSTRAINT "fk_Shipment_collectionAddressId" FOREIGN KEY ("collectionAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Shipment_deliveryAddressId" FOREIGN KEY ("deliveryAddressId") REFERENCES "Address" ("id")
);

ALTER SEQUENCE "seq_Shipment_id" OWNED BY "Shipment".id;

CREATE INDEX "idx_Shipment_collectionAddressId" ON "Shipment" USING BTREE("collectionAddressId");
CREATE INDEX "idx_Shipment_deliveryAddressId" ON "Shipment" USING BTREE("deliveryAddressId");
CREATE INDEX "idx_Shipment_contractNumber" ON "Shipment" USING BTREE("contractNumber");
