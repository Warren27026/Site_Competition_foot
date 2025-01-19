const donneesQuiz = [
  {
    question: "Quel joueur détient le record de buts en Ligue des Champions ?",
    options: ["Lionel Messi", "Cristiano Ronaldo", "Robert Lewandowski", "Raúl"],
    reponse: "Cristiano Ronaldo",
  },
  {
    question: "Quel club a remporté le plus de Ligues des Champions ?",
    options: ["Real Madrid", "AC Milan", "Liverpool", "FC Barcelone"],
    reponse: "Real Madrid",
  },
  {
    question: "Quel joueur a marqué lors de trois finales de Ligue des Champions ?",
    options: ["Cristiano Ronaldo", "Gareth Bale", "Sergio Ramos", "Raúl"],
    reponse: "Cristiano Ronaldo",
  },
  {
    question: "Quel entraîneur a remporté le plus de Ligues des Champions ?",
    options: ["Pep Guardiola", "Carlo Ancelotti", "Zinedine Zidane", "Alex Ferguson"],
    reponse: "Carlo Ancelotti",
  },
  {
    question: "En quelle année a eu lieu la première édition de la Ligue des Champions ?",
    options: ["1955", "1960", "1975", "1985"],
    reponse: "1955",
  },
  {
    question: "Quel club anglais a remporté la Ligue des Champions en 2019 ?",
    options: ["Chelsea", "Manchester City", "Liverpool", "Tottenham"],
    reponse: "Liverpool",
  },
  {
    question: "Qui est le meilleur passeur de l'histoire de la Ligue des Champions ?",
    options: ["Xavi", "Cristiano Ronaldo", "Lionel Messi", "Andrés Iniesta"],
    reponse: "Cristiano Ronaldo",
  },
  {
    question: "Combien de Ligues des Champions a remporté le Bayern Munich ?",
    options: ["4", "5", "6", "7"],
    reponse: "6",
  },
  {
    question: "Quel club a remporté la Ligue des Champions en 2021 ?",
    options: ["Chelsea", "Manchester City", "PSG", "Real Madrid"],
    reponse: "Chelsea",
  },
  {
    question: "Quel stade a accueilli le plus de finales de Ligue des Champions ?",
    options: ["San Siro", "Wembley", "Santiago Bernabéu", "Stade de France"],
    reponse: "Santiago Bernabéu",
  },
  ];
  
  let currentQuestionIndex = 0;
  let score = 0;
  
  const questionElement = document.getElementById("question");
  const optionsElement = document.getElementById("options");
  const soumission = document.getElementById("submit");
  const resultat = document.getElementById("result");
  const score = document.getElementById("score");
  
  function loadQuestion() {
    const currentQuestion = donneesQuiz[currentQuestionIndex];
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
    soumission.disabled = true;
  }
  
  optionsElement.addEventListener("click", () => {
    const selectedOption = document.querySelector('input[name="answer"]:checked');
    soumission.disabled = !selectedOption;
  });
  
  soumission.addEventListener("click", () => {
    const selectedOption = document.querySelector('input[name="answer"]:checked');
    if (selectedOption && selectedOption.value === donneesQuiz[currentQuestionIndex].answer) {
      score++;
    }
    
    currentQuestionIndex++;
    if (currentQuestionIndex < donneesQuiz.length) {
      loadQuestion();
    } else {
      showResult();
    }
  });
  
  function showResult() {
    document.getElementById("quiz").style.display = "none";
    resultat.style.display = "block";
    score.textContent = `${score} / ${donneesQuiz.length}`;
  }
  
  // Load the first question
  loadQuestion();
  