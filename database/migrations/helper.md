##comandos para as migration
As migrations estão separadas por Modulos, desta forma para executar os comandos para popular o banco você precisa passar o parametro --path=/database/migrations/{ nome do modulo }
```
php artisan migrate --path=/database/migrations/base
```
Para processar Modulos com database indivuais precisa deste parametro --database=mysql_{ nome do modulo }
```
php artisan migrate --path=/database/migrations/post --database=mysql_post
```