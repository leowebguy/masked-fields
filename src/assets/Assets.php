<?php
/**
 * A mix of masked/validated fields for Craft
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2022, leowebguy
 * @license    MIT
 */

namespace leowebguy\maskedfields\assets;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class Assets extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@leowebguy/maskedfields/assets';
        $this->depends = [CpAsset::class];

        $this->js = [
            'js/jquery.mask.min.js',
            'js/cp.js'
        ];

        parent::init();
    }
}
