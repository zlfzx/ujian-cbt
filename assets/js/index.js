const drop = document.querySelector('nav .nav-wrapper ul li');
const menu = document.querySelector('#dropdown');
const main = document.querySelector('main');
	function muncul() {
		menu.classList.toggle('muncul');
	};

	drop.addEventListener('click', muncul);

// window.addEventListener('mouseup', function(event){ 
// 	if( event.target != menu ) {
// 		menu.classList.remove('muncul');
// 	}
// });

// Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.klik')) {

//     var dropdowns = document.getElementsById("dropdown");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('muncul')) {
//         openDropdown.classList.remove('muncul');
//       }
//     }
//   }
// }

document.addEventListener('DOMContentLoaded', function() {
		var btn = document.querySelector('.modal');
		M.Modal.init(btn)
	});