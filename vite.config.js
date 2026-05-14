/**
 * vite.config.js
 *
 * Configuracion de Vite para el portafolio Laravel.
 * El plugin laravel-vite-plugin maneja automaticamente:
 *  - Hot Module Replacement (HMR) en desarrollo
 *  - Cache-busting con hash en produccion
 *  - Inyeccion del tag correcto al usar @vite() en Blade
 *
 * Comandos:
 *  - Desarrollo con HMR:  npm run dev
 *  - Build de produccion: npm run build
 *
 * El build genera los archivos en public/build/
 * (no editar esa carpeta manualmente, Vite la gestiona)
 */

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            /**
             * Archivos de entrada que Vite debe procesar.
             * Agrega aqui nuevos archivos CSS o JS si los creas.
             *
             * Por ejemplo, si en el futuro separas el JS del portafolio:
             *   'resources/js/portfolio.js'
             */
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],

            /**
             * Recarga automatica del navegador cuando cambian
             * los archivos Blade. Muy util en desarrollo.
             */
            refresh: true,
        }),
    ],

    /**
     * Configuracion del servidor de desarrollo.
     * Si tu entorno usa un puerto diferente, ajusta 'port'.
     */
    server: {
        host: 'localhost',
        port: 5173,
    },
});
