/** resolver
{
	"depends": ["captain", "citext"],
	"searchPath": "captain, extension"
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
	"collectionAddressId" int NOT NULL,
	"collectionContactId" int NOT NULL,
	"collectionTime" timestamp NOT NULL,
	"deliveryAddressId" int NOT NULL,
	"deliveryContactId" int NOT NULL,
	"deliveryTime" timestamp NOT NULL,
	"contractNumber" citext NOT NULL,
	"serviceCode" citext NOT NULL,
	CONSTRAINT "pk_Consignment" PRIMARY KEY (id),
	CONSTRAINT "fk_Consignment_collectionAddressId" FOREIGN KEY ("collectionAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Consignment_collectionContactId" FOREIGN KEY ("collectionContactId") REFERENCES "Contact" ("id"),
	CONSTRAINT "fk_Consignment_deliveryAddressId" FOREIGN KEY ("deliveryAddressId") REFERENCES "Address" ("id"),
	CONSTRAINT "fk_Consignment_deliveryContactId" FOREIGN KEY ("deliveryContactId") REFERENCES "Contact" ("id")
);

ALTER SEQUENCE "seq_Consignment_id" OWNED BY "Consignment".id;

CREATE INDEX "idx_Consignment_collectionAddressId" ON "Consignment" USING BTREE("collectionAddressId");
CREATE INDEX "idx_Consignment_collectionContactId" ON "Consignment" USING BTREE("collectionContactId");
CREATE INDEX "idx_Consignment_deliveryAddressId" ON "Consignment" USING BTREE("deliveryAddressId");
CREATE INDEX "idx_Consignment_deliveryContactId" ON "Consignment" USING BTREE("deliveryContactId");

CREATE INDEX "idx_Consignment_contractNumber" ON "Consignment" USING BTREE("contractNumber");
