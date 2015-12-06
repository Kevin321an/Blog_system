<!-- File: src/Template/Articles/add.ctp -->
<?= debug($art_id) ?>
<h1>Add comment</h1>
<?php
  	
    echo $this->Form->create($comment, ['action' => 'add']);
    //echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Comment'));
    echo $this->Form->end();
?>