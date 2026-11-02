let currentProduct = null;
const products = {
  away: {
    name: "Rush",
    image: "images/awaybreezeedp.jpeg",
    desc: "Fresh citrus floral blend",
    type: "Unisex",
    fragrance: "Eau de Parfum",
    size: "50ml",
    longevity: "8 – 10 Hours",
    notes: {
      top: "Citrus, Peach",
      middle: "Jasmine, Gardenia",
      base: "Amber, Coriander"
    },
    reviews: [
      { name: "Aaliyah", text: "Fresh and luxurious.", rating: "★★★★★" },
      { name: "Nandi", text: "Clean and elegant.", rating: "★★★★☆" },
      { name: "Zee", text: "Nice but fades fast.", rating: "★★★☆☆" }
    ]
  },

  vanilla: {
    name: "Vanilla 28",
    image: "images/sweetvanilla.jpeg",
    desc: "Warm creamy vanilla blend.",
    type: "Ladies",
    fragrance: "Eau de Parfum",
    size: "50ml",
    longevity: "10 – 12 Hours",
    notes: {
      top: "Caramel, Brown Sugar",
      middle: "Vanilla, Orchid",
      base: "Amber, Musk"
    },
    reviews: [
      { name: "Bianca", text: "Soft and beautiful.", rating: "★★★★★" },
      { name: "Tee", text: "My everyday scent.", rating: "★★★★★" },
      { name: "Nolu", text: "Recieves compliments.", rating: "★★★★★" },
      { name: "Nono", text: "Luv but a bit sweet for my liking.", rating: "★★★☆☆" }
    ]
  },

  aura: {
    name: "The One",
    image: "images/aurabluedeep.jpeg",
    desc: "Fresh aquatic masculine scent.",
    type: "Men",
    fragrance: "Eau de Parfum",
    size: "50ml",
    longevity: "7 – 9 Hours",
    notes: {
      top: "Grapefruit, Bergamot",
      middle: "Cedarwood, Lavender",
      base: "Coriander, Amber"
    },
    reviews: [
      { name: "Liam", text: "Very fresh.", rating: "★★★★☆" },
      { name: "Akhona", text: "Gets compliments.", rating: "★★★★★" },
      { name: "Mthuthu", text: "Feels flamboyent and cool", rating: "★★★★★" },
      { name: "Thapelo", text: "Need more Citrus", rating: "★★★☆☆" }
    ]
  }
};

function showProduct(key) {
  currentProduct = key;
  const p = products[key];

  document.querySelector(".product-grid").classList.add("hidden");
  document.getElementById("product-detail").classList.remove("hidden");

  document.getElementById("productImage").src = p.image;
  document.getElementById("modalImg").src = p.image;

  document.getElementById("title").innerText = p.name;
  document.getElementById("desc").innerText = p.desc;
  document.getElementById("price").innerText = "R250";

  document.getElementById("moreInfo").innerHTML = `
    <p>Type: ${p.type}</p>
    <p>Fragrance: ${p.fragrance}</p>
    <p>Size: ${p.size}</p>
    <p>Longevity: ${p.longevity}</p>
  `;

  document.getElementById("notes").innerHTML = `
    <p>Top: ${p.notes.top}</p>
    <p>Middle: ${p.notes.middle}</p>
    <p>Base: ${p.notes.base}</p>
  `;

  document.getElementById("reviews").innerHTML =
    p.reviews.map(r => `
      <div class="review-box">
        <p>${r.rating}</p>
        <strong>${r.name}</strong>
        <p>${r.text}</p>
      </div>
    `).join("");
}

function showReview(key) {
  currentProduct = key;
  const p = products[key];

  document.querySelector(".product-grid").classList.add("hidden");
  document.getElementById("review-detail").classList.remove("hidden");

  document.getElementById("reviewImage").src = p.image;
  document.getElementById("reviewTitle").innerText = p.name;
  document.getElementById("reviewSummary").innerText = p.desc;

  document.getElementById("reviewContent").innerHTML =
    p.reviews.map(r => `
      <div class="review-box">
        <p>${r.rating}</p>
        <strong>${r.name}</strong>
        <p>${r.text}</p>
      </div>
    `).join("");
}

function backToGrid() {
  document.querySelector(".product-grid").classList.remove("hidden");
  document.getElementById("product-detail").classList.add("hidden");
}

function backToReviews() {
  document.querySelector(".product-grid").classList.remove("hidden");
  document.getElementById("review-detail").classList.add("hidden");
}

function openImage() {
  document.getElementById("imageModal").style.display = "flex";
}

function closeImage() {
  document.getElementById("imageModal").style.display = "none";
}