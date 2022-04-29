# Teste de Emprego Studio Sol

O teste consiste em criar uma API Rest que recebe uma palavra e localiza dentro dela o maior número romano.

## Resolução do Projeto

Utilizei para resolver o projeto PHP com a framework Lumen. A ideia do projeto achei bem interessante porque deu para praticar bastante minha lógica, clean code e testes, o ponto que eu posso dizer que eu fiquei mais tempo foi desenvolver a lógica para a separação dos números romanos dentro da palavra.

Um ponto que eu queria comentar era a disponibilização de mais exemplos além do que foi colocado para termos uma visão maior sobre o problema proposto.

## Como rodar o projeto

```
1 - composer install
2 - php -S 0.0.0.0:8000 -t public
3 - mande um post para /search com o parâmetro text
```

## Como rodar os testes

Foi implementado uma suite de testes bem simples com PHPUnit para auxiliar na criação do projeto e para rodar basta executar o comando abaixo:
```bash
$ vendor/bin/phpunit --testdox
```


