<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- jQuery UI -->
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
        <!-- Datatables Js-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        
        <!-- @foreach($tasks as $task)
            <?php echo $task->title;?>
        @endforeach -->
        <!-- search box container starts  -->
        <div class="search">
            <h3 class="text-center title-color">Drag and Drop Datatables Using jQuery UI Sortable - Demo </h3>
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody id="tablecontents">
                        @foreach($tasks as $task)
                        <tr class="row1" data-id="{{ $task->id }}">
                        <td>
                            <div style="color:rgb(124,77,255); padding-left: 10px; float: left; font-size: 20px; cursor: pointer;" title="change display order">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                            </div>
                        </td>
                        <td>{{ $task->title }}</td>
                        <td>{{ ($task->status == 1)? "Completed" : "Not Completed" }}</td>
                        <td>{{ date('d-m-Y h:m:s',strtotime($task->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>                  
                    </table>
                </div>
            </div> 
            <hr>
            <h5>Drag and Drop the table rows and <button id="target_btn" class="btn btn-default" onclick="window.location.reload()"><b>REFRESH</b></button> the page to check the Demo. For the complete tutorial of how to make this demo app visit the following <a href="#">Link</a>.</h5> 
        </div>  
    </body>


    <script type="text/javascript">
        $(function () {
            $("#table").DataTable();

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                // var html = document.getElementsByTagName('target_btn')[0].innerHTML;
                var html = document.getElementById('target_btn').innerHTML;

                console.log( html );


                var order = [];
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });


                $.ajax({
                    type: "POST", 
                    // dataType: "text", 
                    url: "{{ url('demos/sortabledatatable') }}",
                    data: {
                        order:html,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });

            }
        });

    </script>
</html>
