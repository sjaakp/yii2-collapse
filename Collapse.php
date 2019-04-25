<?php
/**
 * MIT licence
 * Version 1.0
 * Sjaak Priester, Amsterdam 23-04-2019.
 *
 * yii2-collapse
 *
 * Widget rendering Bootstrap Collapse for the Yii 2.0 PHP Framework.
 */

namespace sjaakp\collapse;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Class Collapse
 * @package sjaakp\collapse
 */
class Collapse extends Widget
{
    /**
     * @var array HTML options for the collapsible panel
     * special option: 'tag': the HTML tag of the element; if not set: 'div'
     */
    public $options = [];

    /**
     * @var array HTML options for the toggle button
     */
    public $toggleOptions = [ 'class' => 'btn-collapse' ];

    /**
     * @var string text of the toggle button
     */
    public $label = 'Collapse';

    /**
     * @var bool whether the collapse is initially open
     */
    public $open = false;

    /**
     * @var bool whether the label is HTML-encoded
     */
    public $encode = true;

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        $this->view->registerAssetBundle($this->bootstrapNamespace() . '\BootstrapPluginAsset');

        $this->view->registerCss('a.btn-collapse{display:block;}a.btn-collapse,a.btn-collapse:hover,a.btn-collapse:visited,a.btn-collapse:active{color:inherit;text-decoration:none;}
a.btn-collapse:before{content:"";display:inline-block;width:0;height:0;margin-right:.35em;vertical-align:middle;
border-left:.35em solid transparent;border-right:.35em solid transparent;border-top:.35em solid;border-bottom:.35em solid transparent;}
a.btn-collapse.collapsed:before{border-left-color:inherit;border-top-color:transparent;}');

        $id = $this->options['id'];
        Html::addCssClass($this->toggleOptions, 'btn-collapse');
        if (! $this->open) Html::addCssClass($this->toggleOptions, 'collapsed');
        echo Html::a($this->encode ? Html::encode($this->label) : $this->label, "#$id", ArrayHelper::merge([
            'data-toggle' => 'collapse',
            'role' => 'button',
            'aria-expanded' => $this->open,
            'aria-controls' => $id
        ], $this->toggleOptions)) . "\n";

        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        Html::addCssClass($this->options, 'collapse');
        if ($this->open) Html::addCssClass($this->options, 'show');
        echo Html::beginTag($tag, $this->options) . "\n";
    }

    /**
     * @return string
     */
    public function run()
    {
        return '</div>';
    }

    /**
     * @inheritDoc
     */
    public static function begin($config = [])
    {
        if (is_string($config)) $config = [ 'label' => $config ];
        return parent::begin($config);
    }

    /**
     * @return string the namespace of the Bootstrap extension ('yii\bootstrap' or 'yii\bootstrap4')
     * @throws InvalidConfigException
     */
    protected function bootstrapNamespace()
    {
        foreach ([ '4', ''] as $v)  {
            $ns = 'yii/bootstrap' . $v;
            if (strrpos(Yii::getAlias( '@' . $ns, false),'/src') !== false) return str_replace('/', '\\', $ns);
        }
        throw new InvalidConfigException( 'No Bootstrap extension found');
    }
}
