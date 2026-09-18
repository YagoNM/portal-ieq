<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal da Igreja do Evangelho Quadrangular Canto do Mar. Acompanhe cultos, transmissões e novidades da comunidade.">
    <title>IEQ Canto do Mar</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteúdo</a>

    <header class="site-header" data-header>
        <div class="container header-inner">
            <a class="brand" href="#inicio" aria-label="IEQ Canto do Mar — início">
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
                <a class="nav-link is-active" href="#inicio">Início</a>
                <a class="nav-link" href="#cultos">Cultos</a>
                <a class="nav-link" href="#ao-vivo">Ao vivo</a>
                <a class="button button-primary button-small" href="#ao-vivo">
                    <span class="live-dot" aria-hidden="true"></span>
                    Assistir ao vivo
                </a>
                <span class="button button-outline button-small is-disabled" aria-disabled="true" title="Área do membro em desenvolvimento">
                    Área do membro
                </span>
            </nav>
        </div>
    </header>

    <main id="conteudo">
        <section class="hero" id="inicio" aria-labelledby="hero-title">
            <div class="hero-overlay" aria-hidden="true"></div>
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow"><span></span> Bem-vindo à</p>
                    <h1 id="hero-title">
                        <span>Igreja</span>
                        IEQ Canto do Mar
                    </h1>
                    <p class="hero-subtitle">Uma família para pertencer.</p>

                    <div class="hero-actions">
                        <a class="button button-primary" href="#ao-vivo">
                            <span class="live-dot" aria-hidden="true"></span>
                            Assistir ao vivo
                        </a>
                        <a class="button button-outline" href="#cultos">Próximos cultos</a>
                    </div>
                </div>

                <article class="live-card" id="ao-vivo">
                    <div class="live-card-media">
                        <img
                            src="https://images.unsplash.com/photo-1570786032462-2efc3ca8fccd?auto=format&fit=crop&w=1200&q=82"
                            alt="Comunidade reunida durante um momento de louvor"
                            width="1200"
                            height="675"
                        >
                        <span class="live-badge"><span class="live-dot" aria-hidden="true"></span> Ao vivo</span>
                        <span class="play-button" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="m9 7 8 5-8 5V7Z" /></svg>
                        </span>
                    </div>
                    <div class="live-card-content">
                        <p class="card-kicker">Canal oficial</p>
                        <h2>Transmissão dos cultos</h2>
                        <p>Acompanhe a programação da igreja ao vivo. O link do canal será disponibilizado em breve.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="schedule-section" id="cultos" aria-labelledby="schedule-title">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow"><span></span> Nossa programação</p>
                        <h2 id="schedule-title">Próximos cultos</h2>
                    </div>
                    <p>Os horários oficiais serão publicados aqui assim que forem confirmados.</p>
                </div>

                <div class="schedule-grid">
                    <article class="schedule-card">
                        <span class="schedule-number" aria-hidden="true">01</span>
                        <div>
                            <p class="card-kicker">Programação regular</p>
                            <h3>Cultos semanais</h3>
                            <p>Horários em atualização</p>
                        </div>
                    </article>

                    <article class="schedule-card">
                        <span class="schedule-number" aria-hidden="true">02</span>
                        <div>
                            <p class="card-kicker">Celebração</p>
                            <h3>Culto de domingo</h3>
                            <p>Programação em atualização</p>
                        </div>
                    </article>

                    <article class="schedule-card">
                        <span class="schedule-number" aria-hidden="true">03</span>
                        <div>
                            <p class="card-kicker">Comunidade</p>
                            <h3>Eventos especiais</h3>
                            <p>Novidades em breve</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <a class="brand" href="#inicio" aria-label="Voltar ao início">
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
