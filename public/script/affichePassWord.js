const affiche = document.querySelectorAll(".unmask");
console.log("toto");
//je récupère mon bouton .
affiche.forEach((item) => {
  //s'il y à plusieur buttons avec la même class je fais un foreach dessus
  item.addEventListener("click", () => {
    //je créer un événement sur chaque instance du bouton
    item.classList.add("active");
    //pour chaque instance j'ajoute du style
    console.log("toto");
    let arr = document.getElementsByClassName("password");
    //je récupère  les élèments input que je stock dans ma variable arr
    for (var i = 0; i < arr.length; i++) {
      //je boucle sur cette variable
      if (arr[i].type == "password") arr[i].setAttribute("type", "text");
      // si un des éléments de ma variable est égale au type "password"
      // alors je modifie ce type en un text.
    }
    setTimeout(() => {
      //ici je précise qu'aprés un certain temps je fais la même boucle mais dans l'autre sens.
      for (var i = 0; i < arr.length; i++) {
        if (arr[i].type == "text") arr[i].setAttribute("type", "password");
      }
      //enfin je remove le style que j'ai injecté.
      item.classList.remove("active");
    }, 1000);
  });
});
