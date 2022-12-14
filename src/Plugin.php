<?php
/**
 * A mix of masked/validated fields for Craft
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2022, leowebguy
 * @license    MIT
 */

namespace leowebguy\maskedfields;

use Craft;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use craft\web\View;
use leowebguy\maskedfields\assets\Assets;
use leowebguy\maskedfields\fields\MaskedField;
use yii\base\Event;
use craft\services\Fields;

class Plugin extends BasePlugin
{
    // Properties
    // =========================================================================
    public static $plugin;

    // Public Methods
    // =========================================================================
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if (!$this->isInstalled) {
            return;
        }

        /**
         * Register assets
         */
        Event::on(
            View::class,
            View::EVENT_BEFORE_RENDER_TEMPLATE,
            static function() {
                if (Craft::$app->getRequest()->getIsCpRequest()) {
                    $view = Craft::$app->getView();
                    $view->registerAssetBundle(Assets::class);
                }
            }
        );

        /**
         * Register fields
         */
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = MaskedField::class;
            }
        );

        /**
         * Log info
         */
        Craft::info(
            'Masked Fields plugin loaded',
            __METHOD__
        );
    }
}
