

<?php $__env->startSection('title', 'Welcome Page'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Welcome to the Standalone Blade Example!</h2>
    <p>Hello, <?php echo e($name ?? 'Guest'); ?>!</p>

    <?php if($messages): ?>
        <h3>Messages:</h3>
        <ul>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($message); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <p>No messages for you today.</p>
    <?php endif; ?>

    <p>This page was rendered using the Blade templating engine outside of Laravel.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elixer_of_life\app\views/welcome.blade.php ENDPATH**/ ?>