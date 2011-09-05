<?php
class Default_DiContainer
    extends Edp_DiContainerAbstract
{
    /**
     * Get the user service
     *
     * @return Default_Service_User
     */
    public function getUserService()
    {
        if (!isset($this->_storage['userService'])) {
            $this->_storage['userService'] = new Default_Service_User($this->getUserMapper());
        }
        return $this->_storage['userService'];
    }

    /**
     * Get the user mapper
     *
     * @return Default_Model_Mapper_User
     */
    public function getUserMapper()
    {
        if (!isset($this->_storage['userMapper'])) {
            $this->_storage['userMapper'] = new Default_Model_Mapper_User();
        }
        return $this->_storage['userMapper'];
    }

    /**
     * getHybridAuthResource 
     * 
     * @access public
     * @return Edp_Application_Resource_Hybridauth
     */
    public function getHybridAuthResource()
    {
        if (!isset($this->_storage['hybridAuthResource'])) {
            $resource = $this->getBootstrap()->getApplication()->getPluginResource('hybridAuth');
            $this->_storage['hybridAuthResource'] = $resource;
        }
        return $this->_storage['hybridAuthResource'];
    }

    /**
     * getHybridAuth 
     * 
     * @access public
     * @return Hybrid_Auth
     */
    public function getHybridAuth()
    {
        if (!isset($this->_storage['hybridAuth'])) {
            $this->_storage['hybridAuth'] = $this->getHybridAuthResource()->getHybridAuth();
        }
        return $this->_storage['hybridAuth'];
    }
}
