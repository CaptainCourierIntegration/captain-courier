/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "customsinfo_non_delivery_option" AS ENUM (
	'abandon',
	'return'
);

CREATE CAST (text AS "customsinfo_non_delivery_option") WITH INOUT AS IMPLICIT;
CREATE CAST ("customsinfo_non_delivery_option" AS text) WITH INOUT AS IMPLICIT;