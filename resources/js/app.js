import './bootstrap';

/**
 * portfolio.js - Logica de animaciones y navegacion del portafolio
 *
 * Estructura:
 *  1. Estado global
 *  2. Preloader con anime.js
 *  3. Animacion de entrada principal
 *  4. Navegacion horizontal de paginas
 *  5. Filtro de proyectos
 *  6. Menu movil
 *  7. Animacion de elementos al entrar en viewport (IntersectionObserver)
 *  8. Swipe en tactil
 *  9. Inicializacion
 */

/* ================================================================
    1. ESTADO GLOBAL
    ================================================================ */
const state = {
    currentPage: 0,         // Indice de pagina activa (0, 1, 2)
    totalPages: 3,          // Total de paginas en el track
    isAnimating: false,     // Bloqueo durante transicion de pagina
    transitionDuration: 700 // Duracion de la transicion en ms
};

/* ================================================================
    2. PRELOADER
    Secuencia de animacion antes de mostrar el contenido:
    1. Aparece el monograma
    2. Se llena la barra de progreso
    3. Aparece el texto "Cargando..."
    4. Se oculta el preloader
    5. Se reproduce la animacion de entrada principal
    ================================================================ */
function runPreloader() {
    const monogram = document.querySelector('.preloader__monogram');
    const bar      = document.querySelector('.preloader__bar');
    const text     = document.querySelector('.preloader__text');
    const preloader = document.getElementById('preloader');

    // Paso 1: Aparece el monograma con un rebote sutil
    anime({
        targets: monogram,
        opacity: [0, 1],
        scale: [0.8, 1],
        duration: 600,
        easing: 'easeOutBack',
        complete: function() {

            // Paso 2: Texto aparece
            anime({
                targets: text,
                opacity: [0, 1],
                translateY: [8, 0],
                duration: 400,
                easing: 'easeOutQuad'
            });

            // Paso 3: Barra de progreso se llena
            anime({
                targets: bar,
                width: ['0%', '100%'],
                duration: 1000,
                easing: 'easeInOutQuart',
                delay: 100,
                complete: function() {

                    // Paso 4: Ocultar preloader con fade out
                    anime({
                        targets: preloader,
                        opacity: [1, 0],
                        duration: 500,
                        delay: 200,
                        easing: 'easeInQuad',
                        complete: function() {
                            preloader.classList.add('hidden');
                            // Paso 5: Animar entrada del hero
                            runHeroEntrance();
                        }
                    });
                }
            });
        }
    });
}

/* ================================================================
    3. ANIMACION DE ENTRADA DEL HERO
    Revelacion escalonada de los elementos principales
    de la pagina de bienvenida usando anime.js stagger
    ================================================================ */
function runHeroEntrance() {
    // Elementos del hero con clases 'anim-ready' en la pagina activa
    const heroElements = document.querySelectorAll(
        '#page-home .hero__intro .anim-ready'
    );

    anime({
        targets: heroElements,
        opacity: [0, 1],
        translateY: [30, 0],
        duration: 700,
        delay: anime.stagger(100, { start: 0 }),
        easing: 'easeOutCubic'
    });
}

/* ================================================================
    4. NAVEGACION HORIZONTAL DE PAGINAS
    Mueve el #pages-track con translateX usando anime.js
    ================================================================ */

/**
 * Navega a una pagina especifica por su indice.
 * @param {number} pageIndex - Indice destino (0, 1, 2)
 */
function goToPage(pageIndex) {
    // No navegar si ya esta animando o si es la misma pagina
    if (state.isAnimating || pageIndex === state.currentPage) return;
    if (pageIndex < 0 || pageIndex >= state.totalPages) return;

    state.isAnimating = true;

    const track = document.getElementById('pages-track');
    const targetX = pageIndex * -100; // Cada pagina es 100vw

    // Animacion de deslizamiento horizontal
    anime({
        targets: track,
        translateX: targetX + 'vw',
        duration: state.transitionDuration,
        easing: 'easeInOutQuart',
        complete: function() {
            state.currentPage = pageIndex;
            state.isAnimating = false;

            // Actualiza controles de UI
            updateNavState();

            // Anima los elementos de la nueva pagina
            animatePageEntrance(pageIndex);
        }
    });

    // Actualiza visualmente antes de que termine la animacion
    updateNavLinks(pageIndex);
    updateDots(pageIndex);
    updateArrows(pageIndex);
}

