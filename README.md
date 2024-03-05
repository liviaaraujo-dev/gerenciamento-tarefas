# Gerenciamento de Tarefas

Sistema de gerenciamento de tarefas utilizando o framework Laravel.

![GitHub Logo](print.png)

## Como rodar o projeto

### Iniciar banco de dados Mysql no Docker

É nessesário ter o docker instalado

```bash
$ docker-compose up
```

### Instalar dependências

Necessário Compose instalado

```bash
$ composer install
```

### Aplicar migrations

```bash
$ php artisan migrate
```

### Executar

```bash
$ php artisan serve
```
