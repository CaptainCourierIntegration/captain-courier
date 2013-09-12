/** resolver
{
    "depends" : [ "captain", "Consignment", "citext" ],
    "searchPath" : "captain, extension"
}
*/

CREATE SEQUENCE "seq_ConsignmentTrackingLog_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "ConsignmentTrackingLog" (
    "id" int NOT NULL DEFAULT nextval('"seq_ConsignmentTrackingLog_id"'::regclass),
	"consignmentId" int NOT NULL,
	"trackingNumber" citext NOT NULL,
    CONSTRAINT "pk_ConsignmentTrackingLog" PRIMARY KEY (id),
	CONSTRAINT "fk_ConsignmentTrackingLog_consignmentId" FOREIGN KEY ("consignmentId") REFERENCES "Consignment" ("id")
);

ALTER SEQUENCE "seq_ConsignmentTrackingLog_id" OWNED BY "ConsignmentTrackingLog"."id";

CREATE INDEX "idx_ConsignmentTrackingLog_consignmentId" ON "ConsignmentTrackingLog" USING BTREE ("consignmentId");
CREATE INDEX "idx_ConsignmentTrackingLog_trackingNumber" ON "ConsignmentTrackingLog" USING GIN ("trackingNumber");
