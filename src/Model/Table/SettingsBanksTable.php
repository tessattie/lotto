<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SettingsBanks Model
 *
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\SettingsTable&\Cake\ORM\Association\BelongsTo $Settings
 *
 * @method \App\Model\Entity\SettingsBank get($primaryKey, $options = [])
 * @method \App\Model\Entity\SettingsBank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SettingsBank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SettingsBank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SettingsBank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SettingsBank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SettingsBank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SettingsBank findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsBanksTable extends Table
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

        $this->setTable('settings_banks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Settings', [
            'foreignKey' => 'setting_id',
            'joinType' => 'INNER'
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
            ->numeric('price')
            ->allowEmptyString('price');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));
        $rules->add($rules->existsIn(['setting_id'], 'Settings'));

        return $rules;
    }
}
