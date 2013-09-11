/** Resolver
{
    "depends": [],
    "searchPath": ""
}
 */

CREATE SEQUENCE "seq_Item_id"
START WITH 1
INCREMENT BY 1
NO MAXVALUE
NO MINVALUE
CACHE 1;


CREATE TABLE "Item" (
	id int NOT NULL,
	"parcelId" int NOT NULL,
	name text NOT NULL,
	quantity int NOT NULL,
	CONSTRAINT "pk_Item" primary key (id),
	CONSTRAINT "fk_Item_parcelId" FOREIGN KEY ("parcelId") REFERENCES "Parcel" (id)
);

CREATE INDEX "idx_Item_parcelId" ON "Item" USING BTREE ("parcelId");