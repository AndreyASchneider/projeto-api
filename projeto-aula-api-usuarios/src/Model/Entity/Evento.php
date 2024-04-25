<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenDate|null $data
 * @property \Cake\I18n\Time|null $hora
 * @property string|null $local
 * @property string|null $descricao
 *
 * @property \App\Model\Entity\Inscrico[] $inscricoes
 */
class Evento extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nome' => true,
        'data' => true,
        'hora' => true,
        'local' => true,
        'descricao' => true,
        'inscricoes' => true,
    ];
}
