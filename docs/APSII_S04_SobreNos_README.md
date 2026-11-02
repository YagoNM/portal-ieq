# APSII — S04 | Sobre Nós — Portal IEQ

## Projeto e organização real
O Portal IEQ é uma aplicação web voltada à Igreja do Evangelho Quadrangular Canto do Mar. A página apresenta a comunidade cristã atendida e explica por que o sistema existe.

## Conexão com o relatório
A entrega anterior, “Entrega_S03_Homepage_Portal_IEQ.docx”, identifica o domínio como gestão, comunicação e organização de informações para igreja. Também apresenta como motivação centralizar informações e facilitar o acesso à programação, aos cultos e às transmissões.

A página “Sobre nós” traduz esse contexto em três objetivos: reunir informações em um só lugar, aproximar a comunidade e tornar o acesso simples. A seção “Quem somos” identifica a instituição atendida; a seção “Por que o Portal IEQ existe?” conecta a apresentação ao problema descrito no relatório.

As ações “Conheça nossa programação” e “Voltar para o início” permitem continuar a navegação. O conteúdo se relaciona às histórias de usuário da S03: consultar próximos cultos e acompanhar transmissões.

O texto descreve o propósito do sistema. Não constitui uma declaração institucional oficial de missão, visão ou valores. Não foram incluídos histórico, endereço, horários ou nomes de responsáveis sem confirmação. Programação, canal oficial e área do membro permanecem indicados como pendentes na interface.

## Implementação e fluxo
- Stack: Laravel, Blade, CSS no projeto Tailwind e JavaScript com Vite.
- Página: `resources/views/sobre.blade.php`.
- Rota pública: `GET /sobre`, nome `sobre`.
- Fluxo: página inicial → menu “Sobre nós” → página Sobre nós.
- Retorno: menu “Início”, marca da igreja e botão “Voltar para o início”.
- Estilo e menu responsivo reutilizam os arquivos existentes do projeto.
- Acessibilidade: link para pular ao conteúdo, títulos hierárquicos e item ativo com `aria-current="page"`.

## Executar no ambiente Sail já configurado
```bash
git fetch origin
git switch feat/s04-sobre-nos
sail up -d
sail npm install
sail npm run build
sail artisan route:list --path=sobre
```
Abra a aplicação local e use o menu “Sobre nós” ou acesse `http://localhost/sobre`.

## Conferência antes da entrega
1. Abrir a home e clicar em “Sobre nós”.
2. Conferir apresentação da igreja e propósito do portal.
3. Retornar à home pelos links e abrir a programação.
4. Em celular, abrir o menu e navegar até “Sobre nós”.
5. Confirmar que `/sobre` pode ser acessada sem login.

## Entrega
Entregar o link da branch que contém a implementação e este README. O enunciado aceita repositório com README, portanto PDF e ZIP são alternativas.
Repositório: https://github.com/YagoNM/portal-ieq/tree/feat/s04-sobre-nos

O número do grupo não foi informado e não foi preenchido por suposição.
