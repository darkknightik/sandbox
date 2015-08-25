# Tiplap
Připravený core projektu s extension (Kdyby, Doctrine, Redis, Migrations, Console). 

## Požadavky
 * PHP 5.5
 * MySQL
 * Redis - nastaven spuštěn
 

## Nastavení

Vykopírovat vzorový konfig do souboru, se kterým pracuje aplikace. 

```
cp app\config\local.config.neon.example app\config\local.config.neon 
```

Nastavit připojení do DB pro doctrine.

Dále nastavte vhost do www složky. 

 
## Spuštění
V rootu projektu po spuštění příkazu dostanete hlavní nabídku konzole:

```
php www/index.php 
```

Nás budou zatím zajímat migrace a to základní dva příkazy:

### Vygenerování migrace

```
php www/index.php migration:diff 
```
Tento příkaz vygeneruje schéma z aktuálních entit - porovná Entity a vygeneruje migrační UPDATE/CREATE dávku. **Vždy je před tím dobré mít smazanou cache.**

Spuštění bez provedených změn v Entitách vygeneruje prázdnou migrační dávku.

Migrace jsou generovány do app/migrations/


### Exekuce migrace

```
php www/index.php migration:migrate 
```

Tento příkaz provede update DB z daných migrací. **Vždy je před tím dobré mít smazanou cache.**
   
   
   
Další dotazy a podobě rád zodpovím. Péca ;)