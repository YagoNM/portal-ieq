# Portal IEQ

Aplicação web desenvolvida para centralizar informações públicas e auxiliar na gestão interna da **Igreja do Evangelho Quadrangular Canto do Mar**.

O projeto está em desenvolvimento e utiliza Laravel para organizar membros, células, redes, lideranças e outros processos da igreja.

## Objetivo

O Portal IEQ pretende reunir em uma única aplicação:

- Informações públicas da igreja;
- Programação de cultos e eventos;
- Transmissões ao vivo;
- Cadastro e gerenciamento de membros;
- Organização de células e redes;
- Controle de líderes, supervisores e pastores;
- Relatórios conforme o nível de acesso;
- Pedidos de oração, visitas e assistência social.

## Funcionalidades atuais

- Estrutura inicial da aplicação;
- Modelagem de membros, células e redes;
- Estrutura de papéis e permissões;
- Página inicial pública responsiva;
- Área de transmissão e programação;
- Testes automatizados iniciais.

> O projeto ainda está em desenvolvimento. Algumas informações e funcionalidades da interface são provisórias.

## Hierarquia da aplicação

A estrutura organizacional segue esta ordem:

1. Pastores;
2. Supervisores;
3. Líderes;
4. Líderes em treinamento (LETs);
5. Membros.

Todos possuem cadastro como membro. Papéis e permissões determinam quais áreas e informações cada pessoa pode acessar.

## Tecnologias

- PHP 8.3+
- Laravel 13
- Laravel Sail
- Docker
- MySQL
- Redis
- Blade
- Tailwind CSS 4
- JavaScript
- Vite
- PHPUnit

## Requisitos

Antes de iniciar, tenha instalado:

- Git;
- Docker;
- Docker Compose.

## Instalação

Clone o repositório:

```bash
git clone https://github.com/YagoNM/portal-ieq.git
cd portal-ieq
```

Instale as dependências do PHP utilizando o container do Laravel Sail:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php85-composer:latest \
    composer install --ignore-platform-reqs
```

Crie o arquivo de configuração:

```bash
cp .env.example .env
```

Inicie os containers:

```bash
./vendor/bin/sail up -d
```

Gere a chave da aplicação:

```bash
./vendor/bin/sail artisan key:generate
```

Execute as migrations:

```bash
./vendor/bin/sail artisan migrate
```

Instale as dependências do front-end:

```bash
./vendor/bin/sail npm install
```

Inicie o Vite:

```bash
./vendor/bin/sail npm run dev
```

A aplicação estará disponível em [http://localhost](http://localhost).

## Testes

Execute os testes automatizados:

```bash
./vendor/bin/sail artisan test
```

Valide a compilação do front-end:

```bash
./vendor/bin/sail npm run build
```

## Roadmap

Entre as funcionalidades planejadas estão:

- Autenticação e Área do Membro;
- Cadastro completo de membros;
- Gerenciamento de células e redes;
- Gestão de ministérios;
- Dashboard por nível de acesso;
- Relatórios de células e redes;
- Pedidos de visita;
- Pedidos de oração;
- Assistência social e solicitação de cesta básica;
- Cadastro de dízimos;
- Agenda de cultos e eventos;
- Aplicação instalável como PWA.

## Status

Projeto em desenvolvimento.

A primeira versão da página pública está disponível na branch `feat/home-publica`.

## Autor

Desenvolvido por **Yago Santos**.

- GitHub: [YagoNM](https://github.com/YagoNM)
- LinkedIn: [linkedin.com/in/snmyago](https://www.linkedin.com/in/snmyago)

## Licença

Este projeto ainda não possui uma licença pública definida.
