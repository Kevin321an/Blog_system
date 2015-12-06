<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($article->title) ?></h1>

<p><?= $this->Html->link(
    'Add Comment', 
    //array('controller' => 'Comments', 'action' => 'add' , $article->id))    
    ['action' => 'add', 'controller' => 'comments', $article->id]) 
?></p>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<table>
    <tr>        
        <th>Comment</th>
        <th>Created</th>
        <th>Approved</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
   
    <?php 
  
    $comments = $article->comments;
	foreach ($comments as $comment): ?>
    <tr>        
        <td><?= $comment->body ?></td>              
        <td>
            <?= $comment->created ?>
        </td>
        <td>
            <?= $comment->approved ?>
        </td>
        <td>
             <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', 'controller' => 'comments', $comment->id],
                ['confirm' => 'Are you sure?'])
            ?>
             <?= $this->Form->postLink(
                'Approve',
                ['action' => 'approveComment', 'controller' => 'comments', $comment->id])
            ?>
            <?= $this->Form->postLink(
                'Disapprove',
                ['action' => 'dComment', 'controller' => 'comments', $comment->id])
            ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>