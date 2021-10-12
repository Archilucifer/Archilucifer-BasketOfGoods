<?php

namespace app\domain\calculator\interfaces;

interface GoodCalculator extends Calculable
{
    public function calculate(): void;
}