


<?php $__env->startSection('title', 'Elixir of Life homepage'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST">
                        <h4 class="mb-3">Select the type of work you prefer:</h4>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="work-type[]" value="smart" id="smart_work">
                                    <label class="form-check-label" for="smart_work">Smart Work</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="work-type[]" value="hard" id="hard_work">
                                    <label class="form-check-label" for="hard_work">Hard Work</label>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-3">Select the elixirs that you believe will help you in your journey:</h4>
                        <div class="mb-4">
                            <?php $__currentLoopData = $elixirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elixir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="elixir[]" value="<?php echo e($elixir->getName()); ?>" id="elixir_<?php echo e($elixir->getName()); ?>">
                                    <label class="form-check-label fw-bold" for="elixir_<?php echo e($elixir->getName()); ?>"><?php echo e($elixir->getName()); ?></label>
                                    <div class="form-text"><?php echo e($elixir->getDescription()); ?></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    <div class="elixir-results mt-4">
                        <?php if(isset($result)): ?>
                            <?php if(!empty($result)): ?>
                                <h5>Results:</h5>
                                <ul class="list-group">
                                    <?php $__currentLoopData = (array) $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><?php echo e($message); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-muted">No results to display.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elixer_of_life\app\views/entry.blade.php ENDPATH**/ ?>