/** resolver
{
    "depends" : [ "captain", "Shipment", "citext" ],
    "searchPath" : "captain, extension"
}
*/

CREATE SEQUENCE "seq_ShipmentTrackingLog_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "ShipmentTrackingLog" (
    "id" int NOT NULL DEFAULT nextval('"seq_ShipmentTrackingLog_id"'::regclass),
	"shipmentId" int NOT NULL,
	"trackingNumber" citext NOT NULL,
    CONSTRAINT "pk_ShipmentTrackingLog" PRIMARY KEY (id),
	CONSTRAINT "fk_ShipmentTrackingLog_shipmentId" FOREIGN KEY ("shipmentId") REFERENCES "Shipment" ("id")
);

ALTER SEQUENCE "seq_ShipmentTrackingLog_id" OWNED BY "ShipmentTrackingLog"."id";

CREATE INDEX "idx_ShipmentTrackingLog_shipmentId" ON "ShipmentTrackingLog" USING BTREE ("shipmentId");
