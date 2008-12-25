<?php
require_once 'application/Initializer.php';
require_once 'application/default/controllers/ArticleController.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
/**
 * ArticleController test case.
 */
class ArticleControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        $this->bootstrap = array($this , 'appBootstrap');
        parent::setUp();
        // TODO Auto-generated ArticleControllerTest::setUp()
    }
    /**
     * Prepares the environment before running a test.
     */
    public function appBootstrap ()
    {
        $this->frontController->registerPlugin(new Initializer('test'));
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        // TODO Auto-generated ArticleControllerTest::tearDown()
        parent::tearDown();
    }
    /**
     * Constructs the test case.
     */
    public function __construct ()
    {    // TODO Auto-generated constructor
    }
    /**
     * Tests ArticleController->indexAction()
     */
    public function testIndexAction ()
    {
        $this->dispatch('/archive/2008/12/13/12-index');
        $this->assertController('article');
        $this->assertAction('index');
    }
}

