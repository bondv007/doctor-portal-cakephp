<div class="extensions-plugins">
<div class="clearfix">
	<div class="grid_right">
        <?php echo $this->Html->link(__l('Upload'), array('action'=>'add'),array('class' =>'upload')); ?>
    </div> 
</div>
<table class="list">
            <tr>                
				<th class="actions"><?php echo __l('Actions'); ?></th>
				<th class="dl"><div class="js-pagination"><?php echo __l('Name'); ?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo __l('Description'); ?></div></th>
				<th class="actions"><?php echo __l('Action'); ?></th>
            </tr>
            <?php 
                if (!empty($plugins)):
                $i = 0;
                    foreach ($plugins AS $pluginAlias => $pluginData):
                        $class = null;
                        if ($i++ % 2 == 0) :
                            $class = ' class="altrow"';
                        endif;                        
                        ?>
                        <tr<?php echo $class;?>>                            
							<td class="actions">
                       		<div class="action-block">
        						<span class="action-information-block">
        							<span class="action-left-block">&nbsp;
        							</span>
        							<span class="action-center-block">
        								<span class="action-info">
        									<?php echo __l('Action');?>
        								</span>
        							</span>
        						</span>
        						<div class="action-inner-block">
        							<div class="action-inner-left-block">
        								<ul class="action-link clearfix">
							             	<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $pluginAlias), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
											<?php if(!empty($pluginData['settings']['controller']) && $pluginData['active']) {
												if($pluginData['name'] != 'Withdrawals'){
											?>
											<li><?php echo $this->Html->link(__l('Settings'), array('controller' => $pluginData['settings']['controller'], 'action' => $pluginData['settings']['action'], $pluginData['settings']['setting_category_id']), array('class' => 'setting-link', 'title' => __l('Settings')));?></li>
											<?php }  
											} ?>
        								</ul>
        							</div>
        							<div class="action-bottom-block"></div>
        						</div>
        					</div>
     						</td>
							<td class="dl"><?php echo $this->Html->cText($pluginData['name']);?></td>
							<td class="dl">
								<?php echo $this->Html->cText($pluginData['description']);?>								
							</td>
							<?php if ($pluginData['active']) {
									$icon = 'tick.png';
									 $toggleText = __l('Deactivate');
								} else {
									$icon = 'cross.png';
									$toggleText = __l('Activate');
								}
								$iconImage = $this->Html->image('icons/'.$icon); 
								?>
							<td class="dl <?php echo (!empty($pluginData['active'])) ? 'admin-status-1' : 'admin-status-0'; ?>"><?php echo  $this->Html->link($iconImage, array(
										'action' => 'toggle', 
										$pluginAlias,
										), 
										array(
						                    'escape' => false,
						                )); ?> 
							</td>
                        </tr>
                        <?php
                    endforeach;
            else:
                ?>
                <tr>
                    <td class="notice" colspan="7"><?php echo __l('No Plugins available.');?></td>
                </tr>
                <?php
            endif;
            ?>
        </table>
</div>