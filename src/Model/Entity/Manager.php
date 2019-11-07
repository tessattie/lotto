<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manager Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $ci
 * @property string|null $nif
 * @property float|null $frais_fonctionnement
 * @property string|null $contrat
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Seller[] $sellers
 */
class Manager extends Entity
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
        'ci' => true,
        'nif' => true,
        'frais_fonctionnement' => true,
        'contrat' => true,
        'created' => true,
        'modified' => true,
        'sellers' => true
    ];

    protected function _getName()
    {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }
}
