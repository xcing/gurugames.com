<ul class="nav nav-tabs">
    <li>
        <a href="<?php echo $this->createUrl('/user/setting/password') ?>">
            <i class="icon-key icon-3x"></i><br/>เปลี่ยนรหัสผ่าน
        </a>
    </li>
    <li>
        <a href="<?php echo $this->createUrl('/user/user/update', array('id' => Yii::app()->user->id)) ?>">
            <i class="icon-user icon-3x"></i><br/>แก้ไขข้อมูล
        </a>
    </li>
</ul>