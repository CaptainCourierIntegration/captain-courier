/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "customsinfo_restriction_type" AS ENUM (
	'none',
	'other',
	'quarantine',
	'sanitary_phytosanitary_inspection'
);

CREATE CAST (text AS "customsinfo_restriction_type") WITH INOUT AS IMPLICIT;
CREATE CAST ("customsinfo_restriction_type" AS text) WITH INOUT AS IMPLICIT;