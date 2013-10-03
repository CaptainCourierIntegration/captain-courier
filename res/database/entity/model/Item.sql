/** resolver
{
    "depends" : [ "captain", "Country", "Parcel", "extension", "citext" ],
    "searchPath" : "captain, extension"
}
*/

CREATE SEQUENCE "seq_Item_id"
	START WITH 1
	INCREMENT BY 1
	NO MAXVALUE
	NO MINVALUE
	CACHE 1;

CREATE TABLE "Item" (
	id int NOT NULL DEFAULT nextval('"seq_Item_id"'::regclass),
	description citext NOT NULL,
	quantity int NOT NULL,
	weight int NOT NULL,
	"originCountryCode" character(2),
	"hsTarrifNumber" citext,
	"createdTimestamp" timestamp DEFAULT now(),
	CONSTRAINT "pk_Item" primary key (id),
	CONSTRAINT "fk_Item_originCountryCode" FOREIGN KEY ("originCountryCode") REFERENCES "Country" ("cc")
);

ALTER SEQUENCE "seq_Item_id" OWNED BY "Item"."id";
CREATE INDEX "idx_Item_originCountryCode" ON "Item" USING BTREE ("originCountryCode")