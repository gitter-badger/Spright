# CakePHP Admin Plugin

CakeAdminPlugin is a easy-to-use Admin/CMS plugin for CakePHP 2.X

## Installation

* Create the table for your users. The script is located in `scripts/schema.sql`.
* Clone/Copy the plugin files into to your `/app/Plugin/Admin` folder.
* Load the plugin in `/app/Config/bootstrap.php`
```php
	Configure::load('Admin', array('routes' => true));
```
