/** resolver
{
    "depends": ["common", "citext", "Country"],
    "searchPath": "common, extension"
}
*/

CREATE TYPE "consignmentstate" AS ENUM (
	'active',
	'cancelled',
	'collected',
	'delivered',
	'returned',
	'undelivered'
);

CREATE CAST (text AS "consignmentstate") WITH INOUT AS IMPLICIT;
CREATE CAST ("consignmentstate" AS text) WITH INOUT AS IMPLICIT;