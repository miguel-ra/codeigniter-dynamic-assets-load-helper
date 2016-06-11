
Dynamic assets load helper for CodeIgniter
=====================================

This helper add the functionality to add css and js from our view to the parent view.


Installation
-------------------------------------

1. Copy `helpers/asset_helper.php` to your `application/helpers` folder 
   and  `config/asset.php` to your `application/config` folder 

2. Add helper in autoload file in `application/config/autoload.php`::

    $autoload['helper'] = array('load');


Usage
-------------------------------------

### Add CSS

<?php add_css('style.css'); ?>


### Add JS
  
  To Header

  <?php add_js('script.js', true); ?>

  To Footer

  <?php add_js('script.js'); ?>

### Print Header
  
  <?php echo put_header(); ?>

### Print Footer

  <?php echo put_footer(); ?>
