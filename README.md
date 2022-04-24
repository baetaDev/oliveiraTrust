## Conversor de Dinheiro Oliveira Trust PHP

Instruções para o desafio:
Você vai implementar uma aplicação que faz a conversão da nossa moeda nacional para uma moeda estrangeira, aplicando algumas taxas e regras, não a conversão final do resultado deve ficar em tela de forma detalhada.
Pode-se usar para conversão de valores, mas aqui recomendamos :: //docs.awesomepi.com.br/api-de-moedas pela facilidade e boa aprovação da API.

O Desafio:
O usuário precisa informar 3 informações em tela, moeda de destino, valor para conversão e forma de pagamento. A nossa moeda nacional BRL será usada como moeda base na conversão.

Como Regras de Negocio:

Moeda de origem BRL;
Informar uma moeda de compra que não seja BRL (exibir no mínimo 2 opções);
Valor da Compra em BRL (deve ser maior que R$ 1.000,00 e menor que R$ 100.000,00)
Formas de pagamento (taxas aplicadas no valor da compra e aceita apenas como opções abaixo)

Para pagamentos em boleto, taxa de 1,45%
Para pagamentos em cartão de crédito, taxa de 7,63%

Aplicar taxa de 2% pela conversão para valores abaixo de R$ 3.000,00 e 1% para valores apenas maiores que R$ 3.000,00, essa taxa deve ser aplicada no valor da compra e não sobre o valor já com um taxa de forma de pagamento.

Exemplos de entrada:

Moeda de origem: BRL (padrão)
Modo de destino:

Exemplos: USD, BTC, ...

Valor para conversão:

Exemplo: 5.000,00, 1.000,00, 70.000,00, ...

Forma de pagamento:

Boleto ou Cartão de Crédito

Exemplo de funcionamento:

Parâmetros de entrada:

Moeda de origem: BRL (padrão)
Moeda de destino: USD
Valor para conversão: 5.000,00
Forma de pagamento: Boleto

Parâmetros de saída:

Modo de origem: BRL
Moeda de destino: USD
Valor para conversão: R$ 5.000,00
Forma de pagamento: Boleto
Valor da "Moeda de destino" usado para conversão: $ 5,30
Valor comprador comprado2 "Moeda de destino": $ 9,18 (taxa0 executado no valor de compra2 não valor total de conversão)
Taxa de pagamento: R$ 72,50
Taxa de conversão: R$ 50,00
Valor utilizado para conversão descontando as taxas: R$ 4.877,50

Critério de aceitação:
Deve ser possível escolher uma moeda estrangeira entre pelo menos 2 opções sendo o seu valor de compra maior que R$ 1.000 e menor que R$ 100.000,00 e sua forma de pagamento em boleto ou cartão de compra tendo como resultado o valor que será adquirido na moeda de destino e as taxas aplicadas;

Bônus:

Enviar cotação realizada por e-mail;
Autenticação de usuário;
Histórico de cotações feitas pelo usuário;
Uma opção no painel para configurar como aplicadas na conversão;

# Visão geral
Conversor de Dinheiro Oliveira Trust PHP.

A API foi construída utilizando o framework Laravel 8.x.

# Requisitos
Composer

PHP 7.4

Laravel 8.x
# Instalação

## Clone este repositório
$ git clone https://github.com/baetaDev/oliveiraTrust.git

## Instale as dependências
$ composer install

## Execute a aplicação em modo de desenvolvimento
Criar um banco de dados no phpmyadmin chamado laravel.

$ php artisan key:generate

$ php artisan migrate

$ php artisan serve

## Link do video

https://www.loom.com/embed/545552482ac0412daebc5eb60bb851f3