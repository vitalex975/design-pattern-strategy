[&laquo; torna all'indice](../../README.md)
# Strategy Pattern
## Entra in scena lo "Strategy Pattern"

L'approccio mediante Strategy Pattern prevede il disaccoppiamento fra gli algoritmi ed i client che li usano. Iniziamo quindi a vedere i possibili personaggi come "client", ed immaginiamo di estrarre da questi gli algoritmi, ognuno dei quali rappresenta una strategia, un comportamento specifico.

Ci saranno quindi più famiglie di algoritmi, ad esempio: per camminare, per correre, per combattere, ed ognuna di queste famiglie conterrà più algoritmi, uniformi tra loro, per descrivere i diversi modi di camminare, correre, combattere, ecc...

È importante comprendere che tali algoritmi devono essere "disaccoppiati" dal client, non bisogna quindi pensare in termini di "WalkAsAKnight", "WalkAsAMagician", oppure "FightAsAKnight" e "FightAsAMagician", bensì in termini che siano rappresentativi del comportamento stesso.

In questo modo, tali algoritmi potranno essere abbinati per dare vita al giusto set di comportamenti per un cavaliere, che sarà diverso da quello di un arciere o di un mago.

Appare evidente come questo approccio ci conceda la massima flessibilità, senza mai obbligarci a duplicare neanche una riga di codice!

[successivo - Un po' di codice &raquo;](04_exampleCode.md)
