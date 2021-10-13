//cache
fetchRegisteredmembers();

//hide forms
document.getElementById('main_container').style.display = "none";

var loader = document.getElementById('overlay');

// document.getElementById("search_btn").addEventListener("click", function(event){
//     event.preventDefault()
//
//     var id_no = document.getElementById('id_number').value;
//
//     if(id_no != ""){
//
//         var polling_station = document.getElementById('polling_station').value;
//
//         loader.style.display = 'block';
//
//         $.ajax({
//             url:"api/fetch_mobilizer/" + polling_station + "/" + id_no,
//             type:"GET",
//             dataType:"JSON",
//             success:function(response){
//                 console.log(response);
//                 populateForm(response);
//             },
//             error:function (response){
//                 console.log(response);
//                 loader.style.display = 'none';
//             }
//         });
//
//         document.getElementById('main_container').style.display = "block";
//     }
//     else{
//         document.getElementById('error').style.display = 'block';
//     }
// });


function populateForm(data) {

    console.log(data);
            document.getElementById('user_not_found').style.display = 'none';

            document.getElementById('id_no').value = data['id_no'];
            document.getElementById('first_name').value = data['first_name'];
            document.getElementById('middle_name').value = data[0]['other_name'];
            document.getElementById('last_name').value = data[0]['last_name'];
            document.getElementById('mobile_no').value = data[0]['phone_number'];
            document.getElementById('gender').value = data[0]['gender'];

            loader.style.display = 'none';


}

function showReason(){

   var status = document.getElementById('recruitment').value;

    if(status == 'not_recruited'){

        document.getElementById("reason").style.display = 'block';
    }

    //call showsubmit
    showSubmit();

}

function showSubmit(){
    var recruited = document.getElementById('recruitment').value;
    var call_status = document.getElementById('call_status').value;

    console.log(recruited);
    console.log(call_status);

    if(recruited == "not_selected" || call_status == "not_selected"){
        alert('please select recruitment status and call status')
    }
    else{
        document.getElementById('submit').style.display = 'block';
    }

}

// document.getElementById("check_btn").addEventListener("click", function(event){
// //     event.preventDefault()
//
//     loader.style.display = 'block';
//
//     var poll_center = document.getElementById('super_mobilizer_polling_center').value;
//     var super_id = document.getElementById('super_mobilizer_id').value;
//     var mobilizer_id = document.getElementById('mobilizers_id').value;
//
//     //heck if user exists
//
//     $.ajax({
//         url:"api/check_mobilizer/" + poll_center + "/" + super_id,
//         type:"GET",
//         dataType:"JSON",
//         success:function(response){
//
//            if(response['response'] == 'mobilizer does not exists'){
//                 //show mobilizer exists
//                loader.style.display = 'none';
//                alert('super mobilizer does not exists/not recruited in this polling center');
//                //location.reload();
//            }
//            else{
//                document.getElementById('mobilizers_id').style.display = 'block';
//                document.getElementById('check_btn').style.display = 'none';
//                loader.style.display = 'none';
//            }
//         },
//         error:function (response){
//             console.log(response);
//             loader.style.display = 'none';
//         }
//     });
// });

document.getElementById("btn").addEventListener("click", function(event){
   event.preventDefault()
    loader.style.display = 'block';

    var id = document.getElementById('id_number').value;
    var polling_station = document.getElementById('polling_station').value;


    $.ajax({
        url:"api/search_mobilizer/" + id + '/' + polling_station,
        type:"GET",
        dataType:"JSON",
        success:function(response){
            populateMobilizerForm(response);
            loader.style.display = 'none';
        },
        error:function (response){
            console.log(response);
            loader.style.display = 'none';
        }
    });
});

function populateMobilizerForm(data){
    console.log(data['message']);

    if(data['message'] == 'Mobilizer already allocated token'){
        alert('Mobilizer already allocated Token');
    }
    else if(data['message'] == 'Not a registered Voter in Kiagu Ward'){
        alert('Not a registered Voter in Kiagu Ward or this polling center');
    }
    else{
        document.getElementById('main_container').style.display = "block";
        //document.getElementById('user_not_found').style.display = 'none';
        document.getElementById('id_no_two').value = data['message'][0]['id_no'];
        document.getElementById('first_name_two').value = data['message'][0]['first_name'];
        document.getElementById('middle_name_two').value = data['message'][0]['last_name'];
        document.getElementById('last_name_two').value = data['message'][0]['other_name'];
        document.getElementById('mobile_no_two').value = data['message'][0]['phone_number'];
        document.getElementById('gender_two').value = data['message'][0]['gender'];
    }

}

//call center

function callStatus(){
    let option = document.getElementById('call_status').value;

    if(option == 'missed' || option == 'invalid' || option == 'unreachable'){

        document.getElementById('main_area').style.display = 'none';
    }
    else{
        document.getElementById('main_area').style.display = 'block';

    }
}

function reason(){

    let option = document.getElementById('candidate').value;

    if(option == 13 || option == 12){
        document.getElementById('no').style.display = 'block';
        document.getElementById('yes').style.display = 'none';
    }
    else if(option != 3){
        document.getElementById('consider').style.display = 'block';
        document.getElementById('convince').style.display = 'block';
        document.getElementById('candidate').style.display = 'block';

    }
    else if(option == 3){
        document.getElementById('candidate_two').value = 3;

    }
    else{
        document.getElementById('yes').style.display = 'block';
        document.getElementById('candidate').style.display = 'block';
        document.getElementById('no').style.display = 'none';
        document.getElementById('consider').style.display = 'none';
        document.getElementById('convince').style.display = 'none';

    }
}

function token(){
    let option = document.getElementById('token_line').value;

    if(option == 0){
        document.getElementById('update_line').style.display = 'block';
    }
}

function fetchRegisteredmembers(){

    $.ajax({
        url:"https://uchaguzi.chanukafintech.com/api/fetch_registered_members",
        type:"GET",
        dataType:"JSON",
        success:function(response){
            console.log(response);
           // loader.style.display = 'none';
            populateRegisteredMembers(response);
        },
        error:function (response){
            console.log(response);
           // loader.style.display = 'none';
        }
    });
}

function populateRegisteredMembers(data){

    var table = document.getElementById('ussd');
    for(var i = 0; i < data.length; i++){
        console.log(data[i]);
        table.insertRow(-1).innerHTML =
            '<tr>'+
                '<td>' + parseInt(i+1) + '</td>'+
                '<td>' + data[i]['full_names'] +'</td>'+
                '<td>' + data[i]['id_no'] + '</td>'+
                '<td>' + data[i]['phone_no'] + '</td>'+
                '<td>' + data[i]['county'] + '</td>'+
                '<td>' + data[i]['constituency'] + '</td>'+
                '<td>' + data[i]['ward'] + '</td>'+
                '<td>' + data[i]['polling_station'] + '</td>'+
            '</tr>';
    }
}
