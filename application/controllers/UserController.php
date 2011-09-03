<?php
class UserController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $hybridauth = $this->getInvokeArg('bootstrap')->getPluginResource('hybridAuth')->getHybridAuth(); 
        $provider_adapter = $hybridauth->wakeup(); 
        $user_data        = $provider_adapter->user();
    }
}

