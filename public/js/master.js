function toggleFunction(){
	var check = document.getElementsByClassName('search_toggle');
	var search = document.getElementById('mobileSearchBox');
	if(check.length == 0){
		search.classList.add("search_toggle");
	}
	else{
		search.classList.remove("search_toggle");
	}

}
function closeFunction(){
	var search = document.getElementById('mobileSearchBox');
	search.classList.remove("search_toggle");

}
function menutgmb(){
	console.log('ahi');
	var sub= document.getElementById("menuSub");
	sub.classList.toggle("hide");

}
function iconOpen(){
	console.log('ahi');
	var check = document.getElementsByClassName('mb_nav_tg');
	var search = document.getElementById('iconOpen');
	if(check.length == 0){
		search.classList.remove("mb_nav_tgrm");
		search.classList.add("mb_nav_tg");
	}
	else{
		search.classList.remove("mb_nav_tg");
		search.classList.add("mb_nav_tgrm");
	}
}
function backgroundFc(){
	var check = document.getElementsByClassName('mb_nav_tg');
	var search = document.getElementById('iconOpen');
	if(check.length == 0){
		return 0;
	}
	else{
		search.classList.remove("mb_nav_tg");
		search.classList.add("mb_nav_tgrm");
	}
}