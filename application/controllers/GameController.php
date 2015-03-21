<?php
namespace application\controllers;
use application\components\BaseController;
use application\models\Game;
use application\models\Player;

class GameController extends BaseController
{
    public function create()
    {
        $data = $this->getRequest()->post();

        $creator = new Player();
        $creator->uniq = uniqid();
        $creator->save();

        $game = new Game();
        $game->uniq = uniqid();
        // создатель игры автоматически становится первым игроком
        $game->p1_id = $creator->id;
        $game->state = 'new';

        $this->setCookie('player', $creator->uniq);
        $this->sendJson($game);
    }
}