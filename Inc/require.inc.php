<?php

function __autoload($class)
{
    if ($class[0] == 'M')
    {
        require_once('Model/'.$class.'.mod.php');
    }

    // Inclusion Vue (affichages)
    elseif($class[0] == 'V')
    {
        require_once('View/'.$class.'.view.php');
    }

    return;
} // __autoload($class)