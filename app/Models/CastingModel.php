<?php

namespace App\Models;

class CastingModel extends Model {

    public int|null $movie_id = null;
    public int|null $actor_id = null;
    public string|null $character_name = null;

    function __construct(?int $movie_id = null, ?int $actor_id = null, ?string $character_name = null)
    {
        parent::__construct();
        if ($movie_id) {
            $this->movie_id = $movie_id;
        }
        if ($actor_id) {
            $this->actor_id = $actor_id;
        }
        if($character_name) {
            $this->character_name = $character_name;
        }
    }

    function getMovie() {
        $movies = new MoviesModel();

        $result = $movies->find($this->movie_id);

        return $result;
    }

    function getActor() {
        $actors = new ActorsModel();

        $result = $actors->find($this->actor_id);

        return $result;
    }
}