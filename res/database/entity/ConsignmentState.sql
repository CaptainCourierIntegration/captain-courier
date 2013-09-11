/** resolver
{
	"depends": [ "captain", "consignmentstate", "hstore" ],
	"searchPath": "captain, extension"
}
 */

CREATE SEQUENCE "seq_ConsignmentState_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE SEQUENCE "seq_ConsignmentState_order"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE "ConsignmentState" (
    "id" int NOT NULL DEFAULT nextval('"seq_ConsignmentState_id"'::regclass),
	"consignmentId" int NOT NULL,
	"order" int NOT NULL DEFAULT nextval('"seq_ConsignmentState_order"'::regclass), /* for sorting the events into order */
	"state" consignmentstate NOT NULL DEFAULT ('active'::consignmentstate),
	"timestamp" timestamp NOT NULL DEFAULT now(),
	"details" hstore NOT NULL,
    CONSTRAINT "pk_ConsignmentState" PRIMARY KEY (id),
	CONSTRAINT "fk_ConsignmentState_consignmentId" FOREIGN KEY ("consignmentId") REFERENCES "Consignment" ("id")
);

ALTER SEQUENCE "seq_ConsignmentState_id" OWNED BY "ConsignmentState"."id";