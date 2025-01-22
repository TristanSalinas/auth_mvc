<?php
session_start();
require_once './config/Router.php';

require_once 'models/User.php';
require_once 'managers/AbstractManager.php';
require_once 'managers/UserManager.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PageController.php';
