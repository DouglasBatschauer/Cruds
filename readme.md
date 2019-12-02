############Passos para instalacao de dependencias#############
Para o projeto funcionar perfeitamente e necessário os seguintes frameworks instalados na maquina com preferencialmente nas ultimas versões:

--Composer
--Laravel
--wampServer
--mysql(WorkBench) -- Opcional


Apos ter os mesmos intalados na maquina, basta iniciar o wampServer na porta 3306 e, rodar os scripts que estão na raiz desse projeto para adicionar as tabelas necessárias.

Apos isso basta ir na pasta do projeto em questão via cmd e utilizar o comando:
php artisan migrate (irá criar a tabela de usuario e dependencias)

Finalizando basta iniciar o projeto do laravel utilizando o comando: php artisan serve
#######
