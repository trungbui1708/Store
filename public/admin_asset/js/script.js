
$(document).ready(function() {
  $('#thongke_ngay').click(function(){
  window.location.href = "admin/orderDate";
	});

	$('#thongke_thang').click(function(){
	  window.location.href = "admin/orderMonth";
	});

	$('#thongke_nam').click(function(){
	  window.location.href = "admin/orderYear";
	});
});
