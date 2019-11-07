<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Seller Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $nif
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $manager_id
 * @property int $bank_id
 * @property int $user_id
 * @property string|null $ci
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\User $user
 */
class Seller extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'address' => true,
        'nif' => true,
        'created' => true,
        'contrat' => true,
        'modified' => true,
        'manager_id' => true,
        'bank_id' => true,
        'user_id' => true,
        'ci' => true,
        'manager' => true,
        'bank' => true,
        'user' => true
    ];

    protected function _getName()
    {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }
}
