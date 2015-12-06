<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comment Controller
 *
 * @property \App\Model\Table\CommentTable $Comment
 */
class CommentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles']
        ];
        $this->set('comments', $this->paginate($this->Comment));
        $this->set('_serialize', ['comment']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comments = $this->Comments->get($id, [
            'contain' => ['Articles']
        ]);
        $this->set('comments', $comments);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    
    public function add($id = null)
    {
         
        $articlesID = $id;        
        $this->set('art_id', $articlesID);
        $this->set('_serialize', ['art_id']);  
         //debug($comments);
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);            
            //$comment->article_id = 3;
            //$this->Flash->error(__($articlesID));
            //debug($id);                                                                                                       
            //$this->Orders->save($order);
            //debug($comment);
            $comment->article_id = $art_id;
            $comment->approved = false;
            
            $comment->user_id = $this->Auth->user('id'); 
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'index','controller' => 'articles']);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
             }
         }
        //$articles = $this->Comments->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment'));
        $this->set('_serialize', ['comment']);
    }

      public function approveComment($id = null)
    {


        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);
        debug ($comment);
        
        //$order = $this->Orders->get($id); 
        $comment->approved= 1;
        $this->Comments->save($comment);
      
                $this->Flash->success(__('The order has been completed.'));
                return $this->redirect(['action' => 'index','controller' => 'Articles']);
   
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comment->patchEntity($comment, $this->request->data);
            $comment->approved = 0;
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Comment->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'articles'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   
        $this->Flash->success(__($id));
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {    
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index','controller' => 'articles']);
        //'action' => 'delete', 'controller' => 'comments'
    }
}
