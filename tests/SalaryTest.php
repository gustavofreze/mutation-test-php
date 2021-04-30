<?php

declare(strict_types=1);

namespace Test;

use Mutation\Fee;
use Mutation\Salary;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    private const BASE_SALARY = 5000;

    /**
     * @Dado um salário base (self::BASE_SALARY)
     * @Quando um período trabalhado for maior ou igual 25
     * @Então aplique a taxa máxima de aumento salarial (Fee::MAXIMUM_INCREASE)
     */
    public function testOfSalaryIncreaseWhenPeriodWorkedIsLong(): void
    {
        $salary = new Salary(new Fee(), self::BASE_SALARY, 25);
        $salary->applyIncreaseByPeriod();
        self::assertEquals(5600, $salary->getSalaryWithIncrease());
    }

    /**
     * @Dado um salário base (self::BASE_SALARY)
     * @Quando um período trabalhado for maior ou igual 15
     * @Então aplique a taxa média de aumento salarial (Fee::MEDIUM_INCREASE)
     */
    public function testOfSalaryIncreaseWhenPeriodWorkedIsMedium(): void
    {
        $salary = new Salary(new Fee(), self::BASE_SALARY, 15);
        $salary->applyIncreaseByPeriod();
        self::assertEquals(5300, $salary->getSalaryWithIncrease());
    }

    /**
     * @Dado um salário base (self::BASE_SALARY)
     * @Quando um período trabalhado for maior ou igual 5
     * @Então aplique a taxa mínima de aumento salarial (Fee::MINIMUM_INCREASE)
     */
    public function testOfSalaryIncreaseWhenPeriodWorkedIsShort(): void
    {
        $salary = new Salary(new Fee(), self::BASE_SALARY, 5);
        $salary->applyIncreaseByPeriod();
        self::assertEquals(5150, $salary->getSalaryWithIncrease());
    }

    /**
     * @Dado um salário base (self::BASE_SALARY)
     * @Quando um período trabalhado não estiver dentro das condições elegíveis para um aumento
     * @Então não aplique nenhuma taxa
     */
    public function testOfSalaryIncreaseWhenTheIncreaseIsNotApplicable(): void
    {
        $salary = new Salary(new Fee(), self::BASE_SALARY, 3);
        $salary->applyIncreaseByPeriod();
        self::assertEquals(self::BASE_SALARY, $salary->getSalaryWithIncrease());
    }
}