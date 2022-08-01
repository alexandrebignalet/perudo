<?php

namespace App\Service;

interface DiceLauncher
{
    public function launch(int $diceCount): array;
}
