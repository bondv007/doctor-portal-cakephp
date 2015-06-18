<?php
class CountriesController extends AppController
{
    public $name = 'Countries';
    public function admin_index()
    {
        $this->_redirectGET2Named(array(
            'q'
        ));
		$conditions = array();
		if (!empty($this->request->params['named']['q'])) {
            $conditions[] = array(
                'OR' => array(
                    array(
                        'Country.name LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
						array(
                        'Country.capital LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Country.map_reference LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Country.currency LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Country.currency_code LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Country.nationality_singular LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Country.nationality_plural LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }
        $this->pageTitle = __l('Countries');
        $this->Country->recursive = -1;
        $this->paginate = array(
			'conditions' => $conditions,
            'fields' => array(
                'Country.id',
                'Country.name',
                'Country.fips104',
                'Country.iso2',
                'Country.iso3',
                'Country.ison',
                'Country.internet',
                'Country.capital',
                'Country.map_reference',
                'Country.nationality_singular',
                'Country.nationality_plural',
                'Country.currency',
                'Country.currency_code',
                'Country.population',
                'Country.title',
                'Country.comment',
            ) ,
            'order' => array(
                'Country.name' => 'asc'
            ) ,
            'recursive' => -1
        );
        $this->set('countries', $this->paginate());
        $moreActions = $this->Country->moreActions;
        $this->set(compact('moreActions'));
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Add Country');
        if (!empty($this->request->data)) {
            $this->Country->create();
            if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__l('Country has been added') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Country could not be updated. Please, try again') , 'default', null, 'success');
            }
        }
    }
    public function admin_edit($id = null)
    {
        $this->pageTitle = __l('Edit Country');
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if (!empty($this->request->data)) {
            if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__l('Country has been updated') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Country could not be updated. Please, try again.') , 'default', null, 'error');
            }
        } else {
            $this->request->data = $this->Country->read(null, $id);
            if (empty($this->request->data)) {
                throw new NotFoundException(__l('Invalid request'));
            }
        }
        $this->pageTitle.= ' - ' . $this->request->data['Country']['name'];
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Country->delete($id)) {
            $this->Session->setFlash(__l('Country deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
?>