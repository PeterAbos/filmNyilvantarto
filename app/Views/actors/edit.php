<?php

$html = <<<HTML
        <form method='post' action='/actors'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$actor->id}">
            <fieldset>
                <label for="actors">Színész</label>
                <input type="text" name="name" id="name" value="{$actor->name}">
                <input type="date" name="birth_date" id="birth_date" value="{$actor->birth_date}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/actors"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;