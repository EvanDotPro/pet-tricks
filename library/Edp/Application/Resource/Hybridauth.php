<?php
class Edp_Application_Resource_Hybridauth
    extends Zend_Application_Resource_ResourceAbstract
{
    protected $_hybridAuth;

    public function init()
    {
        $this->getBootstrap()->bootstrap('session');
        //$session = $this->getBootstrap()->getPluginResource('session'); 
        //$session->init(); 
        Zend_Session::start();
        require_once LIBRARY_PATH . '/hybridauth/hybridauth.php';
        $this->setHybridAuth(new Hybrid_Auth());
        return $this->getHybridAuth();
    }
 
    /**
     * Get hybridAuth.
     *
     * @return hybridAuth
     */
    public function getHybridAuth()
    {
        return $this->_hybridAuth;
    }
 
    /**
     * Set hybridAuth.
     *
     * @param $hybridAuth the value to be set
     */
    public function setHybridAuth($hybridAuth)
    {
        $this->_hybridAuth = $hybridAuth;
        return $this;
    }
}
