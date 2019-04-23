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

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class Accordion
 * @package sjaakp\collapse
 */
class Accordion extends Widget
{
    /**
     * @var array HTML options for the surrounding <div>
     */
    public $options = [];

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
     * @var bool whether the label is HTML-encoded
     */
    public $encode = true;

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        $id = $this->options['id'];
        $this->panelOptions['data-parent'] = "#$id";

        echo Html::beginTag('div', $this->options) . "\n";
    }

    /**
     * @inheritDoc
     */
    public static function begin($config = [])
    {
        if (is_string($config)) $config = [ 'label' => $config ];

        /* @var $acc Accordion */
        $acc = parent::begin($config);

        Collapse::begin([
            'options' => $acc->panelOptions,
            'toggleOptions' => $acc->toggleOptions,
            'label' => $acc->label,
            'encode' => $acc->encode,
            'open' => $acc->open
        ]);

        return $acc;
    }

    /**
     * @inheritDoc
     */
    public static function end()
    {
        Collapse::end();
        $acc = parent::end();
        echo '</div>';
        return $acc;
    }

    /**
     * @param $label
     */
    public function next($label)
    {
        Collapse::end();
        Collapse::begin([
            'options' => $this->panelOptions,
            'toggleOptions' => $this->toggleOptions,
            'label' => $label,
            'encode' => $this->encode,
            'open' => false
        ]);
    }
}
