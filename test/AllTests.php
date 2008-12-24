<?php
/**
 * AllTests - A Test Suite for your Application
 *
 * @author
 * @version
 */
$root = dirname(dirname(__FILE__));
if (!defined('ROOT_DIR'))define('ROOT_DIR',$root);

set_include_path(get_include_path() . PATH_SEPARATOR . ROOT_DIR . '/application'
 . PATH_SEPARATOR . ROOT_DIR . '/library' . PATH_SEPARATOR . ROOT_DIR . '/application/models');

require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

require_once ROOT_DIR . '/test/application/default/controllers/IndexControllerTest.php';
require_once ROOT_DIR . '/test/application/admin/controllers/Admin_IndexControllerTest.php';
require_once ROOT_DIR . '/test/application/models/ZFB/ArticleTest.php';


/**
 * AllTests class - aggregates all tests of this project
 */
class AllTests extends PHPUnit_Framework_TestSuite {

	/**
	 * Constructs the test suite handler.
	 */
	public function __construct() {
		$this->setName ( 'AllTests' );

		$this->addTestSuite ( 'IndexControllerTest' );
		$this->addTestSuite ( 'Admin_IndexControllerTest' );
		$this->addTestSuite ( 'ZFB_ArticleTest' );

	}

	/**
	 * Creates the suite.
	 */
	public static function suite() {
		return new self ( );
	}
}

