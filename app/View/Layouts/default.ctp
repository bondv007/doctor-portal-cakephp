<?php
/**
 * Default Theme for Cms CMS
 *
 * @author Fahad Ibnay Heylaal <contact@fahad19.com>
 * @link http://www.cms.org
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $this->Html->charset(), "\n";?>
    <title><?php echo Configure::read('site.name') . ' | ' . $title_for_layout; ?></title>
    <?php
        echo $this->Html->meta('icon'), "\n";
		echo $this->Html->meta('keywords', $meta_for_layout['keywords']), "\n";
		echo $this->Html->meta('description', $meta_for_layout['description']), "\n";
		echo $this->Html->css('default.cache', null, array('inline' => true));
		echo $this->Html->css('chart', null, array('inline' => true));
        echo $this->Layout->js();
        $js_inline = "document.documentElement.className = 'js';";
		$js_inline .= "(function() {";
		$js_inline .= "var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true;";
		$js_inline .= "js.src = \"" . $this->Html->assetUrl('default.cache', array('pathPrefix' => JS_URL, 'ext' => '.js')) . "\";";
		$js_inline .= "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(js, s);";
		$js_inline .= "})();";
		echo $this->Javascript->codeBlock($js_inline, array('inline' => true));
		
		echo $scripts_for_layout;
    ?>
</head>
<body>
    <div id="<?php echo $this->Html->getUniquePageId();?>" class="content">
        <?php echo $this->Layout->sessionFlash(); ?>
    	<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Admin): ?>
		<div class="clearfix admin-wrapper">
			<h3 class="admin-site-logo"><?php echo $this->Html->link((Configure::read('site.name').' '.'<span>Admin</span>'), array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false, 'title' => (Configure::read('site.name').' '.'Admin')));?></h3>
			<p class="logged-info"><?php echo __l(' You are logged in as Admin');?></p>
			<ul class="admin-menu clearfix">
				<li class="logout"><span><?php echo $this->Html->link(__l('Logout'), array('controller' => 'users', 'action' => 'logout'), array('title' => __l('Logout')));?></span></li>
			</ul>
		</div>
	<?php endif; ?>
         <div id="header">
           	<div class="container_24 clearfix">
    			 <h1><?php echo $this->Html->link(Configure::read('site.name'), '/'); ?></h1>
                <div class="grid_right grid_16 header-right">
                    <div class="clearfix">

                        <?php if(isPluginEnabled('Translation') && Configure::read('user.is_allow_user_to_switch_language')) : ?>

		<?php
			$languages = $this->Html->getLanguage();
			if(Configure::read('user.is_allow_user_to_switch_language') && !empty($languages)) :
				echo $this->Form->create('Language', array('action' => 'change_language', 'class' => 'language-form grid_right clearfix'));
				echo $this->Form->input('language_id', array('label'=>__l('Language'),'class' => 'js-autosubmit', 'empty' => __l('Please Select'), 'options' => $languages, 'value' => isset($_COOKIE['CakeCookie']['user_language']) ?  $_COOKIE['CakeCookie']['user_language'] : Configure::read('site.language')));
		?>
			<div><?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?></div>
			<div class="hide"><?php echo $this->Form->submit('Submit'); ?></div>
		<?php
				echo $this->Form->end();
			endif;
		?>

<?php endif; ?>
                    	<!-- <ul class="share-list clearfix">

                            <li class="tweet"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo Router::url('/',true); ?>" data-text="<?php echo Router::url('/',true); ?>" data-via="vetpetsite" data-count="none">Tweet</a></li>
                            <li class="flike">
								<div class="fb-like" data-href="<?php echo Router::url('/',true); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
							</li>
                        </ul> -->
                    	<?php echo $this->element('header-menu'); ?>
                    	
    				</div>
                </div>

		<div class="clearfix">
                     <?php echo $this->Layout->menu('footer1'); ?>
                  </div>
		    <div class="contact-block" style="padding:0;">
    

    <div class="contact-cl">
    <div class="contact-cr">
    <div class="contact-inner">
    
    <p><?php echo __l('Email us at');?> <a href="emailto:<?php echo Configure::read('EmailTemplate.service_email');?>" title="<?php echo Configure::read('EmailTemplate.service_email');?>"><?php echo Configure::read('EmailTemplate.service_email');?></a> <?php echo __l('or give us a call at');?><span> <?php echo Configure::read('EmailTemplate.service_phone');?></span></p>

    </div>
    </div>
    </div>
   
  </div>
            </div>
        </div>
        <div id="main">

		   <div class="main-inner container_24 clearfix">
                <?php echo $content_for_layout; ?>
            </div>
        </div>
        <div id="footer">
	    <div class="footer-inner container_24">
		    
              <div class="clearfix">
                 
                 <div class="site-info clearfix">
                    <p>Copyright &copy;<?php echo date('Y');?>. <?php echo $this->Html->link(Configure::read('site.name'), Router::Url('/',true), array('title' => Configure::read('site.name'), 'escape' => false));?>. <?php echo __l('is a registered trademark of');?> <?php echo $this->Html->link(Configure::read('site.name'), Router::Url('/',true), array('title' => Configure::read('site.name'), 'escape' => false));?>.</p>
        			<p class="privacy">
						<?php  echo $this->Html->link(__l(' Our Privacy policy'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'privacy-policy'), array('title' => __l('Our Privacy policy')));?> <?php echo __l('and');?> <?php  echo $this->Html->link(__l('Terms of Use'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'terms-of-use'), array('title' => __l('Terms od Use')));?>
					</p>
                </div>
                  <!-- <ul class="footer-nav1">
                     <li class="facebook"> <a href="<?php echo Configure::read('facebook.site_facebook_url'); ?>" title="See Our Profile in Facebook">Facebook</a> </li>
                     <li class="tweeter"><a href="<?php echo Configure::read('twitter.site_twitter_url'); ?>" title="Follow Us in Twitter">Twitter</a> </li>
                     <li class="google"><a href="//plus.google.com/109724366602036945542?prsrc=3" rel="publisher" style="text-decoration:none;">
<img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/></a></li>
                 </ul> -->
               </div>
    			
               
            </div>
        </div>
       </div>
    <?php echo $this->Js->writeBuffer(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=182753691856507";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </body>
</html>