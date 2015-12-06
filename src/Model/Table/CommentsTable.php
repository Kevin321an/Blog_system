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
class CommentsTable extends Table
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
        $this ->belongsTo('Articles'); 
        
            $this->belongsTo('Articles', [
            'className'=>'Articles',
            'foreignKey'=>'article_id'// in comment table
            ]);
        
          
        $this->table('comments');
        $this->displayField('body');
        $this->primaryKey('id');        
        $this->addBehavior('Timestamp');       
    
    }

  
    
    
}