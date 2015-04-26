<?php /* SVN: $Id: index.ctp 948 2009-09-17 09:07:42Z boopathi_026ac09 $ */ ?>
<div class="photos index">
    <h2 class="title"><?php echo __l('My Photos');?></h2>

    <div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
                    <div class="clearfix">
                      <?php if ($this->Auth->sessionValid()): ?>
                      <div class="clearfix">
                		  <div class="grid_right button"><?php echo $this->Html->link(__l('Add New Photos'), array('controller' => 'photos', 'action' => 'add', 'admin' => false), array( 'title' => __l('Add photos'))); ?></div>
                      </div>
                      <?php endif;  ?>
                    </div>
                    <ol class="list photos-list clearfix">
                    <?php
                    if (!empty($photos)):
                        $i = 0;
                        foreach ($photos as $photo):
                        	$class = null;
                        	if ($i++ % 3 == 0) :
                        		$class = 'altrow';
                            endif;
                    ?>
                    	<li class="<?php echo $class;?>">
			<?php 
		   $org_image1 = Router::url('/',true).$this->Html->getImageUrl('Photo', $photo['Attachment'], array('dimension' => 'original')); 
    			?>
			<img src='<?php echo $org_image1;?>' width="160px" height="160px" alt="<?php echo $photo['Photo']['title']; ?>" title="<?php echo $photo['Photo']['title']; ?>">
                                <div class="photo-option clearfix">
                                   <?php
                            	       if ($photo['User']['id'] == $this->Auth->user('id')):
                                   ?>
                                        <?php if($photo['User']['default_thumbnail_id'] == $photo['Attachment']['id']): ?>
            								<span class="primary"><?php echo __l('Primary');?></span>
            							<?php else: ?>
                							<?php echo $this->Html->link(__l('Set Primary'), array('action'=>'set_photo', $photo['Attachment']['id']), array('title' => __l('Set as Primary Photo')));?>
            							<?php
            								 endif;
                                        ?>
                                        <?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $photo['Attachment']['id']), array('title' => __l('Delete')));?>
                                <?php
                                    endif;
                                ?>
                            </div>
            	        </li>
                    <?php
                        endforeach;
                    else: ?>
                    	<li>
                            <p><?php echo __l('No Photos available');?></p>
                        </li>
                    <?php
                        endif;
                    ?>
                    </ol>
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