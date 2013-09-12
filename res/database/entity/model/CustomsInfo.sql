/** resolver
{
    "depends" : [ "captain", "customsinfo_content_type", "customsinfo_non_delivery_option, "customsinfo_restriction_type", "citext" ],
    "searchPath" : "captain, extension"
}
*/

CREATE SEQUENCE "seq_CustomsInfo_id"
START WITH 1
INCREMENT BY 1
NO MAXVALUE
NO MINVALUE
CACHE 1;


CREATE TABLE "CustomsInfo" (
	id int NOT NULL DEFAULT nextval('"seq_CustomsInfo_id"'::regclass),
	"contentType" customsinfo_content_type NOT NULL,
	"contentsExplanation" citext,
	"customsCertify" bool NOT NULL,
	"customsSigner" citext,
	"nonDeliveryOption" customsinfo_non_delivery_option NOT NULL,
	"restrictionType" customsinfo_restriction_type NOT NULL,
	"restrictionComments" citext,
	"createdTimestamp" timestamp DEFAULT now()
);

ALTER SEQUENCE "seq_CustomsInfo_id" OWNED BY "CustomsInfo"."id";