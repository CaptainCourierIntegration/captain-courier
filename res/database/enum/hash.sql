/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE hash AS ENUM (
	'MD5',
	'SHA1',
	'SHA256'
);

CREATE CAST (text AS hash) WITH INOUT AS IMPLICIT;
CREATE CAST (hash AS text) WITH INOUT AS IMPLICIT;