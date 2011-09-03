<?php
class Edp_Application_Resource_Hybridauth
    extends Zend_Application_Resource_ResourceAbstract
{
    protected $_hybridAuth;

    protected $_returnUrl;

    public function init()
    {
        $this->getBootstrap()->bootstrap('session');
        //$session = $this->getBootstrap()->getPluginResource('session'); 
        //$session->init(); 
        Zend_Session::start();
        require_once LIBRARY_PATH . '/hybridauth/hybridauth.php';
        $this->setHybridAuth(new Hybrid_Auth());
        $options = $this->getOptions();
        $this->setReturnUrl($options['returnUrl']);
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
 
    /**
     * Get returnUrl.
     *
     * @return returnUrl
     */
    public function getReturnUrl()
    {
        return $this->_returnUrl;
    }
 
    /**
     * Set returnUrl.
     *
     * @param $returnUrl the value to be set
     */
    public function setReturnUrl($returnUrl)
    {
        $this->_returnUrl = $returnUrl;
        return $this;
    }
}
