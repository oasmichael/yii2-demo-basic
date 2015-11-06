<?php
function createPassword($pwLength = 8) {

    $randPwd = '';
    for ($i = 0; $i < $pwLength; $i++)
    {
        $randPwd .= chr(mt_rand(33, 126));
    }

    if (checkPassword($randPwd, $pwLength))
    {
        echo "<b style='color:blue'>OASGAMES PASSWORD GENERATOR 8</b><br />
              <b style='color:red'>" . htmlspecialchars($randPwd, ENT_QUOTES) . "</b>";
    }
    else
        createPassword($pwLength);
}

function checkPassword($randPwd, $pwLength) {

    $mark   = 0;
    $number = true;
    $az     = true;
    $AZ     = true;
    $symbol = true;
    for ($i = 0; $i < $pwLength; $i++)
    {
        $randTemp = $randPwd[$i];
        //0-9
        if (ord($randTemp) >= 48 && ord($randTemp) <= 57 && $number)
        {
            $number = false;
            $mark++;
        }
        //a-z
        elseif (ord($randTemp) >= 97 && ord($randTemp) <= 122 && $az)
        {
            $az = false;
            $mark++;
        }
        //A-Z
        elseif (ord($randTemp) >= 65 && ord($randTemp) <= 90 && $AZ)
        {
            $AZ = false;
            $mark++;
        }
        //symbol
        elseif (ord($randTemp) >= 33 && ord($randTemp) <= 126 && !(ord($randTemp) >= 48 && ord($randTemp) <= 57) && !(ord($randTemp) >= 97 && ord($randTemp) <= 122) && !(ord($randTemp) >= 65 && ord($randTemp) <= 90) && $symbol)
        {
            $symbol = false;
            $mark++;
        }

        if ($mark == 4)
        {
            return true;
        }
    }

    return false;
}

createPassword(8);