<?php

namespace App\Service;


class DiceLauncherImpl implements DiceLauncher
{
    public function launch(int $diceCount): array
    {
        if ($diceCount == 0) return [];
        return array_map(fn(): int => rand(1, 6), range(0, $diceCount - 1));
    }
}
