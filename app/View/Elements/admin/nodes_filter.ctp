<?php
    if (isset($this->request->params['named']['filter'])) {
        $this->Html->scriptBlock('var filter = 1;', array('inline' => false));
    }
?>
<?php
    echo $this->Form->create('Filter' , array('class' => 'normal search-form'));
    $filterType = '';
    if (isset($filters['type'])) {
        $filterType = $filters['type'];
    }
		$types = Set::sort($types, '{n}.Type.title', 'asc');
		$types = Set::combine($types, '{n}.Type.alias', '{n}.Type.title');
    echo $this->Form->input('Filter.type', array(
				'options' => $types,
        'empty' => __l('Please Select'),
        'value' => $filterType,
    ));
    $filterStatus = '';
    if (isset($filters['status'])) {
        $filterStatus = $filters['status'];
    }
    echo $this->Form->input('Filter.status', array(
        'options' => array(
            '1' => __l('Published'),
            '0' => __l('Unpublished'),
        ),
        'empty' => __l('Please Select'),
        'value' => $filterStatus,
    ));

    $filterSearch = '';
    if (isset($this->request->params['named']['q'])) {
        $filterSearch = $this->request->params['named']['q'];
    }
    echo $this->Form->input('Filter.q', array(
        'label' => __l('Search'),
        'value' => $filterSearch,
    ));
  echo $this->Form->submit(__l('Filter'));
  echo $this->Form->end(); 
?>
