<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Conheça a IEQ Canto do Mar e o propósito do Portal IEQ: aproximar a comunidade e facilitar o acesso às informações da igreja.">
    <title>Sobre nós | IEQ Canto do Mar</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteúdo</a>

    <header class="site-header" data-header>
        <div class="container header-inner">
            <a class="brand" href="{{ url('/') }}#inicio" aria-label="IEQ Canto do Mar — início">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" role="img">
                        <path d="M12 5v14M6.5 10.5h11" />
                    </svg>
                </span>
                <span>IEQ Canto do Mar</span>
            </a>

            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="menu-principal" data-menu-toggle>
                <span class="sr-only">Abrir menu</span>
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>

            <nav class="main-nav" id="menu-principal" aria-label="Navegação principal" data-menu>
                <a class="nav-link" href="{{ url('/') }}#inicio">Início</a>
                <a class="nav-link is-active" href="{{ route('sobre') }}" aria-current="page">Sobre nós</a>
                <a class="nav-link" href="{{ url('/') }}#cultos">Cultos</a>
                <a class="nav-link" href="{{ url('/') }}#ao-vivo">Ao vivo</a>
                <a class="button button-primary button-small" href="{{ url('/') }}#ao-vivo">
                    <span class="live-dot" aria-hidden="true"></span>
                    Assistir ao vivo
                </a>
                <span class="button button-outline button-small is-disabled" aria-disabled="true" title="Área do membro em desenvolvimento">
                    Área do membro
                </span>
            </nav>
        </div>
    </header>

    <main id="conteudo" class="about-page">
        <section class="about-intro" aria-labelledby="about-title">
            <div class="container about-copy">
                <p class="eyebrow"><span></span> Sobre nós</p>
                <h1 id="about-title">Uma família para pertencer.</h1>
                <p class="about-lead">Conheça a IEQ Canto do Mar e o propósito que aproxima nossa comunidade por meio do Portal IEQ.</p>
                <a class="button button-primary" href="{{ url('/') }}#cultos">Conheça nossa programação</a>
            </div>
        </section>

        <section class="about-section" aria-labelledby="community-title">
            <div class="container about-columns">
                <div>
                    <p class="eyebrow"><span></span> Quem somos</p>
                    <h2 id="community-title">IEQ Canto do Mar</h2>
                </div>
                <div class="about-text">
                    <p>A Igreja do Evangelho Quadrangular Canto do Mar é a comunidade cristã para a qual o Portal IEQ está sendo desenvolvido. Cultos, momentos de comunhão e a participação dos membros fazem parte do contexto que orienta o projeto.</p>
                    <p>O portal é um ponto de encontro digital para membros e visitantes conhecerem a igreja e encontrarem informações sobre sua programação e suas transmissões.</p>
                </div>
            </div>
        </section>

        <section class="about-section about-purpose" aria-labelledby="purpose-title">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow"><span></span> Nosso propósito digital</p>
                        <h2 id="purpose-title">Por que o Portal IEQ existe?</h2>
                    </div>
                    <p>Facilitar o acesso à informação e aproximar as pessoas da vida da igreja.</p>
                </div>
                <div class="schedule-grid">
                    <article class="schedule-card">
                        <div>
                            <p class="card-kicker">01 / Informação</p>
                            <h3>Reunir em um só lugar</h3>
                            <p>Centralizar informações da igreja para facilitar a consulta por membros e visitantes.</p>
                        </div>
                    </article>
                    <article class="schedule-card">
                        <div>
                            <p class="card-kicker">02 / Participação</p>
                            <h3>Aproximar a comunidade</h3>
                            <p>Facilitar o acesso à programação dos cultos e às informações sobre as transmissões.</p>
                        </div>
                    </article>
                    <article class="schedule-card">
                        <div>
                            <p class="card-kicker">03 / Clareza</p>
                            <h3>Tornar o acesso simples</h3>
                            <p>Apresentar os conteúdos com linguagem acolhedora, navegação clara e uma interface adaptada ao celular.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="about-section" aria-labelledby="invitation-title">
            <div class="container about-copy">
                <p class="eyebrow"><span></span> Faça parte</p>
                <h2 id="invitation-title">Conheça a vida da nossa comunidade.</h2>
                <p class="about-lead">Na página inicial, você encontra os espaços dedicados aos próximos cultos e às transmissões. A programação e o canal oficial serão disponibilizados assim que confirmados.</p>
                <a class="button button-outline" href="{{ url('/') }}">Voltar para o início</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <a class="brand" href="{{ url('/') }}#inicio" aria-label="Voltar ao início">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M6.5 10.5h11" /></svg>
                </span>
                <span>IEQ Canto do Mar</span>
            </a>

            <p>Canais oficiais e informações de contato serão adicionados em breve.</p>
            <p class="copyright">© {{ now()->year }} IEQ Canto do Mar</p>
        </div>
    </footer>
</body>
</html>
