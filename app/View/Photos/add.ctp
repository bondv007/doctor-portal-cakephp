<?php /* SVN: $Id: add.ctp 789 2009-07-24 07:46:32Z siva_063at09 $ */ ?>
<div class="photos form js-responses">
    <h2><?php echo __l('Upload photos');?></h2>
    <div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
                   	<?php echo $this->Form->create('Photo', array('class' => 'normal js-upload-form {is_required:"true"}', 'enctype' => 'multipart/form-data')); ?>
            		<div class="input">
                		 <?php
                		 echo $this->Form->input('Photo.user_id', array('type' => 'hidden'));
                		 echo $this->Form->uploader('Attachment.filename', array('type' => 'file', 'uController' => 'photos', 'uRedirectURL' => array('controller' => 'photos', 'action' => 'index', 'admin' => false), 'uId' => 'photoID', 'uFiletype' => Configure::read('photo.file.allowedExt')));
                		 ?>
            		</div>
            		<div class="js-validation-part">
            			<div class="submit-block clearfix">
                			<?php
                				echo $this->Form->submit(__l('Upload Photos'));
                			?>
            		    </div>
            		</div>
            		<?php
            			echo $this->Form->end();
            		?>
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