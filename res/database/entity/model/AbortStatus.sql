/** resolver
{
	"depends": ["captain", "Shipment", "abortstatus_status", "citext"],
	"searchPath": "captain, extension"
}
*/


CREATE SEQUENCE "seq_AbortStatus_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE "AbortStatus" (
	"id" int NOT NULL DEFAULT nextval('"seq_AbortStatus_id"'::regclass),
	"shipmentId" int NOT NULL,
	"status" abortstatus_status NOT NULL,
	"message" citext,
	CONSTRAINT "pk_AbortStatus" PRIMARY KEY ("id"),
	CONSTRAINT "fk_AbortStatus_shipmentId" FOREIGN KEY ("shipmentId") REFERENCES "Shipment" ("id")
);

ALTER SEQUENCE "seq_AbortStatus_id" OWNED BY "AbortStatus"."id";

CREATE INDEX "idx_AbortStatus_shipmentId" ON "AbortStatus" USING BTREE("shipmentId");