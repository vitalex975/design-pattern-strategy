[&laquo; torna all'indice](../../README.md)
# Strategy Pattern
## Definizione

> "Lo Strategy Pattern definisce una famiglia di algoritmi, incapsula ciascuno di essi e li rende interscambiabili.
> Questo approccio permette agli algoritmi di variare indipendentemente dal client che ne fa uso."

## Approfondimenti

Lo Strategy Pattern è probabilmente il più semplice dei pattern.

Tratta essenzialmente il principio di "composition over inheritance", secondo il quale le classi software dovrebbero soddisfare l'esigenza di polimorfismo e la necessità di riutilizzo del codice (evitandone la duplicazione) attraverso la composizione piuttosto che mediante il principio di ereditarietà.

Come vedremo a breve, infatti, ci sono alcuni scenari in cui il concetto di ereditarietà non è sufficiente a garantire il ri-uso del codice, o quantomeno non è conveniente.

Si tratta quindi di identificare, in base allo scenario reale, un set di algoritmi intercambiabili e sfruttare questo pattern per "pluggare" tali algoritmi nel client che li utilizzerà.

Inoltre, questa pratica "disaccoppia" l'algoritmo dal client che lo utilizza, in modo che non ci sia motivo di modificare quest'ultimo se uno degli algoritmi deve cambiare.

Si immagini, ad esempio, l'implementazione di una lista, che preveda una funzione di ordinamento: Se tale algoritmo è cablato all'interno dell'implementazione della lista stessa, ad ogni modifica dell'algoritmo questa crescerebbe, o diventerebbe potenzialmente instabile nella sua totalità, senza contare che non sarebbe possibile riutilizzare quello stesso codice (il sorting) al di fuori della lista.

[successivo - Un pessimo scenario &raquo;](02_badScenario.md)
