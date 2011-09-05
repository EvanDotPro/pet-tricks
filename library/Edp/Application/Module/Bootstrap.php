<?php
abstract class Edp_Application_Module_Bootstrap
    extends Zend_Application_Module_Bootstrap
{
    protected function _initDiContainer()
    {
        $module = $this->_formatModuleName($this->getModuleName());
        $class  = $module . '_DiContainer';
        $r    = new ReflectionClass($this);
        $dir  = $r->getFileName();
        if (!class_exists($class, false)) {
            $file = dirname($dir) . '/DiContainer.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                return;
            }
        }
        $diContainer = new $class();
        $diContainer->setBootstrap($this);
        Zend_Registry::set($class, $diContainer);
    }

    protected function _formatModuleName($name)
    {
        $name = strtolower($name);
        $name = str_replace(array('-', '.'), ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }
}

