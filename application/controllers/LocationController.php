<?php
namespace application\controllers;
use application\components\BaseController;
use application\models\Game;
use application\models\Location;
use application\models\Player;

class LocationController extends BaseController
{
    public function create()
    {
        $input = \json_decode($this->getRequest()->getBody());

        $game   = Game::where('uniq', '=', $input->game_uniq)->firstOrFail();
        $player = Player::where('uniq', '=', $input->player_uniq)->firstOrFail();

        $locations = [];
        foreach($input->ships as $ship) {
            $location = new Location();
            $location->game_id = $game->id;
            $location->player_id = $player->id;
            $location->ship_id = $ship->ship_id;
            $location->orientation = $ship->orientation;
            $location->x = $ship->x;
            $location->y = $ship->y;
            $locations[] = $location;
        }

        foreach($locations as $location) {
            if (!$location->validate()) {
                throw new \RuntimeException;
            }
        }
    }
}