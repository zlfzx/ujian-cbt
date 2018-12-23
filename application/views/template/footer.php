<script type="text/javascript" src="<?=base_url('assets/materialize/js/materialize.js');?>"></script>
<script src="<?=base_url('assets/js/index.js');?>"></script>
<script>
	var ubah = document.getElementsByClassName('jadwal');
	ubah[0].addEventListener('click', function() {
		ubah[0].style.width = '50%';
		ubah[0].style.transition = 'all 1s ease';
	});
//
	ubah[1].addEventListener('click', function() {
		ubah[1].style.width = '50%';
		ubah[1].style.transition = 'all 1s';
	});
//
	ubah[2].addEventListener('click', function() {
		ubah[2].style.width = '50%';
		ubah[2].style.transition = 'all 1s';
	});

var  jadArray = ['jadwal1','jadwal2','jadwal3'];
	window.addEventListener('mouseup', function(event) {
	for (var i = 0; i < jadArray.length; i++) {
		var jad = document.getElementById(jadArray[i]);
		if( event.target != jad || event.target.parentNode != jad) {
				jad.style.width = '100%';
			}
		}
	});

</script>
</body>
</html>
