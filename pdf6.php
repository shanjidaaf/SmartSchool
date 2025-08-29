<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'nav.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./style.css">
  <title>Class 6 NCTB Textbooks</title>

  <!-- Bootstrap & Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary-color: #3e64ff;
      --dark-color: #1a1a1a;
      --light-bg: #f9f9f9;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: white;
      padding-top: 70px;
      scroll-behavior: smooth;
    }

    /* Title */
    h1 {
      text-align: center;
      color: var(--primary-color);
      font-weight: 700;
      margin-top: 30px;
      margin-bottom: 30px;
    }

    /* Table Styling */
    .table th {
      background-color: var(--light-bg);
    }

    .table-hover tbody tr:hover {
      background-color: #e8f0ff;
      transform: scale(1.01);
      transition: all 0.2s ease-in-out;
    }

    .download-link a {
      color: var(--primary-color);
      text-decoration: none;
    }

    .download-link a:hover {
      text-decoration: underline;
    }

    /* Back to Top Button */
    #backToTop {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      font-size: 20px;
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      cursor: pointer;
    }

    #backToTop:hover {
      background-color: #2a4fd8;
    }
    
    /* Footer */
    footer {
      background: linear-gradient(rgb(9, 39, 136), rgba(3, 15, 147, 0.902));
      color: white;
      padding: 60px 5% 30px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 30px;
      margin-bottom: 40px;
    }

    .footer-col h3 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .footer-col p, .footer-col a {
      color: #edebeb;
      margin-bottom: 10px;
      display: block;
      text-decoration: none;
    }

    .footer-col a:hover {
      color: white;
    }

    .social-links {
      display: flex;
      gap: 15px;
    }

    .social-links a {
      color: white;
      font-size: 18px;
    }

    .social-links a:hover {
      transform: translateY(-10px);
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid #444;
      color: #bbb;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div class="container">
    <h1>Class 6 NCTB Books</h1>

    <table class="table table-bordered table-hover align-middle text-center">
      <thead>
        <tr>
          <th>Serial No.</th>
          <th>Name of the Book</th>
          <th>Download Link (Bangla)</th>
          <th>Download Link (English)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>চারুপাঠ</td>
          <td class="download-link">
            <a href="https://drive.google.com/file/d/1HMLLnPvoFbwdLUYOyuOYKkuTma6oI0gD/view" target="_blank" data-bs-toggle="tooltip" title="Click to download!">Download PDF</a>
          </td>
          <td class="download-link"><a href="#" data-bs-toggle="tooltip" title="Not available yet">Not Available</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>আনন্দপাঠ</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1Gy9byi4NW6bKPEiRDkp28hfrG6KIbH3Y/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="#">Not Available</a></td>
        </tr>
        <tr>
          <td>3</td>
          <td>বাংলা ব্যাকরণ ও নির্মিতি</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1H-lAgzrIO6Y7A2wSso8liL7cMbgWg-o9/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="#">Not Available</a></td>
        </tr>
        <tr>
          <td>4</td>
          <td>English For Today</td>
          <td class="download-link"><a href="#">Not Available</a></td>
          <td class="download-link"><a href="https://nctb.gov.bd/sites/default/files/files/nctb.portal.gov.bd/book_class/78187c66_6a3f_4d2b_a727_00f8c75a3b76/Class%206_English.pdf" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>5</td>
          <td>English Grammar and Composition</td>
          <td class="download-link"><a href="#">Not Available</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1Tgrw_QZJwpUCKV3LJzcCTZ0Dvhz-bOF0/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>6</td>
          <td>গণিত</td>
          <td class="download-link"><a href="https://nctb.gov.bd/sites/default/files/files/nctb.portal.gov.bd/book_class/d556e802_f7fc_4a71_bbbb_0f139dc3d70e/Class%206_Math_Bangla.pdf" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://nctb.gov.bd/sites/default/files/files/nctb.portal.gov.bd/book_class/e9fcbca9_cbc5_4147_a991_2dd8e3c79a07/Class%206_Math_English.pdf" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>7</td>
          <td>তথ্য ও যোগাযোগ প্রযুক্তি</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1u2zRiyNz6ekcFMRskixrrCUxCyJQHDkr/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1livS4uNclZ_0-9jp44pcOEY5tr9iHqbj/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>8</td>
          <td>বাংলাদেশ ও বিশ্বপরিচয়</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1F2v5Pf6br3lu_WChJ1fwiYwyct_Fs6UX/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1gab-_SnIZoqaTnXDrd84iZYDByd6Nq8c/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>9</td>
          <td>বিজ্ঞান</td>
          <td class="download-link"><a href="https://nctb.gov.bd/sites/default/files/files/nctb.portal.gov.bd/book_class/e189c065_0a84_4b6b_b0aa_7e9fa3720bde/Class%206_Science_Bangla.pdf" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://nctb.gov.bd/sites/default/files/files/nctb.portal.gov.bd/book_class/80fc7877_d4ee_47b1_bf6c_3670c5ef1a39/Class%206_Science_English.pdf" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>10</td>
          <td>শারীরিক শিক্ষা ও স্বাস্থ্য</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1Og-1g4IW-XrK-QzvICG43lNWL27nvSEx/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1ySOW8vohFtVi7mkIhtFzIvvOVdxJ7TNm/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>11</td>
          <td>কর্ম ও জীবনমুখী শিক্ষা</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1Gy9byi4NW6bKPEiRDkp28hfrG6KIbH3Y/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1H-lAgzrIO6Y7A2wSso8liL7cMbgWg-o9/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>12</td>
          <td>কৃষিশিক্ষা</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1H9OqVnqoCB63MgLkgWunue4EGE6YzS9D/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1hgI2oM5uWHacmGXIhj1m4NDUKbGzQaMq/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>13</td>
          <td>গার্হস্থ্যবিজ্ঞান</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1FOF9ie0plvrxpSlsL0MIGsExNd5GQX-j/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1HwcfcZINjLsa2Kpep_KUeBrCIMBb-hiI/view" target="_blank">Download PDF</a></td>
        </tr>
        <tr>
          <td>14</td>
          <td>চারু ও কারুকলা</td>
          <td class="download-link"><a href="https://drive.google.com/file/d/1WHg5KDeLwq29t85_A18vK23Ttsp36RHp/view" target="_blank">Download PDF</a></td>
          <td class="download-link"><a href="https://drive.google.com/file/d/10pPl7wf1jKGv5vmdbzNyHoyqqnG1O3gt/view" target="_blank">Download PDF</a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Back to Top Button -->
  <button id="backToTop" title="Back to Top">↑</button>

  <!-- Bootstrap JS & Custom Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Tooltip initialization
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(el => new bootstrap.Tooltip(el));

    // Back to top
    const backToTop = document.getElementById("backToTop");
    window.onscroll = () => {
      if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        backToTop.style.display = "flex";
      } else {
        backToTop.style.display = "none";
      }
    };

    backToTop.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  </script>
</body>
</html>