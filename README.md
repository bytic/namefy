# ByTIC Namefy
Namify helper for Models, Controllers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bytic/namefy.svg?style=flat-square)](https://packagist.org/packages/bytic/namefy)
[![Latest Stable Version](https://poser.pugx.org/bytic/namefy/v/stable)](https://packagist.org/packages/bytic/namefy)
[![Latest Unstable Version](https://poser.pugx.org/bytic/namefy/v/unstable)](https://packagist.org/packages/bytic/namefy)

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/bytic/namefy/master.svg?style=flat-square)](https://travis-ci.org/bytic/framework)
[![Quality Score](https://img.shields.io/scrutinizer/g/bytic/namefy.svg?style=flat-square)](https://scrutinizer-ci.com/g/bytic/namefy)
[![StyleCI](https://styleci.io/repos/KZWBj2/shield?branch=master)](https://styleci.io/repos/KZWBj2)
[![Total Downloads](https://img.shields.io/packagist/dt/bytic/namefy.svg?style=flat-square)](https://packagist.org/packages/bytic/namefy)


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