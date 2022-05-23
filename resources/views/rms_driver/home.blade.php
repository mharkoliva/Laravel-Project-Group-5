<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Qahiri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
    <title>Document</title>
</head>
<body id="body" style="background:linear-gradient(0deg, #ccffffc7, #ccffffc7), {{url('img/logo.jpeg')}}">

                        <?php $account = session('account') ?>
                        <?php $result = session('result') ?>
               
                        @if (session('result'))
                            <body onload="<?php echo $text.'()';?>"></body>
                        @endif
                   
    <div>
        <div class="container-x" id="containers" >       
            <div class="center big-logo">
                <img src="{{url('img/logo.svg')}}" alt="logo" class="dev-logo">
                <div class="description" id="option-bg"><hr class="hr-top">
                    <div id="highlight">
                        <button class="option option-inline" id="register" onclick="register()"><img src="{{url('img/register.png')}}" alt="register" class="register-logo" srcset=""><p>Register</p></button>
                        <button class="option option-inline" id="compute" onclick="compute()"><img src="{{url('img/calculate.png')}}" alt="compute" class="compute-logo" srcset=""><p>Compute</p></button>
                    </div>
                    <div id="highlight2">
                        <button class="option option-inline" id="compute" onclick="developer()"><img src="{{url('img/dev.png')}}" alt="developers" class="compute-logo" srcset=""><p>Developers</p></button>
                        <button class="option option-inline" id="compute" onclick="aboutus()"><img src="{{url('img/abtus.png')}}" alt="compute" class="compute-logo" srcset=""><p>About Us</p></button>
                    </div>
                    <div id="highlight3">
                        <button class="option option-inline" id="compute" onclick="contact()"><img src="{{url('img/cntct.png')}}" alt="compute" class="compute-logo" srcset=""><p>Contact</p></button>
                        <button class="option option-inline" id="compute" onclick="news()"><img src="{{url('img/newss.svg')}}" alt="" class="compute-logo" srcset=""><p>News</p></button>
                    </div>
                    <a href="{{url('/logout')}}" style="text-decoration: none;"><button class="option" id="logout"><img src="{{url('img/logouut.png')}}" alt="logout" class="logout-logo" srcset=""><p>Logout</p></button></a>
                    <footer>
                        <p style="margin: 1rem 0;">Help yourself be productive and efficient at all times.</p>
                        <hr>
                        <p>&copy; 2022 ProjectCom</p>
                    </footer>
                </div>
            </div>
        </div>
        <div class="container-y" id="containers">
            <div class="output" id="output"> <!-- Start Here -->
                <div class="output-container">
                    <p>
                    <?php $account = session('account') ?>
                    <?php $result1 = session('result') ?>
                    @if ($result1 == TRUE)
        @foreach ($result1 as $resultt)
            <?php $array[] = $resultt; ?>
        @endforeach 
            Hello Driver <b>{{ $account }}</b>, your computed revenue from <b><?php echo $array[0] ?></b> to <b><?php echo $array[1] ?></b> is <h1><br>&#8369; <?php echo $array[2] ?>.00</h1><br>Calculated with the following factors:</p>
                    <p>Transportation Rate: <h3>&#8369;<?php echo $array[3] ?>.00/person</h3></p>
                    <p>Total Passenger Count: <h3><?php echo $array[4] ?></h3></p>
                    <p>Total Number of Trip: <h3><?php echo $array[5] ?></h3></p>
                    <h2>CHEERS!</h2>
        @endif
                </div>
            </div> <!-- End Here -->
            <div class="function-content">
                <div class="input-div ph-color">
                    <div id="display" class="person">
                        <p class="">choose your option</p>          
                    </div>
                    <form method="POST" action="register">
                        @csrf
                    <div class="functions">                        
                         <div id="reg" class="person">
                            <div id="overlay"></div>
                            <h1 class="">REGISTER</h1>
                            <input class="input-from" type="text" name="id_num" id="id_num" placeholder="identification number">
                            <input type="hidden" name="id_no" id="id_no" value="{{session()->get('account', 'id_no')}}">
                            <input class="btn2" type="button" required name="submit_register" value="register" onclick="checkRegister()">                         
                        </div>
                        
                    </div>                    
                        <div class="padding-register">
                            <div id="confirm-register">
                                <div class="block">
                                    <p class="block">Are you sure you want to continue register on the ID number, <b id="id_numm"></b></p>
                                    <button type="button" class="confirmation" onclick="cancel()">cancel</button>
                                        <input class="confirmation" type="submit" value="confirm">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="compute">
                        @csrf
                    <div class="functions">
                        <div id="comp" class="person">
                            <div id="overlay2"></div>
                            <h1 class="">COMPUTE</h1>
                            <div class="inline">
                                <h5 class="placeholder">from:</h5>
                                <input class="input-from" type="date" placeholder="start" id="startDate" name="startDate">
                            </div><br>
                            <div class="inline">
                                <h5 class="placeholder">until:</h5>
                                <input class="input-from" type="date" placeholder="end" id="endDate" name="endDate">
                            </div>                                    
                            <input type="hidden" name="id_no" id="id_no" value="{{session()->get('account', 'id_no')}}">
                            <input class="btn2" type="button" value="compute" onclick="submit_compute()">                            
                        </div>  
                        <div class="padding_compute">
                            <div id="confirm-compute">
                                <div class="block">
                                    <p class="block">Are you sure you want to continue the computation?</p>            
                                    <button type="button" class="confirmation" onclick="cancel()">cancel</button>
                                    <input class="confirmation" type="submit" value="confirm">                    
                                </div>
                            </div>
                        </div>                           
                    </div>
                    </form>                    
                    <div class="functions">
                        <div id="dev" class="person">
                            <div class="container" id="containers">
                                <div class="content">
                                    <div class="button-box">
                                        <div id="button"></div>
                                        <button type="button" class="btn" onclick="oliva()"><img class="developer" src="{{url('img/hernanie.png')}}" alt=""></button>
                                        <button type="button" class="btn" onclick="penones()"><img class="developer" src="{{url('img/teddy.png')}}" alt=""></button>
                                        <button type="button" class="btn" onclick="morales()"><img class="developer" src="{{url('img/jericho.png')}}" alt=""></button>
                                        <button type="button" class="btn" onclick="trinidad()"><img class="developer" src="{{url('img/kervin.png')}}" alt=""></button>
                                    </div>
                                    <div id="oliva" class="person"> 
                                        <h2>Hernanie V. Morales</h2>
                                        <h4 style="display: inline-block;">Status:</h4><p style="display: inline-block; text-indent: 5px;">System Development Assistant</p>
                                        
                                        <p><br>An aspiring professional Information Technology literate from the Camarines Sur Polytechnic Colleges. One of the developers of the Revenue Monitoring System that can store and compute potential revenues for drivers in the Iriga City Van Terminal, with the intent to help users and provide an overall local transportation community-based advantages in Iriga City, and potentially other remote locations as well in the near future. As a developer, I hereby announce the undertaking of making a better future in the face of technology by following this goal: to use and develop my technological prowess in a way that will not harm, expose, and take advantage of others, whether it be in the means of their identity, reputation, and other private information over the network.</p>
                                    </div>
                                    <div id="penones" class="person">
                                        <h2>Mhark Teddy Ll. Oliva</h2>
                                        <h4 style="display: inline-block;">Status:</h4><p style="display: inline-block; text-indent: 5px;">Front End Developer</p>
                    
                                        <p><br>An aspiring professional Information Technology literate from the Camarines Sur Polytechnic Colleges. One of the developers of the Revenue Monitoring System that can store and compute potential revenues for drivers in the Iriga City Van Terminal, with the intent to help users and provide an overall local transportation community-based advantages in Iriga City, and potentially other remote locations as well in the near future. As a developer, I hereby announce the undertaking of making a better future in the face of technology by following this goal: to use and develop my technological prowess in a way that will not harm, expose, and take advantage of others, whether it be in the means of their identity, reputation, and other private information over the network.</p>
                                    </div>
                                    <div id="morales" class="person">
                                        <h2>Jericho C. Pe&#241;ones</h2>
                                        <h4 style="display: inline-block;">Status:</h4><p style="display: inline-block; text-indent: 5px;">Back End Developer</p>
                    
                                        <p><br>An aspiring professional Information Technology literate from the Camarines Sur Polytechnic Colleges. One of the developers of the Revenue Monitoring System that can store and compute potential revenues for drivers in the Iriga City Van Terminal, with the intent to help users and provide an overall local transportation community-based advantages in Iriga City, and potentially other remote locations as well in the near future. As a developer, I hereby announce the undertaking of making a better future in the face of technology by following this goal: to use and develop my technological prowess in a way that will not harm, expose, and take advantage of others, whether it be in the means of their identity, reputation, and other private information over the network.</p>
                                    </div>
                                    <div id="trinidad" class="person">
                                        <h2>Kervin Karl M. Trinidad</h2>
                                        <h4 style="display: inline-block;">Status:</h4><p style="display: inline-block; text-indent: 5px;">System Development Assistant</p>
                                        <p><br>An aspiring professional Information Technology literate from the Camarines Sur Polytechnic Colleges. One of the developers of the Revenue Monitoring System that can store and compute potential revenues for drivers in the Iriga City Van Terminal, with the intent to help users and provide an overall local transportation community-based advantages in Iriga City, and potentially other remote locations as well in the near future. As a developer, I hereby announce the undertaking of making a better future in the face of technology by following this goal: to use and develop my technological prowess in a way that will not harm, expose, and take advantage of others, whether it be in the means of their identity, reputation, and other private information over the network.</p>
                                    </div>            
                                </div>
                            </div>                      
                        </div>                              
                    </div>         
                    <div class="functions">
                        <div id="abtus" class="person">
                            <div class="emptyPage abt" id="containers">
                                <div class="logo-div2-h2">
                                    <h2>ABOUT US</h2>
                                </div>
                                <div class="description" id="option-bg-news">
                                    <p style="margin-top: 2rem;">To accomodate and support revenue monitoring and processing, we developed this system, to objectify helping and assisting drivers from the Iriga City Van Terminal and to promote productivity, easiness, and efficiency in computing and monitoring the day-to-day revenue of each individual in the given organization. We present, the Revenue Monitoring System, original to us, the aspiring developers from the <b>Camarines Sur Polytechnic Colleges</b>.</p><br>
                                    <footer>
                                        <hr>
                                        <p>&copy; ProjectCom</p>
                                    </footer>
                                </div>
                            </div>                  
                        </div>                                          
                    </div>
                    <div class="functions">
                        <div id="ctct" class="person">
                            <div class="logo-div2-h2">
                                <h2>CONTACT</h2>
                                <p>For inquiries, concerns, and feedbacks, you can reach our team via our customer care</p>
                            </div>
                            <div class="sbs">
                                <div class="basic-info">
                                    <div class="address">
                                        <h2>Our Address</h2>
                                        <p>247, Tigasin Street, Malala, Iriga City, 4431<br>Camarines Sur, Philippines</p>
                                    </div>
                                    <div class="category">
                                        <div class="email">
                                            <h2>Email Us</h2>
                                            <p>projectcom@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="category">
                                        <div class="phone">
                                            <h2>Call Us</h2>
                                            <p>+639125643889</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-form">
                                    <form method="POST" action="contact" class="form">
                                        @csrf
                                        <input type="text" name="name" placeholder="Your Name" required>
                                        <input type="text" name="email" placeholder="Your Email" required>
                                        <div class="form137">
                                            <input type="text" name="subject" placeholder="Subject" required>
                                            <textarea type="text" name="message" class="message" placeholder="Message" required></textarea>
                                        </div>
                                        <input type="submit" name="submit" value="Send Message" class="send-message" placeholder="Send Message">
                                    </form>
                                </div>
                            </div>                  
                        </div>                                          
                    </div>
                    <div class="functions">
                        <div id="news" class="person">
                            <div class="emptyPage" id="containers">
                                <div class="logo-div2-h2">
                                    <h2>NEWS</h2>
                                </div>
                                <div class="description" id="option-bg-news">
                                   <p style="margin-top: 2rem;"><b>05/21/22.</b> The project development has come to an end.</p><br>
                                    <footer>
                                        <hr>
                                        <p>&copy; ProjectCom</p>
                                    </footer>
                                </div>
                            </div>
                        </div>                                          
                    </div>             
                </div>
            </div>

        </div>
    </div>
