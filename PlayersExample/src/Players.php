<?php namespace PlayersApp;


use PlayersApp\Strategies\Exporting\ExportingStrategyInterface;
use PlayersApp\Strategies\Sorting\SortingStrategyInterface;
use PlayersApp\Strategies\Storing\StoringStrategyInterface;

class Players
{

    private ExportingStrategyInterface $exportBehavior;
    private SortingStrategyInterface   $sortBehavior;
    private StoringStrategyInterface   $storeBehavior;


    public function __construct(
        ExportingStrategyInterface  $exportingStrategy,
        SortingStrategyInterface    $sortingStrategy,
        StoringStrategyInterface    $storingStrategy
    )
    {
        $this->exportBehavior   = $exportingStrategy;
        $this->sortBehavior     = $sortingStrategy;
        $this->storeBehavior    = $storingStrategy;
    }


    public function export(): Players
    {
        $this->exportBehavior->export();
        return $this;
    }


    public function sort(): Players
    {
        $this->sortBehavior->sort();
        return $this;
    }


    public function store(): Players
    {
        $this->storeBehavior->store();
        return $this;
    }

}
