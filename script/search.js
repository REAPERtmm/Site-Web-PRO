
let datas;

$.getJSON("../script/product.json",
    function (data) {
        
    console.log(data)
        datas = data;
        start();
    }
);

function AddProduct(name, price, path, avis){
    htmlAdd(createProduct(name, price, path, avis));
}

function start(){
    datas.forEach(element => {
        AddProduct(element.name, element.price, element.link, element.avis)
    });
}

function htmlAdd(text){
    $("#catalogue").html($("#catalogue").html() + text);
}

function createProduct(name, price, path, avis){
    var alt = path.split("/");
    alt = alt[alt.length - 1].split(".")[0];

    return createhtml(
        "div", "product", 
        createhtml("div", "bottom-div-product", 
            createhtml("div", "img-product", 
                createImage("../Assets/" + path, alt)
            ) + 
            createhtml("h1", "title-product", name) +
            createhtml("i", "price-product", "" + price + "€") +
            createhtml("p", "Avis", avis)
        )
    )
}

function createhtml(balise, classe, content){
     return "<" + balise + ' class="' + classe + '">' + content + "</" + balise + ">"
}

function createImage(src, alt){
    return '<img src="' + src + '" alt="' + alt + '" width="100%", height="100%">'
}

