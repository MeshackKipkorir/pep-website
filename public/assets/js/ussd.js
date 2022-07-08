$.ajax({
    url:'https://uchaguzi.chanukafintech.com/api/main_results',
    dataType:'json',
    type:'GET',
    success:function(response){
        console.log(response);
        setResults(response);
    },
    error:function(response){
        console.log(response);
    }
});


function setResults(data){

    var table = document.getElementById('main_results');

    console.log(data['presidential_results']);

    //populate presidential
    for(var i = 0; i < data['presidential_results'].length; i++){

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['presidential_results'][i]['candidate'] +'</td>'+
            '<td>' + data['presidential_results'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['presidential_results'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }
    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+data['total']+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';


    //populate polling center
    populateGitiye(data);
    populateManthi(data);
    populateGacuru(data);
    populateGikuuru(data);
    populateKarimbene(data);
    populateKanywee(data);
    populateKauthene(data);
    populateKiamuri(data);
    populateKiija(data);
    populateMakandune(data);
    populateMatetu(data);
    populateMckMukuune(data);
    populateMpindi(data);
    populateMujwa(data);
    populateMuthikiine(data);
    populateNgonga(data);
    populateNkura(data);
    populateRikana(data);
    populateStPauls(data);
}

function populateGitiye(data){

    let table = document.getElementById('gitiye_primary_school');

    let total_votes = 0;
    for(var i = 0; i < data['gitiye_primary_school'].length; i++){

        //increment votes
        total_votes += parseInt(data['gitiye_primary_school'][i]['votes']);
        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['gitiye_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['gitiye_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['gitiye_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateManthi(data){

    let table = document.getElementById('manthi_primary_school');

    let total_votes = 0;

    for(var i = 0; i < data['manthi_primary_school'].length; i++){

        total_votes += parseInt(data['manthi_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['manthi_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['manthi_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['manthi_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateGacuru(data){

    let table = document.getElementById('gacuru_primary_school');

    let total_votes = 0;

    for(var i = 0; i < data['gacuru_primary_school'].length; i++){

        total_votes += parseInt(data['gacuru_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['gacuru_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['gacuru_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['gacuru_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateGikuuru(data){

    let table = document.getElementById('gikuuru_primary_school');

    let total_votes = 0;

    for(var i = 0; i < data['gikuuru_primary_school'].length; i++){

        total_votes += parseInt(data['gikuuru_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['gikuuru_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['gikuuru_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['gikuuru_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateGitune(data){

    let table = document.getElementById('gitune_coffee_factory');
    let total_votes = 0;

    for(var i = 0; i < data['gitune_coffee_factory'].length; i++){

        total_votes += parseInt(data['gitune_coffee_factory'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['gitune_coffee_factory'][i]['candidate'] +'</td>'+
            '<td>' + data['gitune_coffee_factory'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['gitune_coffee_factory'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}


function populateKanywee(data){

    let table = document.getElementById('kanywee_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['kanywee_primary_school'].length; i++){

        total_votes += data['kanywee_primary_school'][i]['votes'];

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['kanywee_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['kanywee_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['kanywee_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateKarimbene(data){

    let table = document.getElementById('karimbene_shopping_center');

    let total_votes = 0;

    for(var i = 0; i < data['karimbene_shopping_center'].length; i++){

        total_votes += parseInt(data['karimbene_shopping_center'][i]['votes'] );

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['karimbene_shopping_center'][i]['candidate'] +'</td>'+
            '<td>' + data['karimbene_shopping_center'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['karimbene_shopping_center'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateKauthene(data){

    let table = document.getElementById('kauthene_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['kauthene_primary_school'].length; i++){

        total_votes += parseInt(data['kauthene_primary_school'][i]['votes']);
        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['kauthene_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['kauthene_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['kauthene_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateKiamuri(data){

    let table = document.getElementById('kiamuri_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['kiamuri_primary_school'].length; i++){

        total_votes += parseInt(data['kiamuri_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['kiamuri_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['kiamuri_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['kiamuri_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateKiija(data){

    let table = document.getElementById('kiija_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['kiija_primary_school'].length; i++){

        total_votes += parseInt(data['kiija_primary_school'][i]['votes']);
        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['kiija_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['kiija_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['kiija_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateMakandune(data){

    let table = document.getElementById('makandune_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['makandune_primary_school'].length; i++){

        total_votes += parseInt(data['makandune_primary_school'][i]['votes']);
        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['makandune_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['makandune_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['makandune_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateMatetu(data){

    let table = document.getElementById('matetu_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['matetu_primary_school'].length; i++){

        total_votes += parseInt(data['matetu_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['matetu_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['matetu_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['matetu_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateMckMukuune(data){

    let table = document.getElementById('mck_mukuune_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['mck_mukuune_primary_school'].length; i++){

        total_votes += parseInt(data['mck_mukuune_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['mck_mukuune_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['mck_mukuune_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['mck_mukuune_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';

}

function populateMpindi(data){

    let table = document.getElementById('mpindi_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['mpindi_primary_school'].length; i++){

        total_votes += parseInt(data['mpindi_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['mpindi_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['mpindi_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['mpindi_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateMujwa(data){

    let table = document.getElementById('mujwa_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['mujwa_primary_school'].length; i++){

        total_votes += parseInt(data['mujwa_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['mujwa_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['mujwa_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['mujwa_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateMuthikiine(data){

    let table = document.getElementById('muthikiine_primary_school');

    let total_votes = 0;

    for(var i = 0; i < data['muthikiine_primary_school'].length; i++){

        total_votes += parseInt(data['muthikiine_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['muthikiine_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['muthikiine_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['muthikiine_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateNgonga(data){

    let table = document.getElementById('ngonga_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['ngonga_primary_school'].length; i++){

        total_votes += parseInt(data['ngonga_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['ngonga_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['ngonga_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['ngonga_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateNkura(data){

    let table = document.getElementById('nkura_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['nkura_primary_school'].length; i++){

        total_votes += parseInt(data['nkura_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['nkura_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['nkura_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['nkura_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateRikana(data){

    let table = document.getElementById('rikana_primary_school');
    let total_votes = 0;

    for(var i = 0; i < data['rikana_primary_school'].length; i++){

        total_votes += parseInt(data['rikana_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['rikana_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['rikana_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['rikana_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}

function populateStPauls(data){

    let table = document.getElementById('st_pauls_primary_school');

    let total_votes = 0;

    for(var i = 0; i < data['st_pauls_primary_school'].length; i++){

        total_votes += parseInt(data['st_pauls_primary_school'][i]['votes']);

        table.insertRow(-1).innerHTML =
            '<tr>'+
            '<td>' + parseInt(i+1) + '</td>'+
            '<td>' + data['st_pauls_primary_school'][i]['candidate'] +'</td>'+
            '<td>' + data['st_pauls_primary_school'][i]['votes'] + '</td>'+
            '<td>' + parseFloat(data['st_pauls_primary_school'][i]['percentage']).toFixed(2)+ '%' + '</td>'+
            '</tr>';
    }

    table.insertRow(-1).innerHTML =
        '<tr>'+
        '<td>#</td>'+
        '<td>Total</td>'+
        '<td>'+total_votes+'</td>'+
        '<td>'+ 100+'%'+'</td>'+
        '</tr>';
}



// function populatePollingCenter(data){
//
//     console.log(data['polling_station_results']);
//      var container = '<div class="container"> <div class="row"><div class="col-md-12"><div class="section-title" data-aos="zoom-out" style="text-align:center !important;"><p style="font-size: 20px;">Kauthene Primary School</p></div></div> </div> <div class="row"> <div class="col-md-12"> <table class="table table-responsive"> <thead> <tr> <th>#</th> <th>Candidate</th> <th>Votes</th> <th>Percentage</th> </tr> </thead> <tbody> <tr></tr> </tbody> </table> </div></div></div>';
//
//      var main_container = document.getElementById('main-container');
//      var table = document.getElementById('polling_station_results');
//
//      data['polling_stations'].forEach((polling_station)=>{
//          console.log(polling_station);
//
//          data['polling_station_results'].forEach((results,index) =>{
//                  table.insertRow(-1).innerHTML =
//                      '<tr>'+
//                      '<td>' + index + '</td>'+
//                      '<td>' + results['candidate'] +'</td>'+
//                      '<td>' + results['votes'] + '</td>'+
//                      '<td>' + results['polling_station'] + '</td>'+
//                      '<td>' + parseFloat(results['percentage']).toFixed(2)+ '%' + '</td>'+
//                      '</tr>';
//          }
//          );
//
//          main_container.innerHTML += '<div class="container">' +
//              '<div class="row">' +
//              '<div class="col-md-12">' +
//              '<div class="section-title" data-aos="zoom-out" style="text-align:center !important;"><p style="font-size: 20px;">'+ polling_station['polling_center'] +'</p></div></div> </div>' +
//              '<div class="row"> ' +
//              '<div class="col-md-12"> ' +
//              '<table class="table table-responsive TABLE">' +
//              '<thead> <tr>' +
//              '<th>#</th><th>Candidate</th> <th>Votes</th> <th>Percentage</th> </tr> </thead>' +
//              '<tbody>' +
//              '<tr><td>1</td><td>Mesh k</td><td>10</td><td>100%</td></tr>' +
//              '</tbody>' +
//              '</table>' +
//              '</div>' +
//              '</div>' +
//              '</div>';
//      });
//
// }
