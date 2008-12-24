<?php
/**
 * My new Zend Framework project
 *
 * @author
 * @version
 */

require_once 'Zend/Controller/Plugin/Abstract.php';
require_once 'Zend/Controller/Front.php';
require_once 'Zend/Controller/Request/Abstract.php';
require_once 'Zend/Controller/Action/HelperBroker.php';

/**
 *
 * Initializes configuration depndeing on the type of environment
 * (test, development, production, etc.)
 *
 * This can be used to configure environment variables, databases,
 * layouts, routers, helpers and more
 *
 */
class Initializer extends Zend_Controller_Plugin_Abstract
{
    /**
     * @var Zend_Config
     */
    protected static $_config;

    /**
     * @var string Current environment
     */
    protected $_env;

    /**
     * @var Zend_Controller_Front
     */
    protected $_front;

    /**
     * @var string Path to application root
     */
    protected $_root;

    /**
     * Constructor
     *
     * Initialize environment, root path, and configuration.
     *
     * @param  string $env
     * @param  string|null $root
     * @return void
     */
    public function __construct($env, $root = null)
    {
        $this->_setEnv($env);
        if (null === $root) {
            $root = realpath(dirname(__FILE__) . '/../');
        }
        $this->_root = $root;

        if (!defined('ROOT_DIR'))define('ROOT_DIR',$root);

        $this->initPhpConfig();

        $this->_front = Zend_Controller_Front::getInstance();

        // set the test environment parameters
        if ($env == 'test') {
			// Enable all errors so we'll know when something goes wrong.
			error_reporting(E_ALL | E_STRICT);
			ini_set('display_startup_errors', 1);
			ini_set('display_errors', 1);

			$this->_front->throwExceptions(true);
        }
    }

    /**
     * Initialize environment
     *
     * @param  string $env
     * @return void
     */
    protected function _setEnv($env)
    {
		$this->_env = $env;
    }


    /**
     * Initialize Data bases
     *
     * @return void
     */
    public function initPhpConfig()
    {
        $cfg = new Zend_Config_Ini($this->_root . '/application/config.ini',$this->_env);
        Zend_Registry::set('cfg',$cfg);

        $site = new Zend_Config_Ini($this->_root.'/application/site.ini','site');
        Zend_Registry::set('site',$site);
    }

    /**
     * Route startup
     *
     * @return void
     */
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
       	$this->initDb();
        $this->initHelpers();
        $this->initPlugins();
        $this->initRoutes();
        $this->initControllers();

    }
    public function dispatchLoopStartUp(Zend_Controller_Request_Abstract $request)
    {
        $this->initView($request);
    }

    /**
     * Initialize data bases
     *
     * @return void
     */
    public function initDb()
    {
        $dbAdapter = Zend_Db::factory(Zend_Registry::get('cfg')->db);
        $dbAdapter->query('Set Names utf8');
        Zend_Db_Table::setDefaultAdapter($dbAdapter);
    }

    /**
     * Initialize action helpers
     *
     * @return void
     */
    public function initHelpers()
    {
    	// register the default action helpers
    	Zend_Controller_Action_HelperBroker::addPath('../application/default/helpers', 'Zend_Controller_Action_Helper');
    }

    /**
     * Initialize view
     *
     * @var Zend_Controller_requers_Abstract request
     * @return void
     */
    public function initView(Zend_Controller_Request_Abstract $request)
    {
		// Bootstrap layouts
		Zend_Layout::startMvc(array(
		    'layoutPath' => $this->_root .  '/application/layouts',
		    'layout' => $request->getModuleName()
		));

    }

    /**
     * Initialize plugins
     *
     * @return void
     */
    public function initPlugins()
    {
        $this->_front->registerPlugin(new ZFB_Controller_Plugin_ViewSetup());
        $this->_front->registerPlugin(new ZFB_Controller_Plugin_ActionStack());
    }

    /**
     * Initialize routes
     *
     * @return void
     */
    public function initRoutes()
    {

    }

    /**
     * Initialize Controller paths
     *
     * @return void
     */
    public function initControllers()
    {
    	$this->_front->addControllerDirectory($this->_root . '/application/default/controllers', 'default')
    	             ->addControllerDirectory($this->_root . '/application/admin/controllers','admin');
    }
}
?>
