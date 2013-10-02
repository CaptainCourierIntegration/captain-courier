<?php

namespace CaptainCourier\CaptainBundle;

use Bond\Container;
use Bond\EntityManager;
use Bond\RecordManager;

use Bond\MagicGetter;
use Bond\Sql\Query;

use Bond\Random;
use Bond\Profiler;

class TestDatabasePopulator
{

    use MagicGetter;

    private $em;

    public function __construct( EntityManager $em, $trashDatabaseFirst = true )
    {
        $this->em = $em;

        // trash the database first
        if( $trashDatabaseFirst ) {
            $this->em->db->query(new Query("SELECT build.truncate_db()"));
        }
    }

    public function build()
    {

        $users = $this->genUsers();

        $rm = $this->em->recordManager;

        $profiler = new Profiler( "Import Data" );
        $profiler->log('start');

        $rm->newTransaction('users');
        $rm->persist( $users );
        $profiler->log('taxcode');

        $rm->flush();

    }

    private function genUsers()
    {

        $account = $this->em['Account']->make();

        $pete = $this->em['User']->make([
            'Account' => $account,
            'email' => 'test@test.com',
            'Authentication' => $this->em['Authentication']->make([
                'hashType' => 'SHA1',
                'hash' => 'test',
                'salt' => 'salt'
            ]),
        ]);

        $t = $this->em['User']->make([
            'Account' => $this->em['Account']->make(),
            'email' => 't',
            'Authentication' => $this->em['Authentication']->make([
                'hashType' => 'SHA1',
                'hash' => 't',
                'salt' => null
            ]),
        ]);
        return new Container($pete, $t);
    }

}
