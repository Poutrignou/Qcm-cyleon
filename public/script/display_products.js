let products = document.querySelectorAll(".product");
const affiche = document.querySelector(".affichage");
const image = document.getElementById("image");
const src = document.createElement("img");

if (image === null) {
  affiche.appendChild(src);
  affiche.classList.add("show");
  src.src =
    "../public/image/depositphotos_94050954-stock-photo-refrigerator-filled-with-sticky-notes.jpg";
  src.classList.add("active");
}

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
    }, 5000);
  }
});
