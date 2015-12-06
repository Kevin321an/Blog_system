<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    
     public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

     public function viewByTag($tag = null ){
             
        $this->set('tagName', $tag);
        $this->set('_serialize', ['tagName']);  

        $this->set('articles', $this->Articles->find('all')->contain(['Authors', 'Comments', 'Tags']));
        $query = $this->Articles->find('all')->contain(['Authors', 'Comments', 'Tags'])
            -> where (['name' => $tag]);
        $this->set('query', $query);
        $this->set('_serialize', ['query']);     
    }
    /**
     * Index method
     *
     * @return void
     */
   public function index()
    {
        $this->set('articles', $this->Articles->find('all')->contain(['Authors', 'Comments', 'Tags']));
        
    }
    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   public function view($id)

    {

        //Check the authentication: only admit can access unproved comments
        $user = $this->Auth->user();
        if (parent::isAuthorized($user)) {                
                $article = $this->Articles->get($id,[
                    'contain' => ['Comments']
                ]);
            }
            else{
                $article = $this->Articles->get($id,[
                    'contain' => ['Comments' => function($query){
                        return $query
                        ->where(['approved' => 1]);
                    }]
                ]);              
       
               /* $query = $article
                    ->find()                
                    ->where(['approved' => 1]);
                    */

                // $article = $this->Articles->get($id);
                //  $article = $this->Articles->get($id,[
                //     'contain' => ['Comments'] =>where(['approved' => 1]) 
                // ]);               

            }
       
        $this->set(compact('article'));
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
     public function add( $id = null)
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            //The user() function provided by the component returns any column from the currently logged in user. We used this method to add the data                       into the request info that is saved.
            $article->user_id = $this->Auth->user('id');

            $data = [
                'user_id' => $this->Auth->user('id'),
                'tag' => [
                    'id' => $id,
                    'name' => 'game'
                ]
            ];
            //$articles = TableRegistry::get('Articles');
            $article = $articles->newEntity($data, [
                'associated' => ['Tags']
            ]);
            $articles->save($article);

            //$article->tags->id = $id;            
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Articles->patchEntity($article, $newData);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    public function edit($id = null)
        {
            $article = $this->Articles->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->data);
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
            }

            $this->set('article', $article);
        }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }
        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $articleId = (int)$this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }

}
