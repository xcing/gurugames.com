<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3>General</h3>

<div class="shortcuts">
    <a href="<?php echo $this->createUrl('/general/central'); ?>" class="shortcut">
        <i class="shortcut-icon icon-asterisk"></i>
        <span class="shortcut-label">Central</span>
    </a>
    <a href="<?php echo $this->createUrl('/general/tournament'); ?>" class="shortcut">
        <i class="shortcut-icon icon-sitemap"></i>
        <span class="shortcut-label">Tournament</span>
    </a>
</div>


