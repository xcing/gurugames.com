<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo $this->createUrl('team/admin') ?>">
            <i class="icon-group icon-3x"></i><br/>Team
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-sitemap icon-3x"></i><br/>Tournament
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('tournament/create')?>">Create</a></li>
            <li><a href="<?php echo $this->createUrl('tournament/admin')?>">Manage</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('relatetourteam/admin') ?>">
            <i class="icon-folder-open icon-3x"></i><br/>Team in Tour
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('match/admin') ?>">
            <i class="icon-legal icon-3x"></i><br/>Match
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('matchresult/admin') ?>">
            <i class="icon-inbox icon-3x"></i><br/>Match Result
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('roundschedule/admin') ?>">
            <i class="icon-map-marker icon-3x"></i><br/>Round Schedule
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('stattour/admin') ?>">
            <i class="icon-tasks icon-3x"></i><br/>Stat Team
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('appointment/admin') ?>">
            <i class="icon-reply icon-3x"></i><br/>Appointment
        </a>
    </li>
</ul>