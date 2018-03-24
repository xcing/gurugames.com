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
            <h1><a href="<?= Yii::app()->createUrl('site/index');?>" style="width:160px"><img src="images/logo-gurugames3.png" alt="gurugames"></a> </h1>
            <h1><a href="<?= Yii::app()->createUrl('site/index');?>"><img src="images/logonewfont.png" alt="gurugames" style="height:50px;margin-top:20px"></a> </h1>
            <div style="float:right;margin-right:20px;margin-top:30px;">
            <div style="display:inline-block">
            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fgurugames.in.th&amp;width&amp;height=62&amp;colorscheme=dark&amp;show_faces=false&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=463910590321509" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;margin-top:-30px;width:210px;" allowTransparency="true"></iframe>
            </div>
            <div style="display:inline-block;font-family: 'Helvetica Neue', Helvetica, Arial, 'lucida grande',tahoma,verdana,arial,sans-serif;
color: #fff;
font-weight: bold;
font-size: 13px;margin-top:-21px" ><div><a target="_blank" href="http://www.youtube.com/channel/UCBktsCuqR1JQeLvibmrCIBA">Channel</a></div>
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="g-ytsubscribe" data-channelid="UCBktsCuqR1JQeLvibmrCIBA" data-layout="default" data-count="hidden"></div>
            </div>
            <div style="display:inline-block;margin-top:-6px;margin-left:10px;margin-right:-10px;">
            <a href="https://twitter.com/gurugamesth" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @gurugamesth</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>

            </div>
            <div class="clear"></div>
            <!-- <div class="autor">
                <?php if(Yii::app()->user->isGuest){ ?>
                    คุณยังไม่ได้เป็นสมาชิกกับเรา?   <a href="<?= Yii::app()->createUrl('site/login');?>">Login</a>  หรือ  <a href="<?= Yii::app()->createUrl('site/register');?>">Register</a>
                <?php }
                else { ?>
                    ยินดีต้อนรับ <?=Yii::app()->user->username;?> <a href="<?= Yii::app()->createUrl('site/logout');?>">log out</a>
                <?php } ?>
            </div>
            <form id="search" action="search.php" method="GET">
                <input type="text" name="s">                           
                <a onclick="document.getElementById('search').submit()" class="btn">Search</a>
                <div class="clear"></div>
            </form> -->
        </div>
        
        <div class="heade_mid" style="margin-top: -10px;">
            <a href="http://gurugames.in.th" class="backtohomepage">กลับเว็บหลัก Gurugames ทางนี้</a>
        </div>
        <div class="clear" style="margin-top: 10px;"></div>
        <!-- <div class="menu_block">
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
                                        <li><a href="<?= $subMenu->link; ?>"><?= $subMenu->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="clear"></div>
        </div> -->
    </div>
</header>
<div class="menu_block_xs visible-xs">
     <div class="clear"></div>
        <div class="heade_mid">
            <h1 style="padding:10px"><a href="<?= Yii::app()->createUrl('site/index');?>" style="width:160px"><img src="images/logo-gurugames2.png" alt="gurugames" style="width:100px"><img src="images/logo-gurugames4.png" alt="gurugames" style="height:35px;margin-top:15px"></a> </h1>
            <!-- <div class="autor">
                <?php if(Yii::app()->user->isGuest){ ?>
                    คุณยังไม่ได้เป็นสมาชิกกับเรา?   <a href="<?= Yii::app()->createUrl('site/login');?>">Login</a>  หรือ  <a href="<?= Yii::app()->createUrl('site/register');?>">Register</a>
                <?php }
                else { ?>
                    ยินดีต้อนรับ <?=Yii::app()->user->username;?> <a href="<?= Yii::app()->createUrl('site/logout');?>">log out</a>
                <?php } ?>
            </div>
            <form id="search" action="search.php" method="GET">
                <input type="text" name="s">                           
                <a onclick="document.getElementById('search').submit()" class="btn">Search</a>
                <div class="clear"></div>
            </form> -->
        </div>
    <!-- <div style="float:left;padding:10px 0px 0px 10px;">
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
                                <li><a href="<?= $subMenu->link; ?>"><?= $subMenu->name; ?></a></li>
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
    </div> -->
</div>