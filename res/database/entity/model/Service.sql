/** resolver
{
	"depends": ["captain", "Courier", "citext"],
	"searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_Service_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE "Service" (
	"id" int DEFAULT nextval('"seq_Service_id"'::regclass),
	"courierId" int,
	"name" citext NOT NULL,
	"serviceCode" text NOT NULL,
	CONSTRAINT "pk_Service" PRIMARY KEY ("id"),
	CONSTRAINT "fk_Service_courierId" FOREIGN KEY ("courierId") REFERENCES "Courier" ("id"),
	CONSTRAINT "unique_Service_name" UNIQUE ("serviceCode")
);

ALTER SEQUENCE "seq_Service_id" OWNED BY "Service"."id";

CREATE INDEX "idx_Service_courierId" ON "Service" USING BTREE("courierId");