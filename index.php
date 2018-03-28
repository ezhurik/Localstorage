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
		var totalElements =0;

		clearLocalStorage();

		// call this method and pass the paramter which you want to store in localstorage
		// setLocalStorage(1);

		// this method removes the value from the array in localstorage
		// removeItem(5);

		// gets the items stored in the localstorage
		var arr=getLocalStorage();

		// array values
		console.log(arr);


		if (typeof arr !== 'undefined') 
		{
			totalElements =arr.length;
		}
		


		$("#displayDiv").text(" Total Items = "+totalElements);


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
			}
			else
			{
				// checks if the id is already added or not
				if(!checkExists($id))
				{
					var retrievedData = localStorage.getItem("myCart");
					var retrievedData = JSON.parse(retrievedData);
					var lengthArr = retrievedData.length;
					retrievedData[lengthArr]=$id;
					localStorage.setItem("myCart", JSON.stringify(retrievedData));
					// console.log(localStorage.getItem("myCart"));
				}
				else
				{
					console.log("Already added");
					return;
				}
			}
		}

		//checks if the paramater already exists in array or not
		function checkExists($id)
		{
			var retrievedData = localStorage.getItem("myCart");
			var retrievedData = JSON.parse(retrievedData);
			if ($.inArray($id, retrievedData) != -1)
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
				var retrievedData = JSON.parse(retrievedData);
				return retrievedData	;
			}
		}

		// removes specific value from local stroage array
		function removeItem($value)
		{
			var retrievedData = localStorage.getItem("myCart");
			var retrievedData = JSON.parse(retrievedData);
			
			var index = retrievedData.indexOf($value);

			if (index !== -1) {
				retrievedData.splice(index, 1);
			}

			clearLocalStorage();
			localStorage.setItem("myCart",JSON.stringify(retrievedData));
		}

	</script>