<script>        
        document.addEventListener('mouseup', function(e){
            var container_register = document.getElementById("confirm-register");
            var container_compute = document.getElementById("confirm-compute");
            var overlay = document.getElementById("overlay");
            var overlay2 = document.getElementById("overlay2");
            var output = document.getElementById("output");
            if(!container_register.contains(e.target)){
                container_register.style.display = 'none';
                overlay.style.display = "none";
            }
            if(!container_compute.contains(e.target)){
                container_compute.style.display = 'none';
                overlay2.style.display = "none";
            }
        });        

var container_register = document.getElementById("confirm-register");
        var container_compute = document.getElementById("confirm-compute");
        var l = document.getElementById("highlight");
        var display = document.getElementById("display");
        var regi = document.getElementById("reg");
        var comp = document.getElementById("comp");
        var dev = document.getElementById("dev");
        var abtus = document.getElementById("abtus");
        var ctct = document.getElementById("ctct");
        var nws = document.getElementById("news");
        var container_y = document.getElementById("container-y");
        var overlay = document.getElementById("overlay");
        var overlay2 = document.getElementById("overlay2");
        var body = document.getElementById("body");
        var output = document.getElementById("output");
        
        var reg = document.getElementById("register");
        var com = document.getElementById("compute");
        var log = document.getElementById("logout");

        var x = document.getElementById("oliva");
        var y = document.getElementById("penones");
        var z = document.getElementById("morales");
        var i = document.getElementById("trinidad");

        function checkRegister() {
            var x = document.getElementById("id_num").value;
            var y = document.getElementById("id_no").value;
            if (x == y){
                submit_register();
            } else {
                window.alert("Please Input Proper ID Number");
            }
        }


        function register(){            
            display.style.left = "-62rem";
            regi.style.left = "3rem";
            comp.style.left = "62rem";
            dev.style.left = "124rem";
            abtus.style.left = "186rem";
            ctct.style.left = "248rem";
            nws.style.left = "310rem";
            output.style.display = "none";
        }

        function compute(){
            display.style.left = "-124rem";
            regi.style.left = "-62rem";
            comp.style.left = "3rem";
            dev.style.left = "62rem";
            abtus.style.left = "124rem";
            ctct.style.left = "186rem";
            nws.style.left = "248rem";
            output.style.display = "none";
        }

        function developer(){
            display.style.left = "-186rem";
            regi.style.left = "-124rem";
            comp.style.left = "-62rem";
            dev.style.left = "3rem";
            abtus.style.left = "62rem";
            ctct.style.left = "124rem";
            nws.style.left = "186rem";
            output.style.display = "none";
        }

        function aboutus(){
            display.style.left = "-248rem";
            regi.style.left = "-186rem";
            comp.style.left = "-124rem";
            dev.style.left = "-62rem";
            abtus.style.left = "3rem";
            ctct.style.left = "62rem";
            nws.style.left = "124rem";
            output.style.display = "none";
        }

        function contact(){
            display.style.left = "-310rem";
            regi.style.left = "-248rem";
            comp.style.left = "-186rem";
            dev.style.left = "-124rem";
            abtus.style.left = "-62rem";
            ctct.style.left = "3rem";
            nws.style.left = "62rem";
            output.style.display = "none";
        }

        function news(){
            display.style.left = "-372rem";
            regi.style.left = "-310rem";
            comp.style.left = "-248rem";
            dev.style.left = "-186rem";
            abtus.style.left = "-124rem";
            ctct.style.left = "-62rem";
            nws.style.left = "3rem";
            output.style.display = "none";
        }

        function submit_register(){
            var y = document.getElementById("id_num").value;
            document.getElementById("id_numm").innerHTML = y;
            container_register.style.display = "flex";
        }

        function submit_compute(){
            var x = document.getElementById("startDate").value;
            var y = document.getElementById("endDate").value;

            if ((x && y) != ""){
                if (x <= y){
                    container_compute.style.display = "flex";
                } else {
                    window.alert("The Start Date you entered must not exceed the End Date. Please enter the right starting date of computation");
                }
            } else {
                window.alert("All fields must not be blank. Please fill all the fields to continue on the computation");
            }
        }

        function cancel(){
            container_register.style.display = "none";
            overlay.style.display = "none";    
            container_compute.style.display = "none";
            overlay2.style.display = "none"; 
        }

        function confirm_compute(){
            output.style.display = "flex";    
            container_register.style.display = "none";
            overlay.style.display = "none";    
            container_compute.style.display = "none";
            overlay2.style.display = "none"; 
            reg:disabled.style.button = "disabled";                                                
        }

        function penones(){
            x.style.left = "-62rem";
            y.style.left = "3rem";
            z.style.left = "62rem";
            i.style.left = "124rem";
        }

        function morales(){
            x.style.left = "-124rem";
            y.style.left = "-62rem";
            z.style.left = "3rem";
            i.style.left = "62rem";
        }

        function trinidad(){
            x.style.left = "-186rem";
            y.style.left = "-124rem";
            z.style.left = "-61rem";
            i.style.left = "3rem";     
        }

        function oliva(){
            x.style.left = "3rem";
            y.style.left = "62rem";
            z.style.left = "124rem";
            i.style.left = "186rem";  
        }
    </script>
    <noscript>Sorry Your Browser Does Not Support JS</noscript>
</body>
</html>