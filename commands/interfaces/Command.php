<?php

namespace app\commands\interfaces;

interface Command
{
    /**
     * Execute the commands method
     * @param $context
     */
    public function execute($context): void;
}