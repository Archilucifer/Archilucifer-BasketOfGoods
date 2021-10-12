<?php

namespace app\domain\good\interfaces;

use app\common\good\Good;

interface GoodFactory
{
    public function create(): Good;
}