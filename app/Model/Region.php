<?php
/**
 * Region
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
class Region extends AppModel {
/**
 * Model name
 *
 * @var string
 * @access public
 */
    public $name = 'Region';
/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
    public $actsAs = array(
        'Cached' => array(
            'prefix' => array(
                'region_',
                'cms_regions',
                'block_',
                'cms_blocks_',
            ),
        ),
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
 * Model associations: hasMany
 *
 * @var array
 * @access public
 */
    public $hasMany = array(
        'Block' => array(
            'className' => 'Block',
            'foreignKey' => 'region_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '3',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ),
    );
}
