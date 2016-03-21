/*
$(document).ready(function(){
	$(".myCategories").on("click", function(){
		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {	
  			$( "#inner_ajax_Output" ).html( data );
		});	
	});
});*/
$(document).ready(function(){
	hideSubcategories(1);

});

function hideSubcategories(start){
	if(start)
	{
		var clickedId = this.id;
		$(".categoryId1").show();
		$(".categoryId2").hide();
		$(".categoryId3").hide();
	}else
	{
		var clickedId = this.id;
		$(".categoryId1").hide();
		$(".categoryId2").hide();
		$(".categoryId3").hide();
		$(".categoryId" + clickedId).show();
	}
};

$(".myCategories").click(hideSubcategories)

/*
$(document).ready(function(){
	$(".myCategories").on("click", function(){
		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {	
  			$( "#inner_ajax_Output" ).html( data );
		});	
	});
});
*/

$(document).ready(function(){
	$("#searchField").keyup(function(){
		var clickedId = this.id;
		var value=$.trim($("#searchField").val());
		if(value.length == 0)
		{
			$( "#ajax_Output" ).hide();
	  		$( "#Not_Ajax_Output" ).show();
		}else
		{
			$.get( "searchProducts.php?id=" + searchField.value, function( data ) {	
	  			$( "#ajax_Output" ).html( data ).show();
	  			$( "#Not_Ajax_Output" ).hide();
			});	
		}
	});
});

function saveValues(){
	$.get( "verify.php?username=" + usernameInput.value + "&password=" + passwordInput.value, function( data ) {	
		$( "#" ).html(data);
	});	
}


$(".stileone").on("click", function() {
    $(this).css("background", "red");
})

/*
$(document).ready(function(){
	$(".textboxWidth").keyup(function(){
		
		var clickedId = this.id;
		var value=$.trim($(".textboxWidth").val());
		var productid=$.trim($(".textboxWidth").data("arbitraryName"));
		console.log(productid);
		if(value.length != 0)
		{
			window.location = "updateQuantity.php?quantity=" + value + "productid=" + productid;
			/*$.get( "updateQuantity.php?quantity=" + value, function( data ){
				console.log("made it 1");
			});
			console.log("made it 2");*/
		/*}else
		{
			//window.location = "updateQuantity.php?quantity=" + value;
			/*$.get( "updateQuantity.php?quantity=" + value, function( data ) {	
				console.log("made it 3");
	  			//$( "#ajax_Output" ).html( data ).show();
	  			//$( "#Not_Ajax_Output" ).hide();
			});	
			console.log("made it 4");*/
		/*}
	});
});*/
/*$("#minusQuantity").onclick(function(){
	var ajaxurl = 'updateQuantity.php';
	var data = {quantity: $(this).};
	$.post(ajaxurl)
})
$("#plusQuantity").onclick()*/


function makeChanges(tableName){
	$.ajax({
		url: "makeTableChanges.php",
	    method: 'POST',
	    //dataType:"json",
	   	data: {tableName},
	    success: function(){
	    	console.log('madeit');
	    	//14 transaction_id
	    	/*console.log(dataVar);
	    	console.log(dataVar.html);
	    	console.log(dataVar[2]);
	    	htmlEditor.setValue(dataVar.html);
	    	javascriptEditor.setValue(dataVar.javascript);
	    	cssEditor.setValue(dataVar.css);
	    	result = dataVar;*/
	     //$("#responseArea").text(data);
	     
	     //setCodeBoxes(result);

	    },
	    error : function() {
		 		alert("error");
		 	}
	});
}

function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}

/*
$(':button').click(function() {
	var buttonElementId = $(this).attr('id');
	name = $('#nameOnCard' + buttonElementId).text();
    type = $('#cardType' + buttonElementId).text();
    number = $('#cardNumber' + buttonElementId).text();
    code = $('#securityCode' + buttonElementId).text(); 
    exp = $('#exp' + buttonElementId).text();
    console.log(name);
    console.log(type);
    console.log(number);
    console.log(code);
    console.log(exp);
	$.ajax({
		url: "updatePayment.php",
	    method: 'POST',
	    dataType:"text",
	   	data: {name: name, type: type, number: number, code: code, exp: exp, payment_id: buttonElementId},
	    success: function(){
	    	console.log('madeit');
	    	//14 transaction_id
	    	/*console.log(dataVar);
	    	console.log(dataVar.html);
	    	console.log(dataVar[2]);
	    	htmlEditor.setValue(dataVar.html);
	    	javascriptEditor.setValue(dataVar.javascript);
	    	cssEditor.setValue(dataVar.css);
	    	result = dataVar;*/
	     //$("#responseArea").text(data);
	     
	     //setCodeBoxes(result);
/*
	    },
	    error : function() {
		 		alert("error");
		 	}
	 });


});*/
/*$_POST['name'], $_POST['type'], $_POST['number'], $_POST['code'], $_POST['exp'], $_SESSION['customerid']
nameOnCard,cardType,cardNumber,securityCode,expiration*/

/*
document.getElementById("updatePayment").onclick = function () {
    location.href = "www.yoursite.com";
};*/

/*
$("#updatePayment").on('click', function(){
	$.ajax({
		url: "updatePayment.php",
	    method: 'POST',
	    //dataType:"json",
	   	data: {name, type, number, code, exp},
	    success: function(){
	    	console.log('madeit');
	    	//14 transaction_id
	    	/*console.log(dataVar);
	    	console.log(dataVar.html);
	    	console.log(dataVar[2]);
	    	htmlEditor.setValue(dataVar.html);
	    	javascriptEditor.setValue(dataVar.javascript);
	    	cssEditor.setValue(dataVar.css);
	    	result = dataVar;*/
	     //$("#responseArea").text(data);
	     
	     //setCodeBoxes(result);

/*	    },
	    error : function() {
		 		alert("error");
		 	}
	 });
});
*/


