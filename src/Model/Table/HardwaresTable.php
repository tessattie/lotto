<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hardwares Model
 *
 * @property &\Cake\ORM\Association\HasMany $Banks
 *
 * @method \App\Model\Entity\Hardware get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hardware newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hardware[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hardware|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hardware saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hardware patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hardware[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hardware findOrCreate($search, callable $callback = null, $options = [])
 */
class HardwaresTable extends Table
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

        $this->setTable('hardwares');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Banks', [
            'foreignKey' => 'hardware_id'
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

        return $validator;
    }
}
