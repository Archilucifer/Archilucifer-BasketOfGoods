<?php

namespace app\domain\good\interfaces;

use app\domain\good\interfaces\Good;

interface GoodBuilder
{
    /**
     * @param Good $good
     * @param array $params
     */
    public function build(Good $good, array $params): void;
}