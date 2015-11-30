<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($article->title) ?></h1>

<p><?= $this->Html->link('Add Comment', ['action' => 'add', 'controller' => 'comments',$article->id]) ?></p>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<table>
    <tr>
        
        <th>Comment</th>
        
        <th>Created</th>
        <th>Approved</th>
       
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
        <!--    php foreach ($articles->comments as $comment): -->
    <?php 
    //$query = $article->find('all')->contain(['Comments']);
    $comments = $article->comments;
    debug($article); 
    debug($comments);
    //debug($comments);
	foreach ($comments as $comment): /*{
    echo $article->comments[0]->text;
    foreach ($articles as $article):*/ ?>
    <tr>
        <td><?= $comment->body ?></td>              
        <td>
            <?= $comment->created ?>
        </td>
        <td>
            <?= $comment->approved ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>