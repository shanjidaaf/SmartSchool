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
  <title>Science Chapter 1 Quiz</title>
  <link rel="stylesheet" href="./style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    :root {
      --primary-color: #3e64ff;
      --dark-color: #1a1a1a;
      --light-bg: #f9f9f9;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #f0f8ff;
      padding-top: 70px;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    .quiz-container, .result-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      margin: 30px auto;
      display: none;
    }

    .quiz-container.active,
    .result-container.active {
      display: block;
    }

    h1, h2 {
      text-align: center;
      color: var(--primary-color);
      font-weight: 700;
      margin-bottom: 25px;
    }

    .question {
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }

    .question:last-child {
      border-bottom: none;
    }

    .options label {
      display: block;
      margin-bottom: 10px;
      padding: 12px 15px;
      background: var(--light-bg);
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .options label:hover {
      background: #e0e0e0;
      transform: translateX(5px);
    }

    .options input[type="radio"] {
      margin-right: 12px;
    }

    #submit-btn {
      background-color: var(--primary-color);
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: block;
      margin: 40px auto 0;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #submit-btn:hover {
      background-color: #2a4fd8;
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    #score, #thank-you {
      font-size: 1.2em;
      text-align: center;
      margin-top: 25px;
    }

    #score {
      font-weight: 600;
      color: var(--primary-color);
      font-size: 1.4em;
      margin-bottom: 15px;
    }

    .correct-answer {
      color: #28a745;
      font-weight: 600;
      margin-top: 10px;
      display: none;
      padding: 8px;
      background-color: #f0fff4;
      border-radius: 5px;
      border-left: 4px solid #28a745;
    }

    .retake-btn {
      background-color: var(--primary-color);
      color: white;
      padding: 10px 25px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: block;
      margin: 30px auto 0;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s;
    }

    .retake-btn:hover {
      background-color: #2a4fd8;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <main>
    <!-- Quiz Section -->
    <div class="quiz-container active" id="quiz-container">
      <h1>Science Quiz - Chapter 1</h1>
      <form id="quiz-form">
        <!-- Questions -->
        <div class="question">
          <p>1. What is science?</p>
          <div class="options">
            <label><input type="radio" name="q1" value="a"> A magic trick</label>
            <label><input type="radio" name="q1" value="b"> A way to understand the natural world</label>
            <label><input type="radio" name="q1" value="c"> A storybook</label>
            <label><input type="radio" name="q1" value="d"> A type of music</label>
          </div>
          <div class="correct-answer" id="correct-q1">Correct answer: A way to understand the natural world</div>
        </div>
        
        <div class="question">
          <p>2. Which one is a branch of science?</p>
          <div class="options">
            <label><input type="radio" name="q2" value="a"> Literature</label>
            <label><input type="radio" name="q2" value="b"> Biology</label>
            <label><input type="radio" name="q2" value="c"> History</label>
            <label><input type="radio" name="q2" value="d"> Drawing</label>
          </div>
          <div class="correct-answer" id="correct-q2">Correct answer: Biology</div>
        </div>
        
        <div class="question">
          <p>3. What is the main goal of science?</p>
          <div class="options">
            <label><input type="radio" name="q3" value="a"> To entertain people</label>
            <label><input type="radio" name="q3" value="b"> To understand nature</label>
            <label><input type="radio" name="q3" value="c"> To create art</label>
            <label><input type="radio" name="q3" value="d"> To write books</label>
          </div>
          <div class="correct-answer" id="correct-q3">Correct answer: To understand nature</div>
        </div>
        
        <div class="question">
          <p>4. Which of the following is a scientific tool?</p>
          <div class="options">
            <label><input type="radio" name="q4" value="a"> Microscope</label>
            <label><input type="radio" name="q4" value="b"> Pencil</label>
            <label><input type="radio" name="q4" value="c"> Eraser</label>
            <label><input type="radio" name="q4" value="d"> Paintbrush</label>
          </div>
          <div class="correct-answer" id="correct-q4">Correct answer: Microscope</div>
        </div>
        
        <div class="question">
          <p>5. Who is known as the father of modern science?</p>
          <div class="options">
            <label><input type="radio" name="q5" value="a"> Shakespeare</label>
            <label><input type="radio" name="q5" value="b"> Galileo Galilei</label>
            <label><input type="radio" name="q5" value="c"> Einstein</label>
            <label><input type="radio" name="q5" value="d"> Newton</label>
          </div>
          <div class="correct-answer" id="correct-q5">Correct answer: Galileo Galilei</div>
        </div>

        <button type="button" id="submit-btn" onclick="calculateScore()">Submit Quiz</button>
        
      </form>
    </div>

    <!-- Result Section -->
    <div class="result-container" id="result-container">
      <h2>Quiz Result</h2>
      <p id="score"></p>
      <p id="thank-you"></p>
      <button class="retake-btn" onclick="window.location.href='quiz.php'">Take Quiz Again</button>
    </div>
  </main>

  <script>
    function calculateScore() {
      const answers = {
        q1: 'b',
        q2: 'b',
        q3: 'b',
        q4: 'a',
        q5: 'b'
      };
      let score = 0;
      const total = Object.keys(answers).length;

      // Show correct answers
      for (let q in answers) {
        const selected = document.querySelector(`input[name="${q}"]:checked`);
        if (selected && selected.value === answers[q]) {
          score++;
        } else {
          // Show correct answer for wrong or unanswered questions
          document.getElementById(`correct-${q}`).style.display = 'block';
        }
      }

      // Display results
      document.getElementById("quiz-container").classList.remove("active");
      document.getElementById("result-container").classList.add("active");
      
      const percentage = Math.round((score / total) * 100);
      let message = '';
      let emoji = '';
      
      if (percentage >= 80) {
        message = 'Excellent work!';
        emoji = '🎉';
      } else if (percentage >= 60) {
        message = 'Good job!';
        emoji = '👍';
      } else {
        message = 'Keep practicing!';
        emoji = '📚';
      }
      
      document.getElementById("score").innerHTML = `
        ${emoji} You scored <strong>${score} out of ${total}</strong> (${percentage}%)<br>
        ${message}
      `;
      document.getElementById("thank-you").innerHTML = `
        Thank you for taking the quiz! <i class="fas fa-graduation-cap"></i>
      `;
      // After showing results...
fetch('submit_quiz.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  },
  body: `score=${score}&total=${total}`
})
.then(response => response.json())
.then(data => {
  console.log(data);
  if (data.status === 'success') {
    console.log("Result saved!");
  } else {
    console.error("Failed to save:", data.message);
  }
})
.catch(error => {
  console.error("Error:", error);
});

    }

  </script>

  <?php include 'footer.php'; ?>
</body>
</html>