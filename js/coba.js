var keyword = document.getElementById('keyword');
var container = document.getElementById('asek');

keyword.addEventListener('keyup',function(){

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange= function () {
		if (xhr.readyState==4 && xhr.status==200) {
			/*console.log(xhr.responseText);*/
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET','../ajax/barang.php?key=' + keyword.value,true);
	xhr.send();
})