/**
 * Actualiza el estado de la navegacion (links, puntos, flechas)
 * despues de completar una transicion de pagina.
 */
function updateNavState() {
    updateNavLinks(state.currentPage);
    updateDots(state.currentPage);
    updateArrows(state.currentPage);
}

/**
 * Marca como activo el link de navegacion correspondiente.
 * @param {number} pageIndex
 */
function updateNavLinks(pageIndex) {
    document.querySelectorAll('.nav__link').forEach((link, i) => {
        link.classList.toggle('active', i === pageIndex);
    });
}

/**
 * Actualiza los puntos indicadores de pagina.
 * @param {number} pageIndex
 */
function updateDots(pageIndex) {
    document.querySelectorAll('.page-dot').forEach((dot, i) => {
        const isActive = i === pageIndex;
        dot.classList.toggle('active', isActive);
        dot.setAttribute('aria-selected', isActive.toString());
    });
}

/**
 * Habilita o deshabilita las flechas de navegacion
 * segun la posicion actual.
 * @param {number} pageIndex
 */
function updateArrows(pageIndex) {
    const prev = document.getElementById('arrow-prev');
    const next = document.getElementById('arrow-next');

    prev.disabled = pageIndex === 0;
    next.disabled = pageIndex === state.totalPages - 1;
}

/**
 * Anima con anime.js los elementos marcados con .anim-ready
 * en la pagina que acaba de entrar en vista.
 * @param {number} pageIndex
 */
function animatePageEntrance(pageIndex) {
    const pages = ['page-home', 'page-projects', 'page-contact'];
    const pageEl = document.getElementById(pages[pageIndex]);
    if (!pageEl) return;

    // Solo anima elementos que aun no han sido revelados
    const readyElements = pageEl.querySelectorAll('.anim-ready');

    if (readyElements.length > 0) {
        anime({
            targets: readyElements,
            opacity: [0, 1],
            translateY: [24, 0],
            duration: 600,
            delay: anime.stagger(60, { start: 100 }),
            easing: 'easeOutCubic',
            complete: function() {
                // Marca los elementos como animados para no repetir
                readyElements.forEach(el => el.classList.remove('anim-ready'));
            }
        });
    }
}

/* ================================================================
    5. FILTRO DE PROYECTOS
    Filtra las tarjetas por categoria con animacion suave
    ================================================================ */
function initProjectFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Actualiza el boton activo
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-pressed', 'false');
            });
            this.classList.add('active');
            this.setAttribute('aria-pressed', 'true');

            // Filtra los articulos de proyecto
            const items = document.querySelectorAll(
                '.project-featured, .project-card, .timeline-project'
            );

            // Tambien el contenedor del timeline
            const timelineWrap = document.querySelector('.project-timeline-wrap');

            let timelineVisible = false;

            items.forEach(item => {
                const category = item.dataset.category;
                const matches  = filter === 'all' || category === filter;

                if (matches) {
                    item.classList.remove('project-hidden');
                    // Micro-animacion de aparicion
                    anime({
                        targets: item,
                        opacity: [0, 1],
                        scale: [0.95, 1],
                        duration: 300,
                        easing: 'easeOutCubic'
                    });
                    if (item.classList.contains('timeline-project')) {
                        timelineVisible = true;
                    }
                } else {
                    // Oculta sin animacion para evitar flicker
                    item.classList.add('project-hidden');
                }
            });

            // Muestra u oculta el contenedor de timeline completo
            if (timelineWrap) {
                if (filter === 'all' || timelineVisible) {
                    timelineWrap.classList.remove('project-hidden');
                } else {
                    timelineWrap.classList.add('project-hidden');
                }
            }
        });
    });
}

/* ================================================================
    6. MENU MOVIL
    ================================================================ */
