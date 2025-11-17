<?php 

echo <<<HTML
        <form method='post' action='/movies'>
            <fieldset>
                <label for="movie">Film</label>
                <input type="text" name="title" id="title">
                <input type="number" name="duration" id="duration">
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
                <input type='number' name='release_year' id='release_year'>
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/reservations"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;