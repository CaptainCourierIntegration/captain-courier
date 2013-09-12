/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "shipmentstate" AS ENUM (
	'active',
	'cancelled',
	'collected',
	'delivered',
	'returned',
	'undelivered'
);

CREATE CAST (text AS "shipmentstate") WITH INOUT AS IMPLICIT;
CREATE CAST ("shipmentstate" AS text) WITH INOUT AS IMPLICIT;