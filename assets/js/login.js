/**
 * Variables
 */
const lupaButton = document.getElementById('lupa-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
lupaButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)

  $(function(){

    $('.btnceknis').click(function(){
      if($('#fnis').val() != ''){
        var nis = $('#fnis').val();
        //alert(nis);
        $.ajax({
          url: base_url + '/Login/ceknis',
          data: { nis: nis },
          method: 'POST',
          dataType: 'json',
          cache: false,
          success: function(hasil){
            if (hasil != 0){
              if (!hasil.error) {
                $('.formnis').hide(1000);
                $('.formjawab').show(2000);
                $('.pertanyaan').html(hasil.pertanyaan);
                //Pertanyaan
                $('.btn-jawab').click(function(){
                  if ($('.jawab').val() != "") {
                    var jawab = $('.jawab').val();
                    var nis = hasil.nis;
                    $.ajax({
                      url: base_url + '/Login/cekjawab',
                      type: 'POST',
                      data: {
                        nis: nis, jawaban: jawab
                      },
                      dataType: 'json',
                      cache: false,
                      success: function(cekjawaban){
                        if (cekjawaban != 0) {
                          $('.formjawab').hide(1000);
                          $('.formreset').show(2000);
                          $('.nis').val(cekjawaban.nis);
                          //Reset Password
                          $('.formreset').submit(function(){
                          	var nis = cekjawaban.nis;
                          	var passwd = $('#passwd').val();
                          	var repasswd = $('#repasswd').val();
                          	if (repasswd != passwd) {
                          		$('.error-redB').show(500);
                          		$('#repasswd').keydown(function(){
                          			$('.error-redB').hide(500);
                          		});
                          		return false;
                          	}
                          })
                          //End reset password
                        }
                        else{
                          $('.error-redB').show(500);
                          $('#fjawab').keydown(function(){
                            $('.error-redB').hide(500);
                          })
                        }
                      }
                    })
                  }
                  return false;
                })
                //End Pertanyaan
              }
              else{
                alert(hasil.error)
              }
            }
            else{
              $('.error-redB').show(500);
              $('#fnis').keyup(function(){
                $('.error-redB').hide(500);
              })
            }
          }
        });
      }
      return false;
    });

  });