const quizData = [
    {
      question: "Le joueur avec le plus de ballon d'or? ",
      options: ["Lionel Messi", "Cristiano Ronaldo", "Kàkà", "Pelé"],
      answer: "Lionel Messi"
    },
    {
      question: "Le pays avec le plus de coupe du monde",
      options: ["Brésil", "France", "Allemagne", "Angleterre"],
      answer: "Brésil"
    },
    {
      question: "Combien a t'il de coupe?",
      options: ["3", "4", "5", "6"],
      answer: "5"
    }
  ];
  
  let currentQuestionIndex = 0;
  let score = 0;
  
  const questionElement = document.getElementById("question");
  const optionsElement = document.getElementById("options");
  const submitButton = document.getElementById("submit");
  const resultElement = document.getElementById("result");
  const scoreElement = document.getElementById("score");
  
  function loadQuestion() {
    const currentQuestion = quizData[currentQuestionIndex];
    questionElement.textContent = currentQuestion.question;
    optionsElement.innerHTML = "";
    
    currentQuestion.options.forEach(option => {
      const li = document.createElement("li");
      const input = document.createElement("input");
      input.type = "radio";
      input.name = "answer";
      input.value = option;
      li.appendChild(input);
      li.appendChild(document.createTextNode(option));
      optionsElement.appendChild(li);
    });
    submitButton.disabled = true;
  }
  
  optionsElement.addEventListener("click", () => {
    const selectedOption = document.querySelector('input[name="answer"]:checked');
    submitButton.disabled = !selectedOption;
  });
  
  submitButton.addEventListener("click", () => {
    const selectedOption = document.querySelector('input[name="answer"]:checked');
    if (selectedOption && selectedOption.value === quizData[currentQuestionIndex].answer) {
      score++;
    }
    
    currentQuestionIndex++;
    if (currentQuestionIndex < quizData.length) {
      loadQuestion();
    } else {
      showResult();
    }
  });
  
  function showResult() {
    document.getElementById("quiz").style.display = "none";
    resultElement.style.display = "block";
    scoreElement.textContent = `${score} / ${quizData.length}`;
  }
  
  // Load the first question
  loadQuestion();
  