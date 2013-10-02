/** resolver
{
	"depends": ["captain", "Shipment", "Label", "citext"],
	"searchPath": "captain, extension"
}
*/


CREATE SEQUENCE "seq_Recipt_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;


CREATE TABLE "Recipt" (
	"id" int DEFAULT nextval('"seq_Recipt_id"'::regclass),
	"quoteId" int,
	"contractNumber" citext NOT NULL,
	CONSTRAINT "pk_Recipt" PRIMARY KEY ("id"),
	CONSTRAINT "fk_Recipt_quoteId" FOREIGN KEY ("quoteId") REFERENCES "Quote" ("id")
);

ALTER SEQUENCE "seq_Recipt_id" OWNED BY "Recipt"."id";

CREATE INDEX "idx_Recipt_quoteId" ON "Recipt" USING BTREE("quoteId");
