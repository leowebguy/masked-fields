<?php
/**
 * A mix of masked/validated fields for Craft
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2024, leowebguy
 */

namespace leowebguy\maskedfields\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\PreviewableFieldInterface;
use craft\fields\PlainText;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use yii\base\Exception;

/**
 * @property-read null|string $settingsHtml
 */
class MaskedField extends PlainText implements PreviewableFieldInterface
{
    /**
     * @var string
     */
    public string $type = 'phoneus';

    /**
     * @var string[]
     */
    private array $_types;

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
            'itin' => 'ITIN',
            'ssn' => 'SSN',
            'cnpj' => 'CNPJ',
            'cpf' => 'CPF',
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
     * @throws Exception
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @return string|null
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
     * @param mixed $value
     * @param ElementInterface|null $element
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Exception
     * @return string
     */
    public function getInputHtml(mixed $value, ?ElementInterface $element = null): string
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
