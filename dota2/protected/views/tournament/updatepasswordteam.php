<div class="content page1">
    <div class="container_24">
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19" style="padding-left: 30px;">
            <h2>แก้ไขพาสเวิร์ดทีม</h2>
            <?php
            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
            }
            ?>
            <form method="POST">
                <div style="padding-top:10px;">
                    Old Password <span style="color:red" >*</span>
                </div>
                <div>
                    <input type="password" name="Team[oldPassword]" style="width:50%;" value="<?=$data['oldPassword'];?>"/>
                </div>
                <div style="padding-top:10px;">
                    New Password <span style="color:red" >*</span>
                </div>
                <div>
                    <input type="password" name="Team[password]" style="width:50%;" value="<?=$data['password'];?>"/>
                </div>
                <div style="padding-top:10px;">
                    Confirm Password <span style="color:red" >*</span>
                </div>
                <div>
                    <input type="password" name="Team[confirmPassword]" style="width:50%;" value="<?=$data['confirmPassword'];?>"/>
                </div>
                <div style="margin:20px 0px;">
                    <input type="submit" class="btn btn-primary" value="Submit" style="padding:10px 20px;font-size:1.25em;" />
                </div>
            </form>
        </div>
    </div>
</div>