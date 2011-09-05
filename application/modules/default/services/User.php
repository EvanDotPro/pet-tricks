<?php
class Default_Service_User 
    extends Edp_Service_ServiceAbstract 
{
    public function authenticate($provider = false)
    {
        $hybridAuthResource = Zend_Registry::get('Default_DiContainer')->getHybridAuthResource();
        $hybridAuth = Zend_Registry::get('Default_DiContainer')->getHybridAuth();

        if ($hybridAuth->hasSession()) {
            $identity = $this->getHybridIdentity();
            $user = new Default_Model_User();
            $user->setEmail($identity->profile->email);
            $user->setDisplayName($identity->profile->displayName);
            $user->setLanguage($identity->profile->language);
            return true;
        }

        $params = array('hauth_return_to' => $hybridAuthResource->getReturnUrl());
        $providerAdapter = $hybridAuth->setup($provider, $params);
        
        if (!$providerAdapter ||
            !$providerAdapter->login() ||
            $hybridAuth->hasError()) {
            return false;
        }
        // oh well, just always return false
        return false;
    }

    public function getHybridIdentity()
    {
        $hybridAuth = Zend_Registry::get('Default_DiContainer')->getHybridAuth();
        return $hybridAuth->wakeup()->user(); 
    }
}
