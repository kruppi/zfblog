<?php
require_once ('Zend/Controller/Plugin/Abstract.php');
class ZFB_Controller_Plugin_ActionStack extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $actionStack = Zend_Controller_Action_HelperBroker::getHelper('ActionStack');
        $requestCopy = clone $request;
        $requestCopy->setModuleName('admin')
                    ->setControllerName('index');
        //$actionStack->pushStack($requestCopy);

    }
}
?>