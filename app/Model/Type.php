<?php
/**
 * Type
 *
 * PHP version 5
 *
 * @category Model
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class Type extends AppModel {
/**
 * Model name
 *
 * @var string
 * @access public
 */
    public $name = 'Type';
/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
    public $actsAs = array(
        'Cached' => array(
            'prefix' => array(
                'cms_types_',
                'types_',
                'type_',
            ),
        ),
        'Params',
    );
/**
 * Validation
 *
 * @var array
 * @access public
 */
    public $validate = array(
        'title' => array(
            'rule' => array('minLength', 1),
            'message' => 'Title cannot be empty.',
        ),
        'alias' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This alias has already been taken.',
            ),
            'minLength' => array(
                'rule' => array('minLength', 1),
                'message' => 'Alias cannot be empty.',
            ),
        ),
    );
/**
 * Model associations: hasAndBelongsToMany
 *
 * @var array
 * @access public
 */
    public $hasAndBelongsToMany = array(
        'Vocabulary' => array(
            'className' => 'Vocabulary',
            'joinTable' => 'types_vocabularies',
            'foreignKey' => 'type_id',
            'associationForeignKey' => 'vocabulary_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => 'Vocabulary.weight ASC',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => '',
        ),
    );
}
