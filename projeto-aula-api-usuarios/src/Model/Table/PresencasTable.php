<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Presencas Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\EventosTable&\Cake\ORM\Association\BelongsTo $Eventos
 *
 * @method \App\Model\Entity\Presenca newEmptyEntity()
 * @method \App\Model\Entity\Presenca newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Presenca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Presenca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Presenca findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Presenca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Presenca[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Presenca|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Presenca saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Presenca[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Presenca[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Presenca[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Presenca[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PresencasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('presencas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('usuario_id')
            ->allowEmptyString('usuario_id');

        $validator
            ->integer('evento_id')
            ->allowEmptyString('evento_id');

        $validator
            ->dateTime('data_presenca')
            ->allowEmptyDateTime('data_presenca');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('usuario_id', 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn('evento_id', 'Eventos'), ['errorField' => 'evento_id']);

        return $rules;
    }
}
