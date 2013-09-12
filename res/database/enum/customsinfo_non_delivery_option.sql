/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "customsinfo_non_delivery_options" AS ENUM (
	'abandon',
	'return',
);

CREATE CAST (text AS "customsinfo_non_delivery_options") WITH INOUT AS IMPLICIT;
CREATE CAST ("customsinfo_non_delivery_options" AS text) WITH INOUT AS IMPLICIT;