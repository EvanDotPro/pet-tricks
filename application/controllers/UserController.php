<?php
class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $user = new Application_Model_User();
        var_dump($user);
        $hybridauth = $this->getInvokeArg('bootstrap')->getPluginResource('hybridAuth')->getHybridAuth(); 
        $provider_adapter = $hybridauth->wakeup(); 
        $user_data        = $provider_adapter->user();
    }
}

