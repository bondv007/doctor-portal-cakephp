<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $this->Html->charset(), "\n";?>
    <title><?php echo Configure::read('site.name') . ' | ' . $title_for_layout; ?></title>
    <?php
		echo $this->Html->meta('icon'), "\n";
		echo $this->Html->meta('keywords', $meta_for_layout['keywords']), "\n";
		echo $this->Html->meta('description', $meta_for_layout['description']), "\n";
		echo $this->Html->css('admin.cache', null, array('inline' => true));
        echo $this->Layout->js();
		echo $this->Html->script(array('default.cache','index'));
        /*$js_inline = "document.documentElement.className = 'js';";
		$js_inline .= "(function() {";
		$js_inline .= "var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true;";
		$js_inline .= "js.src = \"" . $this->Html->assetUrl('default.cache', array('pathPrefix' => JS_URL, 'ext' => '.js')) . "\";";
		$js_inline .= "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(js, s);";
		$js_inline .= "})();";
		echo $this->Javascript->codeBlock($js_inline, array('inline' => true));
		*/
		echo $scripts_for_layout;
		
    ?>
  
    
</head>
<body>
<div class="admin-content">
    <?php echo $this->Layout->sessionFlash(); ?>
   <div class="admin-content-block">
    <div class="admin-container-24 ">
     <div id="header">
        <div class="header-inner">
            <?php echo $this->element('admin/header'); ?>
            <?php echo $this->element("admin/navigation"); ?>
        </div>
     </div>
    <div id="main" class="clearfix">
        <div class="main-inner">
         <?php if(($this->request->params['controller'] == 'users' && ($this->request->params['action'] == 'admin_stats' || $this->request->params['action'] == 'admin_demographic_stats'))){
                echo $content_for_layout;
             } else { ?>
			<?php
				$diagnostics_menu = array('devs','paypal_transaction_logs', 'paypal_docapture_logs', 'authorizenet_docapture_logs', 'adaptive_transaction_logs', 'search_logs');
				$links_menu = array('links');
                if($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'admin_diagnostics') {
				 $class = "diagnostics-title";
				}elseif($this->request->params['controller'] == 'user_profiles' || $this->request->params['controller'] == 'user_add_wallet_amounts'){
                 $class = "users-title";
                }elseif(in_array($this->request->params['controller'], $diagnostics_menu)) {
					$class = "diagnostics-title";
				}elseif(in_array($this->request->params['controller'], $links_menu)) {
					$class = "cms-title";
				}
                else{
					$class = Configure::read('admin_heading_class');
				}
			?>

					<div class="page-title-info">
								<h2 class="clearfix <?php echo $class;?>">
								    <span class="grid_left">
    							        <?php if($this->request->params['controller'] == 'settings' && $this->request->params['action'] == 'index' || $this->request->params['controller'] == 'entry_flag_categories' && $this->request->params['action'] == 'index') { ?>
    										<?php echo $this->Html->link(__l('Settings'), array('controller' => 'settings', 'action' => 'index'), array('title' => __l('Back to Settings')));?>
    									<?php }elseif($this->request->params['controller'] == 'settings' && $this->request->params['action'] == 'admin_edit' ) { if(!empty($setting_categories['SettingCategory'])) {?>
    										<?php echo $this->Html->link(__l('Settings'), array('controller' => 'settings', 'action' => 'index'), array('title' => __l('Back to Settings')));?> &raquo; <?php echo $setting_categories['SettingCategory']['name']; ?>
    									<?php }} elseif(in_array( $this->request->params['controller'], $diagnostics_menu) || $this->request->params['controller'] == 'users' && $this->request->params['action'] == 'admin_logs') { ?>
    									<?php echo $this->Html->link(__l('Diagnostics'), array('controller' => 'users', 'action' => 'diagnostics', 'admin' => true), array('title' => __l('Diagnostics')));?> &raquo; <?php echo $this->pageTitle;?>
    									<?php }  else { ?>
    										<?php echo $this->pageTitle;?>
    									<?php } ?>
									</span>
									<?php if($this->request->params['controller'] == 'settings') { ?>
										<span class="setting-info info grid_right"><?php echo __l('To reflect setting changes, you need to') . ' ' . $this->Html->link(__l('clear cache'), array('controller' => 'devs', 'action' => 'clear_cache', '?f=' . $this->request->url), array('title' => __l('clear cache'), 'class' => 'js-delete'));  ?>.</span>
						          	<?php } ?>
						</h2>
					</div>

            <div class="admin-center-block">
				<?php if(!empty($this->request->params['plugin']) && $this->request->params['plugin'] != 'extensions') { ?>
					<div class="page-info plugins-info"><?php echo $this->Html->cText(Inflector::humanize(ucfirst($this->request->params['plugin']))).__l(' plugin is currently enabled. You can disable it from ') . ' ' . $this->Html->link(__l('plugins'), array('controller' => 'extensions_plugins'), array('title' => __l('plugins'), 'class' => 'plugin'));  ?>.</div>
				<?php } ?>	
				<?php 
					if (!empty($this->request->params['controller']) && $this->request->params['controller'] == 'settings') {
						$enable_text = 'enabled';
						$disable_text = 'disable';
						?>
				<?php }	?>
			    <?php echo $content_for_layout;  ?>
			</div>
		
			<?php } ?>
			</div>
        </div>
      <?php echo $this->element('admin/footer'); ?>
     </div>
     </div>
    </div>
      <script type="text/javascript">
    $(document).ready(function(){
	$.post('users/get_new_data', function(data){
		var resp = JSON.parse(data);
		
		if(parseInt(resp['appointment']) > 0) {
			$('ul.admin-links li').eq(0).find('.amenu-left').append('<span style="margin-left: 93px; cursor:pointer; background: none repeat scroll 0% 0% rgb(255, 0, 0); border-radius: 50%; margin-top: -69px; text-align: center; color: rgb(255, 255, 255); font-weight: bold; padding-top: 3px; height: 23px; width:27px;">'+resp['appointment']+'</span>');
		}
		
		
		if(parseInt(resp['user']) > 0) {
			
			$('ul.admin-links>li').eq(3).find('.amenu-left').append('<span style="margin-left: 93px;cursor:pointer;  background: none repeat scroll 0% 0% rgb(255, 0, 0); border-radius: 50%; margin-top: -69px; text-align: center; color: rgb(255, 255, 255); font-weight: bold; padding-top: 3px; height: 23px; width:27px;">'+resp['user']+'</span>');
		}
		
	});
});
    </script>
    </body>
</html>