Yii2-collapse
=============

**Yii2-collapse** offers two widgets for the [Yii 2.0](https://www.yiiframework.com/ "Yii") PHP Framework:

 - **Collapse** renders a [Bootstrap Collapse](https://getbootstrap.com/docs/4.3/components/collapse/#example "Bootstrap")
   element with a toggle link and a collapsible panel;
   
 - **Accordion** renders a [Bootstrap Accordion](https://getbootstrap.com/docs/4.3/components/collapse/#accordion-example "Bootstrap")
   element with several panels of which only one can be open. An **Accordion** essentially consists of several
   **Collapse**'s.
   
Both widgets can be used with either Bootstrap 3.x or Bootstrap 4.x.
   
A demonstration of both widgets is [here](http://www.sjaakpriester.nl/software/collapse).

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
  
  

## Using the Accordion widget ##

Use the **Accordion** widget as follows:

    <?php
    use sjaakp\collapse\Accordion;
    ?>
        ...
        <?php $accordion = Accordion::begin('Details') ?>
            <h4>Some details</h4>
            <p>The first detail... </p>
        <?php $accordion->next('More details') ?>
            <h4>Some more details</h4>
            <p>The tenth detail... </p>
        <?php $accordion->next('Even more details') ?>
            <h4>Even some more details</h4>
            <p>The twentieth detail... </p>
        <?php Accordion::end() ?>
        ... 
    
As with **Collapse**, **Accordion** can also be
 initialized with an `array` of several options.
  
#### Common options ####

**Collapse** and **Accordion** both have the following options:

 - **label** `string` The text of the (first) label.
 - **encode** `bool` Whether to HTML-encode the label(s). Default: `true`.
 - **open** `bool` Whether the (first) panel is initially open.
        Default: `false` (Collapse), `true` (Accordion).
 - **toggleOptions** `array` HTML options for the toggle link(s).
     Default: `['class' => 'btn-collapse']`. This class styles the toggle link
     with a triangle.
     
#### Collapse options ####

 - **options** `array` HTML options for the panel.
 
#### Accordion options

 - **options** `array` HTML options for the surrounding `<div>`.

 - **panelOptions** `array` HTML options for the panels.
