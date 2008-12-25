<?php
require_once 'application/Initializer.php';
require_once 'application/default/controllers/ArchiveController.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
/**
 * ArchiveController test case.
 */
class ArchiveControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        $this->bootstrap = array($this , 'appBootstrap');
        parent::setUp();
        // TODO Auto-generated ArchiveControllerTest::setUp()
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
        // TODO Auto-generated ArchiveControllerTest::tearDown()
        parent::tearDown();
    }
    /**
     * Constructs the test case.
     */
    public function __construct ()
    {    // TODO Auto-generated constructor
    }
    /**
     * Tests ArchiveController->indexAction()
     */
    public function testIndexAction ()
    {
        $this->dispatch('/archive/');
        $this->assertController('archive');
        $this->assertAction('index');
    }
    /**
     * Tests ArchiveController->yearAction()
     */
    public function testYearAction ()
    {
        $this->dispatch('/archive/2008');
        $this->assertController('archive');
        $this->assertAction('year');
    }
    /**
     * Tests ArchiveController->yearMonthAction()
     */
    public function testYearMonthAction ()
    {
        $this->dispatch('/archive/2008/12');
        $this->assertController('archive');
        $this->assertAction('year-month');
    }
}

