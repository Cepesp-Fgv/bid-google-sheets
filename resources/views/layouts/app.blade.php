<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DATAURBE') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset("dataurb/font-awesome.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("dataurb/validation.css") }}">

    <link rel="stylesheet" href="{{ mix("dataurb/index.css") }}">

    <link rel="preload" href="{{ asset("dataurb/fonts/gothambold.woff") }}" as="font" type="font/woff">
    <link rel="preload" href="{{ asset("dataurb/fonts/gothambook.woff") }}" as="font" type="font/woff">
    <link rel="preload" href="{{ asset("dataurb/fonts/gothammedium.woff") }}" as="font" type="font/woff">
    <link rel="preload" href="{{ asset("dataurb/fonts/gothamlight.woff") }}" as="font" type="font/woff">

    <meta property="og:title" content="Big Data para o Desenvolvimento Urbano Sustentável">
    <meta property="og:description" content="Sumário de Entregas">
    <style>
        body, .masthead, .site-footer, .site-footer label, .site-footer small, .account-masthead {
            background: #13326B url({{ asset("dataurb/bg.png") }});
        }

        .masthead .navigation .nav-pills li a:hover, .masthead .navigation .nav-pills li.active a {
            background-color: #1c91b6;
        }
    </style>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://dataurbe.appcivico.com/base/images/ckan.ico">
    @stack('styles')
</head>
<body data-site-root="https://dataurbe.appcivico.com/" data-locale-root="https://dataurbe.appcivico.com/" style="">
<div class="hide"><a href="https://dataurbe.appcivico.com/dataset/ancap-organigrama#content">Pular para o
        conteúdo</a>
</div>
<header class="account-masthead un-container section">
    <div class="fgv-container">
        <nav class="account not-authed">
            <ul class="unstyled">
                <li><a href="https://dataurbe.appcivico.com/user/login">Entrar</a></li>
            </ul>
        </nav>
    </div>
</header>
<header class="site-header un-container section">
    <div class="fgv-container">
        <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
            <span class="fa fa-bars"></span>
        </button>
        <hgroup class="header-text-logo-tagline">
            <h1>
                <a href="https://dataurbe.appcivico.com/">Dataurbe</a>
            </h1>
        </hgroup>
        <div class="nav-collapse collapse">
            <nav class="nav-bar-wrapper">
                <ul class="nav-bar">
                    <li><a href="https://dataurbe.appcivico.com/dataset">Conjuntos de dados</a></li>
                    <li><a href="https://dataurbe.appcivico.com/organization">Cidades</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div role="main">
    <div id="content" class="container">
        <div class="flash-messages">
        </div>
        <div class="row wrapper">
            <div class="primary span12">
                <article class="module">
                    <div class="module-content">
                        @yield('content')
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div style="text-align: center; font-size: 12px">
        Acesse a nossa <a href="{{ url('privacy-policy') }}">política de privacidade</a><br>
        Acesse os nossos <a href="{{ url('terms-of-use') }}">termos de uso</a>
    </div>
</div>
<footer class="fgv-site-footer">
    <div class="fgv-container">
        <ul class="footer-menu">
            <li class="footer-menu__section">
                    <span class="footer-menu__title">
                    Quem somos
                    </span>
                <ul class="footer-menu__section__list">
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/agencia-executora">
                            Agência Executora
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/parceiro-financiador">
                            Parceiro financiador
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/comite-diretivo">
                            Comitê Diretivo
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/consultores">
                            Consultores
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/parceiro-tecnico">
                            Parceiro Técnico
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer-menu__section">
<span class="footer-menu__title">
Cidades participantes
</span>
                <ul class="footer-menu__section__list">
                    <li class="footer-menu__item">
                        <a href="https://fgv-ckan-aws.appcivico.com/organization/miraflores">
                            Miraflores
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://fgv-ckan-aws.appcivico.com/organization/montevideu">
                            Montevidéu
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://fgv-ckan-aws.appcivico.com/organization/quito">
                            Quito
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://fgv-ckan-aws.appcivico.com/organization/sao-paulo">
                            São Paulo
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://fgv-ckan-aws.appcivico.com/organization/xalapa">
                            Xalapa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer-menu__section">
