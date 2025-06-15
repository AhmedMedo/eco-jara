<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Ecojarah')); ?> - Buyer Dashboard</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/buyer-app.js']); ?>
</head>
<body class="bg-gray-50">
    <div id="buyer-app"></div>
</body>
</html><?php /**PATH /home/ahmedalaa/Desktop/eco-jara/project-bolt-sb1-rq8cqfod/project/resources/views/buyer.blade.php ENDPATH**/ ?>