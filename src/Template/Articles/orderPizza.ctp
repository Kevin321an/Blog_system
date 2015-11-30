<!-- File: src/Template/Articles/add.ctp -->

<h1>Your pizza order</h1>
<?php
    echo $this->Form->create($Name);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>