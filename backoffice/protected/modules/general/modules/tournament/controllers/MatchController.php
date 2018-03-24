<?php

class MatchController extends GeneralBaseController {

    public $layout = 'default';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TournamentMatch'])) {
            $model->attributes = $_POST['TournamentMatch'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->matchId));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TournamentMatch('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TournamentMatch']))
            $model->attributes = $_GET['TournamentMatch'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionWonbye() {
        $matchId = Yii::app()->request->getParam('matchId');
        $teamWin = Yii::app()->request->getParam('teamWin');

        $matchModel = TournamentMatch::model()->findByPk($matchId);
        $tournamentModel = Tournament::model()->findByPk($matchId->tournamentId);
        $gameAmount = $tournamentModel->gameAmount;
        if ($gameAmount > 1) {
            $gameAmountForWin = ceil($gameAmount / 2);
        } else {
            $gameAmountForWin = 1;
        }

        for ($i = 1; $i <= $gameAmountForWin; $i++) {
            $matchResultModel = new TournamentMatchresult;
            $matchResultModel->result = $teamWin;
            $matchResultModel->matchId = $matchId;
            $matchResultModel->screenshot = '';
            $matchResultModel->game = $i;
            if ($matchResultModel->save()) {
                if ($matchResultModel->result == 1) {
                    $teamWinId = $matchModel->team1Id;
                    $teamLoseId = $matchModel->team2Id;
                } else {
                    $teamWinId = $matchModel->team2Id;
                    $teamLoseId = $matchModel->team1Id;
                }

                TournamentTeam::model()->editScore($teamWinId, $teamLoseId);
            }
        }
        TournamentMatch::model()->editResult($matchId, $teamWin, false);

        Yii::app()->user->setFlash('success', "ให้ทีม " . $teamWin . " ชนะบายเรียบร้อย");
        $this->redirect(Yii::app()->createUrl('general/tournament/match/view', array('id' => $matchId)));
    }

    public function actionCancelresult() {
        $matchId = Yii::app()->request->getParam('matchId');

        $matchModel = TournamentMatch::model()->findByPk($matchId);
        if ($matchModel->result == 1) {
            $teamWin = $matchModel->team1Id;
            $teamLose = $matchModel->team2Id;
        } else if ($matchModel->result == 2) {
            $teamWin = $matchModel->team2Id;
            $teamLose = $matchModel->team1Id;
        }

        // 1.table match -> result = 0, 2.remove teamWin from parentMatch
        $matchModel->cancelResult($matchId, $matchModel->winnerMatchId, $matchModel->ordinal);

        // 3.table matchresult -> delete row match
        TournamentMatchresult::model()->deleteAllByAttributes(array(
            'matchId' => $matchId,
        ));

        if ($matchModel->result != 0) {
            // 4.revert score team, 5.revert stat tour
            TournamentTeam::model()->cancelScore($teamWin, $teamLose);
        } else { //(if bothLoseBye)
            $matchWinnerModel = TournamentMatch::model()->findByPk($matchModel->winnerMatchId);
            // 1.table match -> result = 0, 2.remove teamWin from parentMatch
            $matchModel->cancelResult($matchModel->winnerMatchId, $matchWinnerModel->winnerMatchId, $matchWinnerModel->ordinal);
            // 3.table matchresult -> delete row next match 
            TournamentMatchresult::model()->deleteAllByAttributes(array('matchId' => $matchModel->winnerMatchId));
        }

        Yii::app()->user->setFlash('success', "ยกเลิกผลการแข่งขันเรียบร้อย");
        $this->redirect(Yii::app()->createUrl('general/tournament/match/view', array('id' => $matchId)));
    }

    public function actionBothlosebye() {
        $matchId = Yii::app()->request->getParam('matchId');
        $result = TournamentMatch::model()->bothLoseBye($matchId);

        // this match
        $matchResultModel = new TournamentMatchresult;
        $matchResultModel->result = 0;
        $matchResultModel->matchId = $matchId;
        $matchResultModel->game = 1;
        $matchResultModel->screenshot = '';
        $matchResultModel->save();

        // next match auto free won
        $matchResultModel = new TournamentMatchresult;
        $matchResultModel->result = $result[0];
        $matchResultModel->matchId = $result[1];
        $matchResultModel->game = 1;
        $matchResultModel->screenshot = '';
        $matchResultModel->save();

        Yii::app()->user->setFlash('success', "ปรับแพ้บายทั้งสองทีมเรียบร้อย");
        $this->redirect(Yii::app()->createUrl('general/tournament/match/view', array('id' => $matchId)));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = TournamentMatch::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'match-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
