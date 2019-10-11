##comandos para as seeders
As seeders estão separadas por Modulos, desta forma para executar os comandos para popular o banco você precisa passar o parametro

php artisan db:seed --class={ classe Seeder com as classes TableSeeder}

Após adicionar a pasta do módulo, indispensável popular o comando composer dump-autoload

```
php artisan db:seed --class=InitWebSiteSeeder
```
