## Mutation Test PHP

[![License](https://img.shields.io/badge/license-MIT-green)](https://github.com/gustavofreze)
[![Minimum PHP Version](https://img.shields.io/badge/php-%5E8.0.6-blue)](https://php.net/)
[![Coverage](https://img.shields.io/badge/coverage-100%25-green)](https://github.com/gustavofreze/mutation-test-php)
[![Mutation](https://img.shields.io/badge/mutation-100%25-green)](https://github.com/gustavofreze/mutation-test-php)

* [Overview](#overview)
* [Instalação](#installation)
* [Testes](#tests)
    - [Infection](#infection)
    - [Executando os testes](#execute)
    - [Úteis](#util)

<div id='overview'></div> 

## Overview

O teste de mutação é um sistema usado para projetar novos testes de software e avaliar a qualidade dos testes de
software existentes. O teste de mutação envolve a modificação de um programa em pequenas maneiras. O conceito de teste
de mutação é bem simples, bugs/mutantes, são inseridos no código e os testes são executados em cima do código mutado. Se
pelo menos um dos testes quebrar ou tiver timeout, o mutante é considerado morto, e aquele trecho de código alterado é
considerado como coberto pelos testes.

<div id='installation'></div>

## Instalação

- Abra seu terminal, navegue até o diretório de sua preferência, e execute:
  ```bash
  > git clone https://github.com/gustavofreze/mutation-test-php.git
  ```

- Em seguida, execute o comando abaixo para configurar o projeto, e instalar as depêndencias:
  ```bash
  > make configure
  ```

<div id='tests'></div>

## Testes

<div id='infection'></div>

### Infection

Neste exemplo utilizarei o framework Infection. Infection é um framework de teste de mutação PHP baseado em mutações AST
(Abstract Syntax Tree). Ele funciona como uma ferramenta CLI e pode ser executado a partir da raiz do projeto. Mais
detalhes sobre o [Infection](https://infection.github.io/guide/index.html).

<div id='execute'></div>

### Executando os testes

```bash
> make test               # Executa todos os tipos de testes e gera o coverage
> make test-unit          # Executa apenas os testes unitários
> make test-unit-coverage # Executa apenas os testes unitários e gera o coverage
> make test-mutation      # Executa apenas os testes de mutação
```

<div id='util'></div>

### Úteis

Comandos úteis após a execução dos testes.

```bash
> make show-coverage # Abre no Google Chrome o coverage
> make clean         # Limpa os relatórios e cache gerados pelos testes
```