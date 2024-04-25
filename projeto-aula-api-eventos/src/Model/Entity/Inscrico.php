<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inscrico Entity
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property int|null $evento_id
 * @property \Cake\I18n\FrozenTime|null $data_inscricao
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Evento $evento
 */
class Inscrico extends Entity
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
        'usuario_id' => true,
        'evento_id' => true,
        'data_inscricao' => true,
        'usuario' => true,
        'evento' => true,
    ];
}
