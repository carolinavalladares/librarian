const starContainer = document.querySelector(".star_container");
const stars = Array.from(document.querySelectorAll(".star"));

const rating = Number(starContainer.getAttribute("name"));

// get rating whole number
const ratingInt = Math.floor(rating);

// get decimal portion of rating
const ratingDecimal = parseFloat((rating % 1).toFixed(2));

for (let i = 0; i < ratingInt; i++) {
    stars[i].style.maxWidth = "100%";
}
// fill last star according to decimal portion of rating
stars[ratingInt].style.maxWidth = `${ratingDecimal * 100}%`;
