//-----------------------------------------------------------------------------
// const lang = document.documentElement.lang;
// let country = document.getElementById('country');
// let state = document.getElementById('state');
// let listStateObj = null;
// let city = document.getElementById('city');
// let listCityObj = null;
// country.onchange = () => {
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function() {
//         // console.log(this.responseText);
//         this.responseText;
//         listStateObj = JSON.parse(this.responseText);
//         // console.log(obj);

// const { method } = require("lodash");

//         $htmlOption = "";
//         listStateObj.forEach((e) => {
//             $htmlOption += `<option value="${e.id}">${e.name_en}</option>`;
//             // console.log(e.id);
//         });
//         state.innerHTML = $htmlOption;
//     }
//     xhttp.open("GET", `http://localhost:8000/api/address/country/${country.value}/governorate`);
//     xhttp.send();
// };
// state.onchange = () => {
//     // console.log(state.value);
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function() {
//         console.log(this.status);
//         // this.responseText;
//         if(this.status === 200)
//         {
//             listCityObj = JSON.parse(this.responseText);
//             // console.log(obj);
    
//             $htmlOption = "";
//             listCityObj.forEach((e) => {
//                 $htmlOption += `<option value="${e.id}">${e.name_en}</option>`;
//                 // console.log(e.id);
//             });
//             city.innerHTML = $htmlOption;
//         }
//     }
//     xhttp.open("GET", `http://localhost:8000/api/address/country/${country.value}/governorate/${state.value}/city`);
//     xhttp.send();
// };
//-----------------------------------------------------------------------------
// const lang = document.documentElement.lang;
// let country = document.getElementById('country');
// let state = document.getElementById('state');
// let listStateObj = null;
// let city = document.getElementById('city');
// let listCityObj = null;
// country.onchange = () => {
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function() {
//         listStateObj = JSON.parse(this.responseText);
//         $htmlOption = "";
//         listStateObj.forEach((e) => {
//             // $htmlOption += `<option value="${e.id}">${e.name_en}</option>`;
//             $htmlOption += `<option value="${e.id}">${e[`name_${lang}`]}</option>`;
//         });
//         state.innerHTML = $htmlOption;
//     }
//     xhttp.open("GET", `/api/address/country/${country.value}/governorate`);
//     xhttp.send();
// };
// state.onchange = () => {
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function() {
//         if(this.status === 200)
//         {
//             listCityObj = JSON.parse(this.responseText);    
//             $htmlOption = "";
//             listCityObj.forEach((e) => {
//                 // $htmlOption += `<option value="${e.id}">${e.name_en}</option>`;
//                 $htmlOption += `<option value="${e.id}">${e[`name_${lang}`]}</option>`;
//             });
//             city.innerHTML = $htmlOption;
//         }
//     }
//     xhttp.open("GET", `/api/address/country/${country.value}/governorate/${state.value}/city`);
//     xhttp.send();
// };
//-----------------------------------------------------------------------------