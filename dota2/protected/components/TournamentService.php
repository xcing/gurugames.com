<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TournamentService {

    const SINGLE_ELIMINATION = 1;
    const DOUBLE_ELIMINATION = 2;
    const TEAM_1_WIN = 1;
    const TEAM_2_WIN = 2;

    public function generateTournamentBracket($tournamentId) {
        $teams = $this->findTeamInTournament($tournamentId);
        $teamAmount = count($teams);
        if ($teamAmount == 0) {
            return;
        }
        $tournament = $this->findTournament($tournamentId);
        if ($tournament->type == self::SINGLE_ELIMINATION) {
            $roundAmount = $this->findRoundAmount($teamAmount);
            $this->createMatchesForTournament($tournament, $roundAmount, $teams, self::SINGLE_ELIMINATION);
            $this->updateTournamentRoundAmount($tournament, $roundAmount);

            $this->generateRoundSchedule($tournament, $roundAmount);
        }
        if ($tournament->type == self::DOUBLE_ELIMINATION) {
            $roundAmount = $this->findRoundAmount($teamAmount);
            $this->createMatchesForTournament($tournament, $roundAmount, $teams, self::DOUBLE_ELIMINATION);
            $this->updateTournamentRoundAmount($tournament, $roundAmount);

            $this->generateRoundSchedule($tournament, $roundAmount);
        }
    }

    public function readTournamentData($tournamentId, $tournament) {
        $teams = $this->findTeamInTournament($tournamentId);
        $teamIdNameMap = $this->createTeamIdNameMap($teams);
        $matches = $this->findMatchesInTournament($tournamentId);

        $tournamentBracket = new TournamentBracket();
        if ($tournament->type == self::SINGLE_ELIMINATION) {
            $versusTeams = $this->getVersusTeamNames($matches, $teamIdNameMap);
            $results = $this->getTournamentResults($matches, $tournament);

            $tournamentBracket->setName($tournament->name);
            $tournamentBracket->setTeams($versusTeams);
            $tournamentBracket->setResults($results);
            $tournamentBracket->setGameAmount($tournament->gameAmount);
            $tournamentBracket->setFinalGameAmount($tournament->finalGameAmount);
            $tournamentBracket->setThirdPlaceFlag($tournament->thirdPlace);
        }
        return $tournamentBracket;
    }

    private function findTeamInTournament($tournamentId) {
        $relateTourTeamModel = TournamentRelatetourteam::model()->findAllByAttributes(array(
            'tournamentId' => $tournamentId,
        ));
        return $relateTourTeamModel;
    }

    public function findTournament($tournamentId) {
        $tournamentModel = Tournament::model()->findByPk($tournamentId);
        return $tournamentModel;
    }

    private function findRoundAmount($teamAmount) {
        return ceil(log($teamAmount, 2));
    }

    private function findFirstRoundMatchesAmount($roundAmount) {
        return pow(2, $roundAmount) / 2;
    }

    private function createMatchesPerRound($tournamentId, $matchAmount, $round, $bracketType = 1) {
        $matches = array();
        for ($i = 1; $i <= $matchAmount; $i++) {
            $match = new TournamentMatch;
            if ($bracketType == 1) {
                $match->round = $round;
            } else if ($bracketType == 2) {
                $match->loserRound = $round;
            }
            $match->tournamentId = $tournamentId;
            $match->ordinal = $i;
            $match->teamSide = mt_rand(1, 2);
            $matches[] = $match;
        }
        return $matches;
    }

    private function createMatchesOtherRound(Tournament $tournament, $firstRoundMatchAmount, $roundAmount) {
        $matches = array();
        $winnerBracket = 1;
        $matchAmount = $firstRoundMatchAmount;
        for ($round = 2; $round <= $roundAmount; $round++) {
            $matchAmount /= 2;
            if ($tournament->thirdPlace == 1 && $matchAmount == 1) {
                // for creating third place match
                $matchAmount++;
            }
            $matchesPerRound = $this->createMatchesPerRound($tournament->tournamentId, $matchAmount, $round, $winnerBracket);
            $matches = array_merge($matches, $matchesPerRound);
        }
        return $matches;
    }

    private function createLoserMatchesOtherRound(Tournament $tournament, $firstRoundMatchAmount, $roundAmount, $tournamentType = 1) {
        $matches = array();
        $loserBracket = 2;
        $matchAmount = $firstRoundMatchAmount;
        for ($loserRound = 1; $loserRound <= $roundAmount; $loserRound++) {
            $matchAmount /= 2;
            $matchesPerRound = $this->createMatchesPerRound($tournament->tournamentId, $matchAmount, $loserRound, $loserBracket);
            $matches = array_merge($matches, $matchesPerRound);
        }
        return $matches;
    }

    private function createFinalRound(Tournament $tournament, $round, $lastMatchWinner, $lastMatchLoser) {
        $match = new TournamentMatch;
        $match->round = $round;
        $match->loserRound = ($round + 1);
        $match->winnerMatchId = $lastMatchWinner->matchId;
        $match->loserMatchId = $lastMatchLoser->matchId;
        $match->tournamentId = $tournament->tournamentId;
        $match->ordinal = 1;
        $match->teamSide = mt_rand(1, 2);
        $match->save();
        return $match;
    }

    private function putTeamIntoFirstRoundMatches($teams, $firstRoundMatches) {
        shuffle($teams);
        $this->putTeam1($teams, $firstRoundMatches);
        $this->putTeam2($teams, $firstRoundMatches);
    }

    private function putTeam1(&$teams, $firstRoundMatches) {
        foreach ($firstRoundMatches as $match) {
            $team = array_pop($teams);
            $match->team1Id = $team->teamId;
        }
    }

    private function putTeam2($teams, $firstRoundMatches) {
        foreach ($firstRoundMatches as $match) {
            if (count($teams) > 0) {
                $team = array_pop($teams);
                $match->team2Id = $team->teamId;
            } else {
                $match->result = self::TEAM_1_WIN;
            }
        }
    }

    private function createMatchesForTournament(Tournament $tournament, $roundAmount, $teams, $tournamentType = 1) {
        $firstRoundMatchAmount = $this->findFirstRoundMatchesAmount($roundAmount);
        $firstRoundMatches = $this->createMatchesPerRound($tournament->tournamentId, $firstRoundMatchAmount, 1);
        $this->putTeamIntoFirstRoundMatches($teams, $firstRoundMatches);
        $allWinnerMatches = $this->createMatchesOtherRound($tournament, $firstRoundMatchAmount, $roundAmount);
        if ($tournamentType == 2) {
            $allLoserMatches = $this->createLoserMatchesOtherRound($tournament, $firstRoundMatchAmount, $roundAmount);
            $finalMatch = $this->createFinalRound($tournament, $roundAmount, array_pop($allWinnerMatches), array_pop($allLoserMatches));
        }
        $allMatches = array_merge($firstRoundMatches, $allWinnerMatches);

        $this->saveMatchesAndUpdateParentId($allMatches, $tournamentType);
    }

    private function saveMatchesAndUpdateParentId($allMatches, $tournamentType = 1) {
        $matchModel = new TournamentMatch;
        $matchModel->saveAll($allMatches);

        $this->setMatchesParentId($allMatches);
        if ($tournamentType == 2) {
            $this->setLoserMatchesParentId($allMatches);
        }
        $this->setTeamWinByeToNextRound($allMatches);
        $matchModel->saveAll($allMatches);
    }

    private function setMatchesParentId($allMatches) {
        $lastMatch = array_pop($allMatches);
        $parentId = $lastMatch->matchId;
        $nextRoundParentIds = array();
        $parentIdUsedCount = 0;
        $childAmountPerParent = 2;

        for ($i = count($allMatches) - 1; $i >= 0; $i--) {
            $parentIdUsedCount++;
            $nextRoundParentIds[] = $allMatches[$i]->matchId;
            if ($parentIdUsedCount > $childAmountPerParent) {
                $parentId = array_shift($nextRoundParentIds);
                $parentIdUsedCount = 1;
            }
            $allMatches[$i]->winnerMatchId = $parentId;
        }
    }

    private function setLoserMatchesParentId($allMatches) {
        
    }

    private function setTeamWinByeToNextRound($allMatches) {
        $winByeMatches = array();
        foreach ($allMatches as $match) {
            if ($match->round == 1 && $match->team2Id == null) {
                $winByeMatches[] = $match;
            } else if ($match->round == 2 && count($winByeMatches) > 0) {
                for ($i = 0; $i < 2; $i++) {
                    if (count($winByeMatches) > 0 && $match->matchId == $winByeMatches[0]->winnerMatchId) {
                        $winByeMatch = array_shift($winByeMatches);
                        if ($winByeMatch->ordinal % 2 == 0) {
                            $match->team2Id = $winByeMatch->team1Id;
                        } else {
                            $match->team1Id = $winByeMatch->team1Id;
                        }
                    }
                }
            } else if ($match->round > 2) {
                break;
            }
        }
    }

    private function updateTournamentRoundAmount($tournament, $roundAmount) {
        $tournament->roundAmount = $roundAmount;
        $tournament->save();
    }

    private function findMatchesInTournament($tournamentId) {
        $matchModel = new TournamentMatch;
        return $matchModel->findMatchesInTournament($tournamentId);
    }

    private function createTeamIdNameMap($teams) {
        $idNameMap = array();
        foreach ($teams as $team) {
            $idNameMap[$team->teamId] = $team->team->shortName;
        }
        return $idNameMap;
    }

    private function getVersusTeamNames($matches, $teamIdNameMap) {
        $versusTeams = array();
        foreach ($matches as $match) {
            if ($match->round == 1) {
                $versusTeam = array();
                $versusTeam[] = $teamIdNameMap[$match->team1Id];
                if ($match->team2Id) {
                    $versusTeam[] = $teamIdNameMap[$match->team2Id];
                } else {
                    $versusTeam[] = '-';
                }
                $versusTeams[] = $versusTeam;
            } else {
                break;
            }
        }
        return $versusTeams;
    }

    private function getTournamentResults($matches, $tournament) {
        $results = array();
        $roundResults = array();
        $previousRound = 0;
        foreach ($matches as $match) {
            if ($previousRound != $match->round) {
                $roundResults = array();
                $previousRound = $match->round;
            } else {
                $roundResults = array_pop($results);
            }
            $matchResult = $this->getMatchScore($match, $tournament);
            $roundResults[] = $matchResult;
            $results[] = $roundResults;
        }
        return $results;
    }

    private function getMatchScore(TournamentMatch $match, $tournament) {
        $matchScore = null;
        $matchResults = $match->getMatchResults();

        if ($match->round == 1 && !$match->team2Id) {
            $winScore = ceil($tournament->gameAmount / 2);
            $matchScore = array($winScore, 0);
        } else if (!empty($matchResults)) {
            $team1Score = 0;
            $team2Score = 0;
            foreach ($matchResults as $matchResult) {
                if ($matchResult->result == self::TEAM_1_WIN) {
                    $team1Score++;
                } else if ($matchResult->result == self::TEAM_2_WIN) {
                    $team2Score++;
                }
            }
            $matchScore = array($team1Score, $team2Score);
        } else {
            $matchScore = array(0, 0);
        }

        if ($match->team1Id && $match->team2Id) {
            $matchScore[] = Yii::app()->createUrl('tournament/match', array('matchId' => $match->matchId));
            if ($match->round == $tournament->roundAmount && $match->ordinal == 1) {
                $matchScore[] = 'final';
            }
        }
        return $matchScore;
    }

    public function getRoundSchedules($tournamentId) {
        $roundScheduleModel = new TournamentRoundschedule;
        return $roundScheduleModel->findRoundsInTour($tournamentId);
    }

    private function generateRoundSchedule(Tournament $tournament, $roundAmount) {
        $rounds = array();
        $raceDate = date('Y-m-d H:i:s', strtotime($tournament->startDate . ' 20:00:00'));
        for ($roundNo = 1; $roundNo <= $roundAmount; $roundNo++) {
            $roundScheduleModel = new TournamentRoundschedule;
            $roundScheduleModel->tournamentId = $tournament->tournamentId;
            $roundScheduleModel->round = $roundNo;
            $roundScheduleModel->date = $raceDate;
            $raceDate = date('Y-m-d H:i:s', strtotime($raceDate . '+1 days'));
            $roundScheduleModel->save();
        }
    }

    public function findRoundSchedule($tournamentId, $round) {
        $roundScheduleModel = new TournamentRoundschedule;
        return $roundScheduleModel->findRoundSchedule($tournamentId, $round);
    }

}