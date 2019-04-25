<?php
/**
 * MIT licence
 * Version 1.0
 * Sjaak Priester, Amsterdam 23-04-2019.
 *
 * yii2-collapse
 *
 * Widget rendering Bootstrap CollapseGroup for the Yii 2.0 PHP Framework.
 */

namespace sjaakp\collapse;

use yii\base\Widget;
use yii\base\InvalidCallException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Class CollapseGroup
 * @package sjaakp\collapse
 */
class CollapseGroup extends Widget
{
    /**
     * @var array HTML options for the surrounding element
     * special option: 'tag': the HTML tag of the element; if not set: 'div'
     */
    public $options = [];

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        echo Html::beginTag($tag, $this->options) . "\n";
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        return '</div>';
    }

    /**
     * @param array $config
     * @return Collapse
     * @throws InvalidCallException;
     */
    public static function beginCollapse($config = [])
    {
        $group = self::retrieveWidget();

        if (is_string($config)) $config = [ 'label' => $config ];
        if (! isset($config['options'])) $config['options'] = [];
        $id = $group->options['id'];
        $config['options']['data-parent'] = "#$id";

        return Collapse::begin($config);
    }

    /**
     * @return Collapse
     */
    public static function endCollapse()
    {
        return Collapse::end();
    }

    /**
     * @return CollapseGroup
     * @throws InvalidCallException;
     */
    protected static function retrieveWidget()
    {
        /// $stack is @internal, but we know what we're doing
        $widget = end(self::$stack);
        if (get_class($widget) !== get_called_class())   {
            throw new InvalidCallException('Expecting end() of ' . get_class($widget) . ', found ' . get_called_class());
        }
        return $widget;
    }
}
