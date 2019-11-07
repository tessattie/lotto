<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banks Model
 *
 * @property \App\Model\Table\ManagersTable&\Cake\ORM\Association\BelongsTo $Managers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property &\Cake\ORM\Association\HasMany $Photos
 * @property \App\Model\Table\SellersTable&\Cake\ORM\Association\HasMany $Sellers
 * @property &\Cake\ORM\Association\BelongsToMany $Settings
 *
 * @method \App\Model\Entity\Bank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bank findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BanksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('banks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id'
        ]);

        $this->belongsTo('Owners', [
            'foreignKey' => 'owner_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Photos', [
            'foreignKey' => 'bank_id'
        ]);
        $this->hasMany('Sellers', [
            'foreignKey' => 'bank_id'
        ]);
        $this->belongsToMany('Settings', [
            'foreignKey' => 'bank_id',
            'targetForeignKey' => 'setting_id',
            'joinTable' => 'settings_banks'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('lattitude')
            ->maxLength('lattitude', 255)
            ->allowEmptyString('lattitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 255)
            ->allowEmptyString('longitude');

        $validator
            ->integer('rooms')
            ->allowEmptyString('rooms');

        $validator
            ->date('rental_date')
            ->allowEmptyDate('rental_date');

        $validator
            ->numeric('price')
            ->allowEmptyString('price');

        $validator
            ->date('expiration')
            ->allowEmptyDate('expiration');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
