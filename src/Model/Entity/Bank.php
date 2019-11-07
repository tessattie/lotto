<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bank Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $manager_id
 * @property string|null $address
 * @property string|null $lattitude
 * @property string|null $longitude
 * @property int|null $rooms
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate|null $rental_date
 * @property float|null $price
 * @property \Cake\I18n\FrozenDate|null $expiration
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Seller[] $sellers
 */
class Bank extends Entity
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
        'name' => true,
        'manager_id' => true,
        'owner_id' => true,
        'address' => true,
        'lattitude' => true,
        'longitude' => true,
        'rooms' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'rental_date' => true,
        'price' => true,
        'expiration' => true,
        'manager' => true,
        'owner' => true,
        'user' => true,
        'sellers' => true
    ];
}