<span class="footer-menu__title">
Eventos
</span>
                <ul class="footer-menu__section__list">
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/proximos-eventos">
                            Próximos eventos
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/eventos-anteriores">
                            Eventos anteriores
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer-menu__section">
<span class="footer-menu__title">
Produtos e pesquisas
</span>
                <ul class="footer-menu__section__list">
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/dados"></a>
                        Dados

                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/apresentacoes">
                            Apresentações
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/node/99">
                            Resultados de pesquisa
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://smartcities-bigdata.fgv.br/casos-de-referencia">
                            Casos de referência
                        </a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="https://dataurbe.appcivico.com/dataset/ancap-organigrama#">
                            Documentação
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="credit-list">
            <div class="credit-list__item">
                <h4 class="credit-list__title">
                    Projeto
                </h4>
                <img src="{{ asset("dataurb/big-data--logo.png") }}" alt="Big Data">
            </div>
            <div class="credit-list__item">
                <h4 class="credit-list__title">
                    Realização
                </h4>
                <img src="{{ asset("dataurb/fgv-logo.png") }}" alt="Fundação Getúlio Vargas">
            </div>
            <div class="credit-list__item">
                <h4 class="credit-list__title">
                    Financiamento
                </h4>
                <img src="{{ asset("dataurb/banco-interamericano-de-desenvolvimento-logo.png") }}"
                     alt="Banco Interamericano de Desenvolvimento">
            </div>
            <div class="credit-list__item">
                <h4 class="credit-list__title">
                    Desenvolvido por
                </h4>
                <a href="http://www.urbbox.com.br/" target="_blank">
                    <img src="{{ asset("img/urbbox_white.png") }}" width="200">
                </a>
            </div>
            <div class="credit-list__item">
                <h4 class="credit-list__title">
                    Apoio
                </h4>
                <img src="{{ asset("dataurb/waze.svg") }}" width="150" height="17">
            </div>
            <div class="credit-list__item">
            </div>
            <div class="credit-list__item">
            </div>
            <div class="credit-list__item">
            </div>
        </div>
        <ul class="social-networks">
            <li class="social-networks__item">
                <a href="https://www.facebook.com/fgv"><img src="{{ asset("dataurb/facebook-icon.svg") }}"
                                                            alt="Facebook"></a>
            </li>
            <li class="social-networks__item">
                <a href="https://www.linkedin.com/school/fgv"><img src="{{ asset("dataurb/linkedin-icon.svg") }}"
                                                                   alt="LinkedIn"></a>
            </li>
            <li class="social-networks__item">
                <a href="https://twitter.com/fgv"><img src="{{ asset("dataurb/twitter-icon.svg") }}"
                                                       alt="twitter"></a>
            </li>
            <li class="social-networks__item">
                <a href="https://plus.google.com/+FGV"><img src="{{ asset("dataurb/gplus-icon.svg") }}" alt="GPlus"></a>
            </li>
            <li class="social-networks__item">
                <a href="https://www.instagram.com/fgv.oficial/"><img src="{{ asset("dataurb/instagram-icon.svg") }}"
                                                                      alt="instagram"></a>
            </li>
            <li class="social-networks__item">
                <a href="https://www.youtube.com/fgv"><img src="{{ asset("dataurb/youtube-icon.svg") }}"
                                                           alt="youtube"></a>
            </li>
        </ul>
    </div>
    <div class="disclaimer">
        <p class="fgv-container">
            As manifestações expressas por integrantes dos quadros da Fundação Getúlio Vargas, nas quais constem a
            sua
            identificação como tais, em artigos e entrevistas publicados nos meios de comunicação em geral,
            representam
            exclusivamente as opiniões dos seus autores e não, necessariamente, a posição institucional da FGV.
            Portaria
            FGV Nº19/2018
        </p>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
