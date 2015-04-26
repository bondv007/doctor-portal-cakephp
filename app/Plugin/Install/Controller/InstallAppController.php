<?php
class InstallAppController extends AppController {

    public function beforeFilter() {
        $this->Components->unload('Cms');
        $this->Components->unload('Auth');
    }

}