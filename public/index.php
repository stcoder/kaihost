<?php

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');


define('ROOT_DIR', dirname(dirname(__FILE__)));

$paths = array(
    ROOT_DIR . '/application',
    ROOT_DIR . '/application/modules',
    ROOT_DIR . '/library'
);

set_include_path(implode(':', $paths));

require 'Zend/Loader/Autoloader.php';

//try {
	Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

date_default_timezone_set('UTC');

// Get front controller instance
$front = Zend_Controller_Front::getInstance();
// Set modular structure directories
$front->addModuleDirectory(ROOT_DIR . '/application/modules');

$dispatcher = $front->getDispatcher();
$request = $front->getRequest();

// Init View Renderer
$view = new Zend_View();
$view->headTitle('KaiHost');
$view->headTitle()->setSeparator(' - ');
$tplFormat = 'html';

$navConf = new Zend_Config_Ini(ROOT_DIR . '/application/configs/navigation.ini', 'nav');
$container = new Zend_Navigation($navConf);
$view->getHelper('navigation')->setContainer($container);

$renderer = new Zend_Controller_Action_Helper_ViewRenderer();
$renderer->setView($view);
$renderer->setViewSuffix($tplFormat);
// Set view renderer helper
Zend_Controller_Action_HelperBroker::addHelper($renderer);

// Init Zend_Layout
$layout = Zend_Layout::startMvc();
$layout->setLayoutPath(ROOT_DIR . '/application/views/scripts');
$layout->setViewSuffix($tplFormat);

// init router
$router = new Zend_Controller_Router_Rewrite();

// home route
$router->addRoute('home', new Zend_Controller_Router_Route('/', array(
     'module' => 'default',
     'controller' => 'index',
     'action' => 'index'
)));

$router->addRoute('develop', new Zend_Controller_Router_Route('/develop', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'develop'
)));

$router->addRoute('services', new Zend_Controller_Router_Route('/services', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'services'
)));

$router->addRoute('hosting', new Zend_Controller_Router_Route('/hosting', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'hosting'
)));

$router->addRoute('brif', new Zend_Controller_Router_Route('/constructor', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'brif'
)));

$router->addRoute('contact', new Zend_Controller_Router_Route('/contact', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'contact'
)));

$router->addRoute('accept', new Zend_Controller_Router_Route('/accept', array(
	'module' => 'default',
	'controller' => 'index',
	'action' => 'accept'
)));

$translator = new Zend_Translate(
	array(
		'adapter' => 'array',
		'content' => '../resources/languages',
		'locale'  => 'ru',
		'scan' => Zend_Translate::LOCALE_DIRECTORY
	)
);
Zend_Validate_Abstract::setDefaultTranslator($translator);

$front->setRouter($router);

// Switch off error handler plugin
//$front->setParam('noErrorHandler', true);
// Throw exceptions in dispatch loop
//$front->throwExceptions(true);

// Set return response flag
$front->returnResponse(true);

// Dispatch request
$response = $front->dispatch($request);
// Output response
$response->sendResponse();

/*} catch (Exception $e) {
	$response = new Zend_Http_Response(404, array());
}*/
