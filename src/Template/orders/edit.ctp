<h1>Edit Orders</h1>
<?php
    echo $this->Form->create($order);
    echo $this->Form->input('Name');
    echo $this->Form->input('Address', ['rows' => '3']);
    echo $this->Form->input('City');
    echo $this->Form->input('province');
    echo $this->Form->input('Postal');
    echo $this->Form->input('Telephone');
    echo $this->Form->input('Email',['type' => 'email']);
    /*echo $this->Form->input('Size', array('options' => array("Small", "MEDIUM", "LARGE", "EXTRA LARGE"),'empty' => '(Pick the size of your pizza)'));*/
   /* $optionsSize = array('Small' => 'Small', 'MEDIUM' => 'MEDIUM', 'LARGE' => 'LARGE', 'EXTRA LARGE' => 'EXTRA LARGE' );
	$attributesSize = array('legend' => false);
	echo $this->Form->radio('Size', $optionsSize, $attributesSize);*/
	echo "Pizza Size:";
	echo $this->Form->radio(
    'Size',
    [
        ['value' => 'Small', 'text' => 'Small'],['value' => 'MEDIUM', 'text' => 'MEDIUM'],
        ['value' => 'LARGE', 'text' => 'LARGE'],
        ['value' => 'EXTRA LARGE', 'text' => 'EXTRA LARGE'],
    ]
);
	echo "Crus Type:";
	/*echo $this->Form->label('Crus Type:');*/
	echo $this->Form->radio(
    'CrusType',
    [
        ['value' => 'HAND TOSSED', 'text' => 'HAND TOSSED'],
        ['value' => 'PAN', 'text' => 'PAN'],
        ['value' => 'STUFFED', 'text' => 'STUFFED'],
        ['value' => 'THIN', 'text' => 'THIN'],
    ]
);
	/*echo $this->Form->input('Toping', ['type' => 'checkbox']);*/
	
   /* echo $this->Form->label('HAND TOSSED');
    echo $this->Form->checkbox('Toping', ['value' => "HAND TOSSED"]);*/
    
  
    echo "Topping:";
    $tops = array(
    array(
        'name' => 'Almonds', 
        'value' => 'Almonds', 
        'class' => 'first'
    ),
    array(
        'name' => 'Basil', 
        'value' => 'Basil'
    ),
    array(
        'name' => 'Whitebai', 
        'value' => 'Whitebai'
    ),
    array(
        'name' => 'Salmon', 
        'value' => 'Salmon'
    ),
    array(
        'name' => 'Red Beans', 
        'value' => 'Beans'
    )               
    );

    echo $this->Form->input('Toping', array(
    'options' => $tops,
    'div' => 'input checkboxes',
    'multiple' => 'checkbox',
    'label' => false
    ));



    echo $this->Form->button(__('Save Orders'));
    echo $this->Form->end();
?>