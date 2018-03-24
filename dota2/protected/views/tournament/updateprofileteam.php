<div class="content page1">
    <div class="container_24">
        <div class="grid_24">
             <h2>แก้ไขข้อมูลทีม : <?=$model->name;?></h2>
        </div>
        <div class="clear"></div>
        <div class="grid_5">
            <?php $this->renderPartial('leftside'); ?>
        </div>
        <div class="grid_19" style="padding-left: 30px;">
           
            <?php
            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '" role="alert">' . $message . "</div>\n";
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div style="padding-top:10px;">
                    Email <span style="color:red" >*</span> (ใช้สำหรับ login)
                </div>
                <div>
                    <input type="text" name="Team[email]" style="width:50%;" value="<?=$model->email;?>"/>
                </div>
                <div style="padding-top:10px;">
                    ชื่อทีม <span style="color:red" >*</span>
                </div>
                <div>
                    <input type="text" name="Team[name]" style="width:50%;" value="<?=$model->name;?>"/>
                </div>
                <div style="padding-top:10px;">
                    ตัวย่อชื่อทีม <span style="color:red" >*</span>
                </div>
                <div>
                    <input type="text" name="Team[shortName]" style="width:50%;" maxlength="10" value="<?=$model->shortName;?>"/>
                </div>
                <div style="padding-top:10px;">
                    โลโก้ทีม
                </div>
                <div>
                    <input type="file" name="Team[logo]" />
                </div>
                <div style="margin:20px 0px;">
                    <input type="submit" class="btn btn-primary" value="Submit" style="padding:10px 20px;font-size:1.25em;" />
                </div>
            </form>
        </div>
        <div class="clear" style="padding-bottom:30px;"></div>
    </div>
</div>