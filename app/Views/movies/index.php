<?php

$tableBody = "";
foreach ($movies as $movie) {
    $studio = $movie->getStudio();
    $director = $movie->getDirector();
    $category = $movie->getCategory();
    $tableBody .= <<<HTML
            <tr>
                <td>{$movie->id}</td>
                <td>{$movie->title}</td>
                <td>{$movie->duration}</td>
                <td>{$studio->name}</td>
                <td>{$director->name}</td>
                <td>{$category->name}</td>
                <td>{$movie->release_year}</td>
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
                    <th colspan="2">
                        <form method='post' action='/movies/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'></i>&nbsp;Új</button>
                        </form>
                    </th>
                </tr>
            </thead>
             <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;

echo sprintf($html, $tableBody);
