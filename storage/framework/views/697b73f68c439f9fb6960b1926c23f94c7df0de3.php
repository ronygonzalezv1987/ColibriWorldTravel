<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(isset($title) ? $title : 'AmericaKingStones'); ?></title>
    <meta name="description"
        content="<?php echo e(isset($description) ? $description : 'Retail granite,marble and quartz'); ?>">
    <meta name="keyword"
        content="<?php echo e(isset($keywords) ? $keywords : 'americakingstones'); ?>">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    
        <!-- Styles -->
   <?php if(parse_url(config('app.url'), PHP_URL_SCHEME) === 'https'): ?>
        <link href="<?php echo e(secure_asset('css/frontend/app.css')); ?>" rel="stylesheet">
            <script src="<?php echo e(secure_asset('js/frontend/app.js')); ?>" defer></script>
        <?php else: ?>
        <link href="<?php echo e(asset('css/frontend/app.css')); ?>" rel="stylesheet">
            <script src="<?php echo e(asset('js/frontend/app.js')); ?>" defer></script>
        <?php endif; ?>;
    </head>

<body>
    <div id="app">
        <?php echo $__env->make('frontend.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid full-height main-content">
            <div class="row full-height">
                <div class="col-12">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>

        <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</body>

</html>
<?php /**PATH D:\Github_Projects\ColibriWorldTravel\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>