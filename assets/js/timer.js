var timer = 360;
var min = 0;
var sec = 0;

function startTimer() {
	min = parseInt(timer/60);
	sec = parseInt(timer%60);

	if(timer<1) {
	 	window.location = 'waktuHabis.html'
	}

document.getElementById('menit').innerHTML = min.toString();
document.getElementById('detik').innerHTML = sec.toString();
timer--;

setTimeout(function() {
	startTimer();
}, 1000);
};
time.addEventListener('load', startTimer());