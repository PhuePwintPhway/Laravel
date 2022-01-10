<!-- Extends template page -->
@extends('layout.app')

<!-- Specify content -->
@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- Display Validation Errors -->

        @include('common.errors')

        <!-- New Task Form -->
        <form action="/tasks" method="POST" class="form-horizontal">
            {{ csrf_field() }}

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

    @if (count(array($tasks)) > 0)

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

                        @foreach ($tasks as $task)

                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="/tasks/{{ $task->id }}" method="GET">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}

                                        <button class="btn btn-danger" type="submit">Delete Task</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endif
