<?php
class AuthController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $hybridauth = $this->getInvokeArg('bootstrap')->getPluginResource('hybridAuth')->getHybridAuth(); 
        if ($hybridauth->hasError()){
            return $this->_helper->redirector('index', 'auth');
        }

        if ($hybridauth->hasSession()) {
            return $this->_helper->redirector('index', 'user');
        }

        if (isset($_GET["provider"])) {
            $params = array(); 
            $params["hauth_return_to"] = 'http://pet-tricks.ip.evan.pro/auth';//$hybridauth->getCurrentUrl();
            $provider = @$_REQUEST["provider"];
            $provider_adapter = $hybridauth->setup($provider, $params);

            if (!$provider_adapter) {
                return $this->_helper->redirector('index', 'auth');
            }

            $login_is_ok = $provider_adapter->login();

            if (!$login_is_ok) {
                return $this->_helper->redirector('index', 'auth');
            }
        }
    }

    public function hybridAction()
    {
        require_once LIBRARY_PATH . '/hybridauth/index.php';
    }
}

