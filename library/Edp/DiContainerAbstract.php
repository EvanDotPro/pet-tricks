<?php
abstract class Edp_DiContainerAbstract
{
    /**
     * Container's storage
     *
     * @var array
     */
    protected $_storage;

    /**
     * _bootstrap 
     * 
     * @var mixed
     * @access protected
     */
    protected $_bootstrap;
 
    /**
     * Get bootstrap.
     *
     * @return bootstrap
     */
    public function getBootstrap()
    {
        return $this->_bootstrap;
    }
 
    /**
     * Set bootstrap.
     *
     * @param $bootstrap the value to be set
     */
    public function setBootstrap($bootstrap)
    {
        $this->_bootstrap = $bootstrap;
        return $this;
    }
}
