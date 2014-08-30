<?php

Router::connect('/admin/login', array('plugin' => 'admin', 'controller' => 'members', 'action' => 'login'));
Router::connect('/admin/logout', array('plugin' => 'admin', 'controller' => 'members', 'action' => 'logout'));
Router::connect('/admin/dashboard', array('plugin' => 'admin', 'controller' => 'admin', 'action' => 'dashboard'));
