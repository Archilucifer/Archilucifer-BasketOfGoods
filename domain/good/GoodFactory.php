<?php

namespace app\domain\good;

use app\domain\good\interfaces\GoodFactory as GoodFactoryInterface;
use app\common\good\Good;

class GoodFactory implements GoodFactoryInterface
{
    public function create(): Good
    {
        return new Good();
    }
}