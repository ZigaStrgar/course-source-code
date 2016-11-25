# Popravki

```php
// Migracija posts
$table->foreign('user_id')->references('id')->on('users');
```

V vseh migracijskih datotekah si imel zapisano refer**a**nces namesto refer**E**nces.

```php
// Migracijska datoteka category_post
$table->increments('category_id');
$table->increments('post_id');

// To bi bilo sicer fino, ampak na ta način ne moreš kreirat dva primarna ključa, spodaj je pravilen zapis

$table->integer('category_id')->unsigned();
$table->integer('post_id')->unsigned();
$table->primary(['category_id', 'post_id']);
```

Sem pognal ukaz in vse deluje :)

```bash
php artisan migrate
```
