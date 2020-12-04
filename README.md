# ByTIC Namefy
Namify helper for Models, Controllers

## Installation

    composer require anytizer/namifier.php:dev-master

### Basic Usage

```php
<?php
require_once 'vendor/autoload.php';

// use the factory to create a controller name from slug
$model = \ByTIC\Namefy\Namefy::from('post')->controllerName();

// use the factory to create a controller name from model name
$model = \ByTIC\Namefy\Namefy::model('post')->controllerName();
```