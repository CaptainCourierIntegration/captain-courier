/** resolver
{
	"depends": ["captain", "citext"],
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
	"collectionTime" timestamp NOT NULL,
	"deliveryAddressId" int NOT NULL,
	"deliveryTime" timestamp NOT NULL,
	"contractNumber" citext NOT NULL,
	"serviceCode" citext NOT NULL,
	CONSTRAINT "pk_Shipment" PRIMARY KEY (id),
	CONSTRAINT "fk_Shipment_collectionAddressId" FOREIGN KEY ("collectionAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Shipment_collectionContactId" FOREIGN KEY ("collectionContactId") REFERENCES "Contact" ("id"),
	CONSTRAINT "fk_Shipment_deliveryAddressId" FOREIGN KEY ("deliveryAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Shipment_deliveryContactId" FOREIGN KEY ("deliveryContactId") REFERENCES "Contact" ("id")
);

ALTER SEQUENCE "seq_Shipment_id" OWNED BY "Shipment".id;

CREATE INDEX "idx_Shipment_collectionAddressId" ON "Shipment" USING BTREE("collectionAddressId");
CREATE INDEX "idx_Shipment_collectionContactId" ON "Shipment" USING BTREE("collectionContactId");
CREATE INDEX "idx_Shipment_deliveryAddressId" ON "Shipment" USING BTREE("deliveryAddressId");
CREATE INDEX "idx_Shipment_deliveryContactId" ON "Shipment" USING BTREE("deliveryContactId");

CREATE INDEX "idx_Shipment_contractNumber" ON "Shipment" USING BTREE("contractNumber");
