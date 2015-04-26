<?php
class PaymentGatewaysController extends AppController
{
    public $name = 'PaymentGateways';
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'PaymentGateway.makeActive',
            'PaymentGateway.makeInactive',
            'PaymentGateway.makeTest',
            'PaymentGateway.makeLive',
            'PaymentGateway.makeDelete',
        );
        parent::beforeFilter();
    }
    public function admin_index()
    {
        $this->pageTitle = __l('Payment Gateways');
        $this->_redirectGET2Named(array(
            'filter',
            'keywords'
        ));
        $conditions = array();
        if (!empty($this->request->params['named'])) {
            $this->request->data['PaymentGateway'] = array(
                'filter' => (isset($this->request->params['named']['filter'])) ? $this->request->params['named']['filter'] : '',
                'keywords' => (isset($this->request->params['named']['keywords'])) ? $this->request->params['named']['keywords'] : ''
            );
        }
        if (!empty($this->request->data['PaymentGateway']['filter'])) {
            if ($this->request->data['PaymentGateway']['filter'] == ConstPaymentGatewayFilterOptions::Active) {
                $conditions['PaymentGateway.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->data['PaymentGateway']['filter'] == ConstPaymentGatewayFilterOptions::Inactive) {
                $conditions['PaymentGateway.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            } else if ($this->request->data['PaymentGateway']['filter'] == ConstPaymentGatewayFilterOptions::TestMode) {
                $conditions['PaymentGateway.is_test_mode'] = 1;
                $this->pageTitle.= __l(' - Test Mode ');
            } else if ($this->request->data['PaymentGateway']['filter'] == ConstPaymentGatewayFilterOptions::LiveMode) {
                $conditions['PaymentGateway.is_test_mode'] = 0;
                $this->pageTitle.= __l(' - Live Mode ');
            }
        }
        if (!empty($this->request->data['PaymentGateway']['keywords'])) {
            $conditions = array(
                'OR' => array(
                    'PaymentGateway.name LIKE ' => '%' . $this->request->data['PaymentGateway']['keywords'] . '%',
                    'PaymentGateway.description LIKE ' => '%' . $this->request->data['PaymentGateway']['keywords'] . '%',
                )
            );
        }      
        $this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'PaymentGateway.id' => 'desc'
            ) ,
            'contain' => array(
                'PaymentGatewaySetting' => array(
                    'fields' => array(
                        'PaymentGatewaySetting.key',
                        'PaymentGatewaySetting.test_mode_value',
                    ) ,
                    'order' => array(
                        'PaymentGatewaySetting.id'
                    )
                ) ,
            ) ,
            'recursive' => 1
        );		
        $this->set('paymentGateways', $this->paginate());
        $isFilterOptions = $this->PaymentGateway->isFilterOptions;
        $this->set(compact('isFilterOptions'));
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Add Payment Gateway');
        if (!empty($this->request->data)) {
            $this->PaymentGateway->create();
            if ($this->PaymentGateway->save($this->request->data)) {
                $this->Session->setFlash(__l('Payment Gateway has been added') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Payment Gateway could not be added. Please, try again.') , 'default', null, 'error');
            }
        }
    }
    public function admin_edit($id = null)
    {
        $this->pageTitle = __l('Edit Payment Gateway');
        if (is_null($id)) {
            throw new NotFoundException();
        }
        if (!empty($this->request->data)) {
            if ($this->PaymentGateway->save($this->request->data)) {
                if (!empty($this->request->data['PaymentGatewaySetting'])) {
                    foreach($this->request->data['PaymentGatewaySetting'] as $key => $value) {
                        $this->PaymentGateway->PaymentGatewaySetting->updateAll(array(
                            'PaymentGatewaySetting.test_mode_value' => '\'' . trim($value['test_mode_value']) . '\'',
                            'PaymentGatewaySetting.live_mode_value' => '\'' . trim($value['live_mode_value']) . '\''
                        ) , array(
                            'PaymentGatewaySetting.id' => $key
                        ));
                    }
                }
                $this->Session->setFlash(__l('Payment Gateway has been updated') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Payment Gateway could not be updated. Please, try again.') , 'default', null, 'error');
            }
        } else {
            $this->request->data = $this->PaymentGateway->read(null, $id);
            unset($this->request->data['PaymentGatewaySetting']);
            if (empty($this->request->data)) {
                throw new NotFoundException();
            }
        }
        $paymentGatewaySettings = $this->PaymentGateway->PaymentGatewaySetting->find('all', array(
            'conditions' => array(
                'PaymentGatewaySetting.payment_gateway_id' => $id
            ) ,
            'order' => array(
                'PaymentGatewaySetting.id' => 'asc'
            )
        ));
        if (!empty($this->request->data['PaymentGatewaySetting']) && !empty($paymentGatewaySettings)) {
            foreach($paymentGatewaySettings as $key => $paymentGatewaySetting) {
                $paymentGatewaySettings[$key]['PaymentGatewaySetting']['value'] = $this->request->data['PaymentGatewaySetting'][$paymentGatewaySetting['PaymentGatewaySetting']['id']]['value'];
            }
        }
        $this->set(compact('paymentGatewaySettings'));
        $this->pageTitle.= ' - ' . $this->request->data['PaymentGateway']['name'];
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException();
        }
        if ($this->PaymentGateway->delete($id)) {
            $this->Session->setFlash(__l('Payment Gateway deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException();
        }
    }
    public function admin_update($id, $actionId, $toggle)
    {
        if (is_null($id) || is_null($actionId)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $toggle = empty($toggle) ? 0 : 1;			
        switch ($actionId) {
            case ConstMoreAction::Active:
                $this->PaymentGateway->updateAll(array(
                    'PaymentGateway.is_active' => $toggle
                ) , array(
                    'PaymentGateway.id' => $id
                ));
				$PaymentGateway = $this->PaymentGateway->find('first',array(
					'conditions' => array(
						'PaymentGateway.id' => $id
				),
				'recursive' => -1
				));
				$plugin = Inflector::camelize(strtolower($PaymentGateway['PaymentGateway']['name']));				
				if ($this->Cms->pluginIsActive($plugin)) {					
					$this->Cms->removePluginBootstrap($plugin);					
					$this->Session->setFlash(__l('Plugin deactivated successfully.') , 'default', null, 'success');
				} else {					
					$pluginData = $this->Cms->getPluginData($plugin);
					$dependencies = true;
					if (!empty($pluginData['dependencies']['plugins'])) {
						foreach($pluginData['dependencies']['plugins'] as $requiredPlugin) {
							$requiredPlugin = ucfirst($requiredPlugin);
							if (!CakePlugin::loaded($requiredPlugin)) {
								$dependencies = false;
								$missingPlugin = $requiredPlugin;
								break;
							}
						}
					}
					if ($dependencies) {
						$this->Cms->addPluginBootstrap($plugin);						
						$this->Session->setFlash(__l('Plugin activated successfully.') , 'default', null, 'success');
					} else {
						$this->Session->setFlash(__l('Plugin "%s" depends on "%s" plugin.', $plugin, $missingPlugin) , 'default', null, 'error');
					}
				}
                break;

            case ConstMoreAction::TestMode:
                $newToggle = empty($toggle) ? 1 : 0;
                $this->PaymentGateway->updateAll(array(
                    'PaymentGateway.is_test_mode' => $toggle
                ) , array(
                    'PaymentGateway.id' => $id
                ));
                break;

            case ConstMoreAction::MassPay:
                $this->PaymentGateway->updateAll(array(
                    'PaymentGateway.is_mass_pay_enabled' => $toggle
                ) , array(
                    'PaymentGateway.id' => $id
                ));
                break;

            case ConstMoreAction::Signup:
                $this->PaymentGateway->PaymentGatewaySetting->updateAll(array(
                    'PaymentGatewaySetting.test_mode_value' => $toggle
                ) , array(
                    'PaymentGatewaySetting.payment_gateway_id' => $id,
                    'PaymentGatewaySetting.key' => 'is_enable_for_signup'
                ));
                break;
        }
        if (!$this->request->params['isAjax']) {
            $this->redirect(array(
                'controller' => 'payment_gateways',
                'action' => 'index'
            ));
        }
		else{
			$toggle_status = empty($toggle) ? 1 : 0;
			echo Router::url(array(
            'controller' => 'payment_gateways',
            'action' => 'update',
            $id,
            $actionId,
            $toggle_status,
            'admin' => true,
        ) , true);
			$this->autoRender = false;
		}
    }
    public function admin_move_to()
    {
        if (!empty($this->request->data['PaymentGateway']['Id'])) {
            foreach($this->request->data['PaymentGateway']['Id'] as $payment_gateway_id => $is_checked) {
                if ($is_checked['Check']) {
                    if (!empty($this->request->data['PaymentGateway']['makeActive'])) {
                        $payment_gateway['PaymentGateway']['id'] = $payment_gateway_id;
                        $payment_gateway['PaymentGateway']['is_active'] = 1;
                        $this->PaymentGateway->save($payment_gateway, false);
                        $this->Session->setFlash(__l('Checked payment gateways has been changed to active') , 'default', null, 'success');
                    }
                    if (!empty($this->request->data['PaymentGateway']['makeInactive'])) {
                        $payment_gateway['PaymentGateway']['id'] = $payment_gateway_id;
                        $payment_gateway['PaymentGateway']['is_active'] = 0;
                        $this->PaymentGateway->save($payment_gateway, false);
                        $this->Session->setFlash(__l('Checked payment gateways has been changed to inactive') , 'default', null, 'success');
                    }
                    if (!empty($this->request->data['PaymentGateway']['makeTest'])) {
                        $payment_gateway['PaymentGateway']['id'] = $payment_gateway_id;
                        $payment_gateway['PaymentGateway']['is_test_mode'] = 1;
                        $this->PaymentGateway->save($payment_gateway, false);
                        $this->Session->setFlash(__l('Checked payment gateways has been changed to test mode') , 'default', null, 'success');
                    }
                    if (!empty($this->request->data['PaymentGateway']['makeLive'])) {
                        $payment_gateway['PaymentGateway']['id'] = $payment_gateway_id;
                        $payment_gateway['PaymentGateway']['is_test_mode'] = 0;
                        $this->PaymentGateway->save($payment_gateway, false);
                        $this->Session->setFlash(__l('Checked payment gateways has been changed to live mode') , 'default', null, 'success');
                    }
                    if (!empty($this->request->data['PaymentGateway']['makeDelete'])) {
                        $this->PaymentGateway->delete($payment_gateway_id);
                        $this->Session->setFlash(__l('Checked payment gateways has been deleted') , 'default', null, 'success');
                    }
                }
            }
        }
        $this->redirect(array(
            'controller' => 'payment_gateways',
            'action' => 'index'
        ));
    }
}
?>