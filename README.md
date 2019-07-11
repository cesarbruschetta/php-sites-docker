# Docker para Sites em PHP 5.4

[![](https://images.microbadger.com/badges/image/cesarbruschetta/php_mysql.svg)](https://microbadger.com/images/cesarbruschetta/php_mysql "Get your own image badge on microbadger.com")
[![](https://images.microbadger.com/badges/version/cesarbruschetta/php_mysql.svg)](https://microbadger.com/images/cesarbruschetta/php_mysql "Get your own version badge on microbadger.com")

# Caracteristicas

- PHP 5.4
- Sites PHP Dinamicos
- Sites HTML Estaticos

## Instalação

Utilize o arquivo `docker-compose.yml` para alterar as variavles de ambiente e poder configurar a docker, e utilize o comando abaixo para iniciar as docker (mysql e php)

```bash
    $ docker-compose up -d
```

### Databases 
- cesarbru_bd_cabinf
- cesarbru_bd_king_of_games
- cesarbru_bd_lords_of_games
- cesarbru_bd_speedy_am
- cesarbru_bd_vidal_associados 
- cesarbru_bd_wood_center
- cesarbru_db_physis


## Referencias

Variaveis exportadas na docker para coneção com o DB
```
    $_SERVER['MYSQL_USER']
    $_SERVER['MYSQL_PASS']
    $_SERVER['MYSQL_HOST']
```