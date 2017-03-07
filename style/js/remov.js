
		var serviceURL = "http://localhost/Re-Mov/service/";
		var	base_url="http://localhost/Re-Mov/";

		var userid;
	function login(){

			var username=document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var dataString = 'username=' + username + '&password=' + password ;


				if (username == '' || password=='' )
				{
					alert("Isi Semua Field");
				}
				else{
						$.ajax({
								type: "POST",
								url: serviceURL + "signin.php",
								data: dataString,
								success: function(result) {
									if(result="ok"){
										user(username);
										//alert(result);
										//$('#masuk').attr('Mengambil Data...')
										window.location.replace('#timeline');
										getTimelineList();
										}
								}

							});
						}

		}
	function user(username){
		$.getJSON(serviceURL + 'getuser.php', function(data) {
			//$('#cover').attr('src', "http://localhost/re-mov/"+data.Cover);
			$('#nama').text(data.Nama);
			$('#username').text(data.username);
			$('#alamat').text(data.Alamat);
			$('#tanggal_daftar').text(data.Tanggal_Daftar);
			$('#jenis_kelamin').text(data.Jenis_Kelamin);

		});
	}


$('#recommend').bind('pageinit', function(event) {
	getMovieList();
});

$('#timeline').bind('pageinit', function(event) {
	getTimelineList();
});


function getTimelineList() {
	$.getJSON(serviceURL + 'getTimeline.php', function(data) {
			$('#timelineList li').remove();
			timelines = data.timelines;
			//alert(timelines.Judul);

		$.each(timelines, function(index,timeline) {
			//alert(timeline.Judul);
			//list2="<li>TES</li>";
			list2 = '<li><a href="#detail" data-transition="slidefade" onclick="detail(\''+timeline.ID_film+'\')"><h1><strong>'+timeline.Judul+'</strong></h1><img src='+timeline.Cover+"><h3><strong>"+timeline.Nama+"</strong></h3><p>"+timeline.komentar+"</p><p class='ui-li-aside'><small>"+timeline.waktu+"</small></p></a></li>";
			$('#timelineList').append(list2);
		});
		$('#timelineList').listview('refresh');
		//alert(list);
		}).done(function( json ) {
    	//	alert("success");
	    })
 		 	.fail(function( jqxhr, textStatus, error ) {
    		var err = textStatus + ", " + error;
    	alert(err);
		});

}

function getMovieList() {

	$.getJSON(serviceURL + 'getMovie.php', function(data) {
			$('#recommendList li').remove();
			movies = data.movies;
			//alert(movies);

		$.each(movies, function(index,movie) {
 					if(movie.Negara_produksi=='Indonesia')
					{
							divider='<li data-role="list-divider">INDONESIA</li>';
							$('#recommendList').append(divider);

					}
					else if (movie.Negara_produksi=='Amerika')
					{
							divider='<li data-role="list-divider">AMERIKA</li>';
							$('#recommendList').append(divider);
					}

					list = '<li><a href="#detail" data-transition="slidefade" onclick="detail(\''+movie.ID_film+'\')">'+ movie.Judul +"</a></li>";

						$('#recommendList').append(list);



		});
		$('#recommendList').listview('refresh');
		//alert(list);
		}) 	.done(function( json ) {
    	//	alert("success");
	    })
 		 	.fail(function( jqxhr, textStatus, error ) {
    		var err = textStatus + ", " + error;
    	alert(err);
		});;


}

var film_id;

function detail(ID_film) {
//	alert(ID_film);
	$('#cover').attr('src','');
	$('#judul').text("");
	$('#judul1').text("");
	$('#sutradara').text("");
	$('#produksi').text("");
	$('#tayang').text("");
	$('#durasi').text("");
	$('#kategori').text("");
	$('#genre').text("");
	$('#rating').text("");
	$('#cast').text("");
	$('#sinopsis').text("");
	$('#produksi').text("");
	$('#tayang').text("");
	$.getJSON(serviceURL + 'getDetailFilm.php?ID_film='+ID_film, function(data) {
	//$("#test1").text("Hello world!");
	$('#cover').attr('src', "http://localhost/re-mov/"+data.Cover);
	$('#judul').text(data.Judul);
	$('#judul1').text(data.Judul);
	$('#sutradara').text(data.Sutradara);
	$('#produksi').text(data.Produksi);
	$('#tayang').text(data.Tanggal_tayang);
	$('#durasi').text(data.Durasi);
	$('#kategori').text(data.Kategori);
	$('#genre').text(data.Genre);
	$('#rating').text(data.Rating);
	$('#cast').text(data.Cast);
	$('#sinopsis').text(data.Sinopsis);
	$('#produksi').text(data.Produksi);
	$('#tayang').text(data.Tanggal_tayang);
	});

	film_id=ID_film;
}


function saveKomentar(){

	 alert(film_id);
}
/*
function save() {

    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var dept = document.getElementById("dept_name").value;
    var phone = document.getElementById("phone").value;

    alert(first_name +' '+last_name+' '+dept+' '+phone);

    var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&dept=' + dept + '&phone=' + phone;
    if (first_name == '' || last_name == '' || dept == '' || phone == '')
    {
        alert("Please Fill All Fields");
    }
    else
    {
	//AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: serviceURL + "service.php",
            data: dataString,
            success: function(result) {
                //alert(result);
                $("#linkDialog").click();
            }
        });
    }
    return false;
}

function detail (fname, lname, dept, phone) {
	//alert(fname);
	//$("#test1").text("Hello world!");
	$('#data_firstname').text(fname);
	$('#data_lastname').text(lname);
	$('#data_dept').text(dept);
	$('#data_phone').text(phone);
}

	//	alert (isi);

	$('button#button1').click(

		function(){
			$('p.merah').append(' hello ');
		});

	$('button#button2').click(
		function(){
			$('p.merah').append(' hello ');

			$('p.merah').toggle('slow');
		});

	$('button#button3').click(
		function(){

		$.get(
		'http://localhost:10000/abraham/ajax/service.php',
				function(danbo){
					$('p.merah').html(danbo.length);
				});

		}); */
