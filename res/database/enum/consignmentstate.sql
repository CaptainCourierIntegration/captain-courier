/** resolver
{
    "depends": ["captain", "citext", "Country"],
    "searchPath": "captain, extension"
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