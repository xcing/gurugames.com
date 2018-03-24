<?php

class ServiceController extends Controller {

    public $signatureKey = 'XD1c3@ftheendc1an';
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

    public function actionGetAllCard() {
        $model = Card::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $skill_model = Skill::model()->findAllByAttributes(array(
                'cardId' => $data->cardId,
            ));
            $amountSkill = count($skill_model);

            $datas[$data->cardId] = $data->attributes;
            unset($datas[$data->cardId]['nameEN']);
            unset($datas[$data->cardId]['nameTH']);
            unset($datas[$data->cardId]['nameCN']);
            $datas[$data->cardId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            unset($datas[$data->cardId]['diceForUpgrade1']);
            unset($datas[$data->cardId]['diceForUpgrade2']);
            unset($datas[$data->cardId]['diceForUpgrade3']);
            unset($datas[$data->cardId]['diceForUpgrade4']);
            unset($datas[$data->cardId]['diceForUpgrade5']);
            unset($datas[$data->cardId]['diceForUpgrade6']);
            $datas[$data->cardId]['diceForUpgrade'] = array($data->diceForUpgrade1, $data->diceForUpgrade2, $data->diceForUpgrade3, $data->diceForUpgrade4, $data->diceForUpgrade5, $data->diceForUpgrade6);
            $datas[$data->cardId]['amountSkill'] = (string) $amountSkill;
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllSkill() {
        $model = Skill::model()->findAll(array('order' => 'cardId ASC, ordinal ASC'));
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->cardId][$data->ordinal] = $data->attributes;
            unset($datas[$data->cardId][$data->ordinal]['nameEN']);
            unset($datas[$data->cardId][$data->ordinal]['nameTH']);
            unset($datas[$data->cardId][$data->ordinal]['nameCN']);
            $datas[$data->cardId][$data->ordinal]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
            unset($datas[$data->cardId][$data->ordinal]['detailEN']);
            unset($datas[$data->cardId][$data->ordinal]['detailTH']);
            unset($datas[$data->cardId][$data->ordinal]['detailCN']);
            $datas[$data->cardId][$data->ordinal]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllDice() {
        $model = Dice::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->diceId] = $data->attributes;
        }
        $datas = json_encode($datas);
        echo $datas;
    }

    public function actionGetAllDicePage() {
        $model = DicePage::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->dicePageId] = $data->attributes;
            unset($datas[$data->dicePageId]['nameEN']);
            unset($datas[$data->dicePageId]['nameTH']);
            unset($datas[$data->dicePageId]['nameCN']);
            $datas[$data->dicePageId]['name'] = array($data->nameEN, $data->nameTH, $data->nameCN);
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

