/** Resolver
{
    "depends": [],
    "searchPath": ""
}
*/

CREATE SEQUENCE "seq_ConsignmentTrackingLogEntry_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "ConsignmentTrackingLogEntry" (
    "id" int NOT NULL DEFAULT nextval('"seq_ConsignmentTrackingLogEntry_id"'::regclass),
	"consignmentTrackingLogId" int NOT NULL,
	"status" citext NOT NULL,
	"timestamp" timestamp NOT NULL DEFAULT now(),
    CONSTRAINT "pk_ConsignmentTrackingLogEntry" PRIMARY KEY (id),
	CONSTRAINT "fk_ConsignmentTrackingLogEntry_consignmentTrackingLogId" FOREIGN KEY ("consignmentTrackingLogId") REFERENCES "ConsignmentTrackingLog" ("id")
);

ALTER SEQUENCE "seq_ConsignmentTrackingLogEntry_id" OWNED BY "ConsignmentTrackingLogEntry"."id";
