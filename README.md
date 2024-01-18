Para instalar a aplicação siga os passos abaixo:

Com o projeto clonado e no diretório do projeto, crie o seu `.env`:
- `cp .env.example .env`

Com o seu editor de texto abra o `.env` recém criado e altere os valores de conexão do banco de dados
- `DB_HOST=mysql`
- `DB_USERNAME=sail`
- `DB_PASSWORD=password`

Vamos instalar as dependências do projeto:
- `docker run --rm --interactive --tty -v $(pwd):/app composer install`

Agora gere a chave da aplicação com: 
- `./vendor/bin/sail artisan key:generate` 

O próximo passo é subir a aplicação usando: 
- `./vendor/bin/sail up -d` 

Por último, execute as migrations:
- `./vendor/bin/sail php artisan migrate`

O terminal irá retornar com o endereço e porta na qual o serviço estará sendo executado. Muito provavelmente será em http://localhost:80

Ah, quando você quiser desligar a aplicação basta usar o comando
- `./vendor/bin/sail down`


Tudo pronto! O back-end da aplicação já está rodando, agora vamos pro front-end. :smiley:
