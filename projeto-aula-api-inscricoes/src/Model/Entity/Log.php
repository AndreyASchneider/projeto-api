<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $timestamp
 * @property string|null $method
 * @property string|null $endpoint
 * @property string|null $request_body
 */
class Log extends Entity
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
        'timestamp' => true,
        'method' => true,
        'endpoint' => true,
        'request_body' => true,
    ];
}
