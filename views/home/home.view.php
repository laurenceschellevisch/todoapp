<?php
/**
 * Created by PhpStorm.
 * User: Laurence
 * Date: 10/30/2017
 * Time: 17:37
 */

require 'views/partials/head.php';
?>
<div class="content-wrapper center">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a>Tables</a>
            </li>
            <li class="breadcrumb-item active"><?=$_SESSION['account']['name']?></li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tasks</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Todo</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $tasks=App::get('taskdb')->getTask();
                                foreach ($tasks as $task):
                            ?>
                            <tr class="test" id="rowid<?=$task['id'];?>">
                                <td name="id"><?=$task['id'];?></td>
                                <td name="todoname"><?=$task['todo'];?></td>
                                <td name="todostatus"><?=$task['status'];?></td>
                                <td name="tododesc"><?=$task['description'];?></td>
                                <td><a data-toggle="modal" data-target="#modal" id="modalopenbtn" onclick="callmodal(<?=$task['id'];?>)">
                                        <i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                                    <a data-toggle="modal" data-target="#modal" onclick="deleteitemmodal(<?=$task['id'];?>)">
                                        <i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <br>
                    <button type="button" class="btn btn-primary" style="float:left;"
                            data-toggle="modal" data-target="#modal" onclick="addTask()">Add new task</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <div style="top: 10%;" class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodalbtn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="appendoptions">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closemodalbtn">Close</button>
                    <div id="appenddelete">
                    <input type="submit" class="btn btn-primary" value="Update item" form="removestuff" id="submitmodal">
                </div>
            </div>
        </div>
    </div>
            <?php require('views/partials/loadjs.php'); ?>