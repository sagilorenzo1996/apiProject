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
                <div class="col-sm-8">
                    <span id="testfield"></span>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Project</th>
                            <th>Developer</th>
                            <th>Hours</th>
                            <th>Overtime</th>
                            <th>Contribution</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-sm-1">hjhjhj</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <form id="getDeveloperDetailsForm">
                        <div class="form-group col-sm-12">
                            <label for="developerId">Enter Developer Id</label>
                            <input class="form-control" type="number" name="id" id="developerId" required autocomplete="off" />
                        </div>  
                        <br>
                        <span id="getDeveloperDetails" class="badge badge-danger col-sm-6"></span>
                    </form>
                    <div class="form-group col-sm-9">
                        <label for="developerUsername">Username</label>
                        <input class="form-control" type="text" id="developerUsername" disabled/>
                    </div>  
                    <div class="form-group col-sm-3">
                        <label for="devId">ID</label>
                        <input class="form-control" type="text" id="devId" disabled/>
                    </div>  
                    <div class="form-group col-sm-12">
                        <label for="developerFname">Developer First Name</label>
                        <input class="form-control" type="text" id="developerFname" disabled/>
                    </div>  
                    <div class="form-group col-sm-12">
                        <label for="developerLname">Developer Last Name</label>
                        <input class="form-control" type="text" id="developerLname" disabled/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="developerRole">Role</label>
                        <input class="form-control" type="text" id="developerRole" disabled/>
                    </div>
                </div>
            <script>
            $(document).ready(function(){
                                $.ajax({
                                         url:'http://localhost:8000/api/projects',
                                         type: 'GET',
                                         data:{
                                            id:{{$manager->id}}
                                         },
                                         success:function(data,status){
                                            console.log('Data: ' + data[0].name + 'Status: ' + status);  
                                                                    
                                             }
                                             });

                                $('#developerId').on('input', function(e){
                                    $("#getDeveloperDetails").html("Fetching Data");
                                    e.preventDefault();
                                    $.ajax({
                                         url:'http://localhost:8000/api/developers/'+$('#developerId').val(),
                                         type: 'GET',
                                         success:function(data,status){
                                             if(status!='Not Found'){
                                             console.log('Data: ' + data + 'Status: ' + status);
                                             $("#developerUsername").val(data.username);
                                             $("#devId").val(data.id);
                                             $("#developerFname").val(data.firstName);    
                                             $("#developerLname").val(data.lastName);     
                                             $("#developerRole").val(data.role);     
                                             $("#getDeveloperDetails").html("Developer Found");
                                             }
                                             else{
                                                 $("#getDeveloperDetails").html("Developer Not Found");
                                             }                                                                        
                                             }
                                             });
                                            });
                            });
            </script>

            </div> 
        </div>
 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>