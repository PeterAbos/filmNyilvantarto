<?php

namespace App\Models;

class CastingModel extends Model {

    public int $movie_id;
    public int $actor_id;
    public string|null $character_name = null;

    function __construct(int $movie_id, int $actor_id, ?string $character_name = null)
    {
        parent::__construct();
        $this->movie_id = $movie_id;
        $this->actor_id = $actor_id;
        if($character_name) {
            $this->character_name = $character_name;
        }
    }
}