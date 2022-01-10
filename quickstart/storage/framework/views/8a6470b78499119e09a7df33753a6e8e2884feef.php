<!-- Extends template page -->


<!-- Specify content -->
<?php $__env->startSection('content'); ?>

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- Display Validation Errors -->

        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- New Task Form -->
        <form action="/tasks" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>


            <!-- Task Name -->
            <!-- Label -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label"><h1>Task</h1></label>
            </div>
            <!-- Input Box -->
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>

        </form>

    </div>

    <!-- TODO: Current Tasks -->

    <?php if(count(array($tasks)) > 0): ?>

        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>Current Tasks</h1>
            </div>

            <div class="panel-body">

                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><?php echo e($task->name); ?></div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="/tasks/<?php echo e($task->id); ?>" method="GET">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                        <button class="btn btn-danger" type="submit">Delete Task</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        </div>

    <?php endif; ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\quickstart\resources\views/tasks/index.blade.php ENDPATH**/ ?>