    public function actionGetAllPassivedice() {
        $model = Passivedice::model()->findAll();
        $datas = array();
        foreach ($model as $data) {
            $datas[$data->passivediceId] = $data->attributes;
            unset($datas[$data->passivediceId]['detailEN']);
            unset($datas[$data->passivediceId]['detailTH']);
            unset($datas[$data->passivediceId]['detailCN']);
            $datas[$data->passivediceId]['detail'] = array($data->detailEN, $data->detailTH, $data->detailCN);
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

    public function actionGetAllExpCard() {
        $data = Exp::getExpCardArray();
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

        $dataCard = unserialize($model->data_card);
        $dataDice = unserialize($model->data_dice);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["name"] = $model->name;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_card"] = (int) $model->bag_card;
        $datas["bag_dice"] = (int) $model->bag_dice;
        $datas["bag_friend"] = (int) $model->bag_friend;
        foreach ($dataCard as $idx => $data) {
            $datas["card"][$idx] = $data;
        }
        foreach ($dataDice as $idx => $data) {
            $datas["dice"][$idx] = $data;
        }
        foreach ($dataStage as $idx => $data) {
            $datas["stage"][$idx] = $data;
        }
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
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

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

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

        $dataCard = unserialize($model->data_card);
        $dataDice = unserialize($model->data_dice);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);

        $dataCard = array(
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113631',
                'level' => 20,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 1, // 0 = no fight, 1-6 = fight position
                'isLock' => true,
            ),
            array(
                'cardId' => 2,
                'cardUserId' => '220150504113631',
                'level' => 10,
                'exp' => 250,
                'star' => 2,
                'isEvolve' => false,
                'position' => 2,
                'isLock' => false,
            ),
            array(
                'cardId' => 2,
                'cardUserId' => '220150504113632',
                'level' => 3,
                'exp' => 250,
                'star' => 2,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 2,
                'cardUserId' => '220150504113633',
                'level' => 4,
                'exp' => 250,
                'star' => 1,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 2,
                'cardUserId' => '220150504113634',
                'level' => 1,
                'exp' => 250,
                'star' => 3,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113632',
                'level' => 2,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113633',
                'level' => 7,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 3,
                'isLock' => false,
            ),
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113634',
                'level' => 24,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113635',
                'level' => 18,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
            array(
                'cardId' => 1,
                'cardUserId' => '120150504113636',
                'level' => 16,
                'exp' => 250,
                'star' => 4,
                'isEvolve' => false,
                'position' => 0,
                'isLock' => false,
            ),
        );
        $dataDice = array(
            array(
                'diceId' => 1,
                'diceUserId' => '120150908123456',
            ),
            array(
                'diceId' => 1,
                'diceUserId' => '120150908123457',
            ),
            array(
                'diceId' => 4,
                'diceUserId' => '420150908123458',
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

        $model->data_card = serialize($dataCard);
        $model->data_dice = serialize($dataDice);
        $model->data_stage = serialize($dataStage);
        $model->data_quest = serialize($dataQuest);
        $model->money = 1000000;
        $model->save();

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["name"] = $model->name;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_card"] = (int) $model->bag_card;
        $datas["bag_dice"] = (int) $model->bag_dice;
        $datas["bag_friend"] = (int) $model->bag_friend;
        foreach ($dataCard as $idx => $data) {
            $datas["card"][$idx] = $data;
        }
        foreach ($dataDice as $idx => $data) {
            $datas["dice"][$idx] = $data;
        }
        foreach ($dataStage as $idx => $data) {
            $datas["stage"][$idx] = $data;
        }
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
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

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

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
            case "sacrifice":
                self::Sacrifice($data);
                break;
            case "lockwarrior":
                self::LockWarrior($data);
                break;
            case "upgradestarcard":
                self::UpgradeStarCard($data);
                break;
            case "upgradecardbag":
                self::UpgradeCardBag($data);
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
        $dataCard = unserialize($model->data_card);
        $dataDice = unserialize($model->data_dice);
        $dataStage = unserialize($model->data_stage);
        $dataQuest = unserialize($model->data_quest);

        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["name"] = $model->name;
        $datas["characterId"] = (int) $model->characterId;
        $datas["level"] = (int) $model->level;
        $datas["exp"] = (int) $model->exp;
        $datas["vip"] = (int) $model->vip;
        $datas["expVip"] = (int) $model->expVip;
        $datas["energy"] = (int) $model->energy;
        $datas["money"] = (int) $model->money;
        $datas["fame"] = (int) $model->fame;
        $datas["heart"] = (int) $model->heart;
        $datas["diamond"] = (int) $model->diamond;
        $datas["bag_card"] = (int) $model->bag_card;
        $datas["bag_dice"] = (int) $model->bag_dice;
        $datas["bag_friend"] = (int) $model->bag_friend;
        foreach ($dataCard as $idx => $data) {
            $datas["card"][$idx] = $data;
        }
        foreach ($dataDice as $idx => $data) {
            $datas["dice"][$idx] = $data;
        }
        foreach ($dataStage as $idx => $data) {
            $datas["stage"][$idx] = $data;
        }
        foreach ($dataQuest as $idx => $data) {
            $datas["quest"][$idx] = $data;
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

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["level"] . $datas["diamond"] . $datas["money"] . $datas["fame"] . $datas["heart"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    public function Sacrifice($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail1');
        }
        $userId = $data[2];
        $cardUserId = $data[3];
        $sacrificeCardUserIds = array();
        $sacrificeCardUserIds[0] = $data[4];
        if (isset($data[5])) {
            $sacrificeCardUserIds[1] = $data[5];
        }
        if (isset($data[6])) {
            $sacrificeCardUserIds[2] = $data[6];
        }
        if (isset($data[7])) {
            $sacrificeCardUserIds[3] = $data[7];
        }
        if (isset($data[8])) {
            $sacrificeCardUserIds[4] = $data[8];
        }

        $model = DataUser::model()->findByPk($userId);
        $dataCards = unserialize($model->data_card);

        $sacrificeCardKey = array();
        foreach ($dataCards as $idx => $dataCard) {
            if ($dataCard['cardUserId'] == $cardUserId) {
                $cardKey = $idx;
                continue;
            }
            if ($dataCard['cardUserId'] == $sacrificeCardUserIds[0]) {
                $sacrificeCardKey[0] = $idx;
                continue;
            }
            if (!empty($sacrificeCardUserIds[1]) && $dataCard['cardUserId'] == $sacrificeCardUserIds[1]) {
                $sacrificeCardKey[1] = $idx;
                continue;
            }
            if (!empty($sacrificeCardUserIds[2]) && $dataCard['cardUserId'] == $sacrificeCardUserIds[2]) {
                $sacrificeCardKey[2] = $idx;
                continue;
            }
            if (!empty($sacrificeCardUserIds[3]) && $dataCard['cardUserId'] == $sacrificeCardUserIds[3]) {
                $sacrificeCardKey[3] = $idx;
                continue;
            }
            if (!empty($sacrificeCardUserIds[4]) && $dataCard['cardUserId'] == $sacrificeCardUserIds[4]) {
                $sacrificeCardKey[4] = $idx;
                continue;
            }
        }

        $cost = CalculateData::GetCostSacrificeCard($dataCards[$sacrificeCardKey[0]]);
        $exp = CalculateData::GetExpSacrificeCard($dataCards[$sacrificeCardKey[0]]);
        unset($dataCards[$sacrificeCardKey[0]]);
        if (!empty($sacrificeCardUserIds[1])) {
            $cost += CalculateData::GetCostSacrificeCard($dataCards[$sacrificeCardKey[1]]);
            $exp += CalculateData::GetExpSacrificeCard($dataCards[$sacrificeCardKey[1]]);
            unset($dataCards[$sacrificeCardKey[1]]);
        }
        if (!empty($sacrificeCardUserIds[2])) {
            $cost += CalculateData::GetCostSacrificeCard($dataCards[$sacrificeCardKey[2]]);
            $exp += CalculateData::GetExpSacrificeCard($dataCards[$sacrificeCardKey[2]]);
            unset($dataCards[$sacrificeCardKey[2]]);
        }
        if (!empty($sacrificeCardUserIds[3])) {
            $cost += CalculateData::GetCostSacrificeCard($dataCards[$sacrificeCardKey[3]]);
            $exp += CalculateData::GetExpSacrificeCard($dataCards[$sacrificeCardKey[3]]);
            unset($dataCards[$sacrificeCardKey[3]]);
        }
        if (!empty($sacrificeCardUserIds[4])) {
            $cost += CalculateData::GetCostSacrificeCard($dataCards[$sacrificeCardKey[4]]);
            $exp += CalculateData::GetExpSacrificeCard($dataCards[$sacrificeCardKey[4]]);
            unset($dataCards[$sacrificeCardKey[4]]);
        }
        if ($cost < $model->money) {
            $model->money -= $cost;

            $dataCards[$cardKey] = Exp::calculateLevelUp($dataCards[$cardKey], $exp);

            $model->data_card = serialize(array_values($dataCards));
            if ($model->save()) {
                echo "success";
            } else {
                echo "fail2";
            }
        } else {
            echo "fail3";
        }
    }

    /* public function actionTestTestTest() {
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

      unset($dataWarriors[3]);

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

      public function UpgradeStarCard($data) {
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

      public function UpgradeCardBag($data) {
      if ($data[1] != $this->signatureKey) {
      die('fail1');
      }
      $userId = $data[2];
      $model = DataUser::model()->findByPk($userId);

      if ($model->diamond < 5) {
      echo "fail2";
      } else {
      $model->diamond -= 5;
      $model->bag_card += 5;
      if ($model->save()) {
      echo "success";
      } else {
      echo "fail3";
      }
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
     */
}
