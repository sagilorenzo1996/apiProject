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
                <div class="row">
                <div class="col-sm-6 form-group">
                    <h4>Developer</h4>
                    <form id="developerLoginForm">
                        <input type="text" id="developerid" name="id" placeholder="Developer ID" class="form-control"/>
                        <br/>
                        <input type="password" id="developerpassword" name="password" placeholder="Password" class="form-control"/>
                        <br/>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <br/>
                        <span id="developerLoginError" class="badge badge-danger"></span>
                    </form>
                </div>
                @php
                $id=0;
                @endphp
    <script>
        $(document).ready(function(){
            $('#developerLoginForm').on('submit', function(e){
                e.preventDefault();
                 $.post('http://localhost:8000/api/developer',
                    {
                        id: $('#developerid').val(),
                        password: $('#developerpassword').val()
                    },function(data,status){
                        console.log('Data: ' + data + 'Status: ' + status);
                        var id=$('#developerid').val();
                        var url='/'+id;
                        if(data=="fail")
                            $("#developerLoginError").html("Incorrect credentials");
                        else
                            window.location.href=url;
                        });
                        });
        });
    </script>

                <div class="col-sm-6">
                    <h4>Manager</h4>
                    <form id="managerLoginForm">
                        <input type="text" name="id" placeholder="Manager ID" id="managerId" class="form-control"/>
                        <br/>
                        <input type="password" name="password" placeholder="Password" id="managerPassword" class="form-control"/>
                        <br/>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <br/>
                        <span id="managerLoginError" class="badge badge-danger"></span>
                    </form>
                </div>
            </div> 
        </div>

        <script>
        $(document).ready(function(){
            $('#managerLoginForm').on('submit', function(e){
                e.preventDefault();
                 $.post('http://localhost:8000/api/manager',
                    {
                        id: $('#managerId').val(),
                        password: $('#managerPassword').val()
                    },function(data,status){
                        console.log('Data: ' + data + 'Status: ' + status);
                        var managerid=$('#managerId').val();
                        var url='/manager/'+managerid;
                        if(data=="fail")
                            $("#managerLoginError").html("Incorrect credentials");
                        else
                            window.location.href=url;
                        });
                        });
        });
    </script>
 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>