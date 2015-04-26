<div class="js-response js-clone">

 <?php if (!empty($setting_categories['SettingCategory']['description'])):?>
		<div class="configration-details info-details">
			<?php
				if(stristr($setting_categories['SettingCategory']['description'], '##PAYMENT_SETTINGS_URL##') === FALSE) {
					echo $setting_categories['SettingCategory']['description'];
				} else {
					echo $category_description = str_replace('##PAYMENT_SETTINGS_URL##',Router::url('/', true) . '/admin/payment_gateways',$setting_categories['SettingCategory']['description']);
				}
			?>
		</div>
	<?php endif;?>
	<?php
		if (!empty($settings)):
			echo $this->Form->create('Setting', array('action' => 'edit', 'class' => 'normal setting-add-form add-live-form','enctype' => 'multipart/form-data'));
			echo $this->Form->input('setting_category_id', array('label' => __l('Setting Category'),'type' => 'hidden'));
			// hack to delete the thumb folder in img directory
			$inputDisplay = 0;
			$is_changed = $prev_cat_id = 0;
			foreach ($settings as $setting):
				if($setting['Setting']['name'] == 'site.language'):
					$empty_language = 0;
					$get_language_options = $this->Html->getLanguage();
					if(!empty($get_language_options)):
						$options['options'] = $get_language_options;
					else:
						$empty_language = 1;
					endif;
				endif;
				$field_name = explode('.', $setting['Setting']['name']);
				if(isset($field_name[2]) && ($field_name[2] == 'is_not_allow_resize_beyond_original_size' || $field_name[2] == 'is_handle_aspect')){
					continue;
				}
				$options['type'] = $setting['Setting']['type'];
				$options['value'] = $setting['Setting']['value'];
				$tmp_setting_name = Inflector::slug($setting['Setting']['name']);
				$options['div'] = array('id' => "setting-{$tmp_setting_name}");
				if($options['type'] == 'checkbox' && $options['value']):
					$options['checked'] = 'checked';
				endif;
				if($options['type'] == 'select'):
					$selectOptions = explode(',', $setting['Setting']['options']);
					$setting['Setting']['options'] = array();
					if(!empty($selectOptions)):
						foreach($selectOptions as $key => $value):
							if(!empty($value)):
								$setting['Setting']['options'][trim($value)] = trim($value);
							endif;
						endforeach;
					endif;
					$options['options'] = $setting['Setting']['options'];
				elseif ($options['type'] == 'radio'):
						$selectOptions = explode(',', $setting['Setting']['options']);
						$setting['Setting']['options'] = array();
						$options['legend'] = '<span class="label-content">' . $setting['Setting']['label'] . '</span>';
						if(!empty($selectOptions)):
							foreach($selectOptions as $key => $value):
								if(!empty($value)):
									$setting['Setting']['options'][trim($value)] = trim($value);
								endif;
							endforeach;
						endif;
						$options['options'] = $setting['Setting']['options'];
				endif;
				if(empty($prev_cat_id)){
					$prev_cat_id = $setting['SettingCategory']['id'];
					$is_changed = 1;
				} else {
					$is_changed = 0;
					if($setting_categories['SettingCategory']['id'] != 16 && $setting['SettingCategory']['id'] != $prev_cat_id ){
?>
<?php
						$is_changed = 1;
						$prev_cat_id  = $setting['SettingCategory']['id'];
					}
				}
				if(!empty($is_changed)):
					if($setting_categories['SettingCategory']['id'] != 12) :
?>						<fieldset class="form-block">
							<h3 id="<?php echo str_replace(' ','',$setting['SettingCategory']['name']); ?>"> <?php echo $setting['SettingCategory']['name']; ?></h3>
							<?php if (!empty($setting['SettingCategory']['description']) && $setting_categories['SettingCategory']['id'] != 16):?>
								<div class="configration-details info-details">
									<?php
										$findReplace = array(
											'##TRANSLATIONADD##' => $this->Html->link(Router::url('/', true) . '/admin/translations/add', Router::url('/', true) . '/admin/translations/add', array('title' => __l('Translations add'))),
										);
										$setting['SettingCategory']['description'] = strtr($setting['SettingCategory']['description'], $findReplace);
										echo $setting['SettingCategory']['description'];
									?>
								</div>
							<?php endif;?>
						</fieldset>
