
var workshops;
url = window.location.href.split('/technical.html',1)[0];
images_url = url + '/backend/Downloads/';

$(document).ready(function(){
    getWorkshops()
    .then(data => {workshops=data; return data})
    .then((data) => {generateWorkshops(); return true})
    .then((data)=> $.getScript('./js/events/demo.js'))
    });


    function getWorkshops(){
        return new Promise((resolve, reject)=> {
            workshop_endpoint = url + '/backend/index.php/workshop/get_workshop_data/0';
            fetch(workshop_endpoint)
                .then(data => resolve(data.json()))
            })
    }

    function generateWorkshops(){
        workshop_elems = $();
        overlay_elems = $();
        for(i=0;i<workshops.length;i++){
    
        work_elem = `<a href="#" class="grid__item">
        <div class="grid__item-bg"></div>
        <div class="grid__item-wrap">
            <img class="grid__item-img" src="${images_url}${workshops[i]['Poster_image']}" alt="Some image" />
        </div>
        <h3 class="grid__item-title">${workshops[i]['Title']}</h3>
        <h4 class="grid__item-number"></h4>
    </a>`
            
            workshop_elems = workshop_elems.add(work_elem);
        
            overlay_elem = `
            <div class="content__item">
            <div class="content__item-intro">
                <img class="content__item-img" src="${images_url}${workshops[i]['Poster_image']}" alt="Some image" />
                <h2 class="content__item-title"></h2>
            </div>
            <h3 class="content__item-subtitle">${workshops[i]['Title']}</h3>
            <div class="content__item-text">
            ${atob(workshops[i]['Description'])}
            <br>
            <a class="button" href="${workshops[i]['register_link']}">Register <i class="fas fa-arrow-circle-right"></i></a>

            </div>
           
        </div>`

            overlay_elems = overlay_elems.add(overlay_elem);
            if(i%10==0||i-workshops.length <=10){
                $('#events').append(workshop_elems);
                $('#event-details').append(overlay_elems);
                overlay_elem = $();
                workshop_elems = $();
                }
        }
        }