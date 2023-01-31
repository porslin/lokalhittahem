<?php
// Turn on/off error reporting
error_reporting(1);

// Start session
session_start();

define('ROOT_PATH', '..' . __DIR__ . '/'); // path to 'hittahem/'
define('SRC_PATH',  __DIR__ . '/'); // path to 'hittahem/src/'

// Include functions and classes
require(SRC_PATH . '/dbconnect.php');
require(SRC_PATH . '/app/InquiryDbHandler.php');
require(SRC_PATH . '/app/ObjectDbHandler.php');
require(SRC_PATH . '/app/UserDbHandler.php');

$inquiryDbHandler = new InquiryDbHandler($pdo);
$objectDbHandler = new ObjectDbHandler($pdo);
$userDbHandler = new UserDbHandler($pdo);