<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE DETAILS</title>

    <!--CONNECTING CSS OF BOOTSTRAP-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NEW USER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="completename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="completename" placeholder="Enter your Name">
                        <p id="p1"></p>
                    </div>
                   <div class="mb-3">
                        <label for="completeemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="completeemail" placeholder="Enter your Email">
                        <p id="p2"></p>
                    </div>
                    <div class="mb-3">
                        <label for="completemobile" class="form-label">Phone Number </label>
                        <input type="text" class="form-control" id="completemobile" placeholder="Enter your Phone Number">
                        <p id="p3"></p>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger close" data-bs-dismiss="modal">Close</button>
                    <button type="button1" class="btn btn-dark" onclick="adduser()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- update model -->
    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updatename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updatename" placeholder="Enter your Name">
                        <p id="p7"></p>
                    </div>
                   <div class="mb-3">
                        <label for="updateemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="updateemail" placeholder="Enter your Email">
                        <p id="p8"></p>
                    </div>
                    <div class="mb-3">
                        <label for="updatemobile" class="form-label">Phone Number </label>
                        <input type="text" class="form-control" id="updatemobile" placeholder="Enter your Phone Number">

                        <p id="p9"></p>
                
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type ="hidden" id="hiddendata">
                    <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-3">
        <h1 class="text-center"> Employee Details</h1>
        <button type="button" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
            ADD NEW USER
        </button>
        <div id="displayDataTable"></div>

    </div>

    <!--CONNECTING JAVASCRIPT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        $(document).ready(function(){
            displayData();
        })

        function displayData(){
            var displayData="true";
            $.ajax({
                url:"display.php",
                type:'post',
                data:{
                    displaySend:displayData
                },
                success:function(data,status){
                    $('#displayDataTable').html(data);
                }
            });
        }
function adduser(){
    var nameAdd =$('#completename').val();
    var emailAdd =$('#completeemail').val(); 
    var mobileAdd = $('#completemobile').val();
   
      if(nameAdd.length==""){
        $("#p1").text("Please enter your name");
        $("#completename").focus();
        return false;
      }
      var everify = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if(emailAdd == ""){
        $("#p2").text("Please enter your email");
        $("#completeemail").focus();
        return false;
      }
     if( everify.test(emailAdd)){
         //
        }
        else{
            $("#p2").text("  Invalid email address");
        $("#completeemail").focus();
        return false;
        
     }

var mverify = /^[0-9]*$/;
if(mobileAdd == ""){
        $("#p3").text("Please enter your mobile");
        $("#completemobile").focus();
        return false;
      }

        if((mverify.test(mobileAdd)) && (mobileAdd.length === 10)){
            //
        }
        else{
            $("#p3").text("Invalid number");
        $("#completemobile").focus();
        return false;
        
     }


    $.ajax({
        url:"insert.php",
        type:'post',
        data:{
             nameSend:nameAdd,
             emailSend:emailAdd,
             mobileSend:mobileAdd
            },
            success:function(data){
                //function to display data
                if(data == 1){
                    $(".close").click();
                }
                //console.log(status)
                 //$('#completeModal').modal('hide');
                displayData();
               

            }
          });
     

}


function DeleteUser(deleteid){
$.ajax({
    url:"delete.php",
    type:'post',
    data:{
        deleteSend:deleteid
    },
    success:function(data,status){
        displayData();
    }
})
}

function getDetails(updateid){
    $('#hiddendata').val(updateid);
    $.post("update.php",{updateid:updateid},function(data,status){
        var userid=JSON.parse(data);
        $('#updatename').val(userid.name);
        $('#updateemail').val(userid.email);
        $('#updatemobile').val(userid.mobile);
        

    });

$('#updatemodal').modal("show")
}


function updateDetails(){
    var updatename=$('#updatename').val();
    var updateemail=$('#updateemail').val();
    var updatemobile=$('#updatemobile').val();
    

    var hiddendata= $('#hiddendata').val();

    if(updatename.length==""){
        $("#p7").text("Please enter your name");
        $("#updatename").focus();
        return false;
      }

      var everify = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if(updateemail == ""){
        $("#p8").text("Please enter your email");
        $("#updateemail").focus();
        return false;
      }
     if( everify.test(updateemail)){
         //
        }
        else{
            $("#p8").text("  Invalid email address");
        $("#updateemail").focus();
        return false;
        
     }

   

     var mverify = /^[0-9]*$/;
if(updatemobile == ""){
        $("#p9").text("Please enter your mobile");
        $("#updatemobile").focus();
        return false;
      }

        if((mverify.test(updatemobile)) && (updatemobile.length === 10)){
            //
        }
        else{
            $("#p9").text("Invalid number");
        $("#updatemobile").focus();
        return false;
        
     }

$.post("update.php",{
    updatename:updatename,
    updateemail:updateemail,
    updatemobile:updatemobile,
    hiddendata:hiddendata
},function(data,status){
$('#updatemodal').modal('hide');
displayData();
});

}

</script>


</body>

</html>