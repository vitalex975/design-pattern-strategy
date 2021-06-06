[&laquo; back to index](../../README.md)
# Strategy Pattern
## Some code

So let's revisit the initial example, but this time with an emphasis on decoupling clients and algorithms.
This approach will make the algorithms themselves interchangeable, without ever having to modify the clients.

First, let's define the interfaces, i.e., the "contracts" that the classes in the code must adhere to.
The adherence of a class to one or more interfaces, in this sense, is very convenient, since it guarantees that the classes of a certain family are indeed interchangeable.

We therefore define an interface for each family; we will call these interfaces "strategies":
- `WalingStrategyInterface` - which will impose the `walk()` method. 
- `RunningStrategyInterface` - which will impose the `run()` method.
- `SwimmingStrategyInterface` - which will impose the `swim()` method.
- `FightingStrategyInterface` - which will impose the `fight()` method.

> **NOTE:**
>
> There are several ways to achieve the desired result, with different approaches and architectures. The one proposed below is only one possible option.
An alternative, for example, could be to define a single interface, which "Hero" implements, and which requires all methods at once. Personally, however, I believe that such a solution would go against the "S.O.L.I.D." design principles (Robert C. Martin), and in particular against the "Interface segregation principle" (the "I" in S.O.L.I.D.), resulting in a much less flexible solution.
>
> These choices ultimately depend on many factors, not the least the application context in which you are operating.

**[UML FOR Hero AND ALL ITS INTERFACES]**

![UML of Hero](../assets/StrategyPattern_3.jpg)

Of course, you will need concrete classes that implement the interfaces (which, remember, represent families), e.g.:
- `WalingStrategyInterface` could be implemented by the concrete classes `BipededWalkingStrategy` and `QuadrupedWalkingStrategy`.
- `RunningStrategyInterface` could be implemented by the concrete classes `BipedRunningStrategy` and `QuadrupedRunningStrategy`.
- `SwimmingStrategyInterface` could be implemented by the concrete classes `NormalSwimmingStrategy`, `FloatingSwimmingStrategy` and `NoSwimmingStrategy`.
- `FightingStrategyInterface` could be implemented by the concrete classes `SwordFightingStrategy`, `BowFightingStrategy` and `MagicFightingStrategy`.

In this perspective, the `Hero` superclass will no longer possess any default implementation of the methods, but will only "delegate" the execution of each of them to the designated strategy.

Note that the Hero class **"has"** all the interfaces, and at the same time **"is"** all the interfaces involved. This small expedient, completely arbitrary and not indispensable (for the purposes of the pattern, the first condition would be sufficient), will allow us to use the same name for the methods of the single strategies and for the methods of the Hero class itself.

The next step is then to "compose" the class instance that represents our character by including the most appropriate strategies.
The choice of strategies defines, in fact, the character type, which will not need its own class. "Knight" will therefore be a Hero type object, with a certain set of strategies attached.

Ad esempio, creare un mago significa istanziare una classe Hero con le strategie BipedWalkingStrategy, BipedRunningStrategy, FloatingSwimmingStrategy e MagicFightingStrategy.
Creating a knight, means to instantiate the same Hero class with the QuadrupedWalkingStrategy, QuadrupedRunningStrategy, NoSwimmingStrategy, SwordFightingStrategy strategies.

**[A summary of our heroes]**

| Walking          	| Running          	| Swimming         	| Fighting      	|                                                          	|
|------------------	|------------------	|------------------	|---------------	|----------------------------------------------------------	|
| BipedWalking     	| BipedRunning     	| FloatingSwimming 	| MagicFighting 	| It'a a wizard!                                            |
| QuadrupedWalking 	| QuadrupedRunning 	| NoSwimming       	| SwordFighting 	| It'a a knight!                                          	|
| BipedWalking     	| BipedRunning     	| NormalSwimming   	| BowFighting   	| It'a a archer!                                            |
| QuadrupedWalking 	| QuadrupedRunning 	| NoSwimming       	| BowFighing    	| It'a a centaur!                                           |
| BipedWalking     	| QuadrupedRunning 	| NoSwimming       	| SwordFighting 	| A knight that gets off his horse, when he stops? :-) 	    |

