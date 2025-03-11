import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import { writeFileSync, mkdirSync, cpSync } from 'fs';

// Function to copy webfonts
function copyFontAwesomeFonts() {
    const srcDir = 'node_modules/@fortawesome/fontawesome-free/webfonts';
    const destDir = 'public/build/assets/webfonts';

    try {
        mkdirSync(destDir, { recursive: true });
        cpSync(srcDir, destDir, { recursive: true });
        console.log('FontAwesome webfonts copied successfully to:', destDir);
    } catch (error) {
        console.error('Error copying webfonts:', error);
    }
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build',
            manifest: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: true,
                    tags: {
                        'img': ['src', 'data-src'],
                        'image': ['xlink:href', 'href'],
                    }
                },
            },
        }),
        {
            name: 'font-awesome-fonts',
            buildStart() {
                copyFontAwesomeFonts();
            }
        }
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            'images': '/resources/js/assets',
            '~': path.resolve(__dirname, 'node_modules'),
            '@popperjs/core': path.resolve(__dirname, 'node_modules/@popperjs/core'),
            'bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            'vue-select': path.resolve(__dirname, 'node_modules/vue-select')
        }
    },
    optimizeDeps: {
        include: ['bootstrap', 'vue-select']
    },
    build: {
        manifest: true,
        outDir: 'public/build',
        assetsDir: 'assets',
        emptyOutDir: true,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return 'vendor';
                    }
                },
                assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.')[1];
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                        return `assets/images/[name]-[hash][extname]`;
                    }
                    if (/css/i.test(extType)) {
                        return `assets/css/[name]-[hash][extname]`;
                    }
                    if (/woff|woff2|eot|ttf|otf/i.test(extType)) {
                        return `assets/webfonts/[name][extname]`;
                    }
                    return `assets/[name]-[hash][extname]`;
                },
                chunkFileNames: 'assets/js/[name]-[hash].js',
                entryFileNames: 'assets/js/[name]-[hash].js',
            }
        },
        chunkSizeWarningLimit: 1000,
    },
    server: {
        fs: {
            allow: [
                'resources',
                'node_modules'
            ]
        },
        cors: {
            origin: [
                'https://pmo.greydesk.in',
                'https://pmo-dot-greydesk.el.r.appspot.com',
                'http://localhost',
            ],
            credentials: true
        }
    }
});
