<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3>Game</h3>

<div class="shortcuts">
    <a href="<?php echo $this->createUrl('/game/dota2'); ?>" class="shortcut">
        <i class="shortcut-icon icon-thumbs-up"></i>
        <span class="shortcut-label">Dota2</span>
    </a>
    <a href="<?php echo $this->createUrl('/game/alchemonsters'); ?>" class="shortcut">
        <i class="shortcut-icon icon-star"></i>
        <span class="shortcut-label">Alchemonsters</span>
    </a>
    <a href="<?php echo $this->createUrl('/game/warrior'); ?>" class="shortcut">
        <i class="shortcut-icon icon-trello"></i>
        <span class="shortcut-label">Warrior</span>
    </a>
</div>	


