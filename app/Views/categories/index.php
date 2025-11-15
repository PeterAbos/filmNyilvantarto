<?php

$tableBody = "";
foreach ($categories as $category) {
    $tableBody .= <<<HTML
            <tr>
                <td>{$category->id}</td>
                <td>{$category->name}</td>
                <td class='flex float-right'>
                    <form method='post' action='/categories/edit'>
                        <input type='hidden' name='id' value='{$category->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                </td>
                <td class='flex float-right'>
                    <form method='post' action='/categories'>
                        <input type='hidden' name='id' value='{$category->id}'>    
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
                    <th>Kategória</th>
                    <th colspan="2">
                        <form method='post' action='/categories/create'>
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
