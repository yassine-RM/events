<?php

function flash($message, $type, $titre)
{

    session()->flash("flash.message", $message);
    session()->flash("flash.type", $type);
    session()->flash("flash.titre", $titre);
}