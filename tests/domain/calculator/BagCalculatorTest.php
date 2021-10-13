<?php

namespace domain\calculator;

use app\domain\bag\interfaces\Bag;
use app\domain\calculator\calculators\BagCalculator;
use app\domain\calculator\interfaces\GoodCalculator;
use app\domain\calculator\interfaces\GoodCalculatorBuilder;
use app\domain\calculator\interfaces\GoodCalculatorFactory;
use app\domain\good\interfaces\Good;
use PHPUnit\Framework\TestCase;

class BagCalculatorTest extends TestCase
{

    public function testCalculate(): void
    {
        $expectedTotalAmount = '2000.90';

        $good1 = $this->createMock(Good::class);
        $good1->expects(self::once())->method('getId')->willReturn(1);
        $good2 = $this->createMock(Good::class);
        $good2->expects(self::once())->method('getId')->willReturn(2);

        $goodsCount = ['1' => ['count' => 1], '2' => ['count' => 1]];

        $bag = $this->createMock(Bag::class);
        $bag->expects(self::once())->method('getGoods')->willReturn([$good1, $good2]);
        $bag->expects(self::once())->method('getGoodsCount')->willReturn($goodsCount);

        $goodToCalculate = $this->createMock(GoodCalculator::class);
        $goodToCalculate->price = '1000.45';

        $goodCalculatorFactory = $this->createMock(GoodCalculatorFactory::class);
        $goodCalculatorFactory->expects(self::exactly(2))->method('create')->withConsecutive([$good1], [$good2])->willReturn($goodToCalculate, $goodToCalculate);

        $goodCalculatorBuilder = $this->createMock(GoodCalculatorBuilder::class);
        $goodCalculatorBuilder->expects(self::exactly(2))->method('build')->withConsecutive(
            [$good1, $goodToCalculate, 1],
            [$good2, $goodToCalculate, 1]
        );

        $bagCalculator = (new BagCalculator($goodCalculatorBuilder, $goodCalculatorFactory));
        $bagCalculator->calculate($bag);

        self::assertEquals($expectedTotalAmount, $bagCalculator->totalAmount);
    }
}
