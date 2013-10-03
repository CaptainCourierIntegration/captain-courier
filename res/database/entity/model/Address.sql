/** resolver
{
    "depends": ["captain", "citext", "Country"],
    "searchPath": "captain, extension"
}
*/

CREATE SEQUENCE "seq_Address_id"
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;

CREATE TABLE "Address" (
	"id" int NOT NULL DEFAULT nextval('"seq_Address_id"' :: regclass),
	"companyName" citext,
	"name" citext,
	"phone" citext,
	"email" citext,
	line1 citext NOT NULL,
	line2 citext,
	line3 citext,
	line4 citext,
	line5 citext,
	"town" citext,
	"county" citext,
	"postcode" citext NOT NULL,
	"cc" character(2) NOT NULL,
	"createdTimestamp" timestamp DEFAULT now(),
	CONSTRAINT "pk_Address" PRIMARY KEY (id),
	CONSTRAINT "fk_Address_cc" FOREIGN KEY ("cc") REFERENCES "Country" (cc) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER SEQUENCE "seq_Address_id" OWNED BY "Address".id;

CREATE INDEX "idx_Address_cc" ON "Address" USING BTREE ("cc");




