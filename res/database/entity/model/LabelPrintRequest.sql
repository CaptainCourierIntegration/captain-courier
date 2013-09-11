/** resolver
{
    "depends" : [ "captain", "Parcel" ],
    "searchPath" : "captain, extension"
}
*/

CREATE SEQUENCE "seq_LabelPrintRequest_id"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


CREATE SEQUENCE "seq_LabelPrintRequest_order"
START WITH 1
INCREMENT BY 1
NO MAXVALUE
NO MINVALUE
CACHE 1;


CREATE TABLE "LabelPrintRequest" (
    "id" int NOT NULL DEFAULT nextval('"seq_LabelPrintRequest_id"'::regclass),
	"parcelId" int NOT NULL,
	"timestamp" timestamp NOT NULL DEFAULT now(),
	"order" int NOT NULL DEFAULT nextval('"seq_LabelPrintRequest_order"'::regclass), /* for sorting the requests into order */
    CONSTRAINT "pk_LabelPrintRequest" PRIMARY KEY (id),
	CONSTRAINT "fk_LabelPrintRequest_parcelId" FOREIGN KEY ("parcelId") REFERENCES "Parcel" ("id")
);

ALTER SEQUENCE "seq_LabelPrintRequest_id" OWNED BY "LabelPrintRequest"."id";


CREATE INDEX "idx_LabelPrintRequest_parcelId" ON "LabelPrintRequest" USING BTREE ("parcelId");
CREATE INDEX "idx_LabelPrintRequest_order" ON "LabelPrintRequest" USING BTREE ("order");