function initMobileMenu() {
    const hamburger = document.getElementById('nav-hamburger');
    const menu      = document.getElementById('mobile-menu');
    const closeBtn  = document.getElementById('mobile-menu-close');

    hamburger.addEventListener('click', function() {
        menu.classList.add('open');
        hamburger.setAttribute('aria-expanded', 'true');
        // Anima las lineas del hamburger
        anime({
            targets: hamburger.querySelectorAll('span'),
            opacity: [1, 0],
            duration: 200,
            easing: 'easeOutQuad'
        });
        // Anima la entrada del menu
        anime({
            targets: menu.querySelectorAll('.nav__mobile-link'),
            opacity: [0, 1],
            translateY: [30, 0],
            delay: anime.stagger(80, { start: 100 }),
            duration: 400,
            easing: 'easeOutCubic'
        });
    });

    closeBtn.addEventListener('click', closeMobileMenu);

    // Cierra al presionar Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && menu.classList.contains('open')) {
            closeMobileMenu();
        }
    });
}

function closeMobileMenu() {
    const menu     = document.getElementById('mobile-menu');
    const hamburger = document.getElementById('nav-hamburger');

    menu.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');

    // Restaura las lineas del hamburger
    anime({
        targets: hamburger.querySelectorAll('span'),
        opacity: [0, 1],
        duration: 200,
        easing: 'easeOutQuad'
    });
}

/* ================================================================
    7. ANIMACION POR INTERSECCION (IntersectionObserver)
    Revela elementos .anim-ready al hacer scroll dentro de una pagina
    ================================================================ */
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.target.classList.contains('anim-ready')) {
                anime({
                    targets: entry.target,
                    opacity: [0, 1],
                    translateY: [20, 0],
                    duration: 500,
                    easing: 'easeOutCubic',
                    complete: function() {
                        entry.target.classList.remove('anim-ready');
                        observer.unobserve(entry.target);
                    }
                });
            }
        });
    }, {
        threshold: 0.1,    // Activa cuando el 10% del elemento es visible
        rootMargin: '0px'
    });

    // Observa todos los elementos animables en la pagina actual
    document.querySelectorAll('.anim-ready').forEach(el => {
        observer.observe(el);
    });
}

/* ================================================================
    8. SOPORTE DE SWIPE EN DISPOSITIVOS TACTILES
    Detecta swipe horizontal para cambiar de pagina en moviles
    ================================================================ */
function initSwipeNavigation() {
    let touchStartX = 0;
    let touchEndX   = 0;
    const MIN_SWIPE_DISTANCE = 60; // Pixeles minimos para considerar swipe

    document.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    document.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        const delta = touchStartX - touchEndX;

        if (Math.abs(delta) >= MIN_SWIPE_DISTANCE) {
            if (delta > 0) {
                // Swipe hacia la izquierda: siguiente pagina
                goToPage(state.currentPage + 1);
            } else {
                // Swipe hacia la derecha: pagina anterior
                goToPage(state.currentPage - 1);
            }
        }
    }, { passive: true });
}

/* ================================================================
    EVENTOS DE TECLADO para accesibilidad en nav links
    ================================================================ */
function initKeyboardNav() {
    document.querySelectorAll('.nav__link').forEach((link, index) => {
        link.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                goToPage(index);
            }
        });
    });

    // Flechas del teclado para navegar entre paginas
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') goToPage(state.currentPage + 1);
        if (e.key === 'ArrowLeft')  goToPage(state.currentPage - 1);
    });
}

/* ================================================================
    BOTONES DE FLECHA
    ================================================================ */
function initArrowButtons() {
    document.getElementById('arrow-prev').addEventListener('click', function() {
        goToPage(state.currentPage - 1);
    });
    document.getElementById('arrow-next').addEventListener('click', function() {
        goToPage(state.currentPage + 1);
    });
}

/* ================================================================
    9. INICIALIZACION
    Se ejecuta cuando el DOM esta completamente cargado
    ================================================================ */
document.addEventListener('DOMContentLoaded', function() {
    // Inicializa todos los modulos
    initProjectFilters();
    initMobileMenu();
    initScrollAnimations();
    initSwipeNavigation();
    initKeyboardNav();
    initArrowButtons();

    // Estado inicial correcto de las flechas
    updateArrows(0);

    // Inicia el preloader (primer evento visual del usuario)
    runPreloader();
});
