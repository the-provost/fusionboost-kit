<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class ViteManifestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('vite-manifest', function () {
            $manifestPaths = [
                // Local development paths
                public_path('build/.vite/manifest.json'),
                base_path('public/build/.vite/manifest.json'),

                // Production paths
                public_path('build/manifest.json'),
                base_path('public/build/manifest.json'),
            ];

            foreach ($manifestPaths as $path) {
                if (file_exists($path)) {
                    return json_decode(file_get_contents($path), true);
                }
            }

            return [];
        });
    }
}
