window.onload = (function(){
'use strict'

const portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
const portfolioPostContainer = document.getElementById("portfolio-posts-container");

let a = 0;
let b = 5;

if (portfolioPostsBtn) {
	portfolioPostsBtn.addEventListener("click", function() {
		
		let page = this.getAttribute("data-page");
		let ajaxurl = this.getAttribute("data-url");

		let ourRequest = new XMLHttpRequest();
		
		ourRequest.open('GET', 'http://multitorg.local:8080/wp-json/wp/v2/posts');
		
		ourRequest.onload = function() {
  	
  	if (ourRequest.status === 200) {
	    	let data = JSON.parse(ourRequest.responseText);	   
		    
		    data.forEach((data, index) => {
		    	(index >= a && index <= b) ? console.log(data) : false; 
		    });	

		    a += 6;
		    b += a;    
	  	} else {
	    	console.log("We connected to the server, but it returned an error.");
	  	}
		
		};

		ourRequest.onerror = function() {
  		console.log("Connection error");
		};

		ourRequest.send();
	});	
}

}());