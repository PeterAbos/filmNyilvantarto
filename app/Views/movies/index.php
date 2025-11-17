<?php

$tableBody = "";
foreach ($movies as $movie) {
    $studio = $movie->getStudio();
    $director = $movie->getDirector();
    $category = $movie->getCategory();
    $newRatingCount = $movie->rating_count + 1;
    $tableBody .= <<<HTML
            <tr>
                <td>{$movie->id}</td>
                <td>{$movie->title}</td>
                <td>{$movie->duration}</td>
                <td>{$studio->name}</td>
                <td>{$director->name}</td>
                <td>{$category->name}</td>
                <td>{$movie->release_year}</td>
                <td>{$movie->rating_avg}</td>
                <td class='flex float-right'>
                    <form method='post' action='/movies/edit'>
                        <input type='hidden' name='id' value='{$movie->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                </td>
                <td class='flex float-right'>
                    <form method='post' action='/movies'>
                        <input type='hidden' name='id' value='{$movie->id}'>    
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'><i class='fa fa-trash trash'></i></button>
                    </form>
                </td>
                <td>
                <form method='post' action='/movies'>
                    <input type='hidden' name='_method' value='PATCH'>
                    <input type='hidden' name='id' value='{$movie->id}'>
                        <fieldset>
                            <input type='hidden' name='title' value='{$movie->title}'>
                            <input type='hidden' name='duration' value='{$movie->duration}'>
                            <input type='hidden' name='studio_id' value='{$movie->studio_id}'>
                            <input type='hidden' name='director_id' value='{$movie->director_id}'>
                            <input type='hidden' name='category_id' value='{$movie->category_id}'>
                            <input type='hidden' name='release_year' value='{$movie->release_year}'>
                            <input type='hidden' name='rating_avg' value='{$movie->rating_avg}'>
                            <input type='number' min=1 max=5 step=1 name='rate'>
                            <input type='hidden' name='rating_count' value='{$newRatingCount}'>
                        </fieldset>
                    </td>
                    <td>
                        <button type="submit" name="btn-update"><i class="fa fa-save">                    
                            </i>&nbsp;Mentés
                        </button>
                    </form>
                </td>
            </tr>
            HTML;
}

$html = <<<HTML
        <table id='admin-rooms-table' class='admin-rooms-table tabla'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cím</th>
                    <th>Hossz</th>
                    <th>Stúdió</th>
                    <th>Rendező</th>
                    <th>Kategória</th>
                    <th>Év</th>
                    <th>Értékelés</th>
                    <th colspan="2">
                        <form method='post' action='/movies/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'></i>&nbsp;Új</button>
                        </form>
                    </th>
                    <th colspan="2">Új értékelés</th>
                </tr>
            </thead>
             <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;

echo sprintf($html, $tableBody);
