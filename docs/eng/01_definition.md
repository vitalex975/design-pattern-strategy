[&laquo; back to index](../../README.md)
# Strategy Pattern
## Definition

> "Strategy Pattern defines a family of algorithms, encapsulates each one and make them interchangeable.
Strategy let the algorithms vary independently by the client which is using them."

## Insights

The Strategy Pattern is probably the simplest of the patterns.

It essentially deals with the principle of "composition over inheritance", according to which software classes should satisfy the need for polymorphism and the need for code reuse (avoiding duplication) through composition rather than through the principle of inheritance.

As we will see shortly, in fact, there are some scenarios where the concept of inheritance is not sufficient to guarantee code reuse, or at least not convenient.

It is therefore a matter of identifying, based on the actual scenario, a set of interchangeable algorithms and exploiting this pattern to "plug" these algorithms to the client that will use them.

Furthermore, this practice "decouples" the algorithm from the client that uses it, so that there is no reason to change the latter if one of the algorithms needs to change.

Imagine, for example, the implementation of a list, which includes a sorting function: If such an algorithm is hardcoded into the implementation of the list itself, each time the algorithm changes, it would grow, or become potentially unstable in its entirety, not to mention that it would not be possible to reuse that same code (the sorting) outside the list.

[next - A bad scenario &raquo;](02_badScenario.md)
