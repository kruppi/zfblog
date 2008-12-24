<?php
class ZFB_Controller_Plugin_ViewSetup extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartUp(Zend_Controller_Request_Abstract $request)
    {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer->init();
        $view = $viewRenderer->view;
        $view->doctype('XHTML1_STRICT');
        $view->headTitle(Zend_Registry::get('site')->name);
        $view->headTitle()->setSeparator(' | ');
        $view->headLink()->appendStylesheet('/styles/style.css');
        $view->placeholder('WebName')->set(Zend_Registry::get('site')->name);
    }
}
