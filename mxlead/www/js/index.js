function logOut(){
		
		 localStorage.setItem("login", "");
	     localStorage.setItem("user", "");

		$.mobile.changePage($("#login"));

	}



	function getSurvey(){
		
	
		
	var user=localStorage.getItem("user");
	
	
	$.ajax({
  	
			url : "http://fajjemobile.info/mxlead/WebService/getList.php",
				type: "GET",
				async: true,
				data: {user:user},
	   		    success:function(response){
                       
				//	   alert(response);
					  
					  var list=response.split("^");
	$("#nameList").empty();

	for(var j =1;j<list.length;j++){

var lists = list[j].split(",");

$("#nameList").append($('<li/>', {    //here appending `<li>`
			'data-role':'list-divider',
			'text': lists[0],
			'style': 'background:gray'
			}));
			
		for(var i =1;i<lists.length;i++){
		
			var listData=lists[i].split("#");
			
			$("#nameList").append($('<li/>', {    //here appending `<li>`
			
			}).append($('<a/>', {    //here appending `<a>` into `<li>`
			'href':'#',
			'rel':'external',
			'data-transition':'pop',
			'text': listData[1],
			'onclick':'getData('+listData[0]+')'
			})));
		
		}
	}
					  
					  	$('#nameList').listview('refresh');
            $.mobile.loading( "hide" );
			    },
                error: function (request, status, error) {
					$.mobile.loading( "hide" );
                    alert("Couldn't connect to the internet");
                } 
					   
	            
	
	});
	
	}














	
	$(document).ready(function () {
	
	if(localStorage.getItem("login")!="Yes"){

	$.mobile.changePage($("#login"));		
		
		}else{
			$.mobile.loading( "show");
			getSurvey();
			
			
			}
			
				
});


	
	
	function loginCheck(){
	var userid=$('#username').val();
	var pass=$('#password').val();
	
	
	
	$.ajax({
  	
			url : "http://fajjemobile.info/mxlead/WebService/checkLogin.php",
				type: "GET",
				async: true,
				data: {user:userid,password:pass},
	   		    success:function(response){
                       
					   
					   
					   if(response!="No"){
						   localStorage.setItem("login", "Yes");
						   localStorage.setItem("user", response);
						   $.mobile.changePage($("#surveyList"),"slide");
						   getSurvey();
						   	
						   }else{
$('#username').val="";							   
							   }
	$('#password').val="";
	            },
        error: function (request, status, error)  
        {
            alert("Coundn't connect to the internet");     
        }
	
	});
	
	}
	
	

	
		function insert(){


$("#huser_id").val(localStorage.getItem("user"));
var postData = $('#ajaxform').serializeArray();
 
   
  
   
    $.ajax(
    {
        url : "http://fajjemobile.info/mxlead/WebService/insert.php",
        type: "POST",
		async: true,
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
           location.reload();
        },
        error: function (request, status, error)  
        {
            alert("Coundn't connect to the internet");     
        }
    });
  
	}
	
	
	
		function updateStatus(){


var dataID = $('#dataidv').val();
var status = $('#status').val();
 
  
   
    $.ajax(
    {
        url : "http://fajjemobile.info/mxlead/WebService/update.php",
        type: "GET",
		async: true,
        data : {ID:dataID,status:status},
        success:function(data, textStatus, jqXHR) 
        {

           if(data=="Yes"){
			   $('#popupUpdate').popup('close');
			   }
        },
        error: function (request, status, error)  
        {
            alert("Coundn't connect to the internet");     
        }
    });
  
	}
	
	
function getData(id){	
		
	$.ajax({
  	
			url : "http://fajjemobile.info/mxlead/WebService/getdata.php",
				type: "GET",
				async: true,
				data: {ID:id},
	   		    success:function(response){
                       
					   //alert(response);
					  var fetchData=response.split(",");
						$('#dataidv').val(fetchData[0]);
						$('#namev').val(fetchData[1]);
						$('#telv').val(fetchData[2]);
						$('#addressv').val(fetchData[3]);
						$('#cityv').val(fetchData[4]);
						$('#zipv').val(fetchData[5]);
						$('#emailv').val(fetchData[6]);
						$('#interestv option:eq('+fetchData[7]+')').prop('selected', true);
						$('#cdatev').val(fetchData[9]);
						$('#ratev').val(fetchData[10]);
						$('#havev option[value='+fetchData[8]+']').attr('selected', 'selected');
						$('#systemv option[value='+fetchData[11]+']').attr('selected', 'selected');
						$('#statusv').val(fetchData[12]);
            			$.mobile.loading( "hide" );
					  	$.mobile.changePage($("#viewData"));
			
			    },
                error: function (request, status, error) {
					$.mobile.loading( "hide" );
                    alert("Couldn't connect to the internet");
                } 
					   
	            
	
	});
	
	
}