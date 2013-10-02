/** resolver
{
	"depends": ["captain"],
	"searchPath": "captain"
}
*/


CREATE TABLE "ItemLinkShipment" (
	"itemId" int NOT NULL,
	"shipmentId" int NOT NULL,
	"createTimestamp" timestamp NOT NULL DEFAULT now(),
	CONSTRAINT "pk_ItemLinkShipment" PRIMARY KEY ("itemId", "shipmentId")
);

