<div class="userProfiles form js-response js-responses">
	<?php if(empty($this->request->params['isAjax'])):?>
    <h2 class="title"><?php echo sprintf(__l('Edit Profile - %s'), $this->request->data['User']['username']); ?></h2>
	<?php endif; ?>
    <div class="clearfix">
        <div class="side1">
    	 <div class="form-box">
            <div class="form-box-inner">
                <div class="form-blocks  js-corner round-5">
        			<?php echo $this->Form->create('UserProfile', array('action' => 'edit', 'class' => 'normal js-map-location', 'enctype' => 'multipart/form-data'));?>
                	<fieldset class="form-block">
                		<?php
                        if($this->Auth->user('role_id') == ConstUserTypes::Admin):
                            echo $this->Form->input('User.id');
                        endif;
                        if($this->request->data['User']['role_id'] == ConstUserTypes::Admin):
                            echo $this->Form->input('User.username');
                        endif;
                        echo $this->Form->input('first_name');
                		echo $this->Form->input('last_name');
						if($this->Auth->user('role_id') == ConstUserTypes::Doctor || $this->Auth->user('role_id') == ConstUserTypes::Admin):
							echo $this->Form->input('title', array('label' => __l('Title'), 'info' => __l('eg Phd, Dr')));
							echo $this->Form->input('practice_name', array('label' =>__l('Practice Name')));
						endif;	
                		echo $this->Form->input('gender_id', array('empty' => __l('Please Select')));?>
                		<div class="input select required date-time end-date-time-block clearfix">
        						<div class="js-datetime">
        							<?php echo $this->Form->input('dob', array('label' => __l('Date of Birth'),'empty' => __l('Please Select'), 'div' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'orderYear' => 'asc')); ?>
        													
					</div>
                          </div>
                    	<?php
						if($this->Auth->user('role_id') == ConstUserTypes::Doctor || $this->Auth->user('role_id') == ConstUserTypes::Admin):
						 	echo $this->Form->input('phone', array('label' => 'Phone'));
							
						
						$checked = $readonly = "";	
						if($this->Auth->user('role_id') == ConstUserTypes::Doctor){
							$readonly = "disabled";
							
						}	
						
						if($this->request->data['User']['is_partner'] == 1) {
							$checked = 'checked="checked"';
						}
						?>
						<div class="input checkbox">
							<label style="margin-left: 87px;">Is Partner</label>
							<input type="checkbox" <?php echo $checked; ?> value="1" name="data[User][is_partner]" style="margin-left:4px;" <?php echo $readonly; ?>/>
						</div>	
						
						<?php
						
							
							echo $this->Form->input('about_me', array('label' => 'Professional Statement'));
							echo $this->Form->input('board_certifications', array('label' => 'Board Certifications'));
							echo $this->Form->input('memberships', array('label' => 'Professional Memberships'));
							echo $this->Form->input('awards', array('label' => 'Awards and Publications'));

						endif;	
						
							
						if($this->Auth->user('role_id') == ConstUserTypes::User || $this->Auth->user('role_id') == ConstUserTypes::Admin):
						 	echo $this->Form->input('phone', array('label' => 'Phone'));
							echo $this->Form->input('home_number', array('label' => 'Home'));
							echo $this->Form->input('work_number', array('label' => 'Work'));
							echo $this->Form->input('phone_id', array('label' => __l('Preferred Number'), 'options'=>$filter, 'default'=>__l('1'))); 
							echo $this->Form->input('language_id', array('empty' => __l('Please Select'),'label' => 'Preferred Language'));
						endif;		
                		if($this->Auth->user('role_id') == ConstUserTypes::Doctor || $this->Auth->user('role_id') == ConstUserTypes::Admin):
							echo $this->Form->input('address');
							echo $this->Form->input('country_id', array('empty' => __l('Please Select')));
							echo $this->Form->autocomplete('State.name', array('label' => __l('State'), 'acFieldKey' => 'State.id', 'acFields' => array('State.name'), 'acSearchFieldNames' => array('State.name'), 'maxlength' => '255'));
							echo $this->Form->autocomplete('City.name', array('label' => __l('City'), 'acFieldKey' => 'City.id', 'acFields' => array('City.name'), 'acSearchFieldNames' => array('City.name'), 'maxlength' => '255'));
							echo $this->Form->input('zip_code', array('type' => 'text'));
					    endif; 		
        			?>
                	</fieldset>
					<?php if($this->Auth->user('role_id') == ConstUserTypes::Doctor || $this->Auth->user('role_id') == ConstUserTypes::Admin): ?>
    					<div id="js-map-container"></div>
						<?php
							echo $this->Form->input('latitude',array('type' => 'hidden', 'id'=>'latitude'));
							echo $this->Form->input('longitude',array('type' => 'hidden', 'id'=>'longitude'));
							echo $this->Form->input('map_zoom_level',array('type' =>'hidden','value' => 15,'id'=>'zoomlevel'));
						?>
						<?php
					   endif; 		
        			?>	
                    <div class="submit-block clearfix">
                    <?php echo $this->Form->submit(__l('Update')); ?>
                    </div>
                     <?php echo $this->Form->end(); ?>
                 </div>
              </div>
           </div>
        </div>
          <div class="side2">
                <?php
                    echo $this->element('sidebar', array('config' => 'sec'));
                ?>
          </div>
    </div>
</div>