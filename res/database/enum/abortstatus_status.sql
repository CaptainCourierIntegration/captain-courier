/** resolver
{
    "depends": ["captain"],
    "searchPath": "captain"
}
*/

CREATE TYPE "abortstatus_status" AS ENUM (
	'success',
	'rejected'
);

CREATE CAST (text AS "abortstatus_status") WITH INOUT AS IMPLICIT;
CREATE CAST ("abortstatus_status" AS text) WITH INOUT AS IMPLICIT;