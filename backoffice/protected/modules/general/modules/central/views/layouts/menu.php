<ul class="nav nav-tabs">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-gamepad icon-3x"></i><br/>Game
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('game/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('game/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('image/index') ?>">
            <i class="icon-picture icon-3x"></i><br/>Media
        </a>
    </li>
    <!--li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-film icon-3x"></i><br/>Article
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('article/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('article/admin')?>">Manage</a></li>
        </ul>
    </li-->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-laptop icon-3x"></i><br/>Banner
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('banner/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('banner/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-edit icon-3x"></i><br/>Content
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('content/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('content/admin')?>">Manage</a></li>
        </ul>
    </li>
    <!--li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-reorder icon-3x"></i><br/>Menu
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('menu/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('menu/admin')?>">Manage</a></li>
        </ul>
    </li-->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-tag icon-3x"></i><br/>Tag
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('tag/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('tag/admin')?>">Manage</a></li>
        </ul>
    </li>
    <!--li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-sitemap icon-3x"></i><br/>RelateContentTag
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('relatecontenttag/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('relatecontenttag/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('comment/admin') ?>">
            <i class="icon-pencil icon-3x"></i><br/>Comment
        </a>
    </li-->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-book icon-3x"></i><br/>Category
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('category/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('category/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-bookmark-empty icon-3x"></i><br/>RelateContentCategory
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('relatecontentcategory/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('relatecontentcategory/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-bookmark icon-3x"></i><br/>RelateGameCategory
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('relategamecategory/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('relategamecategory/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-desktop icon-3x"></i><br/>Platform
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('platform/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('platform/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-cloud icon-3x"></i><br/>RelateGamePlatform
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('relategameplatform/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('relategameplatform/admin')?>">Manage</a></li>
        </ul>
    </li>
</ul>