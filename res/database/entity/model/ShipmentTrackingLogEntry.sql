/** resolver
{
    "depends": ["captain", "ShipmentTrackingLog", "citext"],
    "searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_ShipmentTrackingLogEntry_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "ShipmentTrackingLogEntry" (
    "id" int NOT NULL DEFAULT nextval('"seq_ShipmentTrackingLogEntry_id"'::regclass),
	"shipmentTrackingLogId" int NOT NULL,
	"status" citext NOT NULL,
	"timestamp" timestamp NOT NULL DEFAULT now(),
    CONSTRAINT "pk_ShipmentTrackingLogEntry" PRIMARY KEY (id),
	CONSTRAINT "fk_ShipmentTrackingLogEntry_shipmentTrackingLogId" FOREIGN KEY ("shipmentTrackingLogId") REFERENCES "ShipmentTrackingLog" ("id")
);

ALTER SEQUENCE "seq_ShipmentTrackingLogEntry_id" OWNED BY "ShipmentTrackingLogEntry"."id";
