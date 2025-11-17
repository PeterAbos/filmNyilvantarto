<?php

$tableBody = "";
foreach ($roles as $role) {
    $movie = $role->getMovie();
    $actor = $role->getActor();
    $tableBody .= <<<HTML
            <tr>
                <td>{$role->id}</td>
                <td>{$movie->title}</td>
                <td>{$actor->name}</td>
                <td>{$role->character_name}</td>
                <td class='flex float-right'>
                    <form method='post' action='/casting/edit'>
                        <input type='hidden' name='id' value='{$role->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                </td>
                <td class='flex float-right'>
                    <form method='post' action='/casting'>
                        <input type='hidden' name='id' value='{$role->id}'>    
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
                    <th>Film</th>
                    <th>Színész</th>
                    <th>Szerep neve</th>
                    <th colspan="2">
                        <form method='post' action='/casting/create'>
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