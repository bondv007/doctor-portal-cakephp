<?php /* SVN: $Id: update.ctp 789 2009-07-24 07:46:32Z siva_063at09 $ */ ?>
<div class="photos form">
    <h2><?php echo __l('Update this uploads')?></h2>
    <?php echo $form->create('Photo', array('class' => 'normal', 'action' => 'update'));?>
        <?php
            if(Configure::read('photo.is_allow_photo_album')):
            	echo $form->input('photo_album_id', array('label' => __l('Add to a album'), 'empty' => __l('Select')));
                echo $html->link(__l('Create new album'), array('controller' => 'photo_albums', 'action' => 'add'),array('title' => __l('Create new album')));
            endif;
        ?>
    	<ul>
        <?php
        	foreach($photos as $photo) :
                ?>
            		<li>
                    <?php
                		echo $html->showImage('Photo', $photo['Attachment'], array('dimension' => 'big_thumb', 'alt' => sprintf(__l('[Image: %s]'), $html->cText($photo['Photo']['title'], false)), 'title' => $html->cText($photo['Photo']['title'], false)));
                		echo $form->input('Photo.'.$photo['Photo']['id'].'.id', array());
                		echo $form->input('Photo.'.$photo['Photo']['id'].'.title', array('label' => __l('Title')));
                		echo $form->input('Photo.'.$photo['Photo']['id'].'.description', array('label' => __l('Description')));
                		echo $form->input('Photo.'.$photo['Photo']['id'].'.tag', array('label' => __l('Tags'), 'info' => __l('Comma separated tags')));
						if (Configure::read('photo.is_show_adult_photo_option')) :
	                		echo $form->input('Photo.'.$photo['Photo']['id'].'.is_adult_photo');
                        endif;
                    ?>
            		</li>
                <?php
            endforeach;
        ?>
    	</ul>
    <?php echo $form->end(__l('Save'));?>
</div>