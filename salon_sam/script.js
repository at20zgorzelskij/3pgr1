// variables for calculating
var base = 0;
var color_price = 0;
var extras_price = 0;
var rims_price = 0;

//constants for elements
const base_p = document.getElementById('base_p');
const color_p = document.getElementById('color_p');
const rims_p = document.getElementById('rims_p');
const carimg = document.getElementById('carimg');
const extras_to_add = document.getElementById('extras-to-add');

//funciton for summing elements
function sum() {
    document.getElementById('sum').innerHTML = 'Razem: ' + (base + color_price + extras_price + rims_price) + ' zł';
}

// start sequence
base = Number(document.getElementById("model").value);
color_price = Number(document.getElementById("color").value);
base_p.innerHTML = 'Cena podstawowa: ' + base + ' zł';
color_p.innerHTML = 'Kolor: ' + color_price + ' zł'; 


// handling of model changing
document.getElementById("model").addEventListener('change', function(){
    base = Number(this.value);
    base_p.innerHTML = 'Cena podstawowa: ' + base + ' zł';
    sum();
});

//handling of color(image) changing
document.getElementById("color").addEventListener('change', function(){
    color_price = Number(this.value);
    carimg.src = this.options[this.selectedIndex].text + '.png';
    color_p.innerHTML = 'Kolor: ' + color_price + ' zł';  
    sum();
});

// handling of rims changing
document.querySelectorAll('input[name="felgi"]').forEach(radio => radio.addEventListener('change', function(){
    rims_price = Number(this.value);
    rims_p.innerHTML = "Felgi: " + rims_price + ' zł';
    sum();
}));

// handling of extras adding
document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.addEventListener('change', function(){
    if(this.checked == true){
        var p = document.createElement('p');
        p.setAttribute('id', 'box' + this.id);
        extras_to_add.append(p);
        document.getElementById('box' + this.id).innerHTML = this.name + ": " + this.value + ' zł';
	    extras_price += Number(this.value);
    }
    else{
        document.getElementById('box' + this.id).remove();
	    extras_price -= Number(this.value);
    }

    sum();
}));