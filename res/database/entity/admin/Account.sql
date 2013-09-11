/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE SEQUENCE "seq_Account_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "Account" (
    "id" int NOT NULL DEFAULT nextval('"seq_Account_id"'::regclass),
	"createTimestamp" timestamp NOT NULL DEFAULT now(),
    CONSTRAINT "pk_Account" PRIMARY KEY (id)
);

ALTER SEQUENCE "seq_Account_id" OWNED BY "Account"."id";
