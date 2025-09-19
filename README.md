# Augustash_FacebookPixel

!-- markdownlint-disable MD033 -->
<div align="center">
    <a href="https://augustash.com" target="_blank">
        <picture>
            <source media="(prefers-color-scheme: dark)" srcset="https://augustash.s3.amazonaws.com/logos/ash-inline-invert-500.png">
            <source media="(prefers-color-scheme: light)" srcset="https://augustash.s3.amazonaws.com/logos/ash-inline-color-500.png">
            <img alt="Shows a theme-dependent version of the AAI company logo." src="https://augustash.s3.amazonaws.com/logos/ash-inline-color-500.png">
        </picture>
    </a>
</div>

<div align="center">
    <img src="https://img.shields.io/badge/magento-2.4-brightgreen.svg?logo=magento&longCache=true&style=flat-square" alt="Supported Magento Versions" />
    <a href="https://github.com/augustash/magento2-module-connect-entities/graphs/commit-activity" target="_blank">
        <img src="https://img.shields.io/badge/maintained%3F-yes-brightgreen.svg?style=flat-square" alt="Maintained - Yes" />
    </a>
    <a href="https://opensource.org/licenses/MIT" target="_blank">
        <img alt="MIT" src="https://img.shields.io/badge/license-MIT-blue.svg" />
    </a>
</div>

## Overview:

Module that adds FaceBook Pixel to header.

## Installation

### Composer

```bash
$ composer require augustash/module-facebookpixel
```


## Uninstall

After all dependent modules have also been disabled or uninstalled, you can finally remove this module:

```bash
bin/magento module:disable --clear-static-content Augustash_FacebookPixel
rm -rf app/code/Augustash/FacebookPixel/
composer remove augustash/module-facebookpixel
bin/magento setup:upgrade
bin/magento cache:flush
```

## Structure

[Typical file structure for a Magento 2 module](https://developer.adobe.com/commerce/php/development/build/component-file-structure/).
