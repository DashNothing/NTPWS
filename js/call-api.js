const API_KEY = "WCsllB7f9m6qRwybiPba4f2IScSYGPzVyBWJAgUh";


const searchButton = document.getElementById("searchButton");
const searchField = document.getElementById("searchField");

let resultContainer = document.querySelector(".result-container");
const resultList = document.querySelector(".result-list");

let detailsHeading = document.getElementById("detailsHeading");
let detailsHint = document.getElementById("detailsHint");
let detailsList = document.querySelector(".details-list");

let foods = [];

searchButton.addEventListener("click", async function (event) {
  event.preventDefault();

  resultList.innerHTML = "";

  const query = searchField.value;
  foods = await getFoods(query);
  for (let i = 0; i < foods.length; i++) {
    let resultItem = document.createElement("a");
    resultItem.innerHTML = foods[i].description;
    resultItem.classList.add("result");
    resultItem.addEventListener("click", () => {
      showDetails(foods[i]);
    });

    resultList.appendChild(resultItem);
  }

  resultContainer.classList.remove("hidden");
});


async function getFoods(foodQuery) {
  let foods;
  await fetch(`https://api.nal.usda.gov/fdc/v1/foods/search?api_key=${API_KEY}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      query: foodQuery,
      sortBy: "score",
      dataType: ["Survey (FNDDS)"],
    }),
  })
    .then(response => response.json())
    .then(data => {
      foods = data.foods;
    });
  return foods;
}


function showDetails(foodItem) {
  const foodNutrients = foodItem.foodNutrients;

  // Energy
  let energyInfo = foodNutrients.find(n => n.nutrientName == "Energy");
  let energyValue = energyInfo.value + energyInfo.unitName.toLowerCase();
  let energyP = document.createElement("p");
  energyP.classList.add("details-item");
  energyP.innerHTML = "Enegy: " + energyValue;

  // Protein
  let proteinInfo = foodNutrients.find(n => n.nutrientName == "Protein");
  let proteinValue = proteinInfo.value + proteinInfo.unitName.toLowerCase();
  let proteinP = document.createElement("p");
  proteinP.classList.add("details-item");
  proteinP.innerHTML = "Protein: " + proteinValue;

  // Carbs
  let carbInfo = foodNutrients.find(n => n.nutrientName == "Carbohydrate, by difference");
  let carbValue = carbInfo.value + carbInfo.unitName.toLowerCase();
  let carbP = document.createElement("p");
  carbP.classList.add("details-item");
  carbP.innerHTML = "Carbohydrates: " + carbValue;

  // Sugar
  let sugarInfo = foodNutrients.find(n => n.nutrientName == "Sugars, total including NLEA");
  let sugarValue = sugarInfo.value + sugarInfo.unitName.toLowerCase();
  let sugarP = document.createElement("p");
  sugarP.classList.add("details-item");
  sugarP.innerHTML = "Sugars: " + sugarValue;

  // Fats
  let fatInfo = foodNutrients.find(n => n.nutrientName == "Total lipid (fat)");
  let fatValue = fatInfo.value + fatInfo.unitName.toLowerCase();
  let fatP = document.createElement("p");
  fatP.classList.add("details-item");
  fatP.innerHTML = "Fat: " + fatValue;

  // Fiber
  let fiberInfo = foodNutrients.find(n => n.nutrientName == "Fiber, total dietary");
  let fiberValue = fiberInfo.value + fiberInfo.unitName.toLowerCase();
  let fiberP = document.createElement("p");
  fiberP.classList.add("details-item");
  fiberP.innerHTML = "Fiber: " + fiberValue;

  detailsList.innerHTML = "";
  detailsList.appendChild(energyP);
  detailsList.appendChild(proteinP);
  detailsList.appendChild(carbP);
  detailsList.appendChild(sugarP);
  detailsList.appendChild(fatP);
  detailsList.appendChild(fiberP);

  detailsHeading.innerHTML = foodItem.description;
}
