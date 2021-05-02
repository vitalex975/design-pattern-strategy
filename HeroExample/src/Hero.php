<?php namespace HeroApp;


use HeroApp\Strategies\Fighting\FightingStrategyInterface;
use HeroApp\Strategies\Running\RunningStrategyInterface;
use HeroApp\Strategies\Swimming\SwimmingStrategyInterface;
use HeroApp\Strategies\Walking\WalkingStrategyInterface;

class Hero implements WalkingStrategyInterface, RunningStrategyInterface, SwimmingStrategyInterface, FightingStrategyInterface
{

    private WalkingStrategyInterface  $walkBehavior;
    private RunningStrategyInterface  $runBehavior;
    private SwimmingStrategyInterface $swimBehavior;
    private FightingStrategyInterface $fightBehavior;


    public function __construct(
        WalkingStrategyInterface  $walkingStrategy,
        RunningStrategyInterface  $runningStrategy,
        SwimmingStrategyInterface $swimmingStrategy,
        FightingStrategyInterface $fightingStrategy
    )
    {
        $this->walkBehavior  = $walkingStrategy;
        $this->runBehavior   = $runningStrategy;
        $this->swimBehavior  = $swimmingStrategy;
        $this->fightBehavior = $fightingStrategy;
    }


    public function walk(): void
    {
        $this->walkBehavior->walk();
    }

    public function run(): void
    {
        $this->runBehavior->run();
    }

    public function swim(): void
    {
        $this->swimBehavior->swim();
    }

    public function fight(): void
    {
        $this->fightBehavior->fight();
    }

}
