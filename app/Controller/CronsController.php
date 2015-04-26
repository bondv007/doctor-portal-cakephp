<?php
class CronsController extends AppController
{
    public $name = 'Crons';
    public $components = array(
        'Cron',
    );
    public function main()
    {
        $this->Cron->main();
        $this->Session->setFlash(__l('Status updated successfully') , 'default', null, 'success');
        $this->redirect(Router::url(array(
            'controller' => 'nodes',
            'action' => 'tools',
            'admin' => true
        ) , true));
    }
}
