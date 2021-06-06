[&laquo; back to index](../../README.md)
# Strategy Pattern
## Enter "Strategy Pattern"

The Strategy Pattern approach involves decoupling between the algorithms and the clients that use them. Let's see the possible characters as "clients", and let's imagine to extract from them the algorithms, each of which represents a strategy, a specific behavior.

Thus, there will be more families of algorithms, for example: to walk, to run, to fight, and each of these families will contain more algorithms, uniform among them, to describe different ways of walking, running, fighting, etc...

It is important to understand that these algorithms must be "decoupled" from the client, so that we don't have to think in terms of "WalkAsAKnight", "WalkAsAMagician", or "FightAsAKnight" and "FightAsAMagician", but in terms that are representative of the behavior itself.

In this way, these algorithms can be combined to form the right set of behaviors for a knight, which will be different from the one of an archer or a wizard.

It seems obvious how this approach allows us maximum flexibility, without ever forcing us to duplicate even one line of code!

[next - Some code &raquo;](04_exampleCode.md)
