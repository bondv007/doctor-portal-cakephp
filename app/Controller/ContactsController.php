<?php
class ContactsController extends AppController
{
    public $name = 'Contacts';
    public $components = array(
        'Email',
        'RequestHandler'
    );
    public $uses = array(
        'Contact',
        'EmailTemplate'
    );
    public function add()
    {
        $this->Contact->create();
        if (!empty($this->request->data)) {
            $this->Contact->set($this->request->data);
            if ($this->Contact->validates()) {
                $ip = $this->Contact->toSaveIp();
                $this->request->data['Contact']['ip_id'] = $ip;
                $this->request->data['Contact']['user_id'] = $this->Auth->user('id');
                $this->Contact->save($this->request->data, false);
                $emailFindReplace = array(
                    '##FIRST_NAME##' => $this->request->data['Contact']['first_name'],
                    '##LAST_NAME##' => !empty($this->request->data['Contact']['last_name']) ? ' ' . $this->request->data['Contact']['last_name'] : '',
                    '##FROM_EMAIL##' => $this->request->data['Contact']['email'],
                    '##FROM_URL##' => Router::url(array(
                        'controller' => 'contacts',
                        'action' => 'add'
                    ) , true) ,
                    '##SITE_ADDR##' => gethostbyaddr($this->RequestHandler->getClientIP()) ,
                    '##IP##' => $this->RequestHandler->getClientIP() ,
                    '##TELEPHONE##' => $this->request->data['Contact']['telephone'],
                    '##MESSAGE##' => $this->request->data['Contact']['message'],
                    '##SUBJECT##' => $this->request->data['Contact']['subject'],
                    '##POST_DATE##' => date('F j, Y g:i:s A (l) T (\G\M\TP)') ,
                    '##CONTACT_URL##' => Router::url(array(
                        'controller' => 'contacts',
                        'action' => 'add'
                    ) , true) ,
                    '##SITE_LOGO##' => Router::url(array(
                        'controller' => 'img',
                        'action' => 'logo.png',
                        'admin' => false
                    ) , true) ,
                );
                // send to contact email
                 $this->Contact->_sendEmail('Contact Us', $emailFindReplace, Configure::read('EmailTemplate.admin_email'));
                // reply email
                $this->Contact->_sendEmail('Contact Us Auto Reply', $emailFindReplace, $this->request->data['Contact']['email']);
                $this->Session->setFlash(__l('Thank you, we received your message and will get back to you as soon as possible.') , 'default', null, 'success');
                $this->redirect(array(
                    'controller' => 'contacts',
                    'action' => 'add',
                ));
            }
        }
		$this->request->params['named']['slug'] = '';
        $this->pageTitle = __l('Contact Us');
    }
}
?>