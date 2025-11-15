<?php

$html = <<<HTML
        <form method='post' action='/studios'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$studio->id}">
            <fieldset>
                <label for="studios">Stúdió</label>
                <input type="text" name="name" id="name" value="{$studio->name}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/studios"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;