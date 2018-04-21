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
                <div class="col-sm-8 form-group">
                  jhabvgsdj
                </div>
                <div class="col-sm-4">
                    <form id="getDeveloperDetailsForm">
                        <div class="form-group col-sm-12">
                            <label for="developerId">Enter Developer Id</label>
                            <input class="form-control" type="text" name="id" id="developerId" required />
                        </div>  
                        <br>
                        <span id="getDeveloperDetails" class="badge badge-danger col-sm-4"></span>
                    </form>
                </div>
            <script>
            $(document).ready(function(){
                                $('#developerId').on('input', function(e){
                                    $("#getDeveloperDetails").html("Fetching Data");
                                    e.preventDefault();
                                    $.ajax({
                                         url:'http://localhost:8000/api/developers/'+$('#developerId').val(),
                                         type: 'GET',
                                         success:function(data,status){
                                             console.log('Data: ' + data + 'Status: ' + status);
                                             $("#getDeveloperDetails").html("Developer Found");
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