<h1>Pizza Orders</h1>
<?= $this->Html->link('Add orders', ['action' => 'add']) ?>


<?= $this->Html->link('log IN', ['action' => 'add']) ?>

<?= $this->Html->link('Log Out', ['action' => 'logout','controller'=>'Users']) ?>
<table>
    <tr>
        
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal</th>
        <th>province</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Size</th>
        <th>Crus TYPE</th>
        <th>Topping</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($orders as $orders): ?>

    <tr>
       
        
        <td>          
            <?= $this->Html->link($orders->id, ['action' => 'view', $orders->id]) ?>
         </td>
        <td>          
            <?= $this->Html->link($orders->Name, ['action' => 'view', $orders->id]) ?>
         </td>
       
        <td>
            <?= $this->Html->link($orders->Address, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->City, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Postal, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->province, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Telephone, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Email, ['action' => 'view', $orders->id]) ?>
            
        </td>
        <td>
            <?= $this->Html->link($orders->Size, ['action' => 'view', $orders->id]) ?>
           
        </td>
        <td>
            <?= $this->Html->link($orders->CrusType, ['action' => 'view', $orders->id]) ?>
            
        </td>
        <td>
            <?= $this->Html->link($orders->Toping, ['action' => 'view', $orders->id]) ?>
        </td>

        <td>
            <?= $this->Form->postLink(
                'Complete',
                ['action' => 'Complete', $orders->id])
            ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $orders->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $orders->id]) ?>
        </td>
        
      
    </tr>
    <?php endforeach; ?>
</table>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal</th>
        <th>province</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Size</th>
        <th>Crus TYPE</th>
        <th>Topping</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($CompleteOrders as $orders): ?>

    <tr>
        <td>          
            <?= $this->Html->link($orders->id, ['action' => 'view', $orders->id]) ?>
         </td>
        <td>          
            <?= $this->Html->link($orders->Name, ['action' => 'view', $orders->id]) ?>
         </td>
       
        <td>
            <?= $this->Html->link($orders->Address, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->City, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Postal, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->province, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Telephone, ['action' => 'view', $orders->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($orders->Email, ['action' => 'view', $orders->id]) ?>
            
        </td>
        <td>
            <?= $this->Html->link($orders->Size, ['action' => 'view', $orders->id]) ?>
           
        </td>
        <td>
            <?= $this->Html->link($orders->CrusType, ['action' => 'view', $orders->id]) ?>
            
        </td>
        <td>
            <?= $this->Html->link($orders->Toping, ['action' => 'view', $orders->id]) ?>
        </td>

        <td>
            <?= $this->Form->postLink(
                'Complete',
                ['action' => 'Complete', $orders->id])
            ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $orders->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $orders->id]) ?>
        </td>
        
      
    </tr>
    <?php endforeach; ?>
</table>
