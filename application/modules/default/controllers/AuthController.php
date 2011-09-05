<?php
class Default_AuthController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->auth = $this->_authenticate();
    }

    public function googleAction()
    {
        $auth = $this->_authenticate('Google');
        return;
    }

    protected function _authenticate($provider = false)
    {
        $userService = Zend_Registry::get('Default_DiContainer')->getUserService();
        return $userService->authenticate($provider);
    }

    public function hybridAction()
    {
        require_once LIBRARY_PATH . '/hybridauth/index.php';
    }
}

