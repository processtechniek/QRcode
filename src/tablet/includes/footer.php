<script>

const tabs = document.querySelectorAll('[data-tab-value]')
const tabInfos = document.querySelectorAll('[data-tab-info]')

tabs.forEach(tab => {
	tab.addEventListener('click', () => {
		const target = document
			.querySelector(tab.dataset.tabValue);

		tabInfos.forEach(tabInfo => {
			tabInfo.classList.remove('active')
		})
		target.classList.add('active');
	});
});

function show(divId) {
    //alert(divId);
    var list = document.getElementsByClassName("hideMe");
    //list.forEach(hideTabs);
    // alert(list.length);

    for(var i = 0; i < list.length; i++) {
       // alert(list[i]);
        list[i].style.display = "none";
    }

    document.getElementById(divId).style.display = "block";
   // document.getElementById(divId).style.visibility = "visible";
    //alert();
    
}

function hide() {
    //alert(divId);
    var list = document.getElementsByClassName("hideMe");

    //list.forEach(hideTabs);
    // alert(list.length);

    for(var i = 0; i < list.length; i++) {
       // alert(list[i]);
        list[i].style.display = "none";
    }

    // document.getElementById(divId).style.display = "block";
   // document.getElementById(divId).style.visibility = "visible";
    //alert();
    
}

</script>

</body>
</html>