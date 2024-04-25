<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InscricoesFixture
 */
class InscricoesFixture extends TestFixture
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
                'data_inscricao' => '2024-04-24 16:30:27',
            ],
        ];
        parent::init();
    }
}
