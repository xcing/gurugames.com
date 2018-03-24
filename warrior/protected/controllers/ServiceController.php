<?php

class ServiceController extends Controller {

    public $signatureKey = 'XW@rRl3Er';
    public $userIdTest = '20150504101235123451';

    public function actionIndex() {
        
    }

    ///// ==========> Select
    public function actionGetUser() {
        $userId = Yii::app()->request->getParam('userId', $this->userIdTest);
        $model = User::model()->findByPk($userId);

        $data['user'] = $model->attributes;
        $data['data_user'] = $model->data_user->attributes;
        $data = json_encode($data);
        echo $data;
    }

    public function actionGetAllWarrior() {
        $model = Warrior::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $skill_model = Skill::model()->findAllByAttributes(array(
                'warriorId' => $data->warriorId,
            ));
            $amountSkill = count($skill_model);

            $datas[$data->warriorId] = $data->attributes;
            unset($datas[$data->warriorId]['nameEN']);
            unset($datas[$data->warriorId]['nameTH']);
            unset($datas[$data->warriorId]['nameCN']);
            $datas[$data->warriorId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            $datas[$data->warriorId]['amountSkill'] = (string) $amountSkill;
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllSkill() {
        $model = Skill::model()->findAll(array('order' => 'warriorId ASC, ordinal ASC'));
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->warriorId][$data->ordinal] = $data->attributes;
            unset($datas[$data->warriorId][$data->ordinal]['nameEN']);
            unset($datas[$data->warriorId][$data->ordinal]['nameTH']);
            unset($datas[$data->warriorId][$data->ordinal]['nameCN']);
            $datas[$data->warriorId][$data->ordinal]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            unset($datas[$data->warriorId][$data->ordinal]['detailEN']);
            unset($datas[$data->warriorId][$data->ordinal]['detailTH']);
            unset($datas[$data->warriorId][$data->ordinal]['detailCN']);
            $datas[$data->warriorId][$data->ordinal]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllEnemy() {
        $model = Enemy::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $skill_model = Enemyskill::model()->findAllByAttributes(array(
                'enemyId' => $data->enemyId,
            ));
            $amountSkill = count($skill_model);

            $datas[$data->enemyId] = $data->attributes;
            unset($datas[$data->enemyId]['nameEN']);
            unset($datas[$data->enemyId]['nameTH']);
            unset($datas[$data->enemyId]['nameCN']);
            $datas[$data->enemyId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            $datas[$data->enemyId]['amountSkill'] = (string) $amountSkill;
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllSkillEnemy() {
        $model = Enemyskill::model()->findAll(array('order' => 'enemyId ASC, ordinal ASC'));
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->enemyId][$data->ordinal] = $data->attributes;
            unset($datas[$data->enemyId][$data->ordinal]['nameEN']);
            unset($datas[$data->enemyId][$data->ordinal]['nameTH']);
            unset($datas[$data->enemyId][$data->ordinal]['nameCN']);
            $datas[$data->enemyId][$data->ordinal]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllLeaderSkill() {
        $model = Leaderskill::model()->findAll(array('order' => 'leaderskillId ASC'));
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->leaderskillId] = $data->attributes;
            unset($datas[$data->leaderskillId]['detailEN']);
            unset($datas[$data->leaderskillId]['detailTH']);
            unset($datas[$data->leaderskillId]['detailCN']);
            $datas[$data->leaderskillId]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllEquipment() {
        $model = Equipment::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->equipmentId] = $data->attributes;
            unset($datas[$data->equipmentId]['nameEN']);
            unset($datas[$data->equipmentId]['nameTH']);
            unset($datas[$data->equipmentId]['nameCN']);
            $datas[$data->equipmentId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllGem() {
        $model = Gem::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->gemId] = $data->attributes;
            unset($datas[$data->gemId]['nameEN']);
            unset($datas[$data->gemId]['nameTH']);
            unset($datas[$data->gemId]['nameCN']);
            $datas[$data->gemId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllGemSort() {
        $model = Gem::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->buffType][$data->rare] = $data->attributes;
            unset($datas[$data->buffType][$data->rare]['nameEN']);
            unset($datas[$data->buffType][$data->rare]['nameTH']);
            unset($datas[$data->buffType][$data->rare]['nameCN']);
            $datas[$data->buffType][$data->rare]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        ksort($datas);
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllCondition() {
        $model = Condition::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->conditionId] = $data->attributes;
            unset($datas[$data->conditionId]['nameEN']);
            unset($datas[$data->conditionId]['nameTH']);
            unset($datas[$data->conditionId]['nameCN']);
            $datas[$data->conditionId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            unset($datas[$data->conditionId]['detailEN']);
            unset($datas[$data->conditionId]['detailTH']);
            unset($datas[$data->conditionId]['detailCN']);
            $datas[$data->conditionId]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllElement() {
        $model = Element::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->elementId] = $data->attributes;
            unset($datas[$data->elementId]['nameEN']);
            unset($datas[$data->elementId]['nameTH']);
            unset($datas[$data->elementId]['nameCN']);
            $datas[$data->elementId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllWeaponType() {
        $model = Weapontype::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->weaponTypeId] = $data->attributes;
            unset($datas[$data->weaponTypeId]['nameEN']);
            unset($datas[$data->weaponTypeId]['nameTH']);
            unset($datas[$data->weaponTypeId]['nameCN']);
            $datas[$data->weaponTypeId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllStage() {
        $model = Stage::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->areaId][$data->level][$data->ordinal] = $data->attributes;
            unset($datas[$data->areaId][$data->level][$data->ordinal]['nameEN']);
            unset($datas[$data->areaId][$data->level][$data->ordinal]['nameTH']);
            unset($datas[$data->areaId][$data->level][$data->ordinal]['nameCN']);
            $datas[$data->areaId][$data->level][$data->ordinal]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllStageNormal() {
        $model = Stage::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->stageId] = $data->attributes;
            unset($datas[$data->stageId]['nameEN']);
            unset($datas[$data->stageId]['nameTH']);
            unset($datas[$data->stageId]['nameCN']);
            $datas[$data->stageId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllQuest() {
        $model = Quest::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->questId] = $data->attributes;
            unset($datas[$data->questId]['detailEN']);
            unset($datas[$data->questId]['detailTH']);
            unset($datas[$data->questId]['detailCN']);
            $datas[$data->questId]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllWording() {
        $data = Wording::getWording();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetAllTarget() {
        $data = Wording::getTarget();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetAllExpWarrior() {
        $data = Exp::getExpWarriorArray();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetAllMoneyUpgradeSkill() {
        $data = Exp::getMoneyUpgradeSkillArray();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetAllWarriorLvPlusDetail() {
        $data = Warriordata::getLvPlusDetail();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetAllArea() {
        echo Data::getAreaJson();
    }

    public function actionGetDataUser() {
        $userId = Yii::app()->request->getParam('userId', $this->userIdTest);
        $model = DataUser::model()->findByPk($userId);
        $mailModel = DataUserMail::model()->findAllByAttributes(array(
            'userId' => $userId,
            'opened' => 0,
        ));
        $friendModel = DataUserFriend::model()->findAllByAttributes(array(
            'data_userId1' => $userId,
        ));

        $dataWarrior = unserialize($model->data_warrior);
        $dataWarriorSoul = unserialize($model->data_warriorsoul);
        $dataEquipment = unserialize($model->data_equipment);
        $dataGem = unserialize($model->data_gem);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);
        $dataWarriorQuest = unserialize($model->data_warriorquest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["ore"] = (int) $model->ore;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_warrior"] = (int) $model->bag_warrior;
        $datas["bag_equipment"] = (int) $model->bag_equipment;
        $datas["bag_gem"] = (int) $model->bag_gem;
        foreach ($dataWarrior as $idx => $data) {
            $datas["warrior"][$idx] = $data;
        }
        foreach ($dataWarriorSoul as $idx => $data) {
            $datas["warriorSoul"][$idx] = $data;
        }
        foreach ($dataEquipment as $idx => $data) {
            $datas["equipment"][$idx] = $data;
        }
        foreach ($dataGem as $idx => $data) {
            $datas["gem"][$idx] = $data;
        }
        $datas["stage"] = $dataStage;
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
        }
        foreach ($dataWarriorQuest as $idx => $data) {
            $datas["warriorquest"][$idx] = $data;
        }
        foreach ($mailModel as $idx => $data) {
            $datas["mail"][$idx] = $data->attributes;
            $datas["mail"][$idx] = $data->mail->attributes;
            unset($datas["mail"][$idx]['data_user_mailId']);
            unset($datas["mail"][$idx]['subjectEN']);
            unset($datas["mail"][$idx]['subjectTH']);
            unset($datas["mail"][$idx]['subjectCN']);
            $datas["mail"][$idx]['subject'] = array($data->mail->subjectEN, $data->mail->subjectTH, $data->mail->subjectCN);
            unset($datas["mail"][$idx]['detailEN']);
            unset($datas["mail"][$idx]['detailTH']);
            unset($datas["mail"][$idx]['detailCN']);
            $datas["mail"][$idx]['detail'] = array($data->mail->detailEN, $data->mail->detailTH, $data->mail->detailCN);
            $datas["mail"][$idx]["itemAmount"] = (int) $data->mail->itemAmount;
        }
        foreach ($friendModel as $idx => $data) {
            $datas["friend"][$idx]["data_userId2"] = $data->data_userId2;
            $datas["friend"][$idx]["status"] = (int) $data->status;
            $datas["friend"][$idx]["receiveHeartAmount"] = (int) $data->receiveHeartAmount;
            $datas["friend"][$idx]["sendHeartLastedDate"] = $data->sendHeartLastedDate;
            $datas["friend"][$idx]["name"] = $data->user->name;
            $datas["friend"][$idx]["displayImage"] = $data->user->displayImage;
            $datas["friend"][$idx]["lv"] = (int) $data->user->level;
            $datas["friend"][$idx]["warPower"] = (int) $data->user->warPower;
        }

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["ore"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    ///// ==========> Update
    public function actionUpdateDataUser() {
        $userId = Yii::app()->request->getParam('userId', $this->userIdTest);
        $model = DataUser::model()->findByPk($userId);
        $mailModel = DataUserMail::model()->findAllByAttributes(array(
            'userId' => $userId,
            'opened' => 0,
        ));
        $friendModel = DataUserFriend::model()->findAllByAttributes(array(
            'data_userId1' => $userId,
        ));

        $dataWarrior = unserialize($model->data_warrior);
        $dataWarriorSoul = unserialize($model->data_warriorsoul);
        $dataEquipment = unserialize($model->data_equipment);
        $dataGem = unserialize($model->data_gem);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);
        $dataWarriorQuest = unserialize($model->data_warriorquest);

        $dataWarrior = array(
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113631',
                'level' => 20,
                'exp' => 250,
                'lvPlus' => 14,
                'dataEquipmentUserId' => array(
                    '120150504113639', '220150504113640', '0', '0', '1020150504113641', '520150504113641'
                ),
                'skillLv' => array(
                    29, 10, 1
                ),
                'skillLvPlus' => array(
                    2, 1, 1
                ),
                'position' => 1, // 0 = no fight, 1-9 = fight position
                //'isLeader' => true, // 0 = no, 1 = yes;
                'isLock' => true, // 0 = no lock, 1 = lock
            ),
            array(
                'warriorId' => 2,
                'warriorUserId' => '220150504113632',
                'level' => 6,
                'exp' => 100,
                'lvPlus' => 8,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    6, 3, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 2,
                //'isLeader' => false,
                'isLock' => false,
            ),
            array(
                'warriorId' => 7,
                'warriorUserId' => '720150504113633',
                'level' => 10,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 3,
                'isLock' => false,
            ),
            array(
                'warriorId' => 8,
                'warriorUserId' => '820150504113634',
                'level' => 16,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 8,
                'warriorUserId' => '820150504113635',
                'level' => 8,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 7,
                'warriorUserId' => '720150504113636',
                'level' => 8,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113638',
                'level' => 1,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113639',
                'level' => 3,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113640',
                'level' => 8,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113641',
                'level' => 1,
                'exp' => 100,
                'lvPlus' => 1,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113642',
                'level' => 1,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113643',
                'level' => 10,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'warriorId' => 1,
                'warriorUserId' => '120150504113644',
                'level' => 2,
                'exp' => 100,
                'lvPlus' => 0,
                'dataEquipmentUserId' => array(
                    '0', '0', '0', '0', '0', '0'
                ),
                'skillLv' => array(
                    1, 1, 1
                ),
                'skillLvPlus' => array(
                    1, 1, 1
                ),
                'position' => 0,
                'isLock' => false,
            ),
        );
        $dataWarriorSoul = array(
            array(
                'warriorId' => 1,
                'amount' => 25,
            ),
        );
        $dataEquipment = array(
            array(
                'equipmentId' => 1,
                'equipmentUserId' => '120150504113639',
                'lvPlus' => 4,
                'dataGemUserId' => array('120150504113642', '320150504113644', '-1'), // number = equip gemUserId = 1, 0 = not equip, -1 = slot is lock
                'warriorUserIdEquiped' => '120150504113631',
            ),
            array(
                'equipmentId' => 2,
                'equipmentUserId' => '220150504113640',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '-1'),
                'warriorUserIdEquiped' => '120150504113631',
            ),
            array(
                'equipmentId' => 3,
                'equipmentUserId' => '320150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '0', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 4,
                'equipmentUserId' => '420150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '0', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 5,
                'equipmentUserId' => '520150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '120150504113631',
            ),
            array(
                'equipmentId' => 6,
                'equipmentUserId' => '620150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 7,
                'equipmentUserId' => '720150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '0'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 8,
                'equipmentUserId' => '820150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('-1', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 9,
                'equipmentUserId' => '920150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '0', '0'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 10,
                'equipmentUserId' => '1020150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '-1', '-1'),
                'warriorUserIdEquiped' => '120150504113631',
            ),
            array(
                'equipmentId' => 1,
                'equipmentUserId' => '120150504113641',
                'rare' => 1,
                'lvPlus' => 0,
                'dataGemUserId' => array('-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 12,
                'equipmentUserId' => '1220150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 13,
                'equipmentUserId' => '1320150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '-1', '-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 14,
                'equipmentUserId' => '1420150504113641',
                'lvPlus' => 0,
                'dataGemUserId' => array('0', '0', '0'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 1,
                'equipmentUserId' => '120150504113646',
                'lvPlus' => 3,
                'dataGemUserId' => array('-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 3,
                'equipmentUserId' => '320150504113649',
                'lvPlus' => 2,
                'dataGemUserId' => array('-1'),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113650',
                'lvPlus' => 0,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113651',
                'lvPlus' => 1,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113652',
                'lvPlus' => 2,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113653',
                'lvPlus' => 6,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113654',
                'lvPlus' => 3,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113655',
                'lvPlus' => 10,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
            array(
                'equipmentId' => 11,
                'equipmentUserId' => '1120150504113656',
                'lvPlus' => 0,
                'dataGemUserId' => array(),
                'warriorUserIdEquiped' => '0',
            ),
        );
        $dataGem = array(
            array(
                'gemId' => 1,
                'gemUserId' => '120150504113642',
                'equipmentUserIdEquiped' => '120150504113639',
            ),
            array(
                'gemId' => 2,
                'gemUserId' => '220150504113643',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 3,
                'gemUserId' => '320150504113644',
                'status' => '120150504113639',
            ),
            array(
                'gemId' => 1,
                'gemUserId' => '120150504113645',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 2,
                'gemUserId' => '220150504113646',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 3,
                'gemUserId' => '320150504113647',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 1,
                'gemUserId' => '120150504113648',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 2,
                'gemUserId' => '220150504113649',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 3,
                'gemUserId' => '320150504113650',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 12,
                'gemUserId' => '1220150504113651',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 12,
                'gemUserId' => '1220150504113652',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 13,
                'gemUserId' => '1320150504113653',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 2,
                'gemUserId' => '220150504113654',
                'equipmentUserIdEquiped' => '0',
            ),
            array(
                'gemId' => 2,
                'gemUserId' => '220150504113655',
                'equipmentUserIdEquiped' => '0',
            ),
        );
        $dataStage = array(
            array(//area
                array(//level
                    1, 1, 1, 1, 1, 0 //ordinal  1 = pass. 0 = not pass
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
            ),
            array(
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
            ),
            array(
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
            ),
            array(
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
            ),
            array(
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
                array(
                    0, 0, 0, 0, 0, 0
                ),
            ),
        );
        /* $dataQuest = array(
          1,2
          ); */

        $dataQuest = array(
            array('questId' => 1, 'status' => 0),
            array('questId' => 2, 'status' => 1),
            array('questId' => 3, 'status' => 1),
            array('questId' => 4, 'status' => 0),
            array('questId' => 5, 'status' => 0),
            array('questId' => 6, 'status' => 0),
            array('questId' => 7, 'status' => 0),
            array('questId' => 8, 'status' => 0),
            array('questId' => 9, 'status' => 0),
        );

        $dataWarriorQuest = array(
            array(
                'warriorId' => 1,
                'status' => 0,
                'superEquipmentId' => 14,
            ),
            array(
                'warriorId' => 2,
                'status' => 1,
                'superEquipmentId' => 13,
            ),
            array(
                'warriorId' => 7,
                'status' => 6,
                'superEquipmentId' => 13,
            ),
            array(
                'warriorId' => 8,
                'status' => 10,
                'superEquipmentId' => 13,
            ),
        );

        $model->data_warrior = serialize($dataWarrior);
        $model->data_warriorsoul = serialize($dataWarriorSoul);
        $model->data_equipment = serialize($dataEquipment);
        $model->data_gem = serialize($dataGem);
        $model->data_stage = serialize($dataStage);
        $model->data_quest = serialize($dataQuest);
        $model->data_warriorquest = serialize($dataWarriorQuest);
        $model->money = 1000000;
        $model->save();

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["ore"] = (int) $model->ore;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_warrior"] = (int) $model->bag_warrior;
        $datas["bag_equipment"] = (int) $model->bag_equipment;
        $datas["bag_gem"] = (int) $model->bag_gem;
        foreach ($dataWarrior as $idx => $data) {
            $datas["warrior"][$idx] = $data;
        }
        foreach ($dataWarriorSoul as $idx => $data) {
            $datas["warriorSoul"][$idx] = $data;
        }
        foreach ($dataEquipment as $idx => $data) {
            $datas["equipment"][$idx] = $data;
        }
        foreach ($dataGem as $idx => $data) {
            $datas["gem"][$idx] = $data;
        }
        //foreach ($dataStage as $idx => $data) {
        //    $datas["stage"][$idx] = $data;
        //}
        $datas["stage"] = $dataStage;
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
        }
        foreach ($dataWarriorQuest as $idx => $data) {
            $datas["warriorquest"][$idx] = $data;
        }
        foreach ($mailModel as $idx => $data) {
            $datas["mail"][$idx] = $data->attributes;
            $datas["mail"][$idx] = $data->mail->attributes;
            unset($datas["mail"][$idx]['data_user_mailId']);
            unset($datas["mail"][$idx]['subjectEN']);
            unset($datas["mail"][$idx]['subjectTH']);
            unset($datas["mail"][$idx]['subjectCN']);
            $datas["mail"][$idx]['subject'] = array($data->mail->subjectEN, $data->mail->subjectTH, $data->mail->subjectCN);
            unset($datas["mail"][$idx]['detailEN']);
            unset($datas["mail"][$idx]['detailTH']);
            unset($datas["mail"][$idx]['detailCN']);
            $datas["mail"][$idx]['detail'] = array($data->mail->detailEN, $data->mail->detailTH, $data->mail->detailCN);
            $datas["mail"][$idx]["itemAmount"] = (int) $data->mail->itemAmount;
        }
        foreach ($friendModel as $idx => $data) {
            $datas["friend"][$idx]["data_userId2"] = $data->data_userId2;
            $datas["friend"][$idx]["status"] = (int) $data->status;
            $datas["friend"][$idx]["receiveHeartAmount"] = (int) $data->receiveHeartAmount;
            $datas["friend"][$idx]["sendHeartLastedDate"] = $data->sendHeartLastedDate;
            $datas["friend"][$idx]["name"] = $data->user->name;
            $datas["friend"][$idx]["displayImage"] = $data->user->displayImage;
            $datas["friend"][$idx]["lv"] = (int) $data->user->level;
            $datas["friend"][$idx]["warPower"] = (int) $data->user->warPower;
        }

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["ore"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    public function actionUpdate() {
        $data = Yii::app()->request->getParam('data');
        $data = Encryption::decryptRJ256($data);
        $data = explode("|", $data);
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        switch ($data[0]) {
            case "getdatauser":
                self::GetDataUser($data);
                break;
            case "upgradelvskill":
                self::UpgradeLvSkill($data);
                break;
            case "removeequipment":
                self::RemoveEquipment($data);
                break;
            case "equipequipment":
                self::EquipEquipment($data);
                break;
            case "removeallequipment":
                self::RemoveAllEquipment($data);
                break;
            case "lockwarrior":
                self::LockWarrior($data);
                break;
            case "upgradelvpluswarrior":
                self::UpgradeLvPlusWarrior($data);
                break;
            case "enhanceequipment":
                self::EnhanceEquipment($data);
                break;
            case "fullenhanceequipment":
                self::FullEnhanceEquipment($data);
                break;
            case "fuseequipment":
                self::FuseEquipment($data);
                break;
            case "sellequipment":
                self::SellEquipment($data);
                break;
            case "unlockgemslot":
                self::UnlockGemSlot($data);
                break;
            case "upgradeequipmentbag":
                self::UpgradeEquipmentBag($data);
                break;
            case "removegem":
                self::RemoveGem($data);
                break;
            case "equipgem":
                self::EquipGem($data);
                break;
            case "sellgem":
                self::SellGem($data);
                break;
            case "upgradewarriorbag":
                self::UpgradeWarriorBag($data);
                break;
            case "changepositionteam":
                self::ChangePositionTeam($data);
                break;
            case "buyitemfrommoneystore":
                self::BuyItemFromMoneyStore($data);
                break;
            case "refreshmoneystore":
                self::RefreshMoneyStore($data);
                break;
            case "upgradebag":
                self::UpgradeBag($data);
                break;
            case "combinegem":
                self::CombineGem($data);
                break;
            case "receiptmail":
                self::ReceiptMail($data);
                break;
            case "openchest":
                self::OpenChest($data);
                break;
            case "addfriend":
                self::AddFriend($data);
                break;
            case "acceptfriend":
                self::AcceptFriend($data);
                break;
            case "cancelfriend":
                self::CancelFriend($data);
                break;
            case "sendhearttofriend":
                self::SendHeartToFriend($data);
                break;
            case "sendheartallfriend":
                self::SendHeartAllFriend($data);
                break;
            default:
                die('fail');
                break;
        }
    }

    public function GetDataUser($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $model = DataUser::model()->findByPk($userId);
        $mailModel = DataUserMail::model()->findAllByAttributes(array(
            'userId' => $userId,
            'opened' => 0,
        ));
        $friendModel = DataUserFriend::model()->findAllByAttributes(array(
            'data_userId1' => $userId,
        ));
        $dataWarrior = unserialize($model->data_warrior);
        $dataWarriorSoul = unserialize($model->data_warriorsoul);
        $dataEquipment = unserialize($model->data_equipment);
        $dataGem = unserialize($model->data_gem);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);
        $dataWarriorQuest = unserialize($model->data_warriorquest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["ore"] = (int) $model->ore;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_warrior"] = (int) $model->bag_warrior;
        $datas["bag_equipment"] = (int) $model->bag_equipment;
        $datas["bag_gem"] = (int) $model->bag_gem;
        foreach ($dataWarrior as $idx => $data) {
            $datas["warrior"][$idx] = $data;
        }
        foreach ($dataWarriorSoul as $idx => $data) {
            $datas["warriorSoul"][$idx] = $data;
        }
        foreach ($dataEquipment as $idx => $data) {
            $datas["equipment"][$idx] = $data;
        }
        foreach ($dataGem as $idx => $data) {
            $datas["gem"][$idx] = $data;
        }
        $datas["stage"] = $dataStage;
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
        }
        foreach ($dataWarriorQuest as $idx => $data) {
            $datas["warriorquest"][$idx] = $data;
        }
        foreach ($mailModel as $idx => $data) {
            $datas["mail"][$idx] = $data->attributes;
            $datas["mail"][$idx] = $data->mail->attributes;
            unset($datas["mail"][$idx]['data_user_mailId']);
            unset($datas["mail"][$idx]['subjectEN']);
            unset($datas["mail"][$idx]['subjectTH']);
            unset($datas["mail"][$idx]['subjectCN']);
            $datas["mail"][$idx]['subject'] = array($data->mail->subjectEN, $data->mail->subjectTH, $data->mail->subjectCN);
            unset($datas["mail"][$idx]['detailEN']);
            unset($datas["mail"][$idx]['detailTH']);
            unset($datas["mail"][$idx]['detailCN']);
            $datas["mail"][$idx]['detail'] = array($data->mail->detailEN, $data->mail->detailTH, $data->mail->detailCN);
            $datas["mail"][$idx]["itemAmount"] = (int) $data->mail->itemAmount;
        }
        foreach ($friendModel as $idx => $data) {
            $datas["friend"][$idx]["data_userId2"] = $data->data_userId2;
            $datas["friend"][$idx]["status"] = (int) $data->status;
            $datas["friend"][$idx]["receiveHeartAmount"] = (int) $data->receiveHeartAmount;
            $datas["friend"][$idx]["sendHeartLastedDate"] = $data->sendHeartLastedDate;
            $datas["friend"][$idx]["name"] = $data->user->name;
            $datas["friend"][$idx]["displayImage"] = $data->user->displayImage;
            $datas["friend"][$idx]["lv"] = (int) $data->user->level;
            $datas["friend"][$idx]["warPower"] = (int) $data->user->warPower;
        }
        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["ore"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    public function UpgradeLvSkill($data) {

        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $currentPickSkill = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);
        $moneyUpgradeSkillModel = Exp::getMoneyUpgradeSkillArray();

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }
        $warriorModel = Warrior::model()->findByPk($dataWarriors[$warriorKey]['warriorId']);

        $moneyUse = $moneyUpgradeSkillModel[$warriorModel->rare][$currentPickSkill][$dataWarriors[$warriorKey]['skillLv'][$currentPickSkill - 1]];

        //die($dataWarriors[$warriorKey]['skillLv'][$currentPickSkill-1].' '.$dataWarriors[$warriorKey]["level"].' '.$model->money.' '.$moneyUpgradeSkillModel[$warriorModel->rare][$currentPickSkill][$dataWarriors[$warriorKey]['skillLv'][$currentPickSkill-1]]);
        if ($dataWarriors[$warriorKey]['skillLv'][$currentPickSkill - 1] < $dataWarriors[$warriorKey]["level"] && $model->money >= $moneyUse) {
            $dataWarriors[$warriorKey]['skillLv'][$currentPickSkill - 1]++;
            $model->data_warrior = serialize($dataWarriors);
            $model->money -= $moneyUse;
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail2";
            }
        } else {
            echo "fail3";
        }
    }

    public function actionTestTestTest() {
        $model = DataUser::model()->findByPk('20150504101235123451');
        $dataWarriors = unserialize($model->data_warrior);
        $dataEquipments = unserialize($model->data_equipment);
        $dataWarriorSouls = unserialize($model->data_warriorsoul);
        $dataGems = unserialize($model->data_gem);

        $gemId = 2;
        $key = array_count_values(Utility::array_column($dataGems, 'gemId'));
        print_r($key);
        exit;

        /* foreach ($dataWarriors as $idx => $dataWarrior) {
          if ($dataWarrior['warriorUserId'] == '120150504113631') {
          $warriorKey = $idx;
          break;
          }
          }

          unset($dataWarriors[3]); */

        //$key = array_count_values(Utility::array_column($dataEquipments, 'status'));

        $itemId = 7;
        $warriorSoulKey = array_search($itemId, Utility::array_column($dataWarriorSouls, 'warriorId'));
        print_r($dataWarriorSouls[$warriorSoulKey]['warriorId']);
        if ($dataWarriorSouls[$warriorSoulKey]['warriorId'] != $itemId) {
            $count = count($dataWarriorSouls);
            $dataWarriorSouls[$count]['warriorId'] = $itemId;
            $dataWarriorSouls[$count]['amount'] = 1;
        } else {
            $dataWarriorSouls[$warriorSoulKey]['amount']++;
        }
        print_r($dataWarriorSouls);
        exit;
        $model->data_warriorsoul = serialize(array_values($dataWarriorSouls));
        exit;
    }

    public function RemoveEquipment($data) {

        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $currentPickEquiped = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }

        $statusArray = array_count_values(Utility::array_column($dataEquipments, 'status'));
        if ($model->bag_equipment > $statusArray[0]) {
            $equipmentKey = array_search($dataWarriors[$warriorKey]['dataEquipmentUserId'][$currentPickEquiped - 1], Utility::array_column($dataEquipments, 'equipmentUserId'));
            $dataEquipments[$equipmentKey]['status'] = 0;
            $dataWarriors[$warriorKey]['dataEquipmentUserId'][$currentPickEquiped - 1] = "0";
            $model->data_warrior = serialize($dataWarriors);
            $model->data_equipment = serialize($dataEquipments);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail2";
            }
        } else {
            echo "fail3";
        }
    }

    public function RemoveAllEquipment($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }

        $statusArray = array_count_values(Utility::array_column($dataEquipments, 'status'));
        $equipmentUserIdArray = array_count_values($dataWarriors[$warriorKey]['dataEquipmentUserId']);

        if ($model->bag_equipment >= $statusArray[0] + $equipmentUserIdArray[0]) {
            foreach ($dataWarriors[$warriorKey]['dataEquipmentUserId'] as $equipmentUserId) {
                if ($equipmentUserId != 0) {
                    $equipmentKey = array_search($equipmentUserId, Utility::array_column($dataEquipments, 'equipmentUserId'));
                    $dataEquipments[$equipmentKey]['status'] = 0;
                }
            }
            for ($i = 0; $i < 6; $i++) {
                $dataWarriors[$warriorKey]['dataEquipmentUserId'][$i] = "0";
            }
            $model->data_warrior = serialize($dataWarriors);
            $model->data_equipment = serialize($dataEquipments);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail2";
            }
        } else {
            echo "fail3";
        }
    }

    public function EquipEquipment($data) {

        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $currentPickEquiped = $data[4];
        $equipmentUserId = $data[5];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }

        $equipmentKey = array_search($equipmentUserId, Utility::array_column($dataEquipments, 'equipmentUserId'));
        $dataEquipments[$equipmentKey]['status'] = 1;
        if ($dataWarriors[$warriorKey]['dataEquipmentUserId'][$currentPickEquiped - 1] != "0") {
            $equipmentKey = array_search($dataWarriors[$warriorKey]['dataEquipmentUserId'][$currentPickEquiped - 1], Utility::array_column($dataEquipments, 'equipmentUserId'));
            $dataEquipments[$equipmentKey]['status'] = 0;
        }
        $dataWarriors[$warriorKey]['dataEquipmentUserId'][$currentPickEquiped - 1] = $equipmentUserId;
        $model->data_warrior = serialize($dataWarriors);
        $model->data_equipment = serialize($dataEquipments);
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail2";
        }
    }

    public function LockWarrior($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }

        if ($dataWarriors[$warriorKey]['isLock']) {
            $dataWarriors[$warriorKey]['isLock'] = false;
        } else {
            $dataWarriors[$warriorKey]['isLock'] = true;
        }

        $model->data_warrior = serialize($dataWarriors);
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail2";
        }
    }

    public function UpgradeLvPlusWarrior($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $warriorUserId = $data[3];
        $isUpgradeBySoul = $data[4];
        $currentPickUpgradeWarrior = $data[5];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);

        foreach ($dataWarriors as $idx => $dataWarrior) {
            if ($dataWarrior['warriorUserId'] == $warriorUserId) {
                $warriorKey = $idx;
                break;
            }
        }
        $warriorModel = Warrior::model()->findByPk($dataWarriors[$warriorKey]['warriorId']);

        if ($isUpgradeBySoul == 'True') {
            $dataWarriorSouls = unserialize($model->data_warriorsoul);
            foreach ($dataWarriorSouls as $idx => $dataWarriorSoul) {
                if ($dataWarriorSoul['warriorId'] == $dataWarriors[$warriorKey]['warriorId']) {
                    $warriorSoulKey = $idx;
                    break;
                }
            }

            if ($dataWarriorSouls[$warriorSoulKey]['amount'] < $warriorModel->rare * 10) {
                echo "fail2";
            } else if ($warriorModel->rare * 1000 * ($dataWarriors[$warriorKey]['lvPlus'] + 1) > $model->money) {
                echo "fail3";
            } else if ($dataWarriors[$warriorKey]['lvPlus'] >= $dataWarriors[$warriorKey]['level']) {
                echo "fail4";
            } else {
                $dataWarriors[$warriorKey]['lvPlus']++;
                if ($dataWarriors[$warriorKey]['lvPlus'] == 3) {
                    $dataWarriors[$warriorKey]['skillLv'][1] = 1;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] == 6) {
                    $dataWarriors[$warriorKey]['skillLv'][2] = 1;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 0) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][0]++;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 3) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][1]++;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 6) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][2]++;
                }
                $dataWarriorSouls[$warriorSoulKey]['amount'] -= ($warriorModel->rare * 10);
                $model->money -= $warriorModel->rare * 1000 * $dataWarriors[$warriorKey]['lvPlus'];
                $model->data_warriorsoul = serialize($dataWarriorSouls);
                $model->data_warrior = serialize($dataWarriors);
                if ($model->save()) {
                    echo "success";
                } else {
                    echo "fail5";
                }
            }
        } else {
            $sacrificeWarriorKey = null;
            foreach ($dataWarriors as $idx => $dataWarrior) {
                if ($dataWarrior['warriorUserId'] == $currentPickUpgradeWarrior) {
                    $sacrificeWarriorKey = $idx;
                    break;
                }
            }

            if ($sacrificeWarriorKey == null) {
                echo "fail2";
            } else if ($dataWarriors[$sacrificeWarriorKey]['lvPlus'] > $dataWarriors[$warriorKey]['lvPlus']) {
                echo "fail3";
            } else if ($dataWarriors[$sacrificeWarriorKey]['lvPlus'] == $dataWarriors[$warriorKey]['lvPlus'] && $dataWarriors[$sacrificeWarriorKey]['level'] > $dataWarriors[$warriorKey]['level']) {
                echo "fail4";
            } else if ($warriorModel->rare * 1000 * ($dataWarriors[$warriorKey]['lvPlus'] + 1) > $model->money) {
                echo "fail5";
            } else if ($dataWarriors[$warriorKey]['lvPlus'] >= $dataWarriors[$warriorKey]['level']) {
                echo "fail6";
            } else {
                $dataWarriors[$warriorKey]['lvPlus']++;
                if ($dataWarriors[$warriorKey]['lvPlus'] == 3) {
                    $dataWarriors[$warriorKey]['skillLv'][1] = 1;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] == 6) {
                    $dataWarriors[$warriorKey]['skillLv'][2] = 1;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 0) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][0]++;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 3) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][1]++;
                } else if ($dataWarriors[$warriorKey]['lvPlus'] > 7 && $dataWarriors[$warriorKey]['lvPlus'] % 10 == 6) {
                    $dataWarriors[$warriorKey]['skillLvPlus'][2]++;
                }
                unset($dataWarriors[$sacrificeWarriorKey]);
                $model->money -= $warriorModel->rare * 1000 * $dataWarriors[$warriorKey]['lvPlus'];
                $model->data_warrior = serialize(array_values($dataWarriors));
                if ($model->save()) {
                    echo "success";
                } else {
                    echo "fail7";
                }
            }
        }
    }

    public function EnhanceEquipment($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $equipmentModel = Equipment::model()->findByPk($dataEquipments[$equipmentKey]['equipmentId']);

        if ($dataEquipments[$equipmentKey]['lvPlus'] >= $model->level) {
            echo "fail2";
        } else if ($model->ore < Equipmentdata::calculateEnhanceOre($equipmentModel->rare, $dataEquipments[$equipmentKey]['lvPlus'])) {
            echo "fail3";
        } else {
            $model->ore -= Equipmentdata::calculateEnhanceOre($equipmentModel->rare, $dataEquipments[$equipmentKey]['lvPlus']);
            $dataEquipments[$equipmentKey]['lvPlus']++;
            $model->data_equipment = serialize($dataEquipments);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail4";
            }
        }
    }

    public function FullEnhanceEquipment($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $equipmentModel = Equipment::model()->findByPk($dataEquipments[$equipmentKey]['equipmentId']);

        if ($dataEquipments[$equipmentKey]['lvPlus'] >= $model->level) {
            echo "fail2";
        } else if ($model->ore < Equipmentdata::calculateFullEnhanceOre($equipmentModel->rare, $dataEquipments[$equipmentKey]['lvPlus'], $model->level)) {
            echo "fail3";
        } else {
            $model->ore -= Equipmentdata::calculateFullEnhanceOre($equipmentModel->rare, $dataEquipments[$equipmentKey]['lvPlus'], $model->level);
            $dataEquipments[$equipmentKey]['lvPlus'] = (int) $model->level;
            $model->data_equipment = serialize($dataEquipments);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail4";
            }
        }
    }

    public function FuseEquipment($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $equipmentModel = Equipment::model()->findByPk($dataEquipments[$equipmentKey]['equipmentId']);

        if ($equipmentModel->warriorId != 0) {
            echo "fail2";
        } else {
            $model->ore += Equipmentdata::calculateFuseEquipment($equipmentModel->rare, $dataEquipments[$equipmentKey]['lvPlus']);
            unset($dataEquipments[$equipmentKey]);
            $model->data_equipment = serialize(array_values($dataEquipments));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function SellEquipment($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $equipmentModel = Equipment::model()->findByPk($dataEquipments[$equipmentKey]['equipmentId']);

        if ($equipmentModel->warriorId != 0) {
            echo "fail2";
        } else {
            $model->money += Equipmentdata::calculateSellEquipment($equipmentModel->rare);
            unset($dataEquipments[$equipmentKey]);
            $model->data_equipment = serialize(array_values($dataEquipments));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function UnlockGemSlot($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $positionGemUnlock = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $equipmentModel = Equipment::model()->findByPk($dataEquipments[$equipmentKey]['equipmentId']);

        if (Equipmentdata::calculateUnlockGemSlot($equipmentModel->rare, $positionGemUnlock) > $model->money) {
            echo "fail2";
        } else {
            $model->money -= Equipmentdata::calculateUnlockGemSlot($equipmentModel->rare, $positionGemUnlock);
            $dataEquipments[$equipmentKey]['gem'][$positionGemUnlock - 1] = '0';
            $model->data_equipment = serialize($dataEquipments);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function UpgradeEquipmentBag($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $model = DataUser::model()->findByPk($userId);

        if ($model->diamond < 5) {
            echo "fail2";
        } else {
            $model->diamond -= 5;
            $model->bag_equipment += 5;
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function UpgradeWarriorBag($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $model = DataUser::model()->findByPk($userId);

        if ($model->diamond < 5) {
            echo "fail2";
        } else {
            $model->diamond -= 5;
            $model->bag_warrior += 5;
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function RemoveGem($data) {

        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $currentPositionPickGem = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);
        $dataGems = unserialize($model->data_gem);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }
        $gemKey = array_search($dataEquipments[$equipmentKey]['gem'][$currentPositionPickGem - 1], Utility::array_column($dataGems, 'gemUserId'));
        $gemModel = Gem::model()->findByPk($dataGems[$gemKey]['gemId']);

        $statusArray = array_count_values(Utility::array_column($dataGems, 'status'));
        if ($gemModel->rare * $gemModel->rare * 1000 > $model->money) {
            echo "fail2";
        } else if ($model->bag_gem <= $statusArray[0]) {
            echo "fail3";
        } else {
            $dataGems[$gemKey]['status'] = 0;
            $dataEquipments[$equipmentKey]['gem'][$currentPositionPickGem - 1] = "0";
            $model->money -= $gemModel->rare * $gemModel->rare * 1000;
            $model->data_equipment = serialize($dataEquipments);
            $model->data_gem = serialize($dataGems);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail4";
            }
        }
    }

    public function EquipGem($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $equipmentUserId = $data[3];
        $currentPositionPickGem = $data[4];
        $gemUserId = $data[5];
        $model = DataUser::model()->findByPk($userId);
        $dataEquipments = unserialize($model->data_equipment);
        $dataGems = unserialize($model->data_gem);

        foreach ($dataEquipments as $idx => $dataEquipment) {
            if ($dataEquipment['equipmentUserId'] == $equipmentUserId) {
                $equipmentKey = $idx;
                break;
            }
        }

        $gemKey = array_search($gemUserId, Utility::array_column($dataGems, 'gemUserId'));
        $dataGems[$gemKey]['status'] = 1;

        $dataEquipments[$equipmentKey]['gem'][$currentPositionPickGem - 1] = $gemUserId;
        $model->data_equipment = serialize($dataEquipments);
        $model->data_gem = serialize($dataGems);
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail2";
        }
    }

    public function SellGem($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $gemUserId = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataGems = unserialize($model->data_gem);

        foreach ($dataGems as $idx => $dataGem) {
            if ($dataGem['gemUserId'] == $gemUserId) {
                $gemKey = $idx;
                break;
            }
        }
        $gemModel = Gem::model()->findByPk($dataGems[$gemKey]['gemId']);

        $model->money += Equipmentdata::calculateSellGem($gemModel->rare);
        unset($dataGems[$gemKey]);
        $model->data_gem = serialize(array_values($dataGems));
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail2";
        }
    }

    public function ChangePositionTeam($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $jsonWarriorsPosition = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $dataWarriors = unserialize($model->data_warrior);

        $warriorsPosition = json_decode($jsonWarriorsPosition);

        foreach ($warriorsPosition as $idx => $warrior) {
            $dataWarriors[$idx]["position"] = $warrior->position;
        }

        $model->data_warrior = serialize($dataWarriors);
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail2";
        }
    }

    public function BuyItemFromMoneyStore($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $itemType = $data[3];
        $itemId = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $itemUserId = '';
        switch ($itemType) {
            case 1:
                $warriorModel = Warrior::model()->findByPk($itemId);
                $price = $warriorModel->rare * $warriorModel->rare * 10000;
                if ($model->money < $price) {
                    die('fail2');
                } else {
                    $dataWarriorSouls = unserialize($model->data_warriorsoul);

                    $warriorSoulKey = array_search($itemId, Utility::array_column($dataWarriorSouls, 'warriorId'));
                    if ($dataWarriorSouls[$warriorSoulKey]['warriorId'] != $itemId) {
                        $count = count($dataWarriorSouls);
                        $dataWarriorSouls[$count]['warriorId'] = (int) $itemId;
                        $dataWarriorSouls[$count]['amount'] = 1;
                    } else {
                        $dataWarriorSouls[$warriorSoulKey]['amount']++;
                    }
                    $model->data_warriorsoul = serialize(array_values($dataWarriorSouls));
                }
                break;
            case 2:
                $warriorModel = Warrior::model()->findByPk($itemId);
                $price = $warriorModel->rare * $warriorModel->rare * 150000;
                $dataWarriors = unserialize($model->data_warrior);
                $count = count($dataWarriors);
                if ($model->money < $price) {
                    die('fail3');
                } else if ($model->bag_warrior <= $count) {
                    die('fail4');
                } else {
                    $dataWarriors[$count]['warriorId'] = (int) $itemId;
                    $dataWarriors[$count]['warriorUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataWarriors[$count]['warriorUserId'];
                    $dataWarriors[$count]['level'] = 1;
                    $dataWarriors[$count]['exp'] = 0;
                    $dataWarriors[$count]['lvPlus'] = 0;
                    $dataWarriors[$count]['dataEquipmentUserId'] = array('0', '0', '0', '0', '0', '0');
                    $dataWarriors[$count]['skillLv'] = array(1, 1, 1);
                    $dataWarriors[$count]['skillLvPlus'] = array(1, 1, 1);
                    $dataWarriors[$count]['position'] = 0;
                    //$dataWarriors[$count]['isLeader'] = false;
                    $dataWarriors[$count]['isLock'] = false;
                }
                $model->data_warrior = serialize(array_values($dataWarriors));
                break;
            case 3:
                $equipmentModel = Equipment::model()->findByPk($itemId);
                $price = $equipmentModel->rare * $equipmentModel->rare * 1000;
                $dataEquipments = unserialize($model->data_equipment);
                $count = count($dataEquipments);
                if ($model->money < $price) {
                    die('fail5');
                } else if ($model->bag_equipment <= $count) {
                    die('fail6');
                } else {
                    $gemArray = array();
                    $dataEquipments[$count]['equipmentId'] = (int) $itemId;
                    $dataEquipments[$count]['equipmentUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataEquipments[$count]['equipmentUserId'];
                    $dataEquipments[$count]['lvPlus'] = 0;
                    if ($equipmentModel->rare == 6) {
                        $gemArray = array('-1', '-1', '-1');
                    } else if ($equipmentModel->rare >= 4) {
                        $gemArray = array('-1', '-1');
                    } else if ($equipmentModel->rare >= 2) {
                        $gemArray = array('-1');
                    }
                    $dataEquipments[$count]['dataGemUserId'] = $gemArray;
                    $dataEquipments[$count]['warriorUserIdEquiped'] = '0';
                }
                $model->data_equipment = serialize(array_values($dataEquipments));
                break;
            case 4:
                $gemModel = Gem::model()->findByPk($itemId);
                $price = $gemModel->rare * $gemModel->rare * 1000;
                $dataGems = unserialize($model->data_gem);
                $count = count($dataGems);
                if ($model->money < $price) {
                    die('fail7');
                } else if ($model->bag_gem <= $count) {
                    die('fail8');
                } else {
                    $dataGems[$count]['gemId'] = (int) $itemId;
                    $dataGems[$count]['gemUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataGems[$count]['gemUserId'];
                    $dataGems[$count]['equipmentUserIdEquiped'] = '0';
                }
                $model->data_gem = serialize(array_values($dataGems));
                break;
        }
        $model->money -= $price;

        if ($model->save()) {
            echo "success," . $itemUserId;
        } else {
            echo "fail9";
        }
    }

    public function RefreshMoneyStore($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $model = DataUser::model()->findByPk($userId);

        if ($model->diamond < 5) {
            echo "fail2";
        } else {
            $model->diamond -= 5;
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function UpgradeBag($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $type = $data[3];
        $model = DataUser::model()->findByPk($userId);

        if ($model->diamond < 5) {
            echo "fail2";
        } else {
            $model->diamond -= 5;
            if ($type == 2) {
                $model->bag_warrior += 5;
            } else if ($type == 3) {
                $model->bag_equipment += 5;
            } else if ($type == 4) {
                $model->bag_gem += 5;
            }
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail3";
            }
        }
    }

    public function CombineGem($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $gemId = $data[3];
        $materialGemId = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataGems = unserialize($model->data_gem);
        $gemModel = Gem::model()->findByPk($gemId);

        $gemHave = array_count_values(Utility::array_column($dataGems, 'gemId'));
        if ($gemModel->rare < 4) {
            $gemRequire = 5;
        } else {
            $gemRequire = 10;
        }

        if ($model->ore < ($gemModel->rare * $gemModel->rare * 500)) {
            echo "fail2";
        } else if ($gemHave[$materialGemId] < $gemRequire) {
            echo "fail3";
        } else {
            for ($i = 1; $i <= $gemRequire; $i++) {
                foreach ($dataGems as $idx => $dataGem) {
                    if ($dataGem['gemId'] == $materialGemId) {
                        $materialGemKey = $idx;
                        break;
                    }
                }
                unset($dataGems[$materialGemKey]);
            }
            $count = count($dataGems);
            $dataGems[$count]['gemId'] = (int) $gemId;
            $dataGems[$count]['gemUserId'] = $gemId . date('YmdHis');
            $itemUserId = $dataGems[$count]['gemUserId'];
            $dataGems[$count]['equipmentUserIdEquiped'] = '0';

            $model->ore -= ($gemModel->rare * $gemModel->rare * 500);
            $model->data_gem = serialize(array_values($dataGems));
            if ($model->save()) {
                echo "success," . $itemUserId;
            } else {
                echo "fail4";
            }
        }
    }

    public function ReceiptMail($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $itemType = $data[3];
        $itemId = $data[4];
        $amount = $data[5];
        $mailId = $data[6];
        $model = DataUser::model()->findByPk($userId);
        $itemUserId = '';
        switch ($itemType) {
            case 1:
                $dataWarriorSouls = unserialize($model->data_warriorsoul);

                $warriorSoulKey = array_search($itemId, Utility::array_column($dataWarriorSouls, 'warriorId'));
                if ($dataWarriorSouls[$warriorSoulKey]['warriorId'] != $itemId) {
                    $count = count($dataWarriorSouls);
                    $dataWarriorSouls[$count]['warriorId'] = (int) $itemId;
                    $dataWarriorSouls[$count]['amount'] = $amount;
                } else {
                    $dataWarriorSouls[$warriorSoulKey]['amount'] += $amount;
                }
                $model->data_warriorsoul = serialize(array_values($dataWarriorSouls));

                break;
            case 2:
                $dataWarriors = unserialize($model->data_warrior);
                $count = count($dataWarriors);
                if ($model->bag_warrior <= $count) {
                    die('fail4');
                } else {
                    $dataWarriors[$count]['warriorId'] = (int) $itemId;
                    $dataWarriors[$count]['warriorUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataWarriors[$count]['warriorUserId'];
                    $dataWarriors[$count]['level'] = 1;
                    $dataWarriors[$count]['exp'] = 0;
                    $dataWarriors[$count]['lvPlus'] = 0;
                    $dataWarriors[$count]['dataEquipmentUserId'] = array('0', '0', '0', '0', '0', '0');
                    $dataWarriors[$count]['skillLv'] = array(1, 1, 1);
                    $dataWarriors[$count]['skillLvPlus'] = array(1, 1, 1);
                    $dataWarriors[$count]['position'] = 0;
                    //$dataWarriors[$count]['isLeader'] = false;
                    $dataWarriors[$count]['isLock'] = false;
                }
                $model->data_warrior = serialize(array_values($dataWarriors));
                break;
            case 3:
                $dataEquipments = unserialize($model->data_equipment);
                $count = count($dataEquipments);
                if ($model->bag_equipment <= $count) {
                    die('fail6');
                } else {
                    $gemArray = array();
                    $dataEquipments[$count]['equipmentId'] = (int) $itemId;
                    $dataEquipments[$count]['equipmentUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataEquipments[$count]['equipmentUserId'];
                    $dataEquipments[$count]['lvPlus'] = 0;
                    if ($equipmentModel->rare == 6) {
                        $gemArray = array('-1', '-1', '-1');
                    } else if ($equipmentModel->rare >= 4) {
                        $gemArray = array('-1', '-1');
                    } else if ($equipmentModel->rare >= 2) {
                        $gemArray = array('-1');
                    }
                    $dataEquipments[$count]['dataGemUserId'] = $gemArray;
                    $dataEquipments[$count]['warriorUserIdEquiped'] = '0';
                }
                $model->data_equipment = serialize(array_values($dataEquipments));
                break;
            case 4:
                $dataGems = unserialize($model->data_gem);
                $count = count($dataGems);
                if ($model->bag_gem <= $count) {
                    die('fail8');
                } else {
                    $dataGems[$count]['gemId'] = (int) $itemId;
                    $dataGems[$count]['gemUserId'] = $itemId . date('YmdHis');
                    $itemUserId = $dataGems[$count]['gemUserId'];
                    $dataGems[$count]['equipmentUserIdEquiped'] = '0';
                }
                $model->data_gem = serialize(array_values($dataGems));
                break;
            case 5:
                $model->money += $amount;
                break;
            case 6:
                $model->ore += $amount;
                break;
        }

        $mailModel = DataUserMail::model()->findByAttributes(array(
            'userId' => $userId,
            'mailId' => $mailId,
        ));
        $mailModel->opened = 1;
        $mailModel->save();

        if ($model->save()) {
            echo "success," . $itemUserId;
        } else {
            echo "fail9";
        }
    }

    public function OpenChest($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $chestType = $data[3];
        $model = DataUser::model()->findByPk($userId);
        $warriorUserId = '';

        $result = RandomOpenChest::RandomWarrior($chestType);
        if ($chestType != 3) {
            switch ($result['isSoul']) {
                case 1:
                    $warriorModel = Warrior::model()->findByPk($result['warriorId']);
                    $dataWarriorSouls = unserialize($model->data_warriorsoul);

                    $warriorSoulKey = array_search($result['warriorId'], Utility::array_column($dataWarriorSouls, 'warriorId'));
                    if ($dataWarriorSouls[$warriorSoulKey]['warriorId'] != $result['warriorId']) {
                        $count = count($dataWarriorSouls);
                        $dataWarriorSouls[$count]['warriorId'] = (int) $result['warriorId'];
                        $dataWarriorSouls[$count]['amount'] = $result['amount'];
                    } else {
                        $dataWarriorSouls[$warriorSoulKey]['amount'] += $result['amount'];
                    }
                    $result['warriorUserId'] = "none";
                    $model->data_warriorsoul = serialize(array_values($dataWarriorSouls));
                    break;
                case 2:
                    $warriorModel = Warrior::model()->findByPk($result['warriorId']);
                    $dataWarriors = unserialize($model->data_warrior);
                    $count = count($dataWarriors);
                    if ($model->bag_warrior <= $count) {
                        $result = json_encode(array('result' => 'fail'));
                        echo $result;
                        exit;
                    } else {
                        $dataWarriors[$count]['warriorId'] = (int) $result['warriorId'];
                        $dataWarriors[$count]['warriorUserId'] = $result['warriorId'] . date('YmdHis');
                        $result['warriorUserId'] = $dataWarriors[$count]['warriorUserId'];
                        $dataWarriors[$count]['level'] = 1;
                        $dataWarriors[$count]['exp'] = 0;
                        $dataWarriors[$count]['lvPlus'] = 0;
                        $dataWarriors[$count]['dataEquipmentUserId'] = array('0', '0', '0', '0', '0', '0');
                        $dataWarriors[$count]['skillLv'] = array(1, 1, 1);
                        $dataWarriors[$count]['skillLvPlus'] = array(1, 1, 1);
                        $dataWarriors[$count]['position'] = 0;
                        //$dataWarriors[$count]['isLeader'] = false;
                        $dataWarriors[$count]['isLock'] = false;
                    }
                    $model->data_warrior = serialize(array_values($dataWarriors));
                    break;
            }
            if ($chestType == 1) {
                $model->heart -= 300;
            } else if ($chestType == 2) {
                $model->diamond -= 100;
            }

            if ($model->save()) {
                $result['result'] = 'success';
                $result['signature'] = Encryption::encryptRJ256($result['isSoul'] . $result['warriorId'] . $result['amount'] . $result['warriorUserId'] . $this->signatureKey);
                $result = json_encode($result);
                echo $result;
            } else {
                $result = json_encode(array('result' => 'fail'));
                echo $result;
                exit;
            }
        } else if ($chestType == 3) {
            for ($i = 0; $i < 10; $i++) {
                switch ($result['isSoul'][$i]) {
                    case 1:
                        $warriorModel = Warrior::model()->findByPk($result['warriorId'][$i]);
                        $dataWarriorSouls = unserialize($model->data_warriorsoul);

                        $warriorSoulKey = array_search($result['warriorId'][$i], Utility::array_column($dataWarriorSouls, 'warriorId'));
                        if ($dataWarriorSouls[$warriorSoulKey]['warriorId'] != $result['warriorId'][$i]) {
                            $count = count($dataWarriorSouls);
                            $dataWarriorSouls[$count]['warriorId'] = (int) $result['warriorId'][$i];
                            $dataWarriorSouls[$count]['amount'] = $result['amount'][$i];
                        } else {
                            $dataWarriorSouls[$warriorSoulKey]['amount'] += $result['amount'][$i];
                        }
                        $result['warriorUserId'][$i] = "none";
                        $model->data_warriorsoul = serialize(array_values($dataWarriorSouls));
                        break;
                    case 2:
                        $warriorModel = Warrior::model()->findByPk($result['warriorId'][$i]);
                        $dataWarriors = unserialize($model->data_warrior);
                        $count = count($dataWarriors);
                        if ($model->bag_warrior <= $count) {
                            $result = json_encode(array('result' => 'fail'));
                            echo $result;
                            exit;
                        } else {
                            $dataWarriors[$count]['warriorId'] = (int) $result['warriorId'][$i];
                            $dataWarriors[$count]['warriorUserId'] = $result['warriorId'][$i] . date('YmdHis');
                            $result['warriorUserId'][$i] = $dataWarriors[$count]['warriorUserId'];
                            $dataWarriors[$count]['level'] = 1;
                            $dataWarriors[$count]['exp'] = 0;
                            $dataWarriors[$count]['lvPlus'] = 0;
                            $dataWarriors[$count]['dataEquipmentUserId'] = array('0', '0', '0', '0', '0', '0');
                            $dataWarriors[$count]['skillLv'] = array(1, 1, 1);
                            $dataWarriors[$count]['skillLvPlus'] = array(1, 1, 1);
                            $dataWarriors[$count]['position'] = 0;
                            //$dataWarriors[$count]['isLeader'] = false;
                            $dataWarriors[$count]['isLock'] = false;
                        }
                        $model->data_warrior = serialize(array_values($dataWarriors));
                        break;
                }
            }
            $model->diamond -= 900;

            if ($model->save()) {
                $result['result'] = 'success';
                $result['signature'] = Encryption::encryptRJ256($result['isSoul'][0] . $result['warriorId'][0] . $result['amount'][0] . $result['warriorUserId'][0] . $this->signatureKey);
                $result = json_encode($result);
                echo $result;
            } else {
                $result = json_encode(array('result' => 'fail'));
                echo $result;
                exit;
            }
        }
    }

    public function AddFriend($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $data_userId2 = $data[3];

        $userModel = DataUser::model()->findByPk($data_userId2);
        if ($userModel == null) {
            die("notfoundaccount");
        }

        $model = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $userId,
            'data_userId2' => $data_userId2,
        ));

        if ($model != null && $model->status == 1) {
            echo "alreadyfriend";
        } else if ($model != null && $model->status == 2) {
            echo "alreadyadd";
        } else if ($model != null && $model->status == 3) {
            echo "pendingyou";
        } else {
            $model = new DataUserFriend;
            $model->data_userId1 = $userId;
            $model->data_userId2 = $data_userId2;
            $model->status = 2;

            $model2 = new DataUserFriend;
            $model2->data_userId1 = $data_userId2;
            $model2->data_userId2 = $userId;
            $model2->status = 3;

            if ($model->save() && $model2->save()) {
                echo "adddone";
            } else {
                echo "fail2";
            }
        }
    }

    public function AcceptFriend($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $data_userId2 = $data[3];

        $userModel = DataUser::model()->findByPk($data_userId2);
        if ($userModel == null) {
            die("notfoundaccount");
        }

        $model = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $userId,
            'data_userId2' => $data_userId2,
        ));

        $model2 = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $data_userId2,
            'data_userId2' => $userId,
        ));

        if ($model != null && $model->status == 1) {
            echo "alreadyfriend";
        } else if ($model != null && ($model->status == 2 || $model->status == 3)) {
            $model->status = 1;
            $model2->status = 1;
            if ($model->save() && $model2->save()) {
                echo "acceptdone";
            } else {
                echo "fail2";
            }
        } else {
            echo "cancelfirst";
        }
    }

    public function CancelFriend($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $data_userId2 = $data[3];

        $userModel = DataUser::model()->findByPk($data_userId2);
        if ($userModel == null) {
            die("notfoundaccount");
        }

        $model = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $userId,
            'data_userId2' => $data_userId2,
        ));

        $model2 = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $data_userId2,
            'data_userId2' => $userId,
        ));

        if ($model->delete() && $model2->delete()) {
            echo "canceldone";
        } else {
            echo "fail2";
        }
    }

    public function SendHeartToFriend($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }

        $userId = $data[2];
        $data_userId2 = $data[3];

        $model = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $userId,
            'data_userId2' => $data_userId2,
        ));
        $model->sendHeartLastedDate = date('Y-m-d');

        $model2 = DataUserFriend::model()->findByAttributes(array(
            'data_userId1' => $data_userId2,
            'data_userId2' => $userId,
        ));
        $model2->receiveHeartAmount = $model2->receiveHeartAmount + 1;

        $user2Model = DataUser::model()->findByPk($data_userId2);
        $user2Model->heart = $user2Model->heart + 1;

        if ($model->save() && $model2->save() && $user2Model->save()) {
            echo "sendheartdone";
        } else {
            echo "fail2";
        }
    }

    public function SendHeartAllFriend($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }

        $userId = $data[2];

        $models = DataUserFriend::model()->findAllByAttributes(array(
            'data_userId1' => $userId,
        ));

        foreach ($models as $model) {
            if ($model->sendHeartLastedDate != date('Y-m-d')) {
                $model2 = DataUserFriend::model()->findByAttributes(array(
                    'data_userId1' => $model->data_userId2,
                    'data_userId2' => $userId,
                ));
                $model2->receiveHeartAmount = $model2->receiveHeartAmount + 1;
                $model2->save();
                $user2Model = DataUser::model()->findByPk($model->data_userId2);
                $user2Model->heart = $user2Model->heart + 1;
                $user2Model->save();
                $model->sendHeartLastedDate = date('Y-m-d');
                $model->save();
                if ($model->save() && $model2->save() && $user2Model->save()) {
                   
                } else {
                    die("fail2");
                }
            }
        }
        echo 'sendheartdone';
    }

}
