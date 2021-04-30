<?php

declare(strict_types=1);

namespace Mutation;

final class Salary
{
    private const LONG_PERIOD = 25;

    private const SHORT_PERIOD = 5;

    private const MIDDLE_PERIOD = 15;

    /**
     * @var Fee
     */
    private Fee $fee;

    /**
     * @var float
     */
    private float $baseSalary;

    /**
     * @var int
     */
    private int $periodWorked;

    /**
     * @var float
     */
    private float $salaryWithIncrease;

    public function __construct(Fee $fee, float $baseSalary, int $periodWorked)
    {
        $this->fee = $fee;
        $this->baseSalary = $baseSalary;
        $this->periodWorked = $periodWorked;
        $this->salaryWithIncrease = $this->baseSalary;
    }

    public function applyIncreaseByPeriod(): void
    {
        if ($this->periodWorked >= self::LONG_PERIOD) {
            $this->salaryWithIncrease += $this->calculateIncreaseAmount($this->baseSalary, $this->fee::MAXIMUM_INCREASE);
            return;
        }

        if ($this->periodWorked >= self::MIDDLE_PERIOD) {
            $this->salaryWithIncrease += $this->calculateIncreaseAmount($this->baseSalary, $this->fee::MEDIUM_INCREASE);
            return;
        }

        if ($this->periodWorked >= self::SHORT_PERIOD) {
            $this->salaryWithIncrease += $this->calculateIncreaseAmount($this->baseSalary, $this->fee::MINIMUM_INCREASE);
        }
    }

    /**
     * @param float $baseSalary
     * @param float $fee
     * @return float
     */
    private function calculateIncreaseAmount(float $baseSalary, float $fee): float
    {
        return round(($baseSalary / 100) * $fee, 2);
    }

    /**
     * @return float
     */
    public function getSalaryWithIncrease(): float
    {
        return $this->salaryWithIncrease;
    }
}