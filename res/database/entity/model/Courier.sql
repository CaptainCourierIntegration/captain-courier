/** resolver
{
	"depends": ["captain", "citext"],
	"searchPath": "captain, extension"
}
*/


CREATE SEQUENCE "seq_Courier_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE Courier (
	"id" int DEFAULT nextval('"seq_Courier_id"'::regclass),
	"name" citext NOT NULL,
	CONSTRAINT "pk_Courier_id" PRIMARY KEY ("id"),
	CONSTRAINT "unique_Courier_name" UNIQUE ("name")
);

ALTER SEQUENCE "seq_Courier_id" OWNED BY "Courier"."id";

CREATE INDEX "idx_Courier_name" ON "Courier" USING GIN("name");