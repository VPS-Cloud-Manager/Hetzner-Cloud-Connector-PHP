# Hetzner Cloud Connector [SDK PHP] (Unofficial)

[![StyleCI](https://github.styleci.io/repos/266463223/shield?branch=master)]
[![Latest Stable Version](https://poser.pugx.org/vcmanager/hetzner-cloud-connector-php/v)](//packagist.org/packages/vcmanager/hetzner-cloud-connector-php)
[![Total Downloads](https://poser.pugx.org/vcmanager/hetzner-cloud-connector-php/downloads)](//packagist.org/packages/vcmanager/hetzner-cloud-connector-php)
[![Latest Unstable Version](https://poser.pugx.org/vcmanager/hetzner-cloud-connector-php/v/unstable)](//packagist.org/packages/vcmanager/hetzner-cloud-connector-php)
[![License](https://poser.pugx.org/vcmanager/hetzner-cloud-connector-php/license)](//packagist.org/packages/vcmanager/hetzner-cloud-connector-php)

This package is only the link between php and hetzner cloud api. We do not change the request form or anything, for a more complete input form, please check the following documentation: https://docs.hetzner.cloud/.

## Minimum Requirment
- PHP 7.2
- CURL

## Install

### Composer
```
composer require vcmanager/hetzner-cloud-connector-php
```

### Manual

1. Download file from release pages
2. Copy file inside folder src
3. Done

## Documentation
- PHP Class Documentation : https://vps-cloud-manager.github.io/Hetzner-Cloud-Connector-PHP/

### Docs Class Generate
wget https://phpdoc.org/phpDocumentor.phar
sudo mv phpDocumentor.phar /usr/bin
sudo chmod +x /usr/bin/phpDocumentor.phar
phpDocumentor.phar project:run -d src --template='responsive-twig'

## Author
- VCManager (Juni Yadi - me@juniyadi.id)
- License: MIT