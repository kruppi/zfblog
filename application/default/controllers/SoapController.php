<?php
/**
 * SoapController
 *
 * @author
 * @version
 */
class SoapController extends Zend_Controller_Action
{
    public function init()
    {
        ini_set("soap.wsdl_cache_enabled", 0);
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        $this->_response->clearBody();
    }
    /**
     * The default action - show the home page
     */
    public function indexAction ()
    {    // TODO Auto-generated SoapController::indexAction() default action
        $soapServer = new Zend_Soap_Server('http://blog/soap/wsdl');
        $soapServer->setClass('ZFB_Soap');
        $soapServer->handle();
    }

    public function wsdlAction()
    {
        $wsdl = new Zend_Soap_AutoDiscover();
        $wsdl->setClass('ZFB_Soap');
        $wsdl->handle();
    }
}


