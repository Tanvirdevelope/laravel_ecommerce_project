<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin Products</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/logo.png" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/products')}}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{url('/account')}}">Account</a></li>
                </ul>
            </nav>
            <a href="{{url('/cart')}}"><img src="{{asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <!-- Account Page -->
    <div class="account-page">
    
     @if(session()->has('success'))
     <div class="alert alert-success">
        {{ session()->get('success') }}
     </div>
     @endif
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="row">
                        @foreach($returnProducts as $product)
                            <div class="col-xs-4" style="padding: 15px;">
                                <img src="{{asset($product['image'])}}" height="180" width="150">
                                <h4>{{$product['name']}}</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p>{{$product['price']}}</p>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-xs-4">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span >Add Product</span>  
                            <hr id="product">
                        </div>
                        

                        <form id="AddForm" method="POST" action="/products" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Product Name">
                            <input type="text" name="price" placeholder="Price">
                            <input type="text" name="amount" placeholder="Pis">
                            <input type="file" name="images[]" multiple  >
                            <button type="submit" class="btn">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2023</p>
        </div>
    </div>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js" integrity="sha512-5NqgLBAYtvRsyAzAvEBWhaW+NoB+vARl6QiA02AFMhCWvPpi7RWResDcTGYvQtzsHVCfiUhwvsijP+3ixUk1xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

    <!-- Toggle Form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translateX(100px)";

        }
        function login() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translate(0px)";

        }
    </script>

</body>

</html>