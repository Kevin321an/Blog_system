<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class UsersTable extends Table
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
        
        //one to many relationship
        
        $this->hasMany('Articles', [
            'className'=>'Articles'
            ]);
        
        /*$this->hasMany('PendingOrders', [
            'className'=>"orders", 
            'conditions' => ['Complete' => '0']
            ]);
        
        $this->hasMany('completeOrders', [
            'className'=>"orders", 
            'conditions' => ['Complete' => '1']
            ]);
        
        $this-> hasMany('orders');      */           

    }
    
    

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
?>
