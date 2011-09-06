<?php
class Default_Bootstrap 
    extends Edp_Application_Module_Bootstrap
{
    public function _initAclService()
    {
        $this->bootstrap('DiContainer');
        Zend_Registry::get('Default_DiContainer')->getAclService();
    }
}
