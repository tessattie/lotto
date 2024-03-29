<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $role_id
 * @property int $status
 * @property int $first_login
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Folder[] $folders
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'email' => true,
        'role_id' => true,
        'status' => true,
        'first_login' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'files' => true,
        'folders' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _getName()
    {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }


    protected function _setPassword($password){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
