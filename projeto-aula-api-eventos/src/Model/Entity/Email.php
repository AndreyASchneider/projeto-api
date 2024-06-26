<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $id
 * @property string|null $destinatario
 * @property string|null $assunto
 * @property string|null $corpo
 * @property \Cake\I18n\FrozenTime|null $data_envio
 */
class Email extends Entity
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
        'destinatario' => true,
        'assunto' => true,
        'corpo' => true,
        'data_envio' => true,
    ];
}
