<div class="comment-form">
    <h3><?php echo __l('Add new comment'); ?></h3>
    <?php
        $type = $types_for_layout[$node['Node']['type']];

        if ($this->request->params['controller'] == 'comments') {
            $nodeLink = $this->Html->link(__l('Go back to original post') . ': ' . $node['Node']['title'], $node['Node']['url']);
            echo $this->Html->tag('p', $nodeLink, array('class' => 'back'));
        }

        $this->FormUrl = array(
            'controller' => 'comments',
            'action' => 'add',
            $node['Node']['id'],
        );
        if (isset($parentId) && $parentId != null) {
            $this->FormUrl[] = $parentId;
        }

        echo $this->Form->create('Comment', array('url' => $this->FormUrl));
            if ($this->Session->check('Auth.User.id')) {
                echo $this->Form->input('Comment.name', array(
                    'label' => __l('Name'),
                    'value' => $this->Session->read('Auth.User.name'),
                    'readonly' => 'readonly',
                ));
                echo $this->Form->input('Comment.email', array(
                    'label' => __l('Email'),
                    'value' => $this->Session->read('Auth.User.email'),
                    'readonly' => 'readonly',
                ));
                echo $this->Form->input('Comment.website', array(
                    'label' => __l('Website'),
                    'value' => $this->Session->read('Auth.User.website'),
                    'readonly' => 'readonly',
                ));
                echo $this->Form->input('Comment.body', array('label' => false));
            } else {
                echo $this->Form->input('Comment.name', array('label' => __l('Name')));
                echo $this->Form->input('Comment.email', array('label' => __l('Email')));
                echo $this->Form->input('Comment.website', array('label' => __l('Website')));
                echo $this->Form->input('Comment.body', array('label' => false));
            }

            if ($type['Type']['comment_captcha']) {
                echo $this->Recaptcha->display_form();
            }
        echo $this->Form->end(__l('Post comment'));
    ?>
</div>