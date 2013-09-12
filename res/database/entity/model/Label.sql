/** resolver
{
	"depends": ["captain", "citext"],
	"searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_Label_id"
	START WITH 1
	INCREMENT BY 1
	NO MINVALUE
	NO MAXVALUE
	CACHE 1;

CREATE TABLE "Label" (
	"id" int DEFAULT nextval('"seq_Label_id"'::regclass),
	"resolution" int,
	"size" citext,
	"type" citext,
	"pdfUri" text,
	"createTimestamp" timestamp DEFAULT now(),
	CONSTRAINT "pk_Label" PRIMARY KEY ("id")
);


ALTER SEQUENCE "seq_Label_id" OWNED BY "Label"."id";

