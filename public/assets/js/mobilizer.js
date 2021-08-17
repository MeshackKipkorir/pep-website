//hide forms
document.getElementById('main_container').style.display = "none";

document.getElementById("search_btn").addEventListener("click", function(event){
    event.preventDefault()

    var id_no = document.getElementById('id_number').value;

    if(id_no != ""){

        var polling_station = document.getElementById('polling_station').value;

        $.ajax({
            url:"api/fetch_mobilizer/" + polling_station + "/" + id_no,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                console.log(response);
                populateForm(response);
            }
        });

        document.getElementById('main_container').style.display = "block";
    }
    else{
        document.getElementById('error').style.display = 'block';
    }
});


function populateForm(data) {

    if(data){
        document.getElementById('id_no').value = data['id_no'];
        document.getElementById('first_name').value = data['first_name'];
        document.getElementById('middle_name').value = data['other_name'];
        document.getElementById('last_name').value = data['last_name'];
        document.getElementById('mobile_no').value = data['phone_number'];
        document.getElementById('gender').value = data['gender'];
    }
    else{
        alert('no data');
    }
}

function showReason(){

   var status = document.getElementById('recruitment').value;

    if(status == 'not_recruited'){

        document.getElementById("reason").style.display = 'block';
    }
}


