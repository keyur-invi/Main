<?php
// Assuming this script is placed in the root directory of your Magento installation
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Magento\Framework\App\Bootstrap;
use Magento\Sales\Cron\SendEmails;
require __DIR__ . '/app/bootstrap.php';
$params = $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);
$obj = $bootstrap->getObjectManager();
// Set area code to 'adminhtml' to avoid 'Area code is not set' error
$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('adminhtml');
$cronInstance = $obj->create(SendEmails::class);
$cronInstance->execute();

exit;
