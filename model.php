<html>
 <head>
  <title>Code Max test project 1 - Vimalraj</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
 </head>
 <body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Code Max</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="manuf.php">Manufacture</a></li>
      <li class="active"><a href="model.php">Model</a></li>
    </ul>
  </div>
</nav>
  <div class="container box">
   <h1 align="center">Code Max test project 1- Vimalraj</h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add details</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <div class="table-responsive">
	<span id="form_response"></span>
	<table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Car Name <i class="fa fa-sort"></i></th>
       <th>Manufacture Name <i class="fa fa-sort"></i></th>
	   <th>Color <i class="fa fa-sort"></i></th>
	   <th>Manuf Year <i class="fa fa-sort"></i></th>
	   <th>Reg Number <i class="fa fa-sort"></i></th>
	   <th>Notes <i class="fa fa-sort"></i></th>
       <th>Upload Images</th>
	   <th>View Images</th>
	   <th>Delete</th>
      </tr>
     </thead>
    </table>
	</div>
	
   </div>
  </div>
  <div id = "check"></div>
  
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
  }
  

  
  
  

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   // html += '<td ><select id="data2"></select></td>'; 
   html += '<td "><select id="data2">';

   html += '<?php 
$connect = mysqli_connect("localhost", "root", "", "testing");
$query = "SELECT ma_name FROM manuf ";
$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
$result = mysqli_query($connect, $query);
   $strr = '';
   while($row = mysqli_fetch_array($result))
   {
	 $strr .= '<option value = '.$row["ma_name"].'>'.$row["ma_name"].'</option>'; 
   }	   
   echo $strr;   
   ?>';
   html += '</select></td>';
   html += '<td contenteditable id="data3"></td>';	
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '<td><button type="button" name="cancel" id="cancel" class="btn btn-danger btn-xs">Cancel</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html); 
    
    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
   
   
  });
  
  
  $(document).on('click', '#insert', function(){
   var first_name = $('#data1').text();
   var last_name = document.getElementById("data2").value;
   var color = $('#data3').text();
   var ma_year = $('#data4').text();
   var reg_num = $('#data5').text();
   var note = $('#data6').text();
   if(first_name != '' && last_name != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name, color:color, ma_year:ma_year, reg_num:reg_num, note:note},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
   
  
  });
  
  
  
  
  
  
  

  
    $(document).on('click', '#cancel', function(){
      $('#user_data').DataTable().destroy();
      fetch_data();
   
  });
  
  
  
  
  
  
  
  
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
 
 
 
 // image processing
 
  $(document).on('click', '.view', function(){
  var id = $(this).attr('id');
  var options = {
   ajaxPrefix: '',
   ajaxData: {id:id},
   ajaxComplete:function(){
    this.buttons([{
     type: Dialogify.BUTTON_PRIMARY
    }]);
   }
  };
  new Dialogify('fetch_single.php', options)
   .title('View and Update Images')
	
	.showModal();
 });
 

 // image processing -- function for button   // data:{ids:ids,fna:fna},


  $(document).on('click', '.myFile', function(){  
   var id = $(this).attr("id");
   var fna = document.getElementById("myFile").value;
   
   if(fna == '') {$('#alert_message').html('<div class="alert alert-success">Select image, Then click on insert</div>');
   fetch_data();
   }
   else {
   if(confirm("confirm this?"+id+fna))
   {
    $.ajax({
     url:"img_update.php",
     method:"POST",
     data:{id:id,fna:fna},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  }
  delete id,fna;
  });
 







 
</script>