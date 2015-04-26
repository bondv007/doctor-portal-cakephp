<?php
App::uses('CmsNav', 'Lib');
class CmsNavTest extends CakeTestCase {

    protected static $_menus = array();

    public function setUp() {
        parent::setUp();
        static::$_menus = CmsNav::items();
    }

    public function tearDown() {
        parent::tearDown();
        CmsNav::items(static::$_menus);
    }
    
    public function testNav() {
        $saved = CmsNav::items();
        
        // test clear
        CmsNav::clear();
        $items = CmsNav::items();
        $this->assertEqual($items, array());
        
        // test first level addition
        $defaults = CmsNav::getDefaults();
        $extensions = array('title' => 'Extensions');
        CmsNav::add('extensions', $extensions);
        $result = CmsNav::items();
        $expected = array('extensions' => Set::merge($defaults, $extensions));
        $this->assertEqual($result, $expected);
        
        // tested nested insertion (1 level)
        $plugins = array('title' => 'Plugins');
        CmsNav::add('extensions.children.plugins', $plugins);
        $result = CmsNav::items();
        $expected['extensions']['children']['plugins'] = Set::merge($defaults, $plugins);
        $this->assertEqual($result, $expected);
        
        // 2 levels deep
        $example = array('title' => 'Example');
        CmsNav::add('extensions.children.plugins.children.example', $example);
        $result = CmsNav::items();
        
        $expected['extensions']['children']['plugins']['children']['example'] = Set::merge($defaults, $example);
        $this->assertEqual($result, $expected);

        CmsNav::items($saved);
        $this->assertEquals($saved, CmsNav::items());
    }

    public function testNavMerge() {
        $foo = array('title' => 'foo', 'access' => array('public', 'admin'));
        $bar = array('title' => 'bar', 'access' => array('admin'));
        CmsNav::clear();
        CmsNav::add('foo', $foo);
        CmsNav::add('foo', $bar);
        $items = CmsNav::items();
        $expected = array('admin', 'public');
        sort($expected);
        sort($items['foo']['access']);
        $this->assertEquals($expected, $items['foo']['access']);
    }

    public function testNavOverwrite() {
        $defaults = CmsNav::getDefaults();

        $items = CmsNav::items();
        $expected = Set::merge($defaults, array(
            'title' => 'Permissions',
            'url' => array(
                'admin' => true,
                'controller' => 'acl_permissions',
                'action' => 'index',
                ),
            'access' => array('admin'),
            'weight' => 30,
            ));
        $this->assertEquals($expected, $items['users']['children']['permissions']);

        $item = array(
            'title' => 'Permissions',
            'url' => array(
                'admin' => true,
                'controller' => 'acl_extras_permissions',
                'action' => 'index',
                ),
            'access' => array('admin'),
            'weight' => 30,
            );
        CmsNav::add('users.children.permissions', $item);
        $items = CmsNav::items();

        $expected = Set::merge($defaults, array(
            'title' => 'Permissions',
            'url' => array(
                'admin' => true,
                'controller' => 'acl_extras_permissions',
                'action' => 'index',
                ),
            'access' => array('admin'),
            'weight' => 30,
            ));

        $this->assertEquals($expected, $items['users']['children']['permissions']);
    }

}
