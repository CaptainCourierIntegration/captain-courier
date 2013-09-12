/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "customsinfo_content_type" AS ENUM (
	'documents',
	'gift',
	'merchandise',
	'returned_goods',
	'sample',
	'other'
);

CREATE CAST (text AS "customsinfo_content_type") WITH INOUT AS IMPLICIT;
CREATE CAST ("customsinfo_content_type" AS text) WITH INOUT AS IMPLICIT;