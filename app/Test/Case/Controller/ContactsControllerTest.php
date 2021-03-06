<?php
App::uses('ContactsController', 'Controller');
App::uses('CmsControllerTestCase', 'TestSuite');

class TestContactsController extends ContactsController {

    public $name = 'Contacts';

    public $autoRender = false;

    public $testView = false;

    public function redirect($url, $status = null, $exit = true) {
        $this->redirectUrl = $url;
    }

    public function render($action = null, $layout = null, $file = null) {
        if (!$this->testView) {
            $this->renderedAction = $action;
        } else {
            return parent::render($action, $layout, $file);
        }
    }

    public function _stop($status = 0) {
        $this->stopped = $status;
    }

    public function __securityError() {

    }
}

class ContactsControllerTest extends CmsControllerTestCase {

    public $fixtures = array(
        'aco',
        'aro',
        'aros_aco',
        'block',
        'comment',
        'contact',
        'i18n',
        'language',
        'link',
        'menu',
        'message',
        'meta',
        'node',
        'nodes_taxonomy',
        'region',
        'role',
        'setting',
        'taxonomy',
        'term',
        'type',
        'types_vocabulary',
        'user',
        'vocabulary',
    );

    public function setUp() {
        parent::setUp();
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
        $request = new CakeRequest();
        $response = new CakeResponse();
        $this->Contacts = new TestContactsController($request, $response);
        $this->Contacts->constructClasses();
        $this->Contacts->request->params['controller'] = 'contacts';
        $this->Contacts->request->params['pass'] = array();
        $this->Contacts->request->params['named'] = array();
    }

    public function tearDown() {
        parent::tearDown();
        $this->Contacts->Session->destroy();
        unset($this->Contacts);
        ClassRegistry::flush();
    }

    public function testAdminIndex() {
        $this->Contacts->request->params['action'] = 'admin_index';
        $this->Contacts->request->params['url'] = 'admin/contacts';
        $this->Contacts->Session->write('Auth.User', array(
            'id' => 1,
            'username' => 'admin',
        ));
        $this->Contacts->startupProcess();
        $this->Contacts->admin_index();

        $this->Contacts->testView = true;
        $output = $this->Contacts->render('admin_index');
        $this->assertFalse(strpos($output, '<pre class="cake-debug">'));
    }

    public function testAdminAdd() {
        $this->Contacts->request->params['action'] = 'admin_add';
        $this->Contacts->request->params['url']['url'] = 'admin/contacts/add';
        $this->Contacts->Session->write('Auth.User', array(
            'id' => 1,
            'username' => 'admin',
        ));
        $this->Contacts->request->data = array(
            'Contact' => array(
                'title' => 'New contact',
                'alias' => 'new_contact',
            ),
        );
        $this->Contacts->startupProcess();
        $this->Contacts->admin_add();
        $this->assertEqual($this->Contacts->redirectUrl, array('action' => 'index'));

        $newContact = $this->Contacts->Contact->findByAlias('new_contact');
        $this->assertEqual($newContact['Contact']['title'], 'New contact');

        $this->Contacts->testView = true;
        $output = $this->Contacts->render('admin_add');
        $this->assertFalse(strpos($output, '<pre class="cake-debug">'));
    }

    public function testAdminEdit() {
        $this->Contacts->request->params['action'] = 'admin_edit';
        $this->Contacts->request->params['url']['url'] = 'admin/contacts/edit';
        $this->Contacts->Session->write('Auth.User', array(
            'id' => 1,
            'username' => 'admin',
        ));
        $this->Contacts->request->data = array(
            'Contact' => array(
                'id' => 1,
                'title' => 'Contact [modified]',
            ),
        );
        $this->Contacts->startupProcess();
        $this->Contacts->admin_edit();
        $this->assertEqual($this->Contacts->redirectUrl, array('action' => 'index'));

        $contact = $this->Contacts->Contact->findByAlias('contact');
        $this->assertEqual($contact['Contact']['title'], 'Contact [modified]');

        $this->Contacts->testView = true;
        $output = $this->Contacts->render('admin_edit');
        $this->assertFalse(strpos($output, '<pre class="cake-debug">'));
    }

    public function testAdminDelete() {
        $this->Contacts->request->params['action'] = 'admin_delete';
        $this->Contacts->request->params['url']['url'] = 'admin/contacts/delete';
        $this->Contacts->Session->write('Auth.User', array(
            'id' => 1,
            'username' => 'admin',
        ));
        $this->Contacts->startupProcess();
        $this->Contacts->admin_delete(1);
        $this->assertEqual($this->Contacts->redirectUrl, array('action' => 'index'));
        
        $hasAny = $this->Contacts->Contact->hasAny(array(
            'Contact.alias' => 'contact',
        ));
        $this->assertFalse($hasAny);
    }

/**
 * testView
 */
    public function testView() {
        $Contacts = $this->generate('Contacts', array(
            'methods' => array(
                '_send_email'
            ),
        ));
        $Contacts->expects($this->once())
            ->method('_send_email')
            ->will($this->returnValue(true));
        $Contacts->request->params['action'] = 'view';
        $Contacts->request->params['url']['url'] = 'contacts/view/contact';
        $Contacts->request->data = array(
            'Message' => array(
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'title' => 'Hello',
                'body' => 'text here',
            ),
        );
        $Contacts->startupProcess();
        $Contacts->view('contact');
        $this->assertEqual($Contacts->viewVars['continue'], true);

        $Contacts->testView = true;
        $output = $Contacts->render('view');
        $this->assertFalse(strpos($output, '<pre class="cake-debug">'));
    }
}
