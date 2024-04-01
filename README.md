#Gerenciador de Tarefas Simples (CRUD/API REST)

##Gerenciador de tarefas simples com um CRUD, consumindo uma API REST para suas operações

# Para Usuários do Windows:
- Baixe o Wamp: [http://www.wampserver.com/en/](http://www.wampserver.com/en/)
- Baixe e extraia o cmder mini: [https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip](https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip)
- Atualize a variável de ambiente do Windows para apontar para a pasta de instalação do seu PHP (dentro do diretório de instalação do Wamp) ([Veja como fazer isso](http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash))

O cmder será referido como console

## Para Usuários de Mac OS, Ubuntu e Windows:
- Crie um banco de dados localmente chamado `task-manager` com a collation `utf8_general_ci`
- Baixe o composer [https://getcomposer.org/download/](https://getcomposer.org/download/)
- Faça o pull do projeto Laravel/PHP do provedor git.
- Renomeie o arquivo `.env.example` para `.env` dentro da raiz do seu projeto e preencha as informações do banco de dados.
  (o Windows não permitirá que você faça isso, então você precisa abrir seu console, ir para o diretório raiz do seu projeto e executar `mv .env.example .env`)
- Abra o console e vá para o diretório raiz do seu projeto
- Execute `composer install` ou ```php composer.phar install```
- Execute `php artisan key:generate`
- Execute `php artisan migrate`
- Execute `php artisan db:seed` para executar os seeders, se houver algum.
- Execute `npm run dev` para compilar os assets
- Execute `php artisan serve`

##### Agora você pode acessar seu projeto em localhost:8000 :)

## Se por algum motivo seu projeto parar de funcionar, faça o seguinte:
- `composer install`
- `php artisan migrate`




