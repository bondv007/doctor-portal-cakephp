<?php
class CronComponent extends Component
{
	public function main() {
		$this->_cronsInPlugin('main');
	}
	public function daily() {
		//Plan expired
		App::uses('PlanUser', 'Model');
		$this->PlanUser = new PlanUser();
		$this->PlanUser->update_plan_status();
		// For Affiliates ( //
		App::uses('Affiliate', 'Model');
		$this->Affiliate = new Affiliate();
		$this->Affiliate->update_affiliate_status();
	}
	public function _cronsInPlugin($function) {
		$plugins = explode(',', Configure::read('Hook.bootstraps'));
		if (!empty($plugins)) {
			App::uses('ComponentCollection', 'Controller');
			$collection = new ComponentCollection();
			foreach ($plugins AS $plugin) {
				$pluginName = Inflector::camelize($plugin);
				if (file_exists(APP . 'Plugin' . DS . $pluginName . DS . 'Controller' . DS . 'Component' . DS . $pluginName . 'CronComponent.php')) {
					$pluginComponent = $pluginName . 'CronComponent';
					App::uses($pluginComponent, $pluginName . '.Controller/Component');
					$cronObj = new $pluginComponent($collection);
					if (method_exists($cronObj, $function)) {
						$cronObj->{$function}();
					}
				}
			}
		}
	}
}