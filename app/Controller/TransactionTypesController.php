<?php
class TransactionTypesController extends AppController
{
    var $name = 'TransactionTypes';
    function admin_index()
    {
        $this->pageTitle = __l('Transaction Types');
        $this->TransactionType->recursive = -1;
        $this->set('transactionTypes', $this->paginate());
    }
    function admin_edit($id = null)
    {
        $this->pageTitle = __l('Edit Transaction Type');
        if (is_null($id)) {
            throw new NotFoundException();
        }
        if (!empty($this->request->data)) {
            if ($this->TransactionType->save($this->request->data)) {
                $this->Session->setFlash(__l('Transaction Type has been updated') , 'default', null, 'success');
                $this->redirect(array(
                    'controller' => 'transaction_types',
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Transaction Type could not be updated. Please, try again.') , 'default', null, 'error');
            }
        } else {
            $this->request->data = $this->TransactionType->read(null, $id);
            if (empty($this->request->data)) {
                throw new NotFoundException();
            }
        }
        $this->pageTitle.= ' - ' . $this->request->data['TransactionType']['name'];
    }
}
?>