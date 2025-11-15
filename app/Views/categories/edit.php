<?php

$html = <<<HTML
        <form method='post' action='/categories'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$category->id}">
            <fieldset>
                <label for="categories">Kategória</label>
                <input type="text" name="name" id="name" value="{$category->name}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/categories"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;