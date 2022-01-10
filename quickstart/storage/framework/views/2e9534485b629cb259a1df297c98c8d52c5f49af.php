<!-- Extends template page -->


<!-- Specify content -->
<?php $__env->startSection('content'); ?>

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- Display Validation Errors -->

        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>


            <!-- Task Name -->
            <!-- Label -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
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

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        </div>

    

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\quickstart\resources\views/task/index.blade.php ENDPATH**/ ?>