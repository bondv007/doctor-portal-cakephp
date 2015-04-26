<div class="extensions-themes">
        <div class="clearfix">
            <div class="add-block grid_right">
                <?php echo $this->Html->link(__l('Upload'), array('action' => 'add'),array('class'=>'upload')); ?>
            </div>
             <h3 class="grid_left"><?php echo __l('Current Theme'); ?></h3>
        </div>
       <div class="current-theme">
        <div>
        <?php
            if (!Configure::read('site.theme')) {
                echo $this->Html->image($currentTheme['screenshot']);
            } else {
                echo $this->Html->tag('div', $this->Html->image('/theme/' . Configure::read('site.theme') . '/img/' . $currentTheme['screenshot'], array('width' => 300, 'height' => 225)), array('class' => 'screenshot'));
            }
        ?>
        </div>
        <h3>
        <?php
            $author = $currentTheme['author'];
            if (isset($currentTheme['authorUrl']) && strlen($currentTheme['authorUrl']) > 0) {
                $author = $this->Html->link($author, $currentTheme['authorUrl']);
            }
            echo $currentTheme['name'] . ' ' . __l('by') . ' ' . $author;
        ?>
        </h3>
        <div><?php echo $currentTheme['description']; ?></div>
		<?php if (!empty($currentTheme['regions'])): ?>
	        <p class="regions"><?php echo __l('Regions supported: ') . implode(', ', $currentTheme['regions']); ?></p>
		<?php endif; ?>
      </div>
      <h3><?php echo __l('Available Themes'); ?></h3>
      <ol class="available-themes clearfix">
        <?php
            foreach ($themesData AS $themeAlias => $theme) {
                if ($themeAlias != Configure::read('site.theme') &&
                    (!isset($theme['adminOnly']) || $theme['adminOnly'] != 'true') &&
                    !($themeAlias == 'default' && !Configure::read('site.theme'))) {
					$is_themes_available = 1;
                    echo '<li>';
                        if ($themeAlias == 'default') {
                            echo $this->Html->tag('div', $this->Html->image($theme['screenshot'], array('width' => 300, 'height' => 225)), array('class' => 'screenshot'));
                        } else {
                            echo $this->Html->tag('div', $this->Html->image('/theme/' . $themeAlias . '/img/' . $theme['screenshot'], array('width' => 300, 'height' => 225)), array('class' => 'screenshot'));
                        }
                        $author = $theme['author'];
                        if (isset($theme['authorUrl']) && strlen($theme['authorUrl']) > 0) {
                            $author = $this->Html->link($author, $theme['authorUrl']);
                        }
                        echo $this->Html->tag('h3', $theme['name'] . ' ' . __l('by') . ' ' . $author, array());
                        echo $this->Html->tag('p', $theme['description'], array('class' => 'description'));
						if (!empty($theme['regions'])):
	                        echo $this->Html->tag('p', __l('Regions supported: ') . implode(', ', $theme['regions']), array('class' => 'regions'));
						endif;
                        echo $this->Html->tag('div', $this->Html->link(__l('Activate'), array('action' => 'activate', $themeAlias), array('class' => 'active-link js-delete', 'title' => __l('Activate'))) . $this->Html->link(__l('Delete'), array('action' => 'delete', $themeAlias), array('class' => 'delete js-delete', 'title' => __l('Delete'))), array('class' => 'theme-actions'));
                    echo '</li>';
                }
            }
			if (empty($is_themes_available)) {
				echo '<li class="notice">' . __l('No themes available') . '</li>';
			}
        ?>
        </ol>
  
</div>
