<?php

class Wording {

    private static $wordingArray = array(
        //monster scene
        'lv' => array('Level', 'เลเว่ล', '攻击值'),
        'exp' => array('Experience', 'ค่าประสบการณ์', '攻击值'),
        'str' => array('STR', 'ความแข็งแกร่ง', '生命值'),
        'vit' => array('VIT', 'ความทดทาน', '攻击值'),
        'dex' => array('DEX', 'ความชำนาญ', '生命值'),
        'agi' => array('AGI', 'ความคล่องแคล่ว', '攻击值'),
        'hp' => array('HP', 'พลังชีวิต', '生命值'),
        'atk' => array('Attack', 'พลังโจมตี', '攻击值'),
        'def' => array('Defense', 'พลังป้องกัน', '生命值'),
        'acc' => array('Accuracy', 'ความแม่นยำ', '攻击值'),
        'spd' => array('Speed', 'ความเร็ว', '生命值'),
        'eva' => array('Evasion', 'การหลบหลีก', '攻击值'),
        'con' => array('Condition', 'การติดสถานะ', '生命值'),
        'dcon' => array('D-Condition', 'ภูมิคุ้มกัน', '攻击值'),
        'leaderSkill' => array('Leader Skill', 'สกิลหัวหน้า', '生命值'),
        'statPoint' => array('Stat Point', 'ค่าพลัง', '生命值'),
        'submit' => array('Submit', 'ยืนยัน', '攻击值'),
        'resetStat' => array('Reset Stat', 'ล้างค่าพลัง', '生命值'),
        'monsterLimitLv' => array('Monster level at least', 'เลเว่ลมอนสเตอร์ต้องถึง', '攻击值'),
        'monsterLimitLvAlert' => array("Did not reach the level", "เลเว่ลยังไม่ถึง", "生命值"),
        'equip' => array('Equip', 'สวมใส่', '攻击值'),
        'unequip' => array('Unequip', 'ถอด', '生命值'),
        'haveAmount' => array('Have Amount', 'มีจำนวน', '攻击值'),
        'internetProb' => array('Internet Problem', 'ไม่สามารถเชื่อมต่ออินเตอร์เน็ตได้', '生命值'),
        'tryAgain' => array('Try again', 'ลองอีกครั้ง', '生命值'),
        'cancel' => array('Cancel', 'ยกเลิก', '生命值'),
        'dmg' => array('Dmg', 'ความแรง', '生命值'),
        'damage' => array('Damage', 'ความแรง', '生命值'),
        'dmgAcc' => array('Damage Accuracy', 'ความแม่น', '生命值'),
        'cond' => array('Condition', 'สถานะ', '生命值'),
        'condAcc' => array('Condition Accuracy', 'ความแม่นของการติดสถานะ', '生命值'),
        'reactCon' => array('React Cond', 'สถานะสะท้อนกลับ', '生命值'),
        'reactCond' => array('Reaction Condition', 'สถานะสะท้อนกลับ', '生命值'),
        'reactCondAcc' => array('Reaction Condition Accuracy', 'ความแม่นของการสถานะสะท้อนกลับ', '生命值'),
        'selfCon' => array('Self Cond', 'สถานะให้ตนเอง', '生命值'),
        'selfCond' => array('Self Condition', 'สถานะให้ตนเอง', '生命值'),
        'target' => array('Target', 'เป้าหมาย', '生命值'),
        'cd' => array('Cd', 'คูดาว', '生命值'),
        'cooldown' => array('Cool Down', 'คูดาว', '生命值'),
        'skillType' => array('Type', 'รูปแบบ', '生命值'),
        'castTime' => array('Cast Time', 'เวลาร่าย', '生命值'),
        'verySlow' => array('Very slow', 'ช้ามาก', '生命值'),
        'slow' => array('Slow', 'ช้า', '生命值'),
        'medium' => array('Medium', 'ปานกลาง', '生命值'),
        'fast' => array('Fast', 'เร็ว', '生命值'),
        'veryFast' => array('Very fast', 'เร็วมาก', '生命值'),
        'limitLvUpgradeSkill' => array('Max level skill is', 'สกิลเต็มที่เลเว่ล', '生命值'),
        'limitLvUpgradeSkillEvolve' => array('Evolve Max level is', 'หลังจากกลายร่างแล้วเต็มที่', '生命值'),
        'materialNotEnough' => array('Materials not enough', 'วัตถุดิบไม่เพียงพอ', '生命值'),
        'upgrade' => array('Upgrade', 'พัฒนา', '生命值'),
        'target1' => array('1 Enemy', 'ศัตรู 1 ตัว', '生命值'),
        'target2' => array('Horizontal', 'แนวนอน', '生命值'),
        'target3' => array('Vertical', 'แนวตั้ง', '生命值'),
        'target4' => array('All Enemy', 'ศัตรูทั้งหมด', '生命值'),
        'target5' => array('Myself', 'ตนเอง', '生命值'),
        'target6' => array('1 Allie', 'เพื่อน 1 ตัว', '生命值'),
        'target7' => array('All Allie', 'เพื่อนทั้งหมด', '生命值'),
        'target8' => array('All Charactor', 'ทั้งสนาม', '生命值'),
        'active' => array('Active', 'กดใช้', '生命值'),
        'passive' => array('Passive', 'ติดตัว', '生命值'),
        'evolve' => array('Evolve', 'กลายร่าง', '生命值'),
        'materialIsNotEnough' => array('Materials is not enough', 'วัตถุดิบไม่เพียงพอ', '生命值'),
        'monsterMustHaveLv' => array('Monster must have lv', 'ต้องมีเลเว่ลถึง', '生命值'),
        'soloSkill' => array('Solo Skill', 'สกิลเดี่ยว', '生命值'),
        'comboSkill' => array('Combo Skill', 'สกิลร่วม', '生命值'),
        'mustHave' => array('Must have', 'ต้องมี', '生命值'),
        'amount' => array('amount', 'จำนวน', '生命值'),
        'measure' => array('', 'ตัว', '生命值'),
        'forCombo' => array('for combo this skill', 'ในการร่วมกันใช้สกิลนี้', '生命值'),
        'mustUpgrageTo' => array('Must upgrade mosnter for', 'ต้องอัพเกรดมอนสเตอร์จนถึง', '生命值'),
        'star' => array('star', 'ดาว', '生命值'),
        'learn' => array('Learn', 'เรียนรู้', '生命值'),
        /*'' => array('', '', '生命值'),
        '' => array('', '', '生命值'),
        '' => array('', '', '生命值'),
        '' => array('', '', '生命值'),
        '' => array('', '', '生命值'),
        '' => array('', '', '生命值'),*/
        //battle scene
    );

    public static function getWording() {
        return self::$wordingArray;
    }

}

?>