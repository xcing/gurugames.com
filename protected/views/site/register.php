<div class="content page1">
    <div class="container_24">
        <div class="grid_24" style="margin:20px;">
            <h3>Register User</h3>
            <br />
            <?php
            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
            }
            ?>

            <form method="POST">
                <div><?= $model->getAttributeLabel('username'); ?></div>
                <input type="text" name="User[username]" class="span5" style="width:200px;" value="<?= $model->username; ?>"/>
                <br /><br />

                <div><?= $model->getAttributeLabel('displayName'); ?></div>
                <input type="text" name="User[displayName]" class="span5" style="width:200px;" value="<?= $model->displayName; ?>"/>
                <br /><br />

                <div><?= $model->getAttributeLabel('md5_password'); ?></div>
                <input type="password" name="User[md5_password]" class="span5" style="width:200px;" value="<?= $model->md5_password; ?>"/>
                <br /><br />

                <div><?= $model->getAttributeLabel('confirm_password'); ?></div>
                <input type="password" name="User[confirm_password]" class="span5" style="width:200px;" value="<?= $model->confirm_password; ?>"/>
                <br /><br />

                <div>
                    <input type="submit" value="Register" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>
