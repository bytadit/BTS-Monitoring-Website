<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo Surakarta - BTS</title>
    <link rel="stylesheet" href="css/thanks.css">
</head>

<body>
    <!--Header Awal-->
    <header>
        <div id="brand"><a href="#">
                <img src="image/BTS logo.png" alt="logo"></a>
            <ul>
                <li><a href="/">Home</a></li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="drop_btn" onclick="dropdownFunction()">
                            Information
                        </a>
                        <div class="drop_content" id="myDropdown">
                            <a href="/about">Diskominfo Surakarta</a>
                            <a href="/btslist">Data BTS Tower</a>
                            <!-- <a href="btsmonitor.html">Data Monitoring</a> -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>

            @auth
            <nav>
                <ul>
                    {{-- <li><p>Welcome {{ auth()->user()->username }}</p></li> --}}
                    <li id="dashboard" class="dashboard">
                        <button class="dashboard dropdown-item"><a href="/{{ auth()->user()->role }}">My Dashboard</a></button>
                    <li id="logout">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">LogOut</button>
                        </form>
                    </li>
                    {{-- <li id="login"><a href="/login">Log In</a></li> --}}
                    <li id="contact"><a href="/contact">Contact Us</a></li>
                </ul>
            </nav>
            @else
            <nav>
                <ul>
                    <li id="contact"><a href="/contact">Contact Us</a></li>
                    <li id="login"><a href="/login">Log In</a></li>
                </ul>
            </nav>
            @endauth

    </header>
    <!--Header Akhir-->

    <!--Main Awal-->
    <main class="main_thanks">
        <div class="banner">
            <div class="banner_thanks">
                <h1><span>Thank</span> You</h1>
                <p>Terima kasih telah mengisi formulir kami. Pesan Anda telah diteruskan kepada <i>admin</i>, harap menunggu balasan. <br>
                    Kami akan terus berupaya untuk memberikan pelayanan terbaik kami kepada masyarakat.</p>
                    <br>
                    <p style="color:#52784F">Anda akan dikembalikan ke halaman utama dalam <span id="counter">5</span> detik</p>
            </div>
        </div>

        <br>

        <div class="heading">
            <!-- <h1><span>Selamat Datang di<br>Diskominfo BTS Surakarta</span></h1> -->
        </div>

    </main>
    <!--Main Akhir-->

    <!--Awal Footer-->
    <footer>
        <div class="footer_content">Copyright &copy; Diskominfo BTS Surakarta 2022 </div>
        <div class="footer_content">
            <a href="https://www.instagram.com"><img src="image/sosmed1.png" alt="ig"></a>
            <a href="https://www.twitter.com"><img src="image/sosmed2.png" alt="tw"></a>
            <a href="https://www.facebook.com"><img src="image/sosmed3.png" alt="fb"></a>
            <a href="https://www.youtube.com"><img src="image/sosmed4.png" alt="yt"></a>
            <a href="https://www.linkedin.com"><img src="image/sosmed5.png" alt="in"></a>
            <a href="https://www.whatsapp.com"><img src="image/sosmed6.png" alt="wa"></a>
        </div>
        <div class="footer_content" id="fc">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
        </div>
    </footer>
    <!--Akhir Footer-->

    <script>
        // Dropdown
        function dropdownFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function (e) {
            if (!e.target.matches('.drop_btn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }


        var ctr = document.getElementById('counter');
        var number = 4
        setInterval(function(){
            ctr.innerHTML = number--;

        },1000);
        setTimeout(function(){
            window.location.href = '/';
         }, 5000);
    </script>
</body>

</html>
