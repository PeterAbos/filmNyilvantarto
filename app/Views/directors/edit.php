<?php

$html = <<<HTML
        <form method='post' action='/directors'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$director->id}">
            <fieldset>
                <label for="directors">Rendező</label>
                <input type="text" name="name" id="name" value="{$director->name}">
                <input type="date" name="birth_date" id="birth_date" value="{$director->birth_date}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/directors"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;