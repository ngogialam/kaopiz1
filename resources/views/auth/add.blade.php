<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="css/main.css" rel="stylesheet">
<script type="text/javascript" src="jquery/jquery.js"></script>


@if (session('message'))
    <span class="aler alert-danger">
        <strong>{{ session('message') }}</strong>
    </span>
@endif
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>Đăng nhập để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</p>

        </div>
        <div class="col-md-9 register-right">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Xin chào . Mời đăng ký </h3>
                    {{-- @if(count($errors) > 0)
                       <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert">x</button>
                           <ul>
                               @foreach ($errors ->all() as $error)
                           <li>{{$error}}</li>
                               @endforeach
                           </ul>
                       </div>
                    @endif --}}
                    <div class="row register-form">
 {{-- @if($message = Session::get('success'))
 <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
    </div>
 @endif  --}}
                    <form  method="post"  enctype="multipart/form-data" name="myform">
                         {{-- {{csrf_field() }}  --}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            {{-- @method('PATCH')
                            @csrf --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name kkk *" value="" name="name" />

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" value="" id="re_email" name="email"/>
                                </div>
                                <!-- // required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6} -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone *" value="" id="phone"
                                        name="phone" />
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value=""
                                        id="password" name="password" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password *"
                                        value="" name="password_1" />
                                </div>

                            </div>
                            <button type="submit" name="send" class="btn btn-success"> Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function validatEemail() {
        var x = document.myform.email.value;
        var atposition = x.indexOf("@");
        var dotposition = x.lastIndexOf(".");
        if (atposition < 1 || dotposition < (atposition + 2)
                || (dotposition + 2) >= x.length) {
            alert("Please enter a valid e-mail address.");
            return false;
        }
    }
</script>

<!-- Dont forget to include the jQuery library here -->
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

    $("#validate").keyup(function(){

        var email = $("#validate").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#validEmail").css({
                    "background-image": "url('validYes.png')"
                });
            } else {
                $("#validEmail").css({
                    "background-image": "url('validNo.png')"
                });
            }
        } else {
            $("#validEmail").css({
                "background-image": "none"
            });         
        }

    });

});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

</script>


<form id="myform">
    <input name="phone" type="text" />
    <input type="submit" />
</form>
