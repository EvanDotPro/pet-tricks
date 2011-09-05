<?php
class Bootstrap
    extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Initialize database
     *
     * @return void
     */
    protected function _initDatabase()
    {
        $this->bootstrap('db');
        Edp_Model_Mapper_DbAbstract::setDefaultAdapter($this->getResource('db'));
    }
}
