<?php

echo <<<HTML
        <form method='post' action='/categories'>
            <fieldset>
                <label for="name">Kategória</label>
                <input type="text" name="name" id="name">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/categories"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;