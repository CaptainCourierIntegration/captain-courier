/** resolver
{
    "depends": ["common", "citext", "Country"],
    "searchPath": "common, extension"
}
*/

CREATE SEQUENCE "seq_Address_id"
START WITH 1
INCREMENT BY 1
NO MINVALUE
NO MAXVALUE
CACHE 1;

CREATE TABLE "Address" (
	id int NOT NULL DEFAULT nextval(
		'"seq_Address_Id"' :: regclass),
	name citext NOT NULL,
	line1 citext NOT NULL,
	line2 citext NOT NULL,
	line3 citext NOT NULL,
	line4 citext NOT NULL,
	line5 citext NOT NULL,
	postcode citext NOT NULL,
	cc character(2) NOT NULL,
	CONSTRAINT "pk_Address" PRIMARY KEY (id),
	CONSTRAINT "fk_Address_cc" FOREIGN KEY ("cc") REFERENCES "Country" (cc) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER SEQUENCE "seq_Address_id" OWNED BY "Address".id;

CREATE INDEX "idx_Address_cc" ON "Address" USING BTREE ("cc");




