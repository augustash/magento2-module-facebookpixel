<?php

/**
 * Augustash Facebook Pixel
 *
 * Adds the meta pixel tracking script to the HTML head section
 *
 * @author Josh Johnson <josh@augustash.com>
 * @author Adam Cornell <acornell@augustash.com>
 * @copyright 2025 - present August Ash, Inc. (https://augustash.com)
 */

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Augustash_Facebookpixel',
    __DIR__
);
