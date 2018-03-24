<?php

class TournamentController extends Controller {

    public $_WIDTH_LOGO = 120;
    public $_HEIGHT_LOGO = 120;

    public function actionIndex() {
        $tournamentModel = Tournament::model()->findAllByAttributes(array('gameId' => Yii::app()->params['gameId']), array('order' => '1 DESC'));

        $relatetourteamArray = array();
        foreach ($tournamentModel as $tournament) {
            $relatetourteamModel = TournamentRelatetourteam::model()->findByAttributes(array(
                'teamId' => Yii::app()->user->id,
                'tournamentId' => $tournament->tournamentId,
            ));
            if (isset($relatetourteamModel)) {
                $relatetourteamArray[$tournament->tournamentId]['isRegister'] = true;
            } else {
                $relatetourteamArray[$tournament->tournamentId]['isRegister'] = false;
            }

            $criteria = new CDbCriteria();
            $criteria->condition = 'tournamentId = :tournamentId';
            $criteria->params = array(':tournamentId' => $tournament->tournamentId);
            $relatetourteamArray[$tournament->tournamentId]['count'] = TournamentRelatetourteam::model()->count($criteria);
        }

        $this->render('index', array(
            'tournamentModel' => $tournamentModel,
            'relatetourteamArray' => $relatetourteamArray,
        ));
    }