In practice, you don't even need to have a class representing the knight, the archer, and so on, as these are all "declinations" of the same properly configured "Hero" class.

It becomes imperative, however, that the configuration of the hero occurs by passing strategies "from the outside", and that the classes that define the different behaviors are therefore never instantiated within Hero.
This mechanism is known as "Dependency Injection", which in our example occurs via the constructor.


```php
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

    // ...
}
```
As you can clearly see:
- the different behaviors are not defined in the class, they're injected at the moment of the creation of the concrete class "Hero":
- the constructor declares the strategies to be injected as interfaces, NEVER concrete classes (or the whole mechanism would fail)

```php
// main code

// Creating a Wizard by strategies...
$wizard = new Hero(
    new Strategies\Walking\BipedWalkingStrategy(),
    new Strategies\Running\BipedRunningStrategy(),
    new Strategies\Swimming\FloatingSwimmingStrategy(),
    new Strategies\Fighting\MagicFightingStrategy()
);

$wizard->walk();
$wizard->run();
$wizard->swim();
$wizard->fight();


// Creating an Archer by strategies...
$archer = new Hero(
    new Strategies\Walking\BipedWalkingStrategy(),
    new Strategies\Running\BipedRunningStrategy(),
    new Strategies\Swimming\NormalSwimmingStrategy(),
    new Strategies\Fighting\BowFightingStrategy()
);

$archer->walk();
$archer->run();
$archer->swim();
$archer->fight();
```

While the implementation of the single methods imposed by the interfaces, inside the class Hero, becomes extremely simple, providing only the code needed in order "to delegate" the behavior to the designated strategy.
```php
class Hero implements WalkingStrategyInterface, RunningStrategyInterface, SwimmingStrategyInterface, FightingStrategyInterface
{
    // ...
    
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
```

This technique, especially if associated with the good practice of the "Factory Pattern" (which we will analyze later, in another article), allows us to compose our hero in the desired way, even at runtime!

### The importance of semantics
I would like to spend a few more words on the importance of the correct use of the nomenclature of classes, variables, etc. in programming.

In the example code, the interfaces that represent the families of behavior in the individual domains are referred to as "strategies," and not just in the spirit of the strategy pattern.

Their concrete implementation, in fact, is assigned to instance variables named "behavior". It follows that, reading a line of code like this (taken from the constructor of the `Hero` class):
```php
$this->swimBehavior = $swimmingStrategy;
```
this concept forms in my mind: "The behavior of the hero in case he is swimming is to apply the swimming strategy of the hero in subject".

Writing code in such a way that, upon re-reading it, it tells me a story, is a habit I've been cultivating for several years now.
At first it seemed unnecessary and contrived to use long and complex names for variables and classes, when `$i` and `$obj` is more than enough for the interpreter, but forcing myself to do it for some time I realized that it is anything but a pure exercise in style.

Naming things correctly forces you to think about the boundaries of those same things, to categorize, differentiate, organize, and give the right perspective to the piece of code you're writing.
For example, when a class or method is difficult to describe (and therefore, to name) in a few words, it's usually a clear sign that you're trying to pack too many things into the same piece of code, and that you're probably violating the principle of "single responsibility".

Moreover, having consistent names, organized in a consistent way, helps a lot in understanding the code, which is a nice advantage whenever someone joins the team to contribute, and is itself a good way to "validate" the quality of the reasoning behind the written code.

In my experience, however, when several classes - even if they belong to the same family - have semantically different names, putting them together is a task that consumes most of the energy trying to reconstruct the logical flow of the part of code I'm analyzing.

Don't underestimate the importance of semantics!

[next - Execute the example code &raquo;](05_executeExample.md)
