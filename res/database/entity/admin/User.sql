/** resolver
{
    "depends": ["captain", "Account", "Authentication", "citext", "uuid-ossp"],
    "searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_User_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;

CREATE TABLE "User" (
    "id" int NOT NULL DEFAULT nextval('"seq_User_id"'::regclass),
	"accountId" int NOT NULL,
	"email" text NOT NULL,
	"authenticationId" int NOT NULL,
	"apiKey" uuid NOT NULL DEFAULT uuid_generate_v4(),
    CONSTRAINT "pk_User" PRIMARY KEY (id),
	CONSTRAINT "fk_User_accountId" FOREIGN KEY ("accountId") REFERENCES "Account" ("id"),
	CONSTRAINT "fk_User_authenticationId" FOREIGN KEY ("authenticationId") REFERENCES "Authentication" ("id")
);

ALTER SEQUENCE "seq_User_id" OWNED BY "User"."id";

CREATE INDEX "idx_User_accountId" ON "User" USING BTREE ("accountId");
CREATE INDEX "idx_User_authenticationId" ON "User" USING BTREE ("authenticationId");
CREATE INDEX "idx_User_apiKey" ON "User" USING BTREE("apiKey");



