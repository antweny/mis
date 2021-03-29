<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Blade::if('permission',function ($expression) {
            if (auth()->user()->hasPermissionTo($expression)) {
                return true;
            }
            return false;
/*            echo '<?php if ( ?>';*/
//                 return ;
/*            echo '<?php ) { ?>';*/

/*            echo '<?php } ?>';*/
        });

//        Blade::directive('endpermission',function ($expression) {
/*            echo "<?php } ?>" ;*/
//        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
