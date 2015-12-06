<!-- File: src/Template/Articles/index.ctp -->

<h1>Blog articles</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Authors</th>
        <th>Created</th>
        <th>Action</th>
        <th>Tag</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
        <!--    php foreach ($articles->comments as $comment): -->
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
                <!--show the author name-->
            <?= $article->author->username?>
        </td>

        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($article->tag->name, ['action' => 'viewByTag', $article->tag->name]) ?>          
        </td>
        
    </tr>
    <?php endforeach; ?>
</table>

