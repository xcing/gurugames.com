<?php

class ServiceController extends Controller {

    public $signatureKey = 'XD1c3@ftheendc1an';
    public $userIdTest = '1';
    public $ads = true;

    public function actionIndex() {
        
    }

    public function actionGetAllWording() {
        $data = Wording::getWording();
        $datas = json_encode($data);
        echo $datas;
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
            case "move":
                self::Move($data);
                break;
            case "gethistory":
                self::GetHistory($data);
                break;
            case "findmatch":
                self::FindMatch($data);
                break;
            case "waitmatch":
                self::WaitMatch($data);
                break;
            case "stopfindmatch":
                self::StopFindMatch($data);
                break;
            case "matchresult":
                self::MatchResult($data);
                break;
            case "getListHistoryMatch":
                self::GetListHistoryMatch($data);
                break;
            case "getMoveHistoryMatch":
                self::GetMoveHistoryMatch($data);
                break;
            case "getListCurrentMatch":
                self::GetListCurrentMatch($data);
                break;
            case "register":
                self::Register($data);
                break;
            case "registerAfterConnectDevice":
                self::RegisterAfterConnectDevice($data);
                break;
            case "login":
                self::Login($data);
                break;
            case "guestlogin":
                self::GuestLogin($data);
                break;
            case "facebooklogin":
                self::FacebookLogin($data);
                break;
            case "setdisplayname":
                self::SetDisplayName($data);
                break;
            case "setavatar":
                self::SetAvatar($data);
                break;
            case "connectFacebook":
                self::ConnectFacebook($data);
                break;
            case "removeConnectFacebook":
                self::RemoveConnectFacebook($data);
                break;
            case "connectDevice":
                self::ConnectDevice($data);
                break;
            case "removeConnectDevice":
                self::RemoveConnectDevice($data);
                break;
            case "changeEmail":
                self::ChangeEmail($data);
                break;
            case "changePassword":
                self::ChangePassword($data);
                break;
            case "getRankingList":
                self::GetRankingList($data);
                break;
            case "buyTheme":
                self::BuyTheme($data);
                break;
            case "equipTheme":
                self::EquipTheme($data);
                break;
            case "buyNoads":
                self::BuyNoAds($data);
                break;
            case "buyCoin":
                self::BuyCoin($data);
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
        $model = User::model()->findByPk($userId);
        $datas = array();
        $datas["userId"] = $model->userId;
        $datas["email"] = $model->email;

        $datas['signature'] = Encryption::encryptRJ256($datas["userId"] . $datas["email"] . $this->signatureKey);

        $datas = json_encode($datas);
        //$datas = Encryption::encryptRJ256($datas);
        echo $datas;
    }

    public function Move($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $matchId = $data[2];
        $piecesId = $data[3];
        $positionX = $data[4];
        $positionY = $data[5];
        $eatedId = $data[6];
        $positionOldX = $data[7];
        $positionOldY = $data[8];
        $ordinal = $data[9];
        $useSec = $data[10];

        $typeId = Pieces::GetTypeId($piecesId);

        $historyModel = new History();
        $historyModel->matchId = $matchId;
        $historyModel->piecesId = $piecesId;
        $historyModel->positionX = $positionX;
        $historyModel->positionY = $positionY;
        $historyModel->eatedId = $eatedId;
        $historyModel->positionOldX = $positionOldX;
        $historyModel->positionOldY = $positionOldY;
        $historyModel->ordinal = $ordinal;
        $historyModel->useSec = $useSec;
        $historyModel->typeId = $typeId;
        if ($historyModel->insert()) {
            echo 'success';
        } else {
            echo 'fail2';
        }
    }

    public function GetHistory($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $matchId = $data[2];

        $history_model = History::model()->findAll(array('select' => "piecesId, positionX, positionY", 'condition' => 'matchId = ' . $matchId));
        $datas = array();
        foreach ($history_model as $idx => $model) {
            $datas["historyFromServer"][$idx]['id'] = (int) $model->piecesId;
            $datas["historyFromServer"][$idx]['x'] = (int) $model->positionX;
            $datas["historyFromServer"][$idx]['y'] = (int) $model->positionY;
        }

        $datas = json_encode($datas);
        echo $datas;
    }

    public function FindMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $gameId = $data[3];

        $statuserModel = Statuser::model()->findByPk($userId);

