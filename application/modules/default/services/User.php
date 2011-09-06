<?php
class Default_Service_User 
    extends Edp_Service_ServiceAbstract 
{
    protected $_auth;

    public function authenticate($provider = false)
    {
        $hybridAuthResource = Zend_Registry::get('Default_DiContainer')->getHybridAuthResource();
        $hybridAuth = Zend_Registry::get('Default_DiContainer')->getHybridAuth();

        if ($hybridAuth->hasSession()) {
            $identity = $this->getHybridIdentity();
            $user = $this->_mapper->getUserByEmail($identity->profile->email);
            if (!$user) {
                $user = new Default_Model_User();
                $user->setEmail($identity->profile->email);
                $user->setDisplayName($identity->profile->displayName);
                $user->setLanguage($identity->profile->language);
                $user->addRole(1)->addRole(3);
                $user = $this->_mapper->insert($user);
            }
            $user->setAuthenticationType($identity->providerId);
            $user->setUid($identity->UID);
            $user->setProviderUid($identity->providerUID);
            $user->setTimestamp($identity->timestamp);
            $this->_mapper->updateLastLogin($user);
            $roles = Zend_Registry::get('Default_DiContainer')->getRoleService()->getRolesByUser($user);
            $user->setRoles($roles);
            $auth = $this->getAuth();
            $auth->getStorage()->write($user);
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

    public function getAuth()
    {
        if (null === $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;
    }

    public function getIdentity()
    {
        $auth = $this->getAuth();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        }
        $auth->getStorage()->write(new Default_Model_User(array(
            'roles' => array (
                new Default_Model_Role(array(
                    'role_id' => 1,
                    'name'    => 'guest'
                )),
            ),
            //'settings' => $this->getDefaultUserSettings()
        )));
        return $auth->getIdentity();
    }

    public function getDefaultUserSettings()
    {
        return array(
            'date-format'   => 'F jS, Y G:i:s',
            'timezone'      => 'America/Phoenix'
        );
    }

    public function logout()
    {
        $this->getAuth()->clearIdentity();
        Zend_Session::regenerateId();
    }
}
