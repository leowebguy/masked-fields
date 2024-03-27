<?php
/**
 * A mix of masked/validated fields for Craft
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2024, leowebguy
 */

namespace leowebguy\maskedfields;

use Craft;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use craft\web\View;
use leowebguy\maskedfields\assets\Assets;
use leowebguy\maskedfields\fields\MaskedField;
use yii\base\Event;

class Plugin extends BasePlugin
{
    public bool $hasCpSection = false;

    public bool $hasCpSettings = false;

    public function init()
    {
        parent::init();

        if (!$this->isInstalled) {
            return;
        }

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

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = MaskedField::class;
            }
        );

        Craft::info(
            'Masked Fields plugin loaded',
            __METHOD__
        );
    }
}
