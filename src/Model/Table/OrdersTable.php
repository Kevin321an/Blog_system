<?php
namespace App\Model\Table;

use App\Model\Entity\Article;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 */
class OrdersTable extends Table
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
        
        

        $this->table('orders');
        $this->displayField('Name');
        $this->primaryKey('id');       

    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('Name')
            ->requirePresence('Address')
            ->add('Telephone', [
                    'length' => [
                        'rule' => ['minLength', 10],
                        'message' => 'Telephone need to be 10 characters long',
                    ]
                ])            
            ->requirePresence('Email');
            /*->notEmpty('Size');*/

        return $validator;
    }
    
    
    public function isOwnedBy($articleId, $userId)
{
    return $this->exists(['id' => $articleId, 'user_id' => $userId]);
}

 
}
?>
