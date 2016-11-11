# Prvi krožek

Prvi krožek je za nami, kjer smo si pogledali podatkovno strukturo laravela, routes, views, controllers. Res čiste osnove, ki ste jih verjetno že vzeli pri pouku samem.

Pri spoznavanju kontrolerja smo uporabili ukaz:

```bash
php artisan make:controller PagesController
```
 
 Odločili smo se da bomo naredili blog. Tako da smo se lotili kar z modelom `Post` in samo migracijo za tabelo. `database/migrations/2016_11_11_084530_create_posts_table.php`.
 
 Da smo kreirali ti dve model in migracijo sem uporabil sledeči ukaz:
 
 ```bash
 php artisan make:model Post -m
 ```
 
 Stikalo (switch) `-m` pomeni samo da poleg modela ustvari še pripadajočo migracijsko datoteko, da ne rabimo pisati še
 
 ```bash
 php artisan make:migration create_posts_table --create="posts"
 ```