        $sql = "UPDATE `match` SET userId2 = " . $statuserModel->statuserId . " WHERE userId2 = 0 AND userId1 != 0 AND userId1 != " . $statuserModel->statuserId . " AND scoreMatch1 between " . ($statuserModel->score - 200) . " AND " . ($statuserModel->score + 200) . " AND createdDate > NOW() - INTERVAL 10 SECOND LIMIT 1";
        $command = Yii::app()->db_checkmate->createCommand($sql);
        $rows = $command->execute();
        if ($rows == 1) {
            $matchModel = Match::model()->findByAttributes(array('userId2' => $userId, 'gameId' => $gameId), array('order' => 'createdDate DESC'));
            $resultScore = CalculateScore::getScoreWinAndLose($matchModel->statuser1->score, $matchModel->statuser2->score);
            $matchModel->scoreMatch2 = $statuserModel->score;
            $matchModel->score1win = $resultScore['dif1win'];
            $matchModel->score1lose = $resultScore['dif1lose'];
            $matchModel->score2win = $resultScore['dif2win'];
            $matchModel->score2lose = $resultScore['dif2lose'];
            $matchModel->save();
            $statuserModel->currentMatchId = $matchModel->matchId;
            $statuserModel->save();
            echo 'success,' . $matchModel->matchId . ',2';
        } else {
            $matchModel = new Match();
            $matchModel->gameId = $gameId;
            $matchModel->userId1 = $statuserModel->statuserId;
            $matchModel->userId2 = 0;
            $matchModel->scoreMatch1 = $statuserModel->score;
            $matchModel->createdDate = date('Y-m-d H:i:s');
            if ($matchModel->save()) {
                die('wait');
            } else {
                die('fail2');
            }
        }
    }

    public function WaitMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $gameId = $data[3];

        $matchModel = Match::model()->findByAttributes(array('userId1' => $userId, 'gameId' => $gameId), array('order' => 'createdDate DESC'));
        if ($matchModel->userId2 != 0) {
            $statuserModel = Statuser::model()->findByPk($userId);
            $statuserModel->currentMatchId = $matchModel->matchId;
            $statuserModel->save();
            echo 'success,' . $matchModel->matchId . ',' . $matchModel->statuser2->user->displayName . ',' . $matchModel->statuser2->score . ',1';
        } else {
            $matchModel->createdDate = date('Y-m-d H:i:s');
            if ($matchModel->save()) {
                die('wait');
            } else {
                die('fail2');
            }
        }
    }

    public function StopFindMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $gameId = $data[3];

        $matchModel = Match::model()->findByAttributes(array('userId1' => $userId, 'gameId' => $gameId, 'userId2' => 0), array('order' => 'createdDate DESC'));
        if ($matchModel->delete()) {
            echo 'success';
        } else {
            echo 'fail2';
        }
    }

    public function MatchResult($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $matchId = $data[2];
        $result = $data[3];
        $historys = $data[4];
        $statuserId = $data[5];

        $matchModel = Match::model()->findByPk($matchId);
        if ($matchModel->result == 0) {
            $matchModel->result = $result;
            $matchModel->history = $historys;
            if ($matchModel->save()) {
                $myAmountWon = self::GetAmountWonMatchInDay($statuserId);
                $player1 = Statuser::model()->findByPk($matchModel->userId1);
                $player2 = Statuser::model()->findByPk($matchModel->userId2);

                $resultScore = CalculateScore::getScoreWinAndLose($player1->score, $player2->score);

                if ($result == 1) {
                    $amountWon = self::GetAmountWonMatchInDay($matchModel->userId1);

                    $player1->score += $resultScore['dif1win'];
                    $player1->win++;
                    if ($amountWon != 2) {
                        $player1->money += 60;
                    } else {
                        $player1->money += 10;
                    }
                    $player1->currentMatchId = 0;
                    $player1->save();

                    $player2->score -= $resultScore['dif2lose'];
                    $player2->lose++;
                    $player2->currentMatchId = 0;
                    $player2->save();
                } else if ($result == 2) {
                    $amountWon = self::GetAmountWonMatchInDay($matchModel->userId2);

                    $player1->score -= $resultScore['dif1lose'];
                    $player1->lose++;
                    $player1->currentMatchId = 0;
                    $player1->save();

                    $player2->score += $resultScore['dif2win'];
                    $player2->win++;
                    if ($amountWon != 2) {
                        $player2->money += 60;
                    } else {
                        $player2->money += 10;
                    }
                    $player2->currentMatchId = 0;
                    $player2->save();
                } else {
                    $player1->draw++;
                    $player1->currentMatchId = 0;
                    $player1->save();
                    $player2->draw++;
                    $player2->currentMatchId = 0;
                    $player2->save();
                }
                echo $myAmountWon;
            } else {
                echo 'fail2';
            }
        } else {
            $myAmountWon = self::GetAmountWonMatchInDay($statuserId);
            echo $myAmountWon;
        }
    }

    public function GetListHistoryMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $page = $data[3];

        $offset = ($page - 1) * 10;

        $condition = '(userId1 = ' . $userId . ' or userId2 =  ' . $userId . ' ) and result != 0';

        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'order' => 'createdDate DESC',
            //'limit' => 10,
            'offset' => $offset
        ));

        $matchModel = Match::model()->findAll($criteria);
        $datas = array();
        $i = 0;
        foreach ($matchModel as $idx => $match) {
            $datas[$i]['matchId'] = (int) $match->matchId;
            if ($match->history == null) {
                $datas[$i]['haveHistory'] = 0;
            } else {
                $datas[$i]['haveHistory'] = 1;
            }

            if ($match->userId1 == $userId) {
                if ($match->result == 1) {
                    $datas[$i]['myScore'] = ($match->scoreMatch1 + $match->score1win) . ' (+' . $match->score1win . ')';
                    $datas[$i]['result'] = 1;
                } else if ($match->result == 2) {
                    $datas[$i]['myScore'] = ($match->scoreMatch1 - $match->score1lose) . ' (-' . $match->score1lose . ')';
                    $datas[$i]['result'] = 2;
                } else if ($match->result == 3) {
                    $datas[$i]['myScore'] = $match->scoreMatch1;
                    $datas[$i]['result'] = 3;
                }
                $datas[$i]['opponentName'] = $match->statuser2->user->displayName;
                $datas[$i]['opponentScore'] = (int) $match->scoreMatch2;
            } else {
                if ($match->result == 1) {
                    $datas[$i]['myScore'] = ($match->scoreMatch2 - $match->score2lose) . ' (-' . $match->score2lose . ')';
                    $datas[$i]['result'] = 2;
                } else if ($match->result == 2) {
                    $datas[$i]['myScore'] = ($match->scoreMatch2 + $match->score2win) . ' (+' . $match->score2win . ')';
                    $datas[$i]['result'] = 1;
                } else if ($match->result == 3) {
                    $datas[$i]['myScore'] = $match->scoreMatch2;
                    $datas[$i]['result'] = 3;
                }
                $datas[$i]['opponentName'] = $match->statuser1->user->displayName;
                $datas[$i]['opponentScore'] = (int) $match->scoreMatch1;
            }
            $datas[$i]['createdDate'] = date("d/m/y", strtotime($match->createdDate));
            $datas[$i]['ordinal'] = count($matchModel) - $idx;
            $i++;
        }
        $data = json_encode($datas);
        echo $data;
    }

    public function GetMoveHistoryMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $matchId = $data[2];
        $userId = $data[3];

        $datas = array();

        $matchModel = Match::model()->findByPk($matchId);
        $datas['historys'] = json_decode($matchModel->history);
        $datas['createdDate'] = date("d/m/y", strtotime($matchModel->createdDate));
        if ($userId == $matchModel->userId1) {
            //$datas['playerName1'] = $matchModel->statuser1->user->displayName;
            //$datas['playerScore1'] = (int) $matchModel->statuser1->score;
            $datas['opponentName'] = $matchModel->statuser2->user->displayName;
            $datas['opponentScore'] = (int) $matchModel->scoreMatch2;
            if ($matchModel->result == 1) {
                $datas['result'] = 1;
            } else if ($matchModel->result == 2) {
                $datas['result'] = 2;
            } else {
                $datas['result'] = 3;
            }
            $datas['iAmBlack'] = false;
        } else {
            //$datas['playerName1'] = $matchModel->statuser2->user->displayName;
            //$datas['playerScore1'] = (int) $matchModel->statuser2->score;
            $datas['opponentName'] = $matchModel->statuser1->user->displayName;
            $datas['opponentScore'] = (int) $matchModel->scoreMatch1;
            if ($matchModel->result == 1) {
                $datas['result'] = 2;
            } else if ($matchModel->result == 2) {
                $datas['result'] = 1;
            } else {
                $datas['result'] = 3;
            }
            $datas['iAmBlack'] = true;
        }

        $datas = json_encode($datas);

        echo $datas;
    }

    public function GetListCurrentMatch($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $gameId = $data[2];

        $condition = 'gameId = ' . $gameId . ' and result = 0';

        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'order' => 'scoreMatch1 DESC, scoreMatch2 DESC',
            'limit' => 10,
        ));

        $matchModel = Match::model()->findAll($criteria);
        $datas = array();
        $i = 0;

        foreach ($matchModel as $match) {
            $datas[$i]['matchId'] = (int) $match->matchId;
            $datas[$i]['score1'] = (int) $match->scoreMatch1;
            $datas[$i]['score2'] = (int) $match->scoreMatch2;
            $datas[$i]['name1'] = $match->statuser1->user->displayName;
            $datas[$i]['name2'] = $match->statuser2->user->displayName;

            $i++;
        }
        $data = json_encode($datas);
        echo $data;
    }

    public function GetAmountWonMatchInDay($statuserId) {
        $today = date("Y-m-d");
        $condition = "((userId1 = " . $statuserId . " and result = 1) or (userId2 = " . $statuserId . " and result = 2)) and createdDate between '" . $today . " 00:00:00' and '" . $today . " 23:59:59'";

        $criteria = new CDbCriteria(array(
            'condition' => $condition,
        ));

        $matchModel = Match::model()->findAll($criteria);
        $amount = count($matchModel);
        return $amount;
    }

    public function Register($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $email = $data[2];
        $password = $data[3];
        //$displayName = $data[4];

        $model = User::model()->findByAttributes(array('email' => $email));
        if ($model == null) {
            $model = new User();
            $model->email = $email;
            $model->password = md5($password);
            //$model->displayName = $displayName;
            $model->createdDate = date("Y-m-d H:i:s");
            if ($model->save()) {
                $gameModel = Game::model()->findAll();
                foreach ($gameModel as $game) {
                    $statuserModel = Statuser::model()->findByAttributes(array('userId' => $model->userId, 'gameId' => $game->gameId));
                    if ($statuserModel == null) {
                        $statuserModel = new Statuser();
                        $statuserModel->userId = $model->userId;
                        $statuserModel->gameId = $game->gameId;
                        $statuserModel->save();
                    }
                }
                echo 'success';
            } else {
                echo 'fail2';
            }
        } else {
            echo 'already';
        }
    }

    public function RegisterAfterConnectDevice($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $email = $data[2];
        $password = $data[3];
        $guestId = $data[4];
        $facebookId = $data[5];

        $model = User::model()->findByAttributes(array('email' => $email));
        if ($model == null) {
            if ($guestId == null) {
                $model = User::model()->findByAttributes(array('facebookId' => $facebookId));
            } else {
                $model = User::model()->findByAttributes(array('guestId' => $guestId));
            }
            $model->email = $email;
            $model->password = md5($password);
            if ($model->save()) {
                echo 'success';
            } else {
                echo 'fail2';
            }
        } else {
            echo 'already';
        }
    }

    public function Login($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $email = $data[2];
        $password = $data[3];
        $datas = array();

        $model = User::model()->findByAttributes(array('email' => $email));
        if ($model != null) {
            if (md5($password) == $model->password) {
                if ($model->active == 1) {
                    $statuserModel = Statuser::model()->findAllByAttributes(array('userId' => $model->userId));
                    $datas['result'] = 'success';
                    $datas['userId'] = (int) $model->userId;
                    $datas['displayName'] = $model->displayName;
                    $datas['email'] = $model->email;
                    $datas['guestId'] = $model->guestId;
                    foreach ($statuserModel as $statuser) {
                        $temp = array();
                        $temp['statuserId'] = (int) $statuser->statuserId;
                        $temp['score'] = (int) $statuser->score;
                        $temp['win'] = (int) $statuser->win;
                        $temp['lose'] = (int) $statuser->lose;
                        $temp['money'] = (int) $statuser->money;
                        $temp['draw'] = (int) $statuser->draw;
                        $temp['abandon'] = (int) $statuser->abandon;
                        $temp['themeHave'] = explode(",", $statuser->themeHave);
                        foreach ($temp['themeHave'] as $idx => $themeHave) {
                            $temp['themeHave'][$idx] = (int) $themeHave;
                        }
                        $temp['themeEquip'] = (int) $statuser->themeEquip;
                        $temp['ads'] = (int) $statuser->ads;

                        $datas["statuser"][] = $temp;
                    }

                    $datas = self::GetAdvertise($datas);
                } else {
                    $datas['result'] = 'banUser';
                }
            } else {
                $datas['result'] = 'passwordWrong';
            }
        } else {
            $datas['result'] = 'userNotFound';
        }
        $datas['ads'] = $this->ads;
        $datas = json_encode($datas);
        echo $datas;
    }

    public function GuestLogin($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $guestId = $data[2];
        $datas = array();

        $model = User::model()->findByAttributes(array('guestId' => $guestId));
        if ($model != null) {
            if ($model->active == 1) {
                $statuserModel = Statuser::model()->findAllByAttributes(array('userId' => $model->userId));
                $datas['result'] = 'success';
                $datas['userId'] = (int) $model->userId;
                $datas['displayName'] = $model->displayName;
                $datas['email'] = $model->email;
                $datas['guestId'] = $model->guestId;
                foreach ($statuserModel as $statuser) {
                    $temp = array();
                    $temp['statuserId'] = (int) $statuser->statuserId;
                    $temp['score'] = (int) $statuser->score;
                    $temp['win'] = (int) $statuser->win;
                    $temp['lose'] = (int) $statuser->lose;
                    $temp['money'] = (int) $statuser->money;
                    $temp['draw'] = (int) $statuser->draw;
                    $temp['abandon'] = (int) $statuser->abandon;
                    $temp['themeHave'] = explode(",", $statuser->themeHave);
                    foreach ($temp['themeHave'] as $idx => $themeHave) {
                        $temp['themeHave'][$idx] = (int) $themeHave;
                    }
                    $temp['themeEquip'] = (int) $statuser->themeEquip;
                    $temp['ads'] = (int) $statuser->ads;

                    $datas["statuser"][] = $temp;
                }

                $datas = self::GetAdvertise($datas);
            } else {
                $datas['result'] = 'banUser';
            }
        } else {
            $model = new User();
            //$model->email = "-";
            //$model->password = "-";
            //$model->displayName = "-";
            $model->guestId = $guestId;
            $model->createdDate = date("Y-m-d H:i:s");
            if ($model->save()) {
                $datas['result'] = 'success';
                $datas['userId'] = (int) $model->userId;
                //$datas['displayName'] = $model->displayName;
                $datas['guestId'] = $model->guestId;
                $gameModel = Game::model()->findAll();
                foreach ($gameModel as $game) {
                    $statuser = Statuser::model()->findByAttributes(array('userId' => $model->userId, 'gameId' => $game->gameId));
                    if ($statuser == null) {
                        $statuser = new Statuser();
                        $statuser->userId = $model->userId;
                        $statuser->gameId = $game->gameId;
                        $statuser->save();

                        $temp = array();
                        $temp['statuserId'] = (int) $statuser->statuserId;
                        $temp['score'] = (int) $statuser->score;
                        $temp['win'] = (int) $statuser->win;
                        $temp['lose'] = (int) $statuser->lose;
                        $temp['money'] = (int) $statuser->money;
                        $temp['draw'] = (int) $statuser->draw;
                        $temp['abandon'] = (int) $statuser->abandon;
                        $temp['themeHave'] = explode(",", $statuser->themeHave);
                        foreach ($temp['themeHave'] as $idx => $themeHave) {
                            $temp['themeHave'][$idx] = (int) $themeHave;
                        }
                        $temp['themeEquip'] = (int) $statuser->themeEquip;
                        $temp['ads'] = (int) $statuser->ads;

                        $datas["statuser"][] = $temp;
                    }
                }

                $datas = self::GetAdvertise($datas);
            }
        }
        $datas['ads'] = $this->ads;
        $datas = json_encode($datas);
        echo $datas;
    }

    public function SetDisplayName($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $displayName = $data[3];

        $model = User::model()->findByAttributes(array('displayName' => $displayName));
        if ($model != null) {
            echo "already";
        } else {
            $model = User::model()->findByPk($userId);
            $model->displayName = $displayName;
            if ($model->save()) {
                echo 'success';
            } else {
                echo 'fail2';
            }
        }
    }

    public function SetAvatar($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $photoFrameId = $data[3];
        $profilePictureId = $data[4];

        $model = User::model()->findByPk($userId);
        $model->photoFrameId = $photoFrameId;
        $model->profilePictureId = $profilePictureId;
        if ($model->save()) {
            echo 'success';
        } else {
            echo 'fail2';
        }
    }

    public function FacebookLogin($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $facebookId = $data[2];

        $model = User::model()->findByAttributes(array('facebookId' => $facebookId));
        if ($model != null) {
            if ($model->active == 1) {
                $statuserModel = Statuser::model()->findAllByAttributes(array('userId' => $model->userId));
                $datas['result'] = 'success';
                $datas['userId'] = (int) $model->userId;
                $datas['displayName'] = $model->displayName;
                $datas['facebookId'] = $model->facebookId;
                foreach ($statuserModel as $statuser) {
                    $temp = array();
                    $temp['statuserId'] = (int) $statuser->statuserId;
                    $temp['score'] = (int) $statuser->score;
                    $temp['win'] = (int) $statuser->win;
                    $temp['lose'] = (int) $statuser->lose;
                    $temp['money'] = (int) $statuser->money;
                    $temp['draw'] = (int) $statuser->draw;
                    $temp['abandon'] = (int) $statuser->abandon;
                    $temp['themeHave'] = explode(",", $statuser->themeHave);
                    foreach ($temp['themeHave'] as $idx => $themeHave) {
                        $temp['themeHave'][$idx] = (int) $themeHave;
                    }
                    $temp['themeEquip'] = (int) $statuser->themeEquip;
                    $temp['ads'] = (int) $statuser->ads;

                    $datas["statuser"][] = $temp;
                }

                $datas = self::GetAdvertise($datas);
            } else {
                $datas['result'] = 'banUser';
            }
        } else {
            $model = new User();
            $model->facebookId = $facebookId;
            $model->createdDate = date("Y-m-d H:i:s");
            if ($model->save()) {
                $datas['result'] = 'success';
                $datas['userId'] = (int) $model->userId;
                $datas['facebookId'] = $model->facebookId;
                $gameModel = Game::model()->findAll();
                foreach ($gameModel as $game) {
                    $statuser = Statuser::model()->findByAttributes(array('userId' => $model->userId, 'gameId' => $game->gameId));
                    if ($statuser == null) {
                        $statuser = new Statuser();
                        $statuser->userId = $model->userId;
                        $statuser->gameId = $game->gameId;
                        $statuser->save();

                        $temp = array();
                        $temp['statuserId'] = (int) $statuser->statuserId;
                        $temp['score'] = (int) $statuser->score;
                        $temp['win'] = (int) $statuser->win;
                        $temp['lose'] = (int) $statuser->lose;
                        $temp['money'] = (int) $statuser->money;
                        $temp['draw'] = (int) $statuser->draw;
                        $temp['abandon'] = (int) $statuser->abandon;
                        $temp['themeHave'] = explode(",", $statuser->themeHave);
                        foreach ($temp['themeHave'] as $idx => $themeHave) {
                            $temp['themeHave'][$idx] = (int) $themeHave;
                        }
                        $temp['themeEquip'] = (int) $statuser->themeEquip;
                        $temp['ads'] = (int) $statuser->ads;

                        $datas["statuser"][] = $temp;
                    }
                }

                $datas = self::GetAdvertise($datas);
            }
        }
        $datas['ads'] = $this->ads;
        $datas = json_encode($datas);
        echo $datas;
    }

    public function ConnectFacebook($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $facebookId = $data[3];

        $model = User::model()->findByAttributes(array('facebookId' => $facebookId));
        if ($model != null) {
            echo "already";
        } else {
            $model = User::model()->findByPk($userId);
            $model->facebookId = $facebookId;
            if ($model->save()) {
                echo 'success';
            } else {
                echo 'fail2';
            }
        }
    }

    public function RemoveConnectFacebook($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];

        $model = User::model()->findByPk($userId);
        $model->facebookId = null;
        if ($model->save()) {
            echo 'success';
        } else {
            echo 'fail2';
        }
    }

    public function ConnectDevice($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $guestId = $data[3];

        $model = User::model()->findByAttributes(array('guestId' => $guestId));
        if ($model != null) {
            echo "already";
        } else {
            $model = User::model()->findByPk($userId);
            $model->guestId = $guestId;
            if ($model->save()) {
                echo 'success';
            } else {
                echo 'fail2';
            }
        }
    }

    public function RemoveConnectDevice($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];

        $model = User::model()->findByPk($userId);
        $model->guestId = null;
        if ($model->save()) {
            echo 'success';
        } else {
            echo 'fail2';
        }
    }

    public function ChangeEmail($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $email = $data[3];
        $password = $data[4];

        $model = User::model()->findByAttributes(array('email' => $email));
        if ($model != null) {
            echo 'already';
        } else {
            $model = User::model()->findByPk($userId);
            if ($model == null) {
                echo 'fail2';
            } else if (md5($password) != $model->password) {
                echo 'incorrectPassword';
            } else {
                $model->email = $email;
                if ($model->save()) {
                    echo 'success';
                } else {
                    echo 'fail3';
                }
            }
        }
    }

    public function ChangePassword($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $userId = $data[2];
        $oldPassword = $data[3];
        $password = $data[4];

        $model = User::model()->findByPk($userId);
        if ($model == null) {
            echo 'fail2';
        } else if (md5($oldPassword) != $model->password) {
            echo 'incorrectPassword';
        } else {
            $model = User::model()->findByPk($userId);
            $model->password = md5($password);
            if ($model->save()) {
                echo 'success';
            } else {
                echo 'fail3';
            }
        }
    }

    /* public function actionGetHistory() {
      $guestId = "sadddqsdwdawdqw";
      $datas = array();

      $model = User::model()->findByAttributes(array('guestId' => $guestId));
      if ($model != null) {
      $statuserModel = Statuser::model()->findAllByAttributes(array('userId' => $model->userId));
      $datas['result'] = 'success';
      $datas['userId'] = (int) $model->userId;
      $datas['displayName'] = $model->displayName;
      foreach ($statuserModel as $statuser) {
      $temp = array();
      $temp['statuserId'] = (int) $statuser->statuserId;
      $temp['score'] = (int) $statuser->score;
      $temp['win'] = (int) $statuser->win;
      $temp['lose'] = (int) $statuser->lose;
      $temp['draw'] = (int) $statuser->draw;
      $temp['abandon'] = (int) $statuser->abandon;
      $temp['themeHave'] = explode(",", $statuser->themeHave);
      foreach ($temp['themeHave'] as $idx => $themeHave) {
      $temp['themeHave'][$idx] = (int) $themeHave;
      }
      $temp['themeEquip'] = (int) $statuser->themeEquip;
      $temp['ads'] = (int) $statuser->ads;

      $datas["statuser"][] = $temp;
      }
      } else {
      $model = new User();
      $model->email = "-";
      $model->password = "-";
      $model->displayName = "-";
      $model->guestId = $guestId;
      $model->createdDate = date("Y-m-d H:i:s");
      if ($model->save()) {
      $datas['result'] = 'success';
      $datas['userId'] = (int) $model->userId;
      $datas['displayName'] = $model->displayName;
      $gameModel = Game::model()->findAll();
      foreach ($gameModel as $game) {
      $statuser = Statuser::model()->findByAttributes(array('userId' => $model->userId, 'gameId' => $game->gameId));
      if ($statuser == null) {
      $statuser = new Statuser();
      $statuser->userId = $model->userId;
      $statuser->gameId = $game->gameId;
      $statuser->save();

      $temp = array();
      $temp['statuserId'] = (int) $statuser->statuserId;
      $temp['score'] = (int) $statuser->score;
      $temp['win'] = (int) $statuser->win;
      $temp['lose'] = (int) $statuser->lose;
      $temp['draw'] = (int) $statuser->draw;
      $temp['abandon'] = (int) $statuser->abandon;
      $temp['themeHave'] = explode(",", $statuser->themeHave);
      foreach ($temp['themeHave'] as $idx => $themeHave) {
      $temp['themeHave'][$idx] = (int) $themeHave;
      }
      $temp['themeEquip'] = (int) $statuser->themeEquip;
      $temp['ads'] = (int) $statuser->ads;

      $datas["statuser"][] = $temp;
      }
      }
      }
      }
      $datas = json_encode($datas);
      echo $datas;
      } */

    public function GetRankingList($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $gameId = $data[2];

        $condition = 'gameId = ' . $gameId;

        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'order' => 'score DESC, win DESC',
            'limit' => 20
        ));

        $statuserModel = Statuser::model()->findAll($criteria);
        $datas = array();
        foreach ($statuserModel as $idx => $statuser) {
            $datas[$idx]['userId'] = (int) $statuser->userId;
            $datas[$idx]['score'] = (int) $statuser->score;
            $datas[$idx]['displayName'] = $statuser->user->displayName;
            $datas[$idx]['photoFrameId'] = (int) $statuser->user->photoFrameId;
            $datas[$idx]['profilePictureId'] = (int) $statuser->user->profilePictureId;
        }
        $data = json_encode($datas);
        echo $data;
    }

    public function Buytheme($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $statuserId = $data[2];
        $themeId = $data[3];

        $statuserModel = Statuser::model()->findByPk($statuserId);
        $themeData = ThemeData::getData($statuserModel->gameId, $themeId);
        if ($statuserModel->money >= $themeData['price']) {
            $statuserModel->themeHave .= "," . $themeId;
            $moneyBefore = $statuserModel->money;
            $statuserModel->money -= $themeData['price'];
            $statuserModel->themeEquip = $themeId;
            if ($statuserModel->save()) {
                $moneylogModel = new Moneylog;
                $moneylogModel->statuserId = $statuserId;
                $moneylogModel->moneyBefore = $moneyBefore;
                $moneylogModel->moneyAfter = $statuserModel->money;
                $moneylogModel->type = 1;
                $moneylogModel->createdDate = date('Y-m-d H:i:s');
                if ($moneylogModel->save()) {
                    echo 'success';
                } else {
                    echo 'fail1';
                }
            } else {
                echo 'fail2';
            }
        } else {
            echo 'nomoney';
        }
    }

    public function EquipTheme($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $statuserId = $data[2];
        $themeId = $data[3];

        $statuserModel = Statuser::model()->findByPk($statuserId);
        $statuserModel->themeEquip = $themeId;
        if ($statuserModel->save()) {
            echo 'success';
        } else {
            echo 'fail1';
        }
    }

    public function BuyNoAds($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $statuserId = $data[2];

        $statuserModel = Statuser::model()->findByPk($statuserId);
        $statuserModel->ads = 0;
        if ($statuserModel->save()) {
            $topupModel = new Topup;
            $topupModel->statuserId = $statuserId;
            $topupModel->product_id = 1;
            $topupModel->amount = 35;
            $topupModel->createdDate = date('Y-m-d H:i:s');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $topupModel->ip_address = $ip;
            if ($topupModel->save()) {
                echo 'success';
            } else {
                echo 'fail1';
            }
        } else {
            echo 'fail2';
        }
    }

    public function BuyCoin($data) {
        if ($data[1] != $this->signatureKey) {
            die('fail');
        }
        $statuserId = $data[2];
        $amountCoin = $data[3];
        switch ($amountCoin) {
            case 1000:
                $product_id = 2;
                break;
            case 7000:
                $product_id = 3;
                break;
            case 18000:
                $product_id = 4;
                break;
        }

        $statuserModel = Statuser::model()->findByPk($statuserId);
        $moneyBefore = $statuserModel->money;
        $statuserModel->money += $amountCoin;
        if ($statuserModel->save()) {
            $topupModel = new Topup;
            $topupModel->statuserId = $statuserId;
            $topupModel->product_id = $product_id;
            $topupModel->amount = $amountCoin;
            $topupModel->createdDate = date('Y-m-d H:i:s');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $topupModel->ip_address = $ip;
            if ($topupModel->save()) {
                $moneylogModel = new Moneylog;
                $moneylogModel->statuserId = $statuserId;
                $moneylogModel->moneyBefore = $moneyBefore;
                $moneylogModel->moneyAfter = $statuserModel->money;
                $moneylogModel->type = 0;
                $moneylogModel->createdDate = date('Y-m-d H:i:s');
                if ($moneylogModel->save()) {
                    echo 'success';
                } else {
                    echo 'fail1';
                }
            } else {
                echo 'fail2';
            }
        } else {
            echo 'fail3';
        }
    }

    public function GetAdvertise($datas) {
        $currentDate = date('Y-m-d');
        $condition = 'dateStart <= "' . $currentDate . '" AND dateEnd >= "' . $currentDate . '"';
        $criteria = new CDbCriteria(array(
            'condition' => $condition,
        ));
        $advertiseModel = Advertise::model()->findAll($criteria);
        if (count($advertiseModel) > 0) {
            foreach ($advertiseModel as $idx => $advertise) {
                $datas['advertise'][$idx]['position'] = (int)$advertise->position;
                $datas['advertise'][$idx]['url'] = $advertise->url;
                $datas['advertise'][$idx]['picture'] = $advertise->picture;
            }
        } else {
            $datas['advertise'][0]['position'] = 0;
            $datas['advertise'][0]['url'] = '';
            $datas['advertise'][0]['picture'] = '';
        }
        return $datas;
    }

    public function actionTestQuery() {
        $position = 1;

        $currentDate = date('Y-m-d');
        $condition = 'position = ' . $position . ' AND dateStart <= "' . $currentDate . '" AND dateEnd >= "' . $currentDate . '"';
        $criteria = new CDbCriteria(array(
            'condition' => $condition,
        ));

        $advertiseModel = Advertise::model()->findAll($criteria);
        $datas = array();
        if (count($advertiseModel) > 0) {
            foreach ($advertiseModel as $idx => $advertise) {
                $datas[$idx]['url'] = $advertise->url;
                $datas[$idx]['picture'] = $advertise->picture;
            }
            $datas = json_encode($datas);

            echo $datas;
        } else {
            echo 'noadvertise';
        }
    }

}

