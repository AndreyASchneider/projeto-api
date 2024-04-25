<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PresencasFixture
 */
class PresencasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'usuario_id' => 1,
                'evento_id' => 1,
                'data_presenca' => '2024-04-24 19:32:56',
            ],
        ];
        parent::init();
    }
}
