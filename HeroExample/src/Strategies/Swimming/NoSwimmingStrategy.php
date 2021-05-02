<?php namespace HeroApp\Strategies\Swimming;


class NoSwimmingStrategy implements SwimmingStrategyInterface
{
    public function swim(): void
    {
        // TODO: Implement swim() method.
        echo "\nNot swimming, I just can't!";
    }
}
