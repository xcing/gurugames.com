<ul class="nav nav-tabs">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-male icon-3x"></i><br/>Hero
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('hero/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('hero/admin')?>">Manage</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $this->createUrl('hero/ranking') ?>">Ranking</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-fire icon-3x"></i><br/>Skill
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('skill/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('skill/admin')?>">Manage</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $this->createUrl('skill/ranking') ?>">Ranking</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-shopping-cart icon-3x"></i><br/>Item
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('item/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('item/admin')?>">Manage</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $this->createUrl('item/ranking') ?>">Ranking</a></li>
        </ul>
    </li>
    <!--li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-retweet icon-3x"></i><br/>Mix Item
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('relateitem/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('relateitem/admin')?>">Manage</a></li>
        </ul>
    </li-->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-star icon-3x"></i><br/>Role
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('role/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('role/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-sort-by-attributes icon-3x"></i><br/>Guide Hero
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('guidehero/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('guidehero/admin')?>">Manage</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $this->createUrl('guidehero/ranking') ?>">Ranking</a></li>
        </ul>
    </li>
</ul>