    public function actionLogin() {
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if (!empty($_POST['LoginForm']['rememberMe']) && $_POST['LoginForm']['rememberMe'] == 'on') {
                $model->rememberMe = 1;
            } else {
                $model->rememberMe = 0;
            }
            if ($model->validate() && $model->login()) {
                //print_r(Yii::app()->user->username);
            } else {
                //print_r($model->getErrors());
            }

            $this->redirect(array('tournament/index'));

            /* $tournamentModel = Tournament::model()->findAll(array('order' => '1 DESC'));
              $this->render('index', array(
              'tournamentModel' => $tournamentModel,
              )); */
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('tournament/index'));
    }

    public function actionRegister() {
        $data = array(
            'email' => '',
            'name' => '',
            'shortName' => '',
            'password' => '',
            'confirmPassword' => '',
        );
        if (isset($_POST['Team'])) {
            //print_r($_FILES["Team"]);exit;
            $data = $_POST['Team'];
            $isPass = false;
            if (empty($data['email'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Email");
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Email ให้ถูกต้อง");
            } else if (empty($data['password'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก password");
            } else if (empty($data['confirmPassword'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก confirm password");
            } else if ($data['password'] != $data['confirmPassword']) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก password กับ confirm password ให้ตรงกัน");
            } else if (empty($data['name'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอกชื่อทีม");
            } else if (empty($data['shortName'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอกตัวย่อชื่อทีม");
            } else {
                $isPass = true;
            }

            if ($isPass) {
                $model = new TournamentTeam;
                $model->attributes = $data;
                $model->password = md5($model->password);
                $model->gameId = Yii::app()->params['gameId'];

                if ($_FILES['Team']['name']['logo'] != '') {
                    $subfix = end(explode('.', $_FILES['Team']['name']['logo']));
                    $model->logo = '/images/logoTeam/' . $model->shortName . '.' . $subfix;
                    $basepath = 'images/logoTeam/';
                    $image = new SimpleImage();
                    //$image->load('images/tournament/' . 'unknown.jpg');
                    $image->load($_FILES['Team']['tmp_name']['logo']);
                    $image->resize($this->_WIDTH_LOGO, $this->_HEIGHT_LOGO);
                    $image->save($basepath . $model->shortName . '.' . $subfix);
                    unlink($_FILES['Team']['tmp_name']['logo']);
                } else {
                    $model->logo = '/images/tournament/unknown.jpg';
                }

                if ($model->save())
                    $this->redirect(array('tournament/registerdone'));
                else {
                    foreach ($model->getErrors() as $message) {
                        Yii::app()->user->setFlash('danger', $message[0]);
                    }
                }
            }
        }

        $this->render('register', array(
            'data' => $data,
        ));
    }

    public function actionRegistertournament() {
        $tournamentId = Yii::app()->request->getParam('tournamentId');
        $teamId = Yii::app()->user->id;

        $relatetourteamModel = new TournamentRelatetourteam;
        $relatetourteamModel->tournamentId = $tournamentId;
        $relatetourteamModel->teamId = $teamId;
        if ($relatetourteamModel->save()) {
            Yii::app()->user->setFlash('success', 'สมัครแข่งขันเรียบร้อยครับ');
        } else {
            Yii::app()->user->setFlash('danger', 'ไม่สามารถสมัครแข่งขันได้ กรุณาติดต่อทีมงานทางแฟนเพจ');
        }
        $this->redirect(Yii::app()->createUrl('tournament/index'));
    }

    public function actionCancelregistertournament() {
        $tournamentId = Yii::app()->request->getParam('tournamentId');
        $teamId = Yii::app()->user->id;

        $deleteResult = TournamentRelatetourteam::model()->deleteAllByAttributes(array(
            'teamId' => $teamId,
            'tournamentId' => $tournamentId,
        ));

        if ($deleteResult) {
            Yii::app()->user->setFlash('success', 'ยกเลิกการสมัครแข่งขันเรียบร้อยครับ');
        } else {
            Yii::app()->user->setFlash('danger', 'ไม่สามารถยกเลิกการสมัครแข่งขันได้ กรุณาติดต่อทีมงานทางแฟนเพจ');
        }

        $this->redirect(Yii::app()->createUrl('tournament/index'));
    }

    public function actionProfileteam() {
        $teamId = Yii::app()->request->getParam('teamId');
        $teamModel = TournamentTeam::model()->findByPk($teamId);

        $stattourModel = TournamentStattour::model()->findAllByAttributes(array(
            'team1Id' => $teamId,
        ));

        $this->render('profileteam', array(
            'teamModel' => $teamModel,
            'stattourModel' => $stattourModel,
        ));
    }

    public function actionUpdateprofileteam() {
        $id = Yii::app()->user->id;
        $model = TournamentTeam::model()->findByPk($id);

        if (isset($_POST['Team'])) {
            $isPass = false;
            $model->attributes = $_POST['Team'];
            if (empty($model->email)) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Email");
            } else if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Email ให้ถูกต้อง");
            } else if (empty($model->name)) {
                Yii::app()->user->setFlash('danger', "กรุณากรอกชื่อทีม");
            } else if (empty($model->shortName)) {
                Yii::app()->user->setFlash('danger', "กรุณากรอกตัวย่อชื่อทีม");
            } else {
                $isPass = true;
            }
            if ($isPass) {
                if (!empty($_FILES['Team']['name']['logo'])) {
                    $explode = explode('.', $_FILES['Team']['name']['logo']);
                    $subfix = end($explode);
                    $model->logo = '/images/logoTeam/' . $model->shortName . '.' . $subfix;
                    $basepath = 'images/logoTeam/';
                    $image = new SimpleImage();
                    //$image->load('images/tournament/' . 'unknown.jpg');
                    $image->load($_FILES['Team']['tmp_name']['logo']);
                    $image->resize($this->_WIDTH_LOGO, $this->_HEIGHT_LOGO);
                    $image->save($basepath . $model->shortName . '.' . $subfix);
                    unlink($_FILES['Team']['tmp_name']['logo']);
                }
                if ($model->save())
                    $this->redirect(Yii::app()->createUrl('tournament/profileteam', array('teamId' => $id)));
            }
        }

        $this->render('updateprofileteam', array(
            'model' => $model,
        ));
    }

    public function actionUpdatepasswordteam() {
        $id = Yii::app()->user->id;
        $data = '';
        if (isset($_POST['Team'])) {
            $model = TournamentTeam::model()->findByPk($id);
            $data = $_POST['Team'];
            $isPass = false;
            if (empty($data['oldPassword'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Old Password");
            } else if (empty($data['password'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก New Password");
            } else if (empty($data['confirmPassword'])) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก Confirm Password");
            } else if ($data['password'] != $data['confirmPassword']) {
                Yii::app()->user->setFlash('danger', "กรุณากรอก New Password กับ Confirm Password ให้ตรงกัน");
            } else if (md5($data['oldPassword']) != $model->password) {
                Yii::app()->user->setFlash('danger', "Old Password ไม่ถูกต้อง");
            } else {
                $isPass = true;
            }
            if ($isPass) {
                $model->password = md5($data['password']);
                if ($model->save())
                    $this->redirect(Yii::app()->createUrl('tournament/profileteam', array('teamId' => $id)));
            }
        }

        $this->render('updatepasswordteam', array(
            'data' => $data,
        ));
    }

    public function actionRegisterdone() {
        $this->render('registerdone');
    }

    public function actionViewlistteam() {
        $tournamentId = Yii::app()->request->getParam('tournamentId');
        $tourteamModel = TournamentRelatetourteam::model()->findAllByAttributes(array('tournamentId' => $tournamentId));

        $this->render('viewlistteam', array(
            'tourteamModel' => $tourteamModel,
        ));
    }

    public function actionSchedule() {
        $this->layout = 'full_width';
        $tournamentId = Yii::app()->request->getParam('tournamentId');

        $tournamentService = new TournamentService();
        $tournament = $tournamentService->findTournament($tournamentId);

        $tourData = $tournamentService->readTournamentData($tournamentId, $tournament);

        $this->render('schedule', array(
            'tournament' => $tournament,
            'tourData' => $tourData,
            'roundSchedules' => $tournamentService->getRoundSchedules($tournamentId),
        ));
    }

    public function actionMatch() {
        $matchId = Yii::app()->request->getParam('matchId');

        $matchModel = TournamentMatch::model()->findByPk($matchId);

        $team1Model = TournamentTeam::model()->findByPk($matchModel->team1Id);
        $team2Model = TournamentTeam::model()->findByPk($matchModel->team2Id);

        $tournamentModel = Tournament::model()->findByPk($matchModel->tournamentId);

        $matchResultsModel = TournamentMatchresult::model()->findAllByAttributes(array(
            'matchId' => $matchId,
        ));

        $stattourModel = TournamentStattour::model()->findByAttributes(array(
            'team1Id' => $team1Model->teamId,
            'team2Id' => $team2Model->teamId,
        ));
        if ($stattourModel == null) {
            $stattourModel = new TournamentStattour;
            $stattourModel->win = 0;
            $stattourModel->lose = 0;
        }

        $appointmentModel = TournamentAppointment::model()->findAllByAttributes(array(
            'matchId' => $matchId,
        ));

        $roundScheduleModel = TournamentRoundschedule::model()->findByAttributes(array(
            'tournamentId' => $matchModel->tournamentId,
            'round' => $matchModel->round,
        ));

        $this->render('match', array(
            'tournamentModel' => $tournamentModel,
            'matchModel' => $matchModel,
            'team1Model' => $team1Model,
            'team2Model' => $team2Model,
            'matchResultsModel' => $matchResultsModel,
            'stattourModel' => $stattourModel,
            'appointmentModel' => $appointmentModel,
            'roundScheduleModel' => $roundScheduleModel,
        ));
    }

    public function actionMatchresult() {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array('tournament/index'));
        }
        $matchId = Yii::app()->request->getParam('matchId');
        $game = Yii::app()->request->getParam('game');
        $amount = Yii::app()->request->getParam('amount');
        $isFinalRound = Yii::app()->request->getParam('isFinalRound');

        $matchModel = TournamentMatch::model()->findByPk($matchId);
        
        $roundSceduleModel = TournamentRoundschedule::model()->findByAttributes(array(
            'tournamentId' => $matchModel->tournamentId,
            'round' => $matchModel->round,
        ));
        $raceDate = $roundSceduleModel->date;
        $raceDate = new DateTime($raceDate);
        $currentDate = new DateTime();
        $currentHour = $currentDate->format('H:i');
        if($raceDate->format('d') > $currentDate->format('d') || ($raceDate->format('d') == $currentDate->format('d') && $currentHour <= '20:30')){
            $canResult = false;
        }
        else{
            $canResult = true;
        }
        
        
        if (isset($_POST['MatchResult'])) {
            $matchResultModel = new TournamentMatchresult;
            if ($matchModel->team1Id == Yii::app()->user->id) {
                $matchResultModel->result = 1;
            } else if ($matchModel->team2Id == Yii::app()->user->id) {
                $matchResultModel->result = 2;
            } else {
                $matchResultModel->result = 0;
            }
            $matchResultModel->matchId = $matchId;
            $matchResultModel->screenshot = $_POST['MatchResult']['screenshot'];
            $matchResultModel->game = $game;
            $matchResultModel->dateCreated = date('Y-m-d H:i:s');
            if ($matchResultModel->save()) {
                //edit score team
                if ($matchResultModel->result == 1) {
                    $teamWinId = $matchModel->team1Id;
                    $teamLoseId = $matchModel->team2Id;
                } else {
                    $teamWinId = $matchModel->team2Id;
                    $teamLoseId = $matchModel->team1Id;
                }
                TournamentTeam::model()->editScore($teamWinId, $teamLoseId);

                //edit result table match
                if ($amount == 1) {
                    TournamentMatch::model()->editResult($matchId, $matchResultModel->result, $isFinalRound);
                } else {
                    $result = TournamentMatchresult::model()->checkResult($matchId, $amount);
                    if ($result != null) {
                        TournamentMatch::model()->editResult($matchId, $matchResultModel->result, $isFinalRound);
                    }
                }
                $this->redirect(Yii::app()->createUrl('tournament/match', array('matchId' => $matchId)));
            }
        }

        $this->render('matchresult', array(
            'matchModel' => $matchModel,
            'matchId' => $matchId,
            'game' => $game,
            'amount' => $amount,
            'isFinalRound' => $isFinalRound,
            'canResult' => $canResult,
        ));
    }

    public function actionAddcomment() {
        $matchId = Yii::app()->request->getParam('matchId');
        $comment = Yii::app()->request->getParam('comment');

        $appointmentModel = new TournamentAppointment;
        $appointmentModel->matchId = $matchId;
        $appointmentModel->teamId = Yii::app()->user->id;
        $appointmentModel->detail = $comment;
        $appointmentModel->date = date('Y-m-d H:i:s');
        if ($appointmentModel->save()) {
            Yii::app()->user->setFlash('success', 'post เรียบร้อยครับ');
        }

        $this->redirect(Yii::app()->createUrl('tournament/match', array('matchId' => $matchId)));
    }

    public function actionRanking() {
        $this->render('ranking');
    }

    public function actionRule() {
        $this->render('rule');
    }

    public function actionTutorpostresult() {
        $this->render('tutorpostresult');
    }

    public function actionTutorsaveresult() {
        $this->render('tutorsaveresult');
    }



}