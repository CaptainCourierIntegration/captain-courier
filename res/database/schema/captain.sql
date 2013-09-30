/** resolver
{
    "depends": [
        "common",
        "extension"
    ]
}
*/

CREATE SCHEMA "captain";

-- anonymous code block to get around the failure to alter the 'current database'
-- ANSI standard interval style for compatability with Php. Think Bond\Entity\Types\Interval
DO language plpgsql $$
DECLARE
    db text := quote_ident( current_database() );
BEGIN
    EXECUTE 'ALTER DATABASE ' || db || ' SET search_path TO captain, common, extension;';
END;
$$;