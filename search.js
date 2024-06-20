const btn = document.querySelectorAll(".btn");
const storeProduct = document.querySelectorAll(".store-product");

for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", (e) => {
        e.preventDefault();

        const filter = e.target.dataset.filter;
        storeProduct.forEach((product) => {
            if (filter == "all" || product.classList.contains(filter)) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    });
}

const search = document.getElementById("search");
search.addEventListener("input", (e) => {
    const searchValue = search.value.trim().toLowerCase();

    storeProduct.forEach((product) => {
        const productName = product.textContent.toLowerCase();

        // Split the product name into words
        const words = productName.split(' ');

        let matchFound = false;
        words.forEach(word => {
            // Check if any word starts with the search value
            if (word.startsWith(searchValue)) {
                matchFound = true;
            }
        });

        if (searchValue === '' || matchFound) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
});
