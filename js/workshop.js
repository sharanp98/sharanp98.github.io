

var workshops;
url = window.location.href.split('/workshops.html',1)[0];
images_url = url + '/backend/Downloads/';

$(document).ready(function(){
getWorkshops()
.then(data => {workshops=data; return data})
.then((data) => {generateWorkshops(); return true})
.then((data)=> $.getScript('./js/demo1.js'))
});

function getWorkshops(){
    return new Promise((resolve, reject)=> {
        workshop_endpoint = url + '/backend/index.php/workshop/get_workshop_data';
        fetch(workshop_endpoint)
            .then(data => resolve(data.json()))
        })
}

function generateWorkshops(){
workshop_elems = $();
overlay_elems = $();
for(i=0;i<workshops.length;i++){
    work_elem = `<a class="grid__item" href="#id-${workshops[i]['Sno']}">
    <div class="box">
        <div class="box__shadow" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;"></div>
        <img class="box__img" src="${images_url}${workshops[i]['Poster_image']}" alt="Some image" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;">
        <h4 class="box__text box__text--bottom" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;"><span class="box__text-inner box__text-inner--rotated1">${workshops[i]['Title']}</span></h4>
    </div>
</a>`
    workshop_elems = workshop_elems.add(work_elem);

    overlay_elem = `<div class="overlay__item" id="id-${workshops[i]['Sno']}">
    <div class="box">
        <div class="box__shadow"></div>
        <img class="box__img box__img--original" src="${images_url}${workshops[i]['Poster_image']}" alt="Some image">
        <h4 class="box__text"><span class="box__text-inner"></span></h4>
    </div>
    <p class="overlay__content">${atob(workshops[i]['Description'])}</p>
</div>`

    overlay_elems = overlay_elems.add(overlay_elem);
    if(i%10==0||i-workshops.length <=10){
        $('#workshops').append(workshop_elems);
        $('#workshop_details').append(overlay_elems);
        overlay_elem = $();
        workshop_elems = $();
        }
}
}
