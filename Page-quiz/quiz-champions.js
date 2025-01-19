// Données du quiz sur la Ligue des Champions
const quizLDC = [
    {
      question: "Quel joueur a marqué le plus de buts en Ligue des Champions ?",
      options: ["Lionel Messi", "Cristiano Ronaldo", "Robert Lewandowski", "Raúl"],
      reponse: "Cristiano Ronaldo"
    },
    {
      question: "Quel club a le plus de victoires en Ligue des Champions ?",
      options: ["Real Madrid", "AC Milan", "Liverpool", "Bayern Munich"],
      reponse: "Real Madrid"
    },
    {
      question: "Quel joueur détient le record du nombre de passes décisives en Ligue des Champions ?",
      options: ["Lionel Messi", "Cristiano Ronaldo", "Xavi", "Thomas Müller"],
      reponse: "Cristiano Ronaldo"
    },
    {
      question: "En quelle année a eu lieu la première édition de la Ligue des Champions (anciennement C1) ?",
      options: ["1955", "1960", "1970", "1985"],
      reponse: "1955"
    },
    {
      question: "Quel entraîneur a remporté le plus de fois la Ligue des Champions ?",
      options: ["Carlo Ancelotti", "Zinédine Zidane", "Pep Guardiola", "Alex Ferguson"],
      reponse: "Carlo Ancelotti"
    },
  ];
  
  // Variables pour la gestion du quiz
  let indiceQuestionActuelle = 0;
  let score = 0;
  
  const elementQuestion = document.getElementById("question");
  const elementOptions = document.getElementById("options");
  const boutonValider = document.getElementById("valider");
  const elementResultat = document.getElementById("resultat");
  const elementScore = document.getElementById("score");
  
  // Charger une question
  function chargerQuestion() {
    const questionActuelle = quizLDC[indiceQuestionActuelle];
    elementQuestion.textContent = questionActuelle.question;
    elementOptions.innerHTML = "";
  
    questionActuelle.options.forEach((option) => {
      const li = document.createElement("li");
      const input = document.createElement("input");
      input.type = "radio";
      input.name = "reponse";
      input.value = option;
      li.appendChild(input);
      li.appendChild(document.createTextNode(option));
      elementOptions.appendChild(li);
    });
  
    boutonValider.disabled = true;
  }
  
  // Activer le bouton lorsqu'une option est sélectionnée
  elementOptions.addEventListener("click", () => {
    const optionSelectionnee = document.querySelector('input[name="reponse"]:checked');
    boutonValider.disabled = !optionSelectionnee;
  });
  
  // Gérer le clic sur le bouton valider
  boutonValider.addEventListener("click", () => {
    const optionSelectionnee = document.querySelector('input[name="reponse"]:checked');
    if (optionSelectionnee && optionSelectionnee.value === quizLDC[indiceQuestionActuelle].reponse) {
      score++;
    }
  
    indiceQuestionActuelle++;
    if (indiceQuestionActuelle < quizLDC.length) {
      chargerQuestion();
    } else {
      afficherResultat();
    }
  });
  
  // Afficher le résultat final
  function afficherResultat() {
    document.getElementById("quiz").style.display = "none";
    elementResultat.style.display = "block";
    elementScore.textContent = `${score} / ${quizLDC.length}`;
  }
  
  // Réinitialiser le quiz
  function recommencerQuiz() {
    document.getElementById("resultat").style.display = "none";
    indiceQuestionActuelle = 0;
    score = 0;
    chargerQuestion();
    document.getElementById("quiz").style.display = "block";
  }
  
  // Charger la première question au début
  chargerQuestion();
  