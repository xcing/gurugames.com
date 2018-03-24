<?php
if (Yii::app()->controller->action->id != 'register') {
    foreach (Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
    }
}
?>

<?php if (Yii::app()->user->isGuest) { ?>
    <div style="background-color: #CF0606;color: white;font-weight: bold;width:100%;font-size:1.5em;padding:10px;text-align: center;">Login</div>
    <div style="border:1px solid #CF0606;padding:10px;background-color: #222222;color: white;">
        <form method="POST" action="<?= Yii::app()->createUrl('tournament/login'); ?>" id="login-form">
            <div><input type="text" name="LoginForm[username]" placeholder="Email" style="width:100%;padding:5px;color:black;"/></div>
            <div style="margin:10px 0px;"><input type="password" name="LoginForm[password]" placeholder="password" style="width:100%;padding:5px;color:black;"/></div>
            <div style="margin:10px 0px;"><input type="checkbox" name="LoginForm[rememberMe]" /> ให้ฉันอยู่ในระบบต่อไป</div>
            <div>
                <input class="btn" type="submit" value="Login" style="width:48%;background-color:#CF0606;color:white;" />
                <a href="<?= Yii::app()->createUrl('tournament/register'); ?>">
                    <input class="btn" type="button" value="Register" style="width:48%;background-color:#CF0606;color:white;" />
                </a>
            </div>
        </form>
    </div>
<?php } else { ?>
    <div style="background-color: #CF0606;font-weight: bold;width:100%;font-size:1.25em;padding:10px;text-align: center;"><?= Yii::app()->user->shortName; ?></div>
    <div style="border:1px solid #CF0606;padding:10px;">
        <div style="text-align: center">
            <img src="<?= Yii::app()->baseUrl . Yii::app()->user->logo; ?>" />
        </div>
        <div style="margin-top:10px;">
            <a href="<?= Yii::app()->createUrl('tournament/profileteam', array('teamId' => Yii::app()->user->id)); ?>">
                <input class="btn" type="button" value="Profile" style="width:48%;background-color:#CF0606;color:white;" />
            </a>
            <a href="<?= Yii::app()->createUrl('tournament/logout'); ?>">
                <input class="btn" type="button" value="Logout" style="width:48%;background-color:#CF0606;color:white;" />
            </a>
        </div>
    </div>
<?php } ?>
<div style="margin:20px 0px;text-align: center;">
    <a href="<?= Yii::app()->createUrl('tournament'); ?>">
        <button class="btn" style="padding:10px 20px;font-size:1.5em;width:95%;background-color:#222222;color:white;">รายการแข่ง</button>
    </a>
</div>
<!--div style="margin:20px 0px;text-align: center;">
    <a href="<?= Yii::app()->createUrl('tournament/ranking'); ?>">
        <button class="btn btn-success" style="padding:10px 20px;font-size:1.5em;width:95%;">Ranking</button>
    </a>
</div-->
<div style="margin:20px 0px;text-align: center;">
    <a href="<?= Yii::app()->createUrl('tournament/rule'); ?>">
        <button class="btn" style="padding:10px;font-size:1.5em;width:95%;background-color:#222222;color:white;">กฏการแข่ง</button>
    </a>
</div>
<div style="margin:20px 0px;text-align: center;">
    <a href="<?= Yii::app()->createUrl('tournament/tutorpostresult'); ?>">
        <button class="btn" style="padding:10px;font-size:1.5em;width:95%;background-color:#222222;color:white;">วิธีแจ้งผลการแข่ง</button>
    </a>
</div>
<div style="margin:20px 0px;text-align: center;">
    <a href="<?= Yii::app()->createUrl('tournament/tutorsaveresult'); ?>">
        <button class="btn" style="padding:10px;font-size:1.5em;width:95%;background-color:#222222;color:white;">วิธีเซฟภาพผลแข่ง</button>
    </a>
</div>
