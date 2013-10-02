/** resolver
{
    "depends": ["captain", "hash"],
    "searchPath": "captain"
}
*/

CREATE SEQUENCE "seq_Authentication_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "Authentication" (
    "id" int NOT NULL DEFAULT nextval('"seq_Authentication_id"'::regclass),
	"hashType" hash NOT NULL DEFAULT 'SHA1',
	"hash" text NOT NULL,
	"salt" text,
    CONSTRAINT "pk_Authentication" PRIMARY KEY (id)
);

ALTER SEQUENCE "seq_Authentication_id" OWNED BY "Authentication"."id";
