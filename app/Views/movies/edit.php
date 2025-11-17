<?php 

echo <<<HTML
        <form method='post' action='/movies'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name='id' value="{$movie->id}">
            <fieldset>
                <label for="movie">Film</label>
                <input type="text" name="title" id="title" value="{$movie->title}">
                <input type="number" name="duration" id="duration" value="{$movie->duration}">
        HTML;

echo "<select name='studio_id' id='studio_id'>";
foreach ($studios->all() as $studio) {
    echo "<option value='{$studio->id}'>{$studio->name}</option>";
}
echo "</select>";

echo "<select name='director_id' id='director_id'>";
foreach ($directors->all() as $director) {
    echo "<option value='{$director->id}'>{$director->name}</option>";
}
echo "</select>";

echo "<select name='category_id' id='category_id'>";
foreach ($categories->all() as $category) {
    echo "<option value='{$category->id}'>{$category->name}</option>";
}
echo "</select>";

echo <<<HTML
                <input type='number' name='release_year' id='release_year' value="{$movie->release_year}">
                <input type='hidden' name='rating_avg' id='rating_avg' value="{$movie->rating_avg}">
                <input type='hidden' name='rate' id='rate' value="0">
                <input type='hidden' name='rating_count' id='rating_count' value="{$movie->rating_count}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/movies"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;