<?php

class ServiceController extends Controller {

    public $signatureKey = 'X@LlKeM0nksTor';

    public function actionIndex() {
        
    }

    ///// ==========> Select
    public function actionGetUser() {
        $userId = Yii::app()->request->getParam('userId', '20141224203815112345');
        $model = User::model()->findByPk($userId);

        $data['user'] = $model->attributes;
        $data['data_user'] = $model->data_user->attributes;
        $data = json_encode($data);
        echo $data;
    }

    public function actionGetAllMonster() {
        $model = Monster::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $skill_model = Skill::model()->findAllByAttributes(array(
                'monsterId' => $data->monsterId,
            ));
            $amountSkill = count($skill_model);

            $datas[$data->monsterId] = $data->attributes;
            unset($datas[$data->monsterId]['nameEN']);
            unset($datas[$data->monsterId]['nameTH']);
            unset($datas[$data->monsterId]['nameCN']);
            $datas[$data->monsterId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            $datas[$data->monsterId]['amountSkill'] = (string) $amountSkill;
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllSkill() {
        $model = Skill::model()->findAll(array('order' => 'monsterId ASC, ordinal ASC'));
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->monsterId][$data->ordinal] = $data->attributes;
            unset($datas[$data->monsterId][$data->ordinal]['nameEN']);
            unset($datas[$data->monsterId][$data->ordinal]['nameTH']);
            unset($datas[$data->monsterId][$data->ordinal]['nameCN']);
            $datas[$data->monsterId][$data->ordinal]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            unset($datas[$data->monsterId][$data->ordinal]['detailEN']);
            unset($datas[$data->monsterId][$data->ordinal]['detailTH']);
            unset($datas[$data->monsterId][$data->ordinal]['detailCN']);
            $datas[$data->monsterId][$data->ordinal]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllMonsterEnemy() {
        $model = Enemy::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $skill_model = Enemyskill::model()->findAllByAttributes(array(
                'enemyId' => $data->monsterId,
            ));
            $amountSkill = count($skill_model);

            $datas[$data->monsterId] = $data->attributes;
            unset($datas[$data->monsterId]['nameEN']);
            unset($datas[$data->monsterId]['nameTH']);
            unset($datas[$data->monsterId]['nameCN']);
            $datas[$data->monsterId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            $datas[$data->monsterId]['amountSkill'] = (string) $amountSkill;
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

    public function actionGetAllAccessory() {
        $model = Accessory::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->accessoryId] = $data->attributes;
            unset($datas[$data->accessoryId]['nameEN']);
            unset($datas[$data->accessoryId]['nameTH']);
            unset($datas[$data->accessoryId]['nameCN']);
            $datas[$data->accessoryId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
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

    public function actionGetAllTalent() {
        $model = Talent::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->talentId] = $data->attributes;
            unset($datas[$data->talentId]['nameEN']);
            unset($datas[$data->talentId]['nameTH']);
            unset($datas[$data->talentId]['nameCN']);
            $datas[$data->talentId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllMaterial() {
        $model = Material::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->materialId] = $data->attributes;
            unset($datas[$data->materialId]['nameEN']);
            unset($datas[$data->materialId]['nameTH']);
            unset($datas[$data->materialId]['nameCN']);
            $datas[$data->materialId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
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

    public function actionGetAllRace() {
        $model = Race::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->raceId] = $data->attributes;
            unset($datas[$data->raceId]['nameEN']);
            unset($datas[$data->raceId]['nameTH']);
            unset($datas[$data->raceId]['nameCN']);
            $datas[$data->raceId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllWording() {
        $data = Wording::getWording();
        $datas = json_encode($data);
        echo $datas;
    }

    public function actionGetDataMaterial() {
        $userId = Yii::app()->request->getParam('userId', '20141224203815112345');

        $model = DataUser::model()->findByPk($userId);
        $dataMaterial = unserialize($model->data_material);

        $datas = json_encode($dataMaterial);
        echo $datas;
    }

    public function actionGetDataUser() {
        $userId = Yii::app()->request->getParam('userId', '20141224203815112345');
        $model = DataUser::model()->findByPk($userId);
        $dataMonster = unserialize($model->data_monster);
        $dataAccessory = unserialize($model->data_accessory);
        $dataMaterial = unserialize($model->data_material);
        $dataQuest = unserialize($model->data_quest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["diamond"] = (int) $model->diamond;
        foreach ($dataMonster as $idx => $data) {
            $datas["monster"][$idx] = $data;
        }
        foreach ($dataAccessory as $idx => $data) {
            $datas["accessory"][$idx] = $data;
        }
        foreach ($dataMaterial as $idx => $data) {
            $datas["material"][$idx] = $data;
        }
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
        }

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    ///// ==========> Update
    public function actionUpdateDataUser() {
        $userId = Yii::app()->request->getParam('userId', '20141224203815112345');
        $model = DataUser::model()->findByPk($userId);

        $dataMonster = unserialize($model->data_monster);
        $dataAccessory = unserialize($model->data_accessory);
        $dataMaterial = unserialize($model->data_material);
        $dataQuest = unserialize($model->data_quest);

        $dataMonster = array(
            array(
                'monsterId' => 1,
                'level' => 20,
                'exp' => 250,
                'star' => 2,
                'evolveForm' => 1, // 1, 2, 3
                'strPlusFromLv' => 9,
                'vitPlusFromLv' => 11,
                'dexPlusFromLv' => 2,
                'agiPlusFromLv' => 2,
                'hpPlusFromUpgrade' => 3,
                'atkPlusFromUpgrade' => 3,
                'defPlusFromUpgrade' => 1,
                'accPlusFromUpgrade' => 1,
                'spdPlusFromUpgrade' => 1,
                'evaPlusFromUpgrade' => 1,
                'condPlusFromUpgrade' => 1,
                'dcondPlusFromUpgrade' => 1,
                'statPoint' => 99,
                'dataMaterialUpgradeId' => array(
                    1, 0, 0, 0, 0, 0
                ),
                'dataAccessoryId' => array(
                    2, 1
                ),
                'talentLearn' => array(
                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                ),
                'skillLearn' => array(
                    1, 1, 1, 1, 1, 0
                ),
                'skillLv' => array(
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 2),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                ), //dmgLv, dmgAccLv, conditionLv, condAccLv, reactCondLv, reactCondAccLv, selfCondLv, targetLv, cdLv, castTimeLv
            ),
            array(
                'monsterId' => 2,
                'level' => 1,
                'exp' => 45,
                'star' => 1,
                'evolveForm' => 2,
                'strPlusFromLv' => 0,
                'vitPlusFromLv' => 0,
                'dexPlusFromLv' => 0,
                'agiPlusFromLv' => 3,
                'hpPlusFromUpgrade' => 1,
                'atkPlusFromUpgrade' => 1,
                'defPlusFromUpgrade' => 1,
                'accPlusFromUpgrade' => 1,
                'spdPlusFromUpgrade' => 1,
                'evaPlusFromUpgrade' => 1,
                'condPlusFromUpgrade' => 1,
                'dcondPlusFromUpgrade' => 1,
                'statPoint' => 5,
                'dataMaterialUpgradeId' => array(
                    0, 0, 0, 0, 0, 0
                ),
                'dataAccessoryId' => array(
                    0, 0
                ),
                'talentLearn' => array(
                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                ),
                'skillLearn' => array(
                    1, 0, 0, 0, 1, 0
                ),
                'skillLv' => array(
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                ),
            ),
            array(
                'monsterId' => 3,
                'level' => 1,
                'exp' => 45,
                'star' => 1,
                'evolveForm' => 1,
                'strPlusFromLv' => 0,
                'vitPlusFromLv' => 0,
                'dexPlusFromLv' => 0,
                'agiPlusFromLv' => 3,
                'hpPlusFromUpgrade' => 1,
                'atkPlusFromUpgrade' => 1,
                'defPlusFromUpgrade' => 1,
                'accPlusFromUpgrade' => 1,
                'spdPlusFromUpgrade' => 1,
                'evaPlusFromUpgrade' => 1,
                'condPlusFromUpgrade' => 1,
                'dcondPlusFromUpgrade' => 1,
                'statPoint' => 5,
                'dataMaterialUpgradeId' => array(
                    0, 0, 0, 0, 0, 0
                ),
                'dataAccessoryId' => array(
                    0, 0
                ),
                'talentLearn' => array(
                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                ),
                'skillLearn' => array(
                    1, 0, 0, 0, 1, 0
                ),
                'skillLv' => array(
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                ),
            ),
            array(
                'monsterId' => 4,
                'level' => 1,
                'exp' => 45,
                'star' => 1,
                'evolveForm' => 1,
                'strPlusFromLv' => 0,
                'vitPlusFromLv' => 0,
                'dexPlusFromLv' => 0,
                'agiPlusFromLv' => 3,
                'hpPlusFromUpgrade' => 1,
                'atkPlusFromUpgrade' => 1,
                'defPlusFromUpgrade' => 1,
                'accPlusFromUpgrade' => 1,
                'spdPlusFromUpgrade' => 1,
                'evaPlusFromUpgrade' => 1,
                'condPlusFromUpgrade' => 1,
                'dcondPlusFromUpgrade' => 1,
                'statPoint' => 5,
                'dataMaterialUpgradeId' => array(
                    0, 0, 0, 0, 0, 0
                ),
                'dataAccessoryId' => array(
                    0, 0
                ),
                'talentLearn' => array(
                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                ),
                'skillLearn' => array(
                    1, 0, 0, 0, 1, 0
                ),
                'skillLv' => array(
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
                ),
            ),
        );
        $dataAccessory = array(
            array('accessoryId' => 1, 'amount' => 1),
            array('accessoryId' => 2, 'amount' => 1),
        );
        $dataMaterial = array(
            array('materialId' => 1, 'amount' => 99),
            array('materialId' => 2, 'amount' => 99),
            array('materialId' => 3, 'amount' => 99),
            array('materialId' => 4, 'amount' => 99),
            array('materialId' => 5, 'amount' => 99),
            array('materialId' => 6, 'amount' => 99),
            array('materialId' => 7, 'amount' => 99),
            array('materialId' => 8, 'amount' => 99),
            array('materialId' => 9, 'amount' => 99),
        );
        $dataQuest = array(
            array('questId' => 1, 'type' => 0),
            array('questId' => 2, 'type' => 2),
            array('questId' => 3, 'type' => 1),
        );

        $model->data_monster = serialize($dataMonster);
        $model->data_accessory = serialize($dataAccessory);
        $model->data_material = serialize($dataMaterial);
        $model->data_quest = serialize($dataQuest);
        $model->save();
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
            case "upstatus":
                self::UpStatus($data);
                break;
            case "submitupgradebymaterial":
                self::Submitupgradebymaterial($data);
                break;
            case "submitequipaccessory":
                self::Submitequipaccessory($data);
                break;
            case "submitunequipaccessory":
                self::Submitunequipaccessory($data);
                break;
            case "submitupgradeskill":
                self::Submitupgradeskill($data);
                break;
            case "submitevolve":
                self::Submitevolve($data);
                break;
            case "submitlearntalent":
                self::Submitlearntalent($data);
                break;
            /* case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break;
              case "":
              self::UpStatus($data);
              break; */
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
        $dataMonster = unserialize($model->data_monster);
        $dataAccessory = unserialize($model->data_accessory);
        $dataMaterial = unserialize($model->data_material);
        $dataQuest = unserialize($model->data_quest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["diamond"] = (int) $model->diamond;
        foreach ($dataMonster as $idx => $data) {
            $datas["monster"][$idx] = $data;
        }
        foreach ($dataAccessory as $idx => $data) {
            $datas["accessory"][$idx] = $data;
        }
        foreach ($dataMaterial as $idx => $data) {
            $datas["material"][$idx] = $data;
        }
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
        }

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    public function UpStatus($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $jsonStat = $data[4];
        $jsonOldStat = $data[5];
        $uppedStatus = json_decode($jsonStat);
        $oldStatus = json_decode($jsonOldStat);
        $statUpTotal = $uppedStatus[0] + $uppedStatus[1] + $uppedStatus[2] + $uppedStatus[3];

        $model = DataUser::model()->findByPk($userId);
        $dataMonsters = unserialize($model->data_monster);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['statPoint'] >= $statUpTotal && $dataMonsters[$monsterKey]['strPlusFromLv'] == $oldStatus[0] && $dataMonsters[$monsterKey]['vitPlusFromLv'] == $oldStatus[1] && $dataMonsters[$monsterKey]['dexPlusFromLv'] == $oldStatus[2] && $dataMonsters[$monsterKey]['agiPlusFromLv'] == $oldStatus[3]) {
            $dataMonsters[$monsterKey]['strPlusFromLv'] += $uppedStatus[0];
            $dataMonsters[$monsterKey]['vitPlusFromLv'] += $uppedStatus[1];
            $dataMonsters[$monsterKey]['dexPlusFromLv'] += $uppedStatus[2];
            $dataMonsters[$monsterKey]['agiPlusFromLv'] += $uppedStatus[3];
            $dataMonsters[$monsterKey]['statPoint'] -= $statUpTotal;
            $model->data_monster = serialize($dataMonsters);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

    public function Submitupgradebymaterial($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $currentUpgradeMaterial = $data[4];
        $materialId = $data[5];
        $model = DataUser::model()->findByPk($userId);
        $dataMonsters = unserialize($model->data_monster);
        $dataMaterials = unserialize($model->data_material);
        $materialModel = Material::model()->findByPk($materialId);
        $isUpStar = true;

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        foreach ($dataMaterials as $idx => $dataMaterial) {
            if ($dataMaterial['materialId'] == $materialId) {
                $materialKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['dataMaterialUpgradeId'][$currentUpgradeMaterial - 1] == 0) {
            $dataMonsters[$monsterKey]['dataMaterialUpgradeId'][$currentUpgradeMaterial - 1] = 1;

            $dataMonsters[$monsterKey]['hpPlusFromUpgrade'] += $materialModel->hp;
            $dataMonsters[$monsterKey]['atkPlusFromUpgrade'] += $materialModel->atk;
            $dataMonsters[$monsterKey]['defPlusFromUpgrade'] += $materialModel->def;
            $dataMonsters[$monsterKey]['accPlusFromUpgrade'] += $materialModel->acc;
            $dataMonsters[$monsterKey]['spdPlusFromUpgrade'] += $materialModel->spd;
            $dataMonsters[$monsterKey]['evaPlusFromUpgrade'] += $materialModel->eva;
            $dataMonsters[$monsterKey]['condPlusFromUpgrade'] += $materialModel->cond;
            $dataMonsters[$monsterKey]['dcondPlusFromUpgrade'] += $materialModel->dcond;

            $dataMaterial[$materialKey]['amount'] -= 1;

            foreach ($dataMonsters[$monsterKey]['dataMaterialUpgradeId'] as $dataMaterial) {
                if ($dataMaterial == 0) {
                    $isUpStar = false;
                }
            }
            if ($isUpStar) {
                if ($dataMonsters[$monsterKey]['star'] <= 6) {
                    $dataMonsters[$monsterKey]['star'] ++;
                    for ($i = 0; $i < 6; $i++) {
                        $dataMonsters[$monsterKey]['dataMaterialUpgradeId'][$i] = 0;
                    }
                }
            }

            $model->data_monster = serialize($dataMonsters);
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

    public function Submitequipaccessory($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $currentEquipAccessory = $data[4];
        $accessoryPickId = $data[5];
        $model = DataUser::model()->findByPk($userId);
        $dataMonsters = unserialize($model->data_monster);
        $dataAccessories = unserialize($model->data_accessory);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        foreach ($dataAccessories as $idx => $dataAccessory) {
            if ($dataAccessory['accessoryId'] == $accessoryPickId) {
                $accessoryKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1] != 0) {
            $oldAccessoryEquip = $dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1];
            foreach ($dataAccessories as $idx => $dataAccessory) {
                if ($dataAccessory['accessoryId'] == $oldAccessoryEquip) {
                    $oldAccessoryKey = $idx;
                    break;
                }
            }
            if ($oldAccessoryKey == null) {
                $accessoryTemp = array();
                $accessoryTemp["accessoryId"] = (int) $oldAccessoryEquip;
                $accessoryTemp['amount'] = 1;
                $dataAccessories[] = $accessoryTemp;
            } else {
                $dataAccessories[$oldAccessoryKey]["amount"] += 1;
            }
        }
        $dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1] = (int) $accessoryPickId;

        $dataAccessories[$accessoryKey]["amount"] -= 1;
        if ($dataAccessories[$accessoryKey]["amount"] == 0) {
            unset($dataAccessories[$accessoryKey]);
        }
        $model->data_monster = serialize($dataMonsters);
        $model->data_accessory = serialize(array_values($dataAccessories));
        if ($model->save()) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function Submitunequipaccessory($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $currentEquipAccessory = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $dataMonsters = unserialize($model->data_monster);
        $dataAccessories = unserialize($model->data_accessory);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1] != 0) {
            $oldAccessoryEquip = $dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1];
            $oldAccessoryKey = "99999";
            foreach ($dataAccessories as $idx => $dataAccessory) {
                if ($dataAccessory['accessoryId'] == $oldAccessoryEquip) {
                    $oldAccessoryKey = $idx;
                    break;
                }
            }
            if ($oldAccessoryKey == "99999") {
                $accessoryTemp = array();
                $accessoryTemp["accessoryId"] = (int) $oldAccessoryEquip;
                $accessoryTemp['amount'] = 1;
                $dataAccessories[] = $accessoryTemp;
            } else {
                $dataAccessories[$oldAccessoryKey]["amount"] += 1;
            }
            $dataMonsters[$monsterKey]['dataAccessoryId'][$currentEquipAccessory - 1] = 0;
            $model->data_monster = serialize($dataMonsters);
            $model->data_accessory = serialize(array_values($dataAccessories));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

    public function Submitupgradeskill($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $currentPositionSkill = $data[4];
        $currentCurrentStatTypeSkill = $data[5] - 1;
        $currentSkillLv = $data[6];
        $model = DataUser::model()->findByPk($userId);
        $dataMonsters = unserialize($model->data_monster);
        $dataMaterials = unserialize($model->data_material);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        $skillModel = Skill::model()->findByAttributes(array(
            'monsterId' => $monsterId,
            'ordinal' => ($currentPositionSkill + 1),
        ));
        switch ($currentCurrentStatTypeSkill) {
            case 0:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->dmgMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->dmgMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->dmgMaxLv3;
                $materialId = $skillModel->dmgUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill];
                break;
            case 1:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->dmgAccMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->dmgAccMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->dmgAccMaxLv3;
                $materialId = $skillModel->dmgAccUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill];
                break;
            case 2:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->conditionMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->conditionMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->conditionMaxLv3;
                $materialId = $skillModel->conditionUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 30;
                break;
            case 3:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->condAccMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->condAccMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->condAccMaxLv3;
                $materialId = $skillModel->condAccUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill];
                break;
            case 4:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->reactCondMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->reactCondMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->reactCondMaxLv3;
                $materialId = $skillModel->reactCondUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 30;
                break;
            case 5:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->reactCondAccMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->reactCondAccMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->reactCondAccMaxLv3;
                $materialId = $skillModel->reactCondAccUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill];
                break;
            case 6:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->selfCondMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->selfCondMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->selfCondMaxLv3;
                $materialId = $skillModel->selfCondUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 30;
                break;
            case 7:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->targetMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->targetMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->targetMaxLv3;
                $materialId = $skillModel->targetUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 50;
                break;
            case 8:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->cdMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->cdMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->cdMaxLv3;
                $materialId = $skillModel->cdUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 20;
                break;
            case 9:
                if ($dataMonsters[$monsterKey]['evolveForm'] == 1)
                    $maxLv = $skillModel->castTimeMaxLv1;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 2)
                    $maxLv = $skillModel->castTimeMaxLv2;
                else if ($dataMonsters[$monsterKey]['evolveForm'] == 3)
                    $maxLv = $skillModel->castTimeMaxLv3;
                $materialId = $skillModel->castTimeUpMaterialId;
                $materialAmountUse = $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] * 20;
                break;
        }

        foreach ($dataMaterials as $idx => $dataMaterial) {
            if ($dataMaterial['materialId'] == $materialId) {
                $materialKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] == $currentSkillLv && $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] < $maxLv) {
            $dataMonsters[$monsterKey]['skillLv'][$currentPositionSkill][$currentCurrentStatTypeSkill] ++;
            $dataMaterials[$materialKey]['amount'] -= $materialAmountUse;
            $model->data_monster = serialize($dataMonsters);
            $model->data_material = serialize(array_values($dataMaterials));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

    public function Submitevolve($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $currenEvolveForm = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $monsterModel = Monster::model()->findByPk($monsterId);
        $dataMonsters = unserialize($model->data_monster);
        $dataMaterials = unserialize($model->data_material);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['evolveForm'] == $currenEvolveForm && $monsterModel->amountForm > $currenEvolveForm) {
            $dataMonsters[$monsterKey]['evolveForm'] ++;
            if ($monsterModel->amountForm == 3) {
                if ($currenEvolveForm == 1) {
                    $dataMonsters[$monsterKey]['statPoint'] += 40;
                } else if ($currenEvolveForm == 2) {
                    $dataMonsters[$monsterKey]['statPoint'] += 40;
                }
            } else if ($monsterModel->amountForm == 2) {
                $dataMonsters[$monsterKey]['statPoint'] += 80;
            }

            if ($currenEvolveForm == 1) {
                $materialEvolves = explode('|', $monsterModel->materialForm2);
            } else if ($currenEvolveForm == 2) {
                $materialEvolves = explode('|', $monsterModel->materialForm3);
            }
            foreach ($materialEvolves as $materialEvolve) {
                $material = explode(',', $materialEvolve);
                foreach ($dataMaterials as $idx => $dataMaterial) {
                    if ($dataMaterial['materialId'] == $material[0]) {
                        $materialKey = $idx;
                        break;
                    }
                }
                $dataMaterials[$materialKey]['amount'] -= $material[1];
            }

            $model->data_monster = serialize($dataMonsters);
            $model->data_material = serialize(array_values($dataMaterials));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

    public function Submitlearntalent($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $monsterId = $data[3];
        $positionTalent = $data[4];
        $model = DataUser::model()->findByPk($userId);
        $monsterModel = Monster::model()->findByPk($monsterId);
        $talentIdArray = explode(',', $monsterModel->talent);
        $talentModel = Talent::model()->findByPk($talentIdArray[$positionTalent - 1]);
        $dataMonsters = unserialize($model->data_monster);
        $dataMaterials = unserialize($model->data_material);

        foreach ($dataMonsters as $idx => $dataMonster) {
            if ($dataMonster['monsterId'] == $monsterId) {
                $monsterKey = $idx;
                break;
            }
        }

        if ($dataMonsters[$monsterKey]['talentLearn'][$positionTalent - 1] == 0) {
            $dataMonsters[$monsterKey]['talentLearn'][$positionTalent - 1] = 1;
            foreach ($dataMaterials as $idx => $dataMaterial) {
                if ($dataMaterial['materialId'] == $talentModel->materialId1) {
                    $materialKey = $idx;
                    break;
                }
            }
            $dataMaterials[$materialKey]['amount'] -= $talentModel->materialAmount1;
            foreach ($dataMaterials as $idx => $dataMaterial) {
                if ($dataMaterial['materialId'] == $talentModel->materialId2) {
                    $materialKey = $idx;
                    break;
                }
            }
            $dataMaterials[$materialKey]['amount'] -= $talentModel->materialAmount2;
            $model->data_monster = serialize($dataMonsters);
            $model->data_material = serialize(array_values($dataMaterials));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail";
            }
        } else {
            echo "fail";
        }
    }

}
