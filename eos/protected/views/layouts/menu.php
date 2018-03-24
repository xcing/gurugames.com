<script type="text/javascript">
    $(document).ready(function() {
        $("#my_menu").mmenu({
            slidingSubmenus: true,
        });
        $("#search_btn").click(function() {
            $("#search_input").slideToggle();
        });
    });
</script>

<?php
$condition = array(
    'gameId' => Yii::app()->params['gameId'],
    'parentMenuId' => 0,
    'position' => 1,
);
$criteria = new CDbCriteria(array('order' => 'ordinal ASC'));
$menus = Menu::model()->findAllByAttributes($condition, $criteria);
?>
<header class="hidden-xs"> 
    <div class="main">
        <div class="clear"></div>
        <div class="heade_mid">
            <h1><a href="index.php"><img src="/images/gurugames-logo-temp.png" alt="Security systems"></a> </h1>
            <div class="autor">
                <?php if(Yii::app()->user->isGuest){ ?>
                    <span style="background-color: #373636;">คุณยังไม่ได้เป็นสมาชิกกับเรา?   <a href="<?= Yii::app()->params['mainPath'].'/index.php?r=site/login';?>">Login</a>  หรือ  <a href="<?= Yii::app()->params['mainPath'].'/index.php?r=site/register';?>">Register</a></span>
                <?php }
                else { ?>
                    <span style="background-color: #373636;">ยินดีต้อนรับ <a href="<?= Yii::app()->params['mainPath'].'/index.php?r=site/logout';?>"><?=Yii::app()->user->username;?></a> <a href="<?= Yii::app()->params['mainPath'].'/index.php?r=site/logout';?>">log out</a></span>
                <?php } ?>
            </div>
            <form id="search" action="search.php" method="GET">
                <input type="text" name="s">                           
                <a onclick="document.getElementById('search').submit()" class="btn">Search</a>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear" style="margin-top: 10px;"></div>

        <div class="menu_block">
            <nav class="hidden-xs">
                <ul class="sf-menu sf-js-enabled">
                    <?php foreach ($menus as $idx => $menu) { ?>
                        <li class="<? if ($idx == 0) echo 'current '; ?> <? if ($menu->haveSubMenu == 1) echo 'with_ul '; ?>">
                            <a href="<?= $menu->link; ?>">
                                <?= $menu->name; ?>
                            </a>
                            <?php
                            if ($menu->haveSubMenu == 1) {
                                $condition = array(
                                    'gameId' => Yii::app()->params['gameId'],
                                    'position' => 1,
                                    'parentMenuId' => $menu->menuId,
                                );
                                $criteria = new CDbCriteria(array('order' => 'ordinal ASC'));
                                $subMenus = Menu::model()->findAllByAttributes($condition, $criteria);
                                ?>
                                <ul style="display: none;">
                                    <?php foreach ($subMenus as $subMenu) { ?>
                                        <li><a href="<?= $subMenu->link; ?>/<?= $subMenu->name; ?>"><?= $subMenu->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div class="menu_block_xs visible-xs">
    <div style="float:left;padding:10px 0px 0px 10px;">
        <a href="#my_menu"><img src="<?= Yii::app()->BaseUrl . '/images/mobile_icon/nav-icon.png'; ?>" /></a>
    </div>
    <nav id="my_menu">
        <ul class="nav navbar-nav">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
            <?php foreach ($menus as $idx => $menu) { ?>
                <li class="<? if ($idx == 0) echo 'active '; ?>">
                    <?php
                    if ($menu->haveSubMenu == 1) {
                        $condition = array(
                            'gameId' => Yii::app()->params['gameId'],
                            'position' => 1,
                            'parentMenuId' => $menu->menuId,
                        );
                        $criteria = new CDbCriteria(array('order' => 'ordinal ASC'));
                        $subMenus = Menu::model()->findAllByAttributes($condition, $criteria);
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $menu->name; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($subMenus as $subMenu) { ?>
                                <li><a href="<?= $subMenu->link; ?>/<?= $subMenu->name; ?>"><?= $subMenu->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <a href="<?= $menu->link; ?>">
                            <?= $menu->name; ?>
                        </a>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <div style="float:right;padding:15px 15px 0px 0px;">
        <img src="<?= Yii::app()->BaseUrl . '/images/mobile_icon/search-icon.png'; ?>" id="search_btn" style="cursor:pointer;" />
    </div>
    <div style="text-align: center;width:100%;">
        <a href="#">
            Gurugames Logo
        </a>
    </div>
    <div class="clear"></div>
    <div style="display:none;margin-top:20px;" id="search_input">
        <div style="text-align:center;">
            <form id="search" action="search.php" method="GET" style="margin:5px;">
                <input type="text" name="s">                           
                <a onclick="document.getElementById('search').submit()" class="btn">Search</a>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>