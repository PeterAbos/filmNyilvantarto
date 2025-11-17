<?php

echo <<<HTML
        <form method='post' action='/casting'>
            <fieldset>
                <label for="name">Szereposztás</label>
    HTML;
                
echo "<select name='movie_id' id='movie_id'>";
foreach ($movies->all() as $movie) {
    echo "<option value='{$movie->id}'>{$movie->title}</option>";
}
echo "</select>";

echo "<select name='actor_id' id='actor_id'>";
foreach ($actors->all() as $actor) {
    echo "<option value='{$actor->id}'>{$actor->name}</option>";
}
echo "</select>";

echo <<<HTML
                <input type="text" name="character_name" id="character_name">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/casting"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;