<?php
					endif;
				endif;
?>
				<?php if (in_array($setting['Setting']['id'], array(170, 175, 174, 168, 177, 179, 260, 263))): ?>

                        <h3>
                           <?php echo (in_array($setting['Setting']['id'], array(170, 168))) ? __l('Application Info') : ''; ?>
                           <?php echo (in_array($setting['Setting']['id'], array(175, 177))) ? __l('Credentials') : ''; ?>
                           <?php echo (in_array($setting['Setting']['id'], array(174, 179))) ? __l('Other Info') : ''; ?>
                        </h3>
						<?php if(in_array( $setting['Setting']['id'], array(175, 177))):?>
                            <div class="info-details configration-details">
                                <?php
                                    if($setting['Setting']['id'] == 175) :
                                        echo __l('Here you can update Facebook credentials . Click \'Update Facebook Credentials\' link below and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.');
                                    elseif($setting['Setting']['id'] == 177) :
                                        echo __l('Here you can update Twitter credentials like Access key and Accss Token. Click \'Update Twitter Credentials\' link below and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.');
                                    endif;
                                ?>
                            </div>
                        <?php endif;?>
						<?php
							if($setting['Setting']['id'] == 175) : ?>

							<div class="clearfix">
    							<div class="grid_left">
    						      	<div class="credentials-right">
            							<?php	echo $this->Html->link(__l('<span>Update Facebook Credentials</span>'), $fb_login_url, array('escape'=>false,'class' => 'facebook-link', 'title' => __l('Here you can update Facebook credentials . Click this link and Follow the steps. Please make sure that you have updated the API Key and Secret before you click this link.')));
                                        ?>
                                    </div>
                                </div>
                            <div class="grid_left credentials-right-block">
                            <?php
                            elseif($setting['Setting']['id'] == 177) :
                            ?>
                            <div class="clearfix credentials-info-block">
                            <div class="grid_left credentials-left">
						      	<div class="credentials-right">
                                    <?php
                                    	echo $this->Html->link(__l('<span>Update Twitter Credentials</span>'), $tw_login_url, array('escape'=>false,'class' => 'twitter-link', 'title' => __l('Here you can update Twitter credentials like Access key and Accss Token. Click this link and Follow the steps. Please make sure that you have updated the Consumer Key and  Consumer secret before you click this link.')));
                                    ?>
                                </div>
                             </div>
                             <div class="grid_left credentials-right-block">
                            <?php
                        	endif;
						?>
<?php 				endif; ?>

				<?php
					if ($setting['Setting']['name'] == 'site.is_ssl_enabled' && !($ssl_enable)) {
						$options['disabled'] = 'disabled';
					}
				?>
				<?php
				if ($setting['Setting']['name'] == 'cdn.images' || $setting['Setting']['name'] == 'cdn.js' || $setting['Setting']['name'] == 'cdn.css'){	
					$options['class'] = 'js-remove-error';
				}
					if ($setting['Setting']['name'] == 'twitter.site_user_access_key' || $setting['Setting']['name'] == 'twitter.site_user_access_token' || $setting['Setting']['name'] == 'facebook.fb_access_token' || $setting['Setting']['name'] == 'facebook.fb_user_id'):
						$options['readonly'] = true;
						$options['class'] = 'disabled';
					endif;
					if ($setting['Setting']['name'] == 'site.language'):
						$options['options'] = $this->Html->getLanguage();
					endif;
					$options['label'] = $setting['Setting']['label'];
					if ($setting['SettingCategory']['id'] == 47 && $setting['Setting']['id'] != 161 && $inputDisplay == 0):
						$options['class'] = 'image-settings';
						echo '<div class="outer-image-settings clearfix">';
					elseif ($setting['SettingCategory']['id'] == 47 && $setting['Setting']['id'] != 161):
						$options['class'] = 'image-settings image-settings-height';
					endif;
					if (in_array($setting['Setting']['name'], array('affiliate.referral_cookie_expire_time'))):
						$options['after'] = __l('hrs') . '<span class="info">' . $setting['Setting']['description'] . '</span>';
					endif;
					if (in_array($setting['Setting']['name'], array('contest.days_after_amount_paid','contest.winner_selection_days'))):
						$options['after'] = __l('days') . '<span class="info">' . $setting['Setting']['description'] . '</span>';
					endif;
					if (in_array($setting['Setting']['name'], array('contest.winner_commission_amount'))):
					if(!empty($setting['Setting']['description'])):
						$options['after'] = __l('%') . '<span class="info">' . $setting['Setting']['description'] . '</span>';
						endif;
					endif;
					if (in_array( $setting['Setting']['name'], array('wallet.min_wallet_amount', 'wallet.max_wallet_amount', 'user.minimum_withdraw_amount', 'user.maximum_withdraw_amount', 'affiliate.payment_threshold_for_threshold_limit_reach','contest.contest_type_minimum_prize'))):
					if(!empty($setting['Setting']['description'])):
						$options['after'] = Configure::read('site.currency') . '<span class="info">' . $setting['Setting']['description'] . '</span>';
						endif;
					endif;
					$findReplace = array(
						'##SITE_NAME##' => Configure::read('site.name'),
					);
					$setting['Setting']['description'] = strtr($setting['Setting']['description'], $findReplace);
					if (!empty($setting['Setting']['description']) && empty($options['after'])):
						$options['help'] = "{$setting['Setting']['description']}";
					endif;
					//default account
					if ($is_module) {
						if (!in_array($setting['Setting']['id'], array(ConstModuleEnableFields::Affiliate))) {
							$options['class'] = 'js-disabled-inputs';
						} else {
							$options['class'] = 'js-disabled-inputs-active';
						}
						if (!$active_module && !in_array($setting['Setting']['id'], array(ConstModuleEnableFields::Affiliate))) {
							$options['disabled'] = 'disabled';
						}
					}
					?>
                    <?php echo $this->Form->input("Setting.{$setting['Setting']['id']}.name", $options);
                    if($setting['Setting']['id'] == 92 and !empty($watermark_image)):?>
                     <div class="watermark-image">
		     <?php 
		   $org_image1 = Router::url('/',true).$this->Html->getImageUrl('WaterMark', $watermark_image['WaterMark'], array('dimension' => 'original')); 
    			?>
			<img src='<?php echo $org_image1;?>' width="160px" height="160px" alt="<?php echo 'Watermark image'; ?>" title="<?php echo 'Watermark image'; ?>">
                      </div>
                    <?php
                     endif;
					if ($setting['SettingCategory']['id'] == 47 && $setting['Setting']['id'] != 161 && $inputDisplay == 2):
						echo '</div>';
					endif;

					$inputDisplay = ($inputDisplay == 2) ? 0 : $inputDisplay;
					unset($options);
					if (in_array($setting['Setting']['id'], array(176, 178))) {
					?>
                        </div>
                        </div>
					<?php
					}
		endforeach;
		?>

		<?php
		if(!empty($beyondOriginals)){
            echo $this->Form->input('not_allow_beyond_original', array('label' => __l('Not Allow Beyond Original'),'type' => 'select', 'multiple' => 'multiple', 'options' => $beyondOriginals));
        }
        if(!empty($aspects)){
            echo $this->Form->input('allow_handle_aspect', array('label' => __l('Allow Handle Aspect'),'type' => 'select', 'multiple' => 'multiple', 'options' => $aspects));
        } ?>
    <div class="submit-block clearfix">
    <?php	echo $this->Form->submit('Update'); ?>
    </div>
        <?php	echo $this->Form->end(); ?>
    <?php
	else:
?>
		<div class="notice"><?php echo __l('No settings available'); ?></div>
<?php
	endif;
?>

</div>