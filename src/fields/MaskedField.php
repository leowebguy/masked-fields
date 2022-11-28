<?php
/**
 * A mix of masked/validated fields for Craft
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2022, leowebguy
 * @license    MIT
 */

namespace leowebguy\maskedfields\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\PreviewableFieldInterface;
use craft\fields\PlainText;

class MaskedField extends PlainText implements PreviewableFieldInterface
{
    // Public Methods
    // =========================================================================

    /**
     * @var string
     */
    public $type = 'phoneus';

    /**
     * @var string[]
     */
    private $_types;

    // Public Methods
    // =========================================================================

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->_types = [
            'phoneus' => 'Phone US',
            'phonebr' => 'Phone BR',
            'date' => 'Date',
            'time' => 'Time',
            'datetime' => 'Date Time',
            'zip' => 'Zip Code',
            'cep' => 'Cep',
            'ip' => 'IP',
            'cnpj' => 'CNPJ',
            'cpf' => 'CPF',
            'itin' => 'ITIN',
        ];

        parent::__construct($config);
    }

    /**
     * @return string
     */
    public static function displayName(): string
    {
        return 'Masked Field';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            [['type'], 'string'],
            [['type'], 'default', 'value' => 'phoneus'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate(
            'masked-fields/settings', [
                'field' => $this,
                'types' => $this->_types,
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml(mixed $value, ElementInterface $element = null): string
    {
        $type = $this->type;

        return Craft::$app->getView()->renderTemplate(
            'masked-fields/field',
            [
                'name' => $this->handle,
                'value' => $value,
                'field' => $this,
                'type' => $type,
            ]
        );
    }
}
