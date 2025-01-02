<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <style>
    /* General Styling for Containers */
    .responsive-container-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin: 0 auto;
      padding: 20px;
      box-sizing: border-box;
    }

    .bigContainer {
      width: 100%;
      max-width: 800px;
      text-align: center;
    }

    .Container {
      padding: 20px;
    }

    /* Text Styling */
    .text-blk {
      margin: 10px 0;
      color: #333;
    }

    .heading {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .subHeading {
      font-size: 1.1rem;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    /* Social Icons Styling */
    .social-icons-container {
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .social-icon {
      display: inline-block;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .social-icon img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .social-icon:hover {
      transform: scale(1.1);
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .social-icons-container {
        gap: 10px;
      }

      .social-icon {
        width: 40px;
        height: 40px;
      }
    }

    @media (max-width: 480px) {
      .social-icon {
        width: 35px;
        height: 35px;
      }
    }
  </style>
</head>
<body>
  <div class="responsive-container-block bigContainer">
    <div class="responsive-container-block Container">
      <p class="text-blk heading">
        About Us
      </p>
      <p class="text-blk subHeading">
      Rindu Pokat: Segelas Kenangan dalam Setiap Tegukan
Nikmati perpaduan sempurna antara segarnya alpukat asli, manisnya gula aren, dan lembutnya susu kental. Setiap tegukan Rindu Pokat membawa rasa nyaman yang bikin susah lupa, seolah membawa kembali kehangatan momen istimewa.
      </p>
      <p class="text-blk subHeading">
      Terhubung Dengan Kami
Jangan ragu untuk menjelajahi lebih jauh tentang kami! Kunjungi halaman media sosial kami untuk informasi terbaru, promo menarik, dan cerita di balik layar:
      </p>
      <div class="social-icons-container">
        <!-- Instagram -->
        <a class="social-icon" href="https://www.instagram.com" target="_blank">
          <img class="socialIcon image-block" src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
        </a>
        <!-- GoFood -->
        <a class="social-icon" href="https://gofood.co.id" target="_blank">
          <img class="socialIcon image-block" src="https://img.icons8.com/color/24/000000/uber-eats.png" alt="GoFood">
        </a>
        <!-- Shopee -->
        <a class="social-icon" href="https://shopee.co.id" target="_blank">
          <img class="socialIcon image-block" src="https://img.icons8.com/color/24/000000/shopee.png" alt="Shopee">
        </a>
      </div>
    </div>
  </div>
</body>
</html>
