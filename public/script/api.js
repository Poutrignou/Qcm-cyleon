const carte = document.getElementById("box-img");
const image = document.createElement("img");
const carteBody = document.getElementById(".-name");
const barCode = document.getElementById("barCode");
const scores = document.querySelectorAll(".score");
const nutriScoreBox = document.getElementById("box-nutri");
const nutriImg = document.createElement("img");
let nutriScoreData;

//cette événement sert à afficher une image et un titre par défaut.
window.addEventListener("load", () => {
  //ma variable "carte" prend pour enfant la variable "image" qui elle contient un balise "src"
  carte.appendChild(image);
  image.src = "image/afpa.png";
  nutriScoreBox.appendChild(nutriImg);
});
// fetch("https://world.openfoodfacts.org/api/v0/product/737628064502.json").then(
//   (reponse) => reponse.json().then((data) => console.log(data))
// );

Quagga.onDetected(function (data) {
  //je recupère la valeur de mon scan
  barCode.value = data.codeResult.code;
  //je récupére cette valeur que je stock dans ma variable value
  let value = data.codeResult.code;

  //je dit que la variable image et l'enfant de ma variable carte
  carte.appendChild(image);
  //je dit que la variable title et le premier enfant de ma variable carteBody

  //je fetch vers mon api openfoodfacts en concatenant l'url et la valeur de mon scan
  //je lui passe .then() et .json() et encore .then() pour récuperer sous la forme d'un objet
  fetch(
    "https://world.openfoodfacts.org/api/v0/product/" + value + ".json"
  ).then((reponse) =>
    reponse.json().then((data) => {
      //je dit a ma variable image que je lui passe la source qui est égale à mon objet->product->image_front_url que je retrouve dans la console en faisant
      image.src = data.product.image_front_url;
      carteBody.innerHTML = data.product.product_name_fr;
      // console.log(data.product.nutrition_grade_fr);
      console.log(data);

      //je créer cette condition pour dire que si l'objet data.product.nutrition_grade_fr est égale à undefined alors la variable nutriScoreData est égale à l'objet data.product.ecoscore_grade.
      if (data.product.nutrition_grade_fr === undefined) {
        nutriScoreData = data.product.ecoscore_grade;
      } else {
        //autrement la variable nutriScoreData prend la valeur de data.product.nutrition_grade_fr.
        nutriScoreData = data.product.nutrition_grade_fr;
      }
      //cette boucle sert à afficher le nutriscore

      switch (nutriScoreData) {
        case "a":
          nutriImg.src =
            "https://static.openfoodfacts.org/images/attributes/nutriscore-a.svg";
          break;
        case "b":
          nutriImg.src =
            "https://static.openfoodfacts.org/images/attributes/nutriscore-b.svg";
          break;
        case "c":
          nutriImg.src =
            "https://static.openfoodfacts.org/images/attributes/nutriscore-c.svg";
          break;
        case "d":
          nutriImg.src =
            "https://static.openfoodfacts.org/images/attributes/nutriscore-d.svg";
          break;
        case "e":
          nutriImg.src =
            "https://static.openfoodfacts.org/images/attributes/nutriscore-e.svg";
          break;
        default:
          break;
      }
    })
  );
});

let products = document.querySelectorAll(".product");

products.forEach((product) => {
  let barCode = product.querySelector("h5");
  let image = product.querySelector("img");
  let codeScane =
    "https://world.openfoodfacts.org/api/v0/product/" +
    barCode.innerText +
    ".json";

  fetch(
    "https://world.openfoodfacts.org/api/v0/product/" +
      barCode.innerText +
      ".json"
  ).then((reponse) =>
    reponse.json().then((data) => {
      image.src = data.product.image_front_url;
      barCode.innerText = data.product.product_name;
    })
  );
  if (
    image.src !== codeScane ||
    image.src === "http://localhost/no_wayste_mvc/public/scan"
  ) {
    image.src =
      "https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921";
    setTimeout(() => {
      if (
        image.src ===
        "https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921"
      )
        image.src = "../public/image/logo-no-wayste.jpg";
    }, 2000);
  }
});
