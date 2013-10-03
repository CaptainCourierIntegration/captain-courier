/** resolver
{
	"depends": ["captain", "Service", "citext"],
	"searchPath": "captain, extension"
}
*/
CREATE SEQUENCE "seq_Quote_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;


CREATE TABLE "Quote" (
	"id" int DEFAULT nextval('"seq_Quote_id"'::regclass),
	"serviceId" int,
	"quote" decimal(8, 2) NOT NULL,
	"serviceCode" citext NOT NULL,
	"collectionTimestamp" timestamp NOT NULL,
	CONSTRAINT "pk_Quote" PRIMARY KEY ("id"),
	CONSTRAINT "fk_Quote_serviceId" FOREIGN KEY ("serviceId") REFERENCES "Service" ("id")
);

ALTER SEQUENCE "seq_Quote_id" OWNED BY "Quote"."id";

CREATE INDEX "idx_Quote_serviceId" ON "Quote" USING BTREE("serviceId");