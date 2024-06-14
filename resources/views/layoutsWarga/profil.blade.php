<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/VENU53.svg') }}">
    <title>Profil Venus</title>

    <style>
        /* Reset some default styles */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        /* Basic styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        header {
            background-color: #003366;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 2);
        }

        section {
            background-color: #fff;
            margin: 20px;
            padding: 30px;
            border-radius: 10px; /* Mengubah sudut menjadi melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan */
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-end; /* Align items to the top */
            gap: 20px;
        }

        .team-member {
            flex-basis: calc(33.33% - 20px);
            text-align: center;
            margin: 20px 0;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }
        

        .team-member img:hover {
            transform: scale(1.1);
        }
        .instagram-link {
            margin-top: 10px;
        }

        .instagram-link a {
            text-decoration: none;
            color: #555;
        }

        .instagram-icon {
            margin-right: 5px;
            font-size: 20px;
        }

        footer {
            text-align: center;
            background-color: #003366;
            color: #fff;
            padding: 10px 0;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 22px;
            }

            p {
                font-size: 16px;
            }

            .team-member {
                flex-basis: calc(50% - 20px);
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('adminlte/dist/img/VENU53.svg') }}" class="sm:h-12 h-9 sm:hidden block" alt="Logo" />
        <h1>Profil VENUS</h1>
    </header>
    <section id="company-info">
        <h2>VENUS</h2>
        <p>SIM PKK VENUS adalah sebuah website yang digunakan untuk mendigitalisasikan kegiatan PKK 
            yang dilakukan oleh ibu-ibu PKK RW 05 Tlogomas ,
            Kec Lowokwaru tepatnya di Jl.Venus.
            Website ini diciptakan untuk memperkenalkan sistem 
            yang otomatis dan terpusat untuk mengelola administrasi dan 
            pengelolaan kegiatan PKK, sehingga dapat menghemat waktu dan 
            tenaga. Selain itu disediakannya fitur 
            pemantauan dan laporan yang memungkinkan pengurus PKK untuk 
            melakukan pemantauan dan evaluasi kegiatan PKK secara efektif, 
            efisien, dan transparan.
        </p>
    </section>
    <section id="team">
        <h2>Kelompok 1</h2>
        <div class="team-members">
            <div class="team-member">
                <img src="{{ asset('adminlte/dist/img/agung.jpeg') }}" alt="Agung">
                <h3>Agung Rizky Setiawan</h3>
                <p>22417200187</p>
                <p class="instagram-link"><i class="fab fa-instagram instagram-icon"></i><a href="https://www.instagram.com/agongrzkysss/">Instagram</a></p>
            </div>
            <div class="team-member">
                <img src="{{ asset('adminlte/dist/img/astrid.jpg') }}" alt="Astrid">
                <h3>Astrid Risa Widiana</h3>
                <p>2241720250</p>
                <p class="instagram-link"><i class="fab fa-instagram instagram-icon"></i><a href="https://www.instagram.com/astrdrisa/">Instagram</a></p>
            </div>
            <div class="team-member">
                <img src="{{ asset('adminlte/dist/img/first.jpeg') }}" alt="Firstia">
                <h3>Firstia Aulia Wida Azizah</h3>
                <p>2241720135</p>
                <p class="instagram-link"><i class="fab fa-instagram instagram-icon"></i><a href="https://www.instagram.com/firstiazh/">Instagram</a></p>
            </div>
            <div class="team-member">
                <img src="{{ asset('adminlte/dist/img/daffa.jpg') }}" alt="Daffa">
                <h3>Muhammad Daffa Wijaya</h3>
                <p>2241720143</p>
                <p class="instagram-link"><i class="fab fa-instagram instagram-icon"></i><a href="https://www.instagram.com/muhammad_daffa76/">Instagram</a></p>
            </div>
            <div class="team-member">
                <img src="{{ asset('adminlte/dist/img/prob.jpeg') }}" alt="Rifki">
                <h3>Rifki Fakhrudin</h3>
                <p>2241720218</p>
                <p class="instagram-link"><i class="fab fa-instagram instagram-icon"></i><a href="https://www.instagram.com/rifki_fakhrudin/">Instagram</a></p>
            </div>
        </div>
    </section>
    <footer>
        <H4>&copy; 2024 VENUS BY KELOMPOK 1.</H4>
    </footer>
</body>
</html>
</html>