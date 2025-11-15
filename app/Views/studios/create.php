<?php

echo <<<HTML
        <form method='post' action='/studios'>
            <fieldset>
                <label for="name">Stúdió</label>
                <input type="text" name="name" id="name">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/studios"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;