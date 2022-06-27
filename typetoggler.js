const selector = document.getElementById("productType");
    const typeSwitcher = document.getElementsByClassName("field").item(3);
    const addBtn = document.getElementById('add-product-btn')


    const dvd = document.createElement("div");
    dvd.className = "dvd";
    dvd.innerHTML =
        '\
                <div class="field">\
                    <label for="size">Size (MB)</label>\
                    <input required name="size" type="text" id="size" >\
                </div>\
                <p>Please include the dvd size, it is a vital piece of info for potential buyers</p>';

    const book = document.createElement("div");
    book.className = "book";
    book.innerHTML =
        '\
                <div class="field">\
                    <label for="weight">Weight (kg)</label>\
                    <input required name="weight" type="text" id="weight">\
                </div>\
                <p>Input the book weight in grams</p>';

    const furniture = document.createElement("div");
    furniture.className = "furniture";
    furniture.innerHTML =
        '\
                <div class="field">\
                    <label for="height">Height (cm)</label>\
                    <input required name="height" type="text" id="height">\
                </div>\
                <div class="field">\
                    <label for="width">Width (cm)</label>\
                    <input required name="width" type="text" id="width">\
                </div>\
                <div class="field">\
                    <label for="length">Length (cm)</label>\
                    <input required name="length" type="text" id="length">\
                </div>\
                <p>Input the dimensions of the piece, or an average in HxWxL format in cm</p>';



    selector.addEventListener("change", (e) => {
        e.preventDefault();

        addBtn.disabled = false;


        if (typeSwitcher.nextSibling) {
            typeSwitcher.nextSibling.remove();
        }
        switch (e.target.value) {
            case "dvd":
                typeSwitcher.insertAdjacentElement("afterend", dvd);
                break;
            case "book":
                typeSwitcher.insertAdjacentElement("afterend", book);
                break;
            case "furniture":
                typeSwitcher.insertAdjacentElement("afterend", furniture);
                break;
        }
    });