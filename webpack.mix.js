let mix = require('laravel-mix');

mix
    .options({processCssUrls: false})
    .copy('resources/assets/lib/selectFx/*', 'public/lib/selectFx')
    .copy('resources/assets/lib/datatables', 'public/lib/datatables')
    .copy('resources/assets/lib/simditor-2.3.28', 'public/lib/simditor-2.3.28')
    .copy('resources/assets/img/site/brand/*', 'public/img/site/brand')
    .copy('resources/assets/img/site/images/*', 'public/img/site/images')
    .js('resources/assets/js/admin/index.js', 'public/js/admin')
    .js('resources/assets/js/site/app.js', 'public/js/site')
    .less('resources/assets/less/content-adm/style_admin.less', 'public/css/admin')
    .less('resources/assets/less/site/style.less', 'public/css/site')
    .browserSync('http://127.0.0.1:8000');