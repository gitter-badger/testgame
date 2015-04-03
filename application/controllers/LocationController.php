<?php
namespace application\controllers;
use application\components\BaseController;
use application\models\Game;
use application\models\Location;
use application\models\Player;

class LocationController extends BaseController
{

    public function createAction()
    {
        $input = \json_decode($this->getRequest()->getBody());

        $game   = Game::where('uniq', '=', $input->game_uniq)->firstOrFail();
        $player = Player::where('uniq', '=', $input->player_uniq)->firstOrFail();

        $locations = [];
        foreach((array)$input->ships as $ship) {
            $location = new Location([
                'game_id'     => $game->id,
                'player_id'   => $player->id,
                'ship_id'     => $ship->ship_id,
                'orientation' => $ship->orientation,
                'state'       => 'full',
                'x'           => $ship->x,
                'y'           => $ship->y
            ]);

            $locations[] = $location;
        }

        /** @var Location $location */
        foreach($locations as $location) {
            if (!$location->validate()) {
                throw new \RuntimeException;
            }
        }
    }
}