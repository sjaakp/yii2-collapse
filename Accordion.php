<?php
/**
 * MIT licence
 * Version 1.0
 * Sjaak Priester, Amsterdam 23-04-2019.
 *
 * yii2-collapse
 *
 * Widget rendering Bootstrap Accordion for the Yii 2.0 PHP Framework.
 */

namespace sjaakp\collapse;

use yii\helpers\ArrayHelper;

/**
 * Class Accordion
 * @package sjaakp\collapse
 */
class Accordion extends CollapseGroup
{
    /**
     * @var array HTML options for the collapsible panels
     */
    public $panelOptions = [];

    /**
     * @var array HTML options for the toggle button
     */
    public $toggleOptions = [ 'class' => 'btn-collapse' ];

    /**
     * @var string text of the first toggle button
     */
    public $label;

    /**
     * @var bool whether the first panel is initially open
     */
    public $open = true;

    /**
     * @var bool whether the labels are HTML-encoded
     */
    public $encode = true;

    /**
     * @inheritDoc
     */
    public static function begin($config = [])
    {
        if (is_string($config)) $config = [ 'label' => $config ];

        /* @var $acc Accordion */
        $acc = parent::begin($config);

        self::beginCollapse([
            'options' => $acc->panelOptions,
            'toggleOptions' => $acc->toggleOptions,
            'label' => $acc->label,
            'encode' => $acc->encode,
            'open' => $acc->open
        ]);

        return $acc;
    }

    public static function next($config = [])
    {
        if (is_string($config)) $config = [ 'label' => $config ];

        self::endCollapse();

        /* @var $acc Accordion */
        $acc = self::retrieveWidget();

        return self::beginCollapse(ArrayHelper::merge([
            'options' => $acc->panelOptions,
            'toggleOptions' => $acc->toggleOptions,
            'encode' => $acc->encode,
            'open' => false
        ], $config));
    }

    /**
     * @inheritDoc
     */
    public static function end()
    {
        self::endCollapse();
        return parent::end();
    }
}
