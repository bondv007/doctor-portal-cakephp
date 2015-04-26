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
			echo $this->Html->css('entries.cache', null, array('inline' => true));
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
	<div class="content entry-content">
 		<?php echo $content_for_layout; ?>
    </div>
    </body>
</html>