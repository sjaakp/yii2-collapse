Yii2-collapse
=============

**Yii2-collapse** offers three widgets for the [Yii 2.0](https://www.yiiframework.com/ "Yii") PHP Framework:

 - **Collapse** renders a [Bootstrap Collapse](https://getbootstrap.com/docs/4.3/components/collapse/#example "Bootstrap")
   element with a toggle link and a collapsible panel;
   
 - **CollapseGroup** two or more **Collapse**s of which only one can be open;  
   
 - **Accordion** renders a [Bootstrap Accordion](https://getbootstrap.com/docs/4.3/components/collapse/#accordion-example "Bootstrap")
   element with several panels of which only one can be open. An **Accordion** essentially is a kind
   of **CollapseGroup**. The difference is that the **Collapse**'s are all direct 
   children of the surrounding element.
   
All three widgets can be used with either Bootstrap 3.x or Bootstrap 4.x.
   
A demonstration of the widgets is [here](http://www.sjaakpriester.nl/software/collapse).

## Installation ##

Install **yii2-collapse** in the usual way with [Composer](https://getcomposer.org/). 
Add the following to the require section of your `composer.json` file:

`"sjaakp/yii2-collapse": "*"` 

or run:

`composer require sjaakp/yii2-collapse` 

You can manually install **yii2-collapse** by [downloading the source in ZIP-format](https://github.com/sjaakp/yii2-collapse/archive/master.zip).

## Using the Collapse widget ##

Using the **Collapse** widget in an Yii2 view file can be as simple as:

    <?php
    use sjaakp\collapse\Collapse;
    ?>
        ...
        <?php Collapse::begin('Details') ?>
            <h4>Some more details</h4>
            <p>The first detail... </p>
        <?php Collapse::end() ?>
        ... 
    
The HTML between `begin()` and `end()` can be as complicated as you like.

Instead of initializing **Collapse** with the label text, it can also be
 initialized with an `array` of several options, like:
 

    <?php
    use sjaakp\collapse\Collapse;
    ?>
        ...
        <?php Collapse::begin([
            'label' => 'Details',
            'options' => [ 'class' => 'bg-info' ], // give the panel an extra class
            'open' => true      // initially open the panel
        ]) ?>
            <h4>Some more details</h4>
            <p>The first detail... </p>
        <?php Collapse::end() ?>
        ... 
  
  

## Using the CollapseGroup widget ##

The **CollapseGroup** widget can be used like:

    <?php
    use sjaakp\collapse\CollapseGroup;
    ?>
        ...
        <?php CollapseGroup::begin([/* options */]) ?>
        ...
        <?php CollapseGroup::beginCollapse('Details) ?>
            <h4>Some details</h4>
            <p>The first detail... </p>
        <?php CollapseGroup::endCollapse() ?>
        ...
        <?php CollapseGroup::beginCollapse('More details) ?>
            <h4>Some more details</h4>
            <p>The first detail... </p>
        <?php CollapseGroup::endCollapse() ?>
        ...
        <?php CollapseGroup::end() ?>
        ... 

`beginCollapse()` can also be initiallized with an array of **Collapse** options.

## Using the Accordion widget ##

Use the **Accordion** widget as follows:

    <?php
    use sjaakp\collapse\Accordion;
    ?>
        ...
        <?php Accordion::begin('Details') ?>
            <h4>Some details</h4>
            <p>The first detail... </p>
        <?php Accordion::next('More details') ?>
            <h4>Some more details</h4>
            <p>The tenth detail... </p>
        <?php Accordion::next('Even more details') ?>
            <h4>Even some more details</h4>
            <p>The twentieth detail... </p>
        <?php Accordion::end() ?>
        ... 
    
As with **Collapse**, **Accordion** can also be
 initialized with an `array` of several options.
  
#### Common options ####

**Collapse** and **Accordion** (but *not* **CollapseGroup**) both have the following options:

 - **label** `string` The text of the (first) label.
 - **encode** `bool` Whether to HTML-encode the label(s). Default: `true`.
 - **open** `bool` Whether the (first) panel is initially open. Default:
    `false` (Collapse), `true` (Accordion).
 - **toggleOptions** `array` HTML options for the toggle link(s).
     Default: `['class' => 'btn-collapse']`. This class styles the toggle link
     with a triangle.
     
#### Collapse option ####

 - **options** `array` HTML options for the panel.
   `'tag'` is a special option, defining the HTML-tag. If it is not set, the
   HTML-tag is `'div'`
     
#### CollapseGroup option ####

 - **options** `array` HTML options for the surrounding element.
   `'tag'` is a special option, defining the HTML-tag. If it is not set, the
   HTML-tag is `'div'`
 
#### Accordion options

 - **options** `array` HTML options for the surrounding element.
   `'tag'` is a special option, defining the HTML-tag. If it is not set, the
   HTML-tag is `'div'`

 - **panelOptions** `array` HTML options for the panels.
