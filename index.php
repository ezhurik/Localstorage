<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

	<div style="height: auto;width: 100%;text-align: center;" >
		<span id="displayDiv"></span>
	</div>

</body>
</html>
<script type="text/javascript">

		// clearLocalStorage();

		// call this method and pass the paramter which you want to store in localstorage
		setLocalStorage(4);

		var arr=getLocalStorage();
		console.log(arr);
		console.log(arr.length);
		$("#displayDiv").text(" Total Items = "+arr.length);

		
		// this method clears all the variables stored in localstorage
		function clearLocalStorage()
		{
			localStorage.clear();
		}

		//sets the value in localstorage
		function setLocalStorage($id)
		{
			if(localStorage.getItem("myCart") == null)
			{
				var cartItemsArr = [];
				cartItemsArr[0] = $id;
				localStorage.setItem("myCart",JSON.stringify(cartItemsArr));
				console.log(cartItemsArr[0]);
			}
			else
			{
				// checks if the id is already added or not
				if(!checkExists($id))
				{
					var retrievedData = localStorage.getItem("myCart");
					var cartItemsArrRetrieved = JSON.parse(retrievedData);
					var lengthArr = cartItemsArrRetrieved.length;
					cartItemsArrRetrieved[lengthArr]=$id;
					localStorage.setItem("myCart", JSON.stringify(cartItemsArrRetrieved));
					console.log(localStorage.getItem("myCart"));
				}
				else
				{
					console.log("Already added");
					return;
				}
			}
		}

		//checks if the paramater is already added or not
		function checkExists($id)
		{
			// console.log(jQuery.type($id));
			var retrievedData = localStorage.getItem("myCart");
			var cartItemsArrRetrieved = JSON.parse(retrievedData);
			if ($.inArray($id, cartItemsArrRetrieved) != -1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}


		//returns the localstorage values
		function getLocalStorage()
		{
			if (localStorage.getItem("myCart") !== null) 
			{
				var retrievedData = localStorage.getItem("myCart");
				var cartItemsArrRetrieved = JSON.parse(retrievedData);
				return cartItemsArrRetrieved;
			}
		}

	</script>