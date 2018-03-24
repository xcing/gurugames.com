<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo $this->createUrl('image/index') ?>">
            <i class="icon-picture icon-3x"></i><br/>Media
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-meh icon-3x"></i><br/>Warrior
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('warrior/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('warrior/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-lightbulb icon-3x"></i><br/>Skill
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('skill/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('skill/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-eye-open icon-3x"></i><br/>Enemy
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('enemy/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('enemy/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-bell icon-3x"></i><br/>Enemy Skill
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('enemyskill/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('enemyskill/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-leaf icon-3x"></i><br/>Leader Skill
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('leaderskill/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('leaderskill/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-fire icon-3x"></i><br/>Support Skill
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('supportskill/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('supportskill/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-random icon-3x"></i><br/>Element
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('element/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('element/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-circle-blank icon-3x"></i><br/>Equipment
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('equipment/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('equipment/admin')?>">Manage</a></li>
        </ul>
    </li>
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-magic icon-3x"></i><br/>Condition
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('condition/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('condition/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-edit icon-3x"></i><br/>Quest
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('quest/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('quest/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user icon-3x"></i><br/>User
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('user/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('user/admin')?>">Manage</a></li>
        </ul>
    </li>
</ul>