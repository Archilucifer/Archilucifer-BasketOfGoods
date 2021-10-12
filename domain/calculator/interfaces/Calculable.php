<?php

namespace app\domain\calculator\interfaces;

interface Calculable
{
    public const BC_SCALE = 2;

    public function calculate(): void;
}