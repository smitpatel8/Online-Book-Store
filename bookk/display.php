<?php
   session_start();
   if(!isset($_SESSION['email'])){
    header('location : sellerlog.php');
   }

?>

 


<?php
$dk=$_SESSION['email'];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  session_start();
  session_unset();

  session_destroy();
  header("Location: sellerlog.php");
 
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & AjUD</title>
  <link rel="stylesheet" href="css/al.css">
    <link rel="stylesheet" href="css/style4.css" />

</head>
<body>
        <nav>
            <ul class="nav-links">
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><form action="" method='post'>
                    <input type="submit" value="Log out" />
                  </form>
              </li>
            </ul>
        </nav>



        <br>
        <br>

  <table id="main" border="0" cellspacing="0">
    
        <div id="search-bar">
        <a class="ad" href="insert.php">+Add Product</a>
        <br>
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
     
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "ajax-load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load

    // Insert New Records
    $("#save-button").on("click",function(e){
      e.preventDefault();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      if(fname == "" || lname == ""){
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      }else{
        $.ajax({
          url: "ajax-insert.php",
          type : "POST",
          data : {first_name:fname, last_name: lname},
          success : function(data){
            if(data == 1){
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            }else{
              $("#error-message").html("Can't Save Record.").slideDown();
              $("#success-message").slideUp();
            }

          }
        });
      } 

    });

    //Delete Records
    $(document).on("click",".delete-btn", function(){
      if(confirm("Do you really want to delete this record ?")){
        var studentId = $(this).data("id");
        var element = this;

        $.ajax({
          url: "ajax-delete.php",
          type : "POST",
          data : {id : studentId},
          success : function(data){
              if(data == 1){
                $(element).closest("tr").fadeOut();
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });

    //Show Modal Box
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("eid");

      $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

    //Save Update Form 
      $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var name = $("#edit-name").val();
        var photo = $("#edit-photo").val();
        var price = $("#edit-price").val();
        var metatags = $("#edit-metatags").val();
        var description = $("#edit-description").val();



        $.ajax({
          url: "ajax-update-form.php",
          type : "POST",
          data : {id: stuId, cname: name, file: photo, cprice: price ,cmetatags: metatags , cdescription: description},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      });

    // Live Search
     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>
</body>





</html>
