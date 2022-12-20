<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Mengatur Hak Akses untuk Admin
        Gate::define('admin-only', function ($user) {
            return $user->level == 'admin';
        });

        // Mengatur Hak Akses untuk Guru
        Gate::define('guru-only', function ($user) {
            return $user->level == 'guru';
        });

        // Mengatur Hak Akses untuk Bendahara
        Gate::define('bendahara-only', function ($user) {
            return $user->level == 'bendahara';
        });

        // Mengatur Hak Akses untuk Kepala Sekolah
        Gate::define('kepsek-only', function ($user) {
            return $user->level == 'kepsek';
        });

        // Mengatur Hak Akses untuk Siswa
        Gate::define('siswa-only', function ($user) {
            return $user->level == 'siswa';
        });

    }
}
