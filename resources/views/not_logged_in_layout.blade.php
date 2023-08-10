<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEN11 Clothing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        #backToTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            font-size: 24px;
            cursor: pointer;
            background-color: #333;
            color: black;
            border: none;
            border-radius: 50%;
            padding: 10px;
        }
        .zoom-effect {
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }
        .zoom-effect img {
            transition: transform 0.3s ease-in-out;
        }

        .zoom-effect:hover img {
            transform: scale(1.1);
        }

        .contact {
            padding: 80px 0;
            background-color: grey;
        }
        .section-title h2 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 40px;
            
        }
        .info {
            background-color: black;
            color: wheat;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
        }
        .info h4 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .info p {
            font-size: 18px;
        }
        .iframe-container {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            border-radius: 10px;
        }
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">TEN 11</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Signup</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/help">Help</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <section id="contact" class="contact text-center">
        <div class="container">
            <div class="section-title">
                <h2>Contact</h2>
            </div>
            <div class="row justify-content-center" data-aos="fade-in">
                <div class="col-lg-8">
                    <div class="info">
                        <div class="address">
                            
                            <h4><i class="bi bi-geo-alt"></i>Location:</h4>
                            <p>Khokana</p>
                        </div>
                        <div class="email">
                            
                            <h4><i class="bi bi-envelope"></i>Email:</h4>
                            <p>support@ten11.com</p>
                        </div>
                        <div class="phone">
                            
                            <h4><i class="bi bi-phone"></i>Call:</h4>
                            <p>9810111011</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8">
                    <div class="iframe-container">
                        <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.0674423128366!2d85.2979495!3d27.6359219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb17963566b139%3A0x5686b1fc6d201acf!2sKhokana%20Bus%20Park!5e0!3m2!1sen!2snp!4v1630145966361!5m2!1sen!2snp" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="profile">
        <div class="social-links mt-3 text-center">
            <a href="https://www.linkedin.com" class="Linkedin"><i class="fa fa-linkedin-square" style="font-size:24px"></i></a>
            <a href="https://www.twitter.com" class="twitter"><i class="fa fa-twitter-square" style="font-size:24px"></i></a>
            <a href="https://www.facebook.com/SanjitMaharjan.1011" class="facebook"><i class="fa fa-facebook-official" style="font-size:24px"></i></a>
            <a href="https://www.instagram.com" class="instagram"><i class="fa fa-instagram" style="font-size:24px"></i></a>
        </div>
        
    </div>
      <button id="backToTop" title="Go to top"><i class="fa fa-angle-double-up" style="font-size:24px"></i></button>
    </div>
    <script>
        // Back to top button functionality
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
