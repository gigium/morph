<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pilldispensers Model
 *
 * @method \App\Model\Entity\Pilldispenser get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pilldispenser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pilldispenser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pilldispenser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pilldispenser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pilldispenser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pilldispenser findOrCreate($search, callable $callback = null, $options = [])
 */
class PilldispensersTable extends Table
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

        $this->table('pilldispensers');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->integer('id_user')
            ->allowEmpty('id_user');

        return $validator;
    }
}
