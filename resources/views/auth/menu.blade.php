<!DOCTYPE html>
<html>
    <head>
        <meta name="_token" content="{{ csrf_token() }}">
        <title>Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link href="css/sea.css" rel="stylesheet">
    </head>
    <style>
        #search{
            width: 400px;
            border: 1px solid #b1154a;
        }
    </style>
        <body>
            <div class="container">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Tìm Kiếm </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" class="form-controller" id="search" name="search" placeholder="Tìm kiếm "></input>
                            </div>
                            <div class="col-md-4">
                                <label for="amount" style="font-weight: bold;">Sắp xếp theo</label>
                                <form>
                                    @csrf
                                    <select name="sort" id="sort" class="form-control">
                                        <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>
                                        <option value="{{Request::url()}}?sort_by=kytu_az">--Lọc theo tên A đến Z-- </option>
                                        <option value="{{Request::url()}}?sort_by=kytu_za">--Lọc theo tên Z đến A-- </option>
                                    </select>
                                </form>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Password</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($test)
                                    @foreach ($test as $test)
                                        <tr>
                                            <td>{{$test->id}}</td>
                                            <td>{{$test->name}}</td>
                                            <td>{{$test->email}}</td>
                                            <td>{{$test->phone}}</td>
                                            <td>{{$test->password}}</td>
                                            <td>{{$test->created_at}}</td>
                                            
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

        <script>
            $(document).ready(function(){
               $(#sort).on('change',function(){
                   console.log('444444444444444444')
                 var url = $(this).val();
                 if(url){
                     window.location = url;
                 }
                 return false;
               });
            });
        </script>
    </body>
</html>