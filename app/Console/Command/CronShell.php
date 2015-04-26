<?php
/**
 *
 * @version $Id: cron.php 1227 2011-04-25 13:34:32Z boopathi_026ac09 $
 * @copyright 2009
 */
class CronShell extends Shell
{
    function main()
    {
		// site settings are set in config
        App::import('Vendor', 'Spyc/Spyc');
		if (file_exists(APP . 'Config' . DS . 'settings.yml')) {
			$settings = Spyc::YAMLLoad(file_get_contents(APP . 'Config' . DS . 'settings.yml'));
			foreach($settings AS $settingKey => $settingValue) {
				Configure::write($settingKey, $settingValue);
			}
		}
		// include cron component
        App::import('Core', 'ComponentCollection');
		$collection = new ComponentCollection();
		App::import('Component', 'Cron');
		$this->Cron = new CronComponent($collection);
        $option = !empty($this->args[0]) ? $this->args[0] : '';
        $this->log('Cron started without any issue');
        if (!empty($option) && $option == 'main') {
            $this->Cron->main();
        } elseif (!empty($option) && $option == 'daily') {
            $this->Cron->daily();
        } elseif (!empty($option) && $option == 'clear_permanent_cache') {
            $this->Cron->clear_permanent_cache();
        }
    }
}
?>