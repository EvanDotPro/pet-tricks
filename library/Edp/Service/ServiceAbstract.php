<?php
abstract class Edp_Service_ServiceAbstract
{
    protected $_mapper;

    public function __construct(Edp_Model_Mapper_DbAbstract $mapper = null)
    {
        $this->_mapper = $mapper;
    }
 
    /**
     * Get mapper.
     *
     * @return mapper
     */
    public function getMapper()
    {
        return $this->_mapper;
    }
 
    /**
     * Set mapper.
     *
     * @param $mapper the value to be set
     */
    public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }
}
