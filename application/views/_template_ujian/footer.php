			</section>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="container">
		<?=strftime('%A, %d %B %Y')?>, <span class="live-clock"><?=date('H:i:s')?></span>
		<div class="pull-right hidden-xs">
			<b>SMK N 1 KEDUNGWUNI | Ujian Online</b> v1.0
		</div>
	</div>
	<!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/adminlte/dist/js/adminlte.min.js');?>"></script>

<script>
	$(document).ready(function(){
		setInterval(function() {
			var date = new Date();
			var h = date.getHours(), m = date.getMinutes(), s = date.getSeconds();
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);

			var time = h + ":" + m + ":" + s ;
			$('.live-clock').html(time);
		}, 1000);
	});
</script>
</body>
</html>
