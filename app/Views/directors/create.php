<?php

echo <<<HTML
        <form method='post' action='/directors'>
            <fieldset>
                <label for="name">Rendező</label>
                <input type="text" name="name" id="name">
                <input type="date" name="birth_date" id="birth_date">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/directors"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;