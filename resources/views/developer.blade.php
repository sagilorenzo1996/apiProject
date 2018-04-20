<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Tracking System</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <style>
        body{
            background-color:#e5e5e5;
        }
    </style>
    <body>
        <h2 style="text-align: center">Welcome
            <small class="text-muted">Tracking System 1.0</small>
        </h2>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h4 style="text-align: center" class="text-primary"> Add Task</h4>
                    <hr/>
                        <form id="addTaskForm">
                            <div class="form-group col-sm-6">
                                <label for="projectId">Project ID</label>
                                <select class="form-control" id="projectId" name="projectId">
                                    @foreach($project as $projects)
                                        <option>{{$projects->id}}</option>                            
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="Date">Date</label>
                                <input class="form-control" type="date" name="date" id="Date" required />
                            </div>  
                            <div class="form-group col-sm-6">
                                <label for="hours">Hours</label>
                                <input class="form-control" type="number" name="hours" id="hours" required />
                            </div>  
                            <div class="form-group col-sm-6">
                                <label for="overtime">Overtime Hours</label>
                                <input class="form-control" type="number" name="overtime" id="overtime" required />
                            </div> 
                            <div class="form-group col-sm-12">
                                <label for="description">description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary col-sm-4">Add Task</button>
                                <span class="col-sm-4"></span>
                                <span id="taskaddnotice" class="badge badge-danger col-sm-4"></span>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function(){
                                $('#addTaskForm').on('submit', function(e){
                                    $("#taskaddnotice").html("adding task");
                                    e.preventDefault();
                                    $.post('http://localhost:8000/api/tasks',
                                        {
                                            developerId: {{$developerId}},
                                            projectId: $('#projectId').val(),
                                            hours: $('#hours').val(),
                                            overtime: $('#overtime').val(),
                                            description: $('#description').val(), 
                                            date:$('#Date').val(),                                           
                                        },function(data,status){
                                            console.log('Data: ' + data.hours + 'Status: ' + status);
                                            document.getElementById('addTaskForm').reset();
                                            $("#taskaddnotice").html("Task added successfully");
                                            });
                                            });
                            });
                        </script>
                </div>
                <div class="col-sm-6">
                 <h4 style="text-align: center" class="text-primary"> Add Task</h4>
                    <hr/>
                        <form id="updateTaskForm">
                            <div class="form-group col-sm-6">
                                <label for="updateprojectId">Project ID</label>
                                <select class="form-control" id="updateprojectId" name="projectId">
                                    @foreach($project as $projects)
                                        <option>{{$projects->id}}</option>                            
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="updateDate">Date</label>
                                <input class="form-control" type="date" name="date" id="updateDate" required />
                            </div>  
                            <div class="form-group col-sm-6">
                                <label for="updatehours">Hours</label>
                                <input class="form-control" type="number" name="hours" id="updatehours" required />
                            </div>  
                            <div class="form-group col-sm-6">
                                <label for="updateovertime">Overtime Hours</label>
                                <input class="form-control" type="number" name="overtime" id="updateovertime" required />
                            </div> 
                            <div class="form-group col-sm-12">
                                <label for="updatedescription">description</label>
                                <textarea class="form-control" id="updatedescription" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary col-sm-4">Add Task</button>
                                <span class="col-sm-4"></span>
                                <span id="taskaddnotice" class="badge badge-danger col-sm-4"></span>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function(){
                                $('#updateTaskForm').on('submit', function(e){
                                    $("#taskaddnotice").html("updating task");
                                    e.preventDefault();
                                    $.post('http://localhost:8000/api/tasks',
                                        {
                                            projectId: $('#projectId').val(),
                                            hours: $('#hours').val(),
                                            overtime: $('#overtime').val(),
                                            description: $('#description').val(), 
                                            date:$('#Date').val(),                                           
                                        },function(data,status){
                                            console.log('Data: ' + data.hours + 'Status: ' + status);
                                            document.getElementById('addTaskForm').reset();
                                            $("#taskaddnotice").html("Task added successfully");
                                            });
                                            });
                            });
                        </script>
                </div> 
                <div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Description</th>
                            <th>Project id</th>
                            <th>Project Name</th>
                            <th>Date</th>
                            <th>Hours</th>
                            <th>Overtime Hours</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($task as $tasks)
                            <tr id="{{$tasks->id}}row">
                                <td class="col-sm-1">{{$tasks->id}}</td>
                                <td class="col-sm-2">{{$tasks->description}}</td>
                                <td class="col-sm-1">{{$tasks->projectId}}</td>
                                <td class="col-sm-2">{{$tasks->name}}</td>
                                <td class="col-sm-2">{{$tasks->date}}</td>
                                <td class="col-sm-1">{{$tasks->hours}}</td>
                                <td class="col-sm-1">{{$tasks->overtime}}</td>
                                <td class="col-sm-1">
                                    <button type="button" class="btn btn-info btn-sm">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                </td>
                                <td class="col-sm-1">
                                    <button type="button" class="btn btn-danger btn-sm"
                                    onclick="
                                     $.ajax({
                                         url:'http://localhost:8000/api/tasks/{{$tasks->id}}',
                                         type: 'DELETE',
                                         success:function(data,status){
                                             console.log('Data: ' + data + 'Status: ' + status);$('#{{$tasks->id}}row').hide();
                                             }
                                             });
                                    ">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>