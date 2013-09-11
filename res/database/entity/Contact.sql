/** resolver
{
    "depends": ["captain", "citext", "Country"],
    "searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_Contact_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "Contact" (
    "id" int NOT NULL DEFAULT nextval('"seq_Contact_id"'::regclass),
	"businessName" citext DEFAULT "home",
	"name" citext NOT NULL,
	"email" citext NOT NULL,
	"telephone" citext NOT NULL,
    CONSTRAINT "pk_Contact" PRIMARY KEY (id)
);

ALTER SEQUENCE "seq_Contact_id" OWNED BY "Contact"."id";

CREATE INDEX "idx_Contact_businessName" ON "Contact" USING GIN("businessName");
CREATE INDEX "idx_Contact_name" ON "Contact" USING GIN("name");
CREATE INDEX "idx_Contact_email" ON "Contact" USING GIN("email");