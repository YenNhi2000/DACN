<!DOCTYPE HTML>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- Seo -->
    <link rel="canonical" href="http://localhost:8080/websiteNoiThat/dashboard">
    <!-- //Seo -->
    
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/backend/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' /> -->

    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href="{{asset('public/backend/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
    <!-- //side nav css file -->
    
    <!-- js-->
    <script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('public/backend/js/modernizr.custom.js')}}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts--> 

    <!-- Toast -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- //Toast -->

    <!-- chart -->
    <script src="{{asset('public/backend/js/Chart.js')}}"></script>
    <!-- //chart -->

    <!-- Metis Menu -->
    <script src="{{asset('public/backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/backend/js/custom.js')}}"></script>
    <link href="{{asset('public/backend/css/custom.css')}}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>
    <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
    <script src="{{asset('public/backend/js/pie-chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">

            $(document).ready(function () {
                $('#demo-pie-1').pieChart({
                    barColor: '#2dde98',
                    trackColor: '#eee',
                    lineCap: 'round',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-2').pieChart({
                    barColor: '#8e43e7',
                    trackColor: '#eee',
                    lineCap: 'butt',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-3').pieChart({
                    barColor: '#ffc168',
                    trackColor: '#eee',
                    lineCap: 'square',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });
            
            });

        </script>
    <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

        <!-- requried-jsfiles-for owl -->
        <link href="{{asset('public/backend/css/owl.carousel.css')}}" rel="stylesheet">
        <script src="{{asset('public/backend/js/owl.carousel.js')}}"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        items : 3,
                        lazyLoad : true,
                        autoPlay : true,
                        pagination : true,
                        nav:true,
                    });
                });
            </script>
        <!-- //requried-jsfiles-for owl -->
    </head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <!--left-fixed -navigation-->
            <aside class="sidebar-left">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <h1><a class="navbar-brand" href="{{url('/dashboard')}}"> N&T </a></h1>     <!-- <span class="fa fa-area-chart"></span><span class="dashboard_text">Quản lý</span> -->
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top: 20px;">
                        <ul class="sidebar-menu">
                            <!-- <li class="header">MAIN NAVIGATION</li> -->
                            <li class="treeview">
                                <a href="{{URL::to('/dashboard')}}">
                                    <i class="fa fa-dashboard"></i> <span>Tổng quan</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-staff')}}">
                                    <i class="fa fa-group"></i>
                                    <span>Nhân viên</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-category-product')}}">
                                    <i class="fa fa-book"></i>
                                    <span>Danh mục sản phẩm</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-brand-product')}}">
                                    <i class="fa fa-flag"></i>
                                    <span>Thương hiệu sản phẩm</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-type-product')}}">
                                    <i class="fa fa-pie-chart"></i>
                                    <span>Loại sản phẩm </span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-product')}}">
                                    <i class="fa fa-tasks"></i>
                                    <span>Sản phẩm</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-coupon')}}">
                                    <i class="fa fa-ticket"></i>
                                    <span>Mã giảm giá</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-order')}}">
                                    <i class="fa fa-file-text"></i>
                                    <span>Đơn hàng</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{URL::to('/all-customer')}}">
                                    <i class="fa fa-users"></i>
                                    <span>Khách hàng</span>
                                </a>
                            </li>
                            <!-- <li class="treeview">
                                <a href="{{URL::to('/all-product')}}">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span>Thống kê</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </aside>
        </div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left" style="padding-bottom: 10px;">
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!-- <div class="clearfix"> </div> -->
			</div>

			<div class="header-right">
				<!--search-box-->
				<!-- <div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" id="myInput" onkeyup="search()" placeholder="Tìm kiếm..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div> -->
                <!--//end-search-box-->
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="{{asset('public/backend/images/2.jpg')}}" alt=""> </span> 
									<div class="user-name">
										<p>
                                            <?php
                                                use Illuminate\Support\Facades\Session;

                                                $name = Session::get('admin_name');
                                                if ($name){
                                                    echo $name;
                                                }
                                            ?>
                                        </p>
										<span>Quản trị viên</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
                                <li> <a href="#modalView" data-toggle="modal"><i class="fa fa-suitcase"></i> Thông tin cá nhân </a> </li> 
								<li> <a href="{{url('/change-password')}}"><i class="fa fa-cog"></i> Đổi mật khẩu</a> </li> 
								<li> <a href="{{URL::to('/logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất </a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
        
                <div id="modalView" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="modal-top">
                                <h3 class="modal-title">Thông tin cá nhân</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-update">
                                    <div class="form-group">
                                        <label>Họ và tên: </label>
                                        <span>
                                            <?php
                                                $name = Session::get('admin_name');
                                                if ($name){
                                                    echo $name;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại: </label>
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email: </label>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
        	
                @yield('admin_content')
				
            </div>
        </div>
		


<!-- Slug -->
<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặc biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
<!-- //Slug -->

<!-- Gallery -->
    <script type="text/javascript">
        $(document).ready(function(){
            load_gallery();
            function load_gallery(){
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/select-gallery')}}",
                    method: "post",
                    data: {pro_id:pro_id, _token:_token},
                    success:function(data){
                        $('#gallery_load').html(data);
                    }
                });
            }

            $('#file').change(function(){
                var error = '';
                var files = $('#file')[0].files;

                if(files.length > 5){
                    error += '<p?>Bạn chỉ được chọn tối đa 5 ảnh</p>';
                }else if(files.length == ''){
                    error += '<p>Bạn không được bỏ trống ảnh</p>';
                }else if(files.size > 2000000){
                    error += '<p>File ảnh không được lớn hơn 2MB</p>';
                }

                if(error == ''){

                }else{
                    $('#file').val('');
                    $('#error_gallery').html('<div class="alert alert-danger">' + error + '</div>');
                    return false;
                }
            });

            $(document).on('blur', '.edit_gal_name', function(){
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/update-gallery-name')}}",
                    method: "post",
                    data: {gal_id:gal_id, gal_text:gal_text, _token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<div class="alert alert-success">Cập nhật tên sản phẩm thành công</div>').delay(3000).slideUp();
                    }
                });
            });

            $(document).on('blur', '.delete-gallery', function(){
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();
                
                if (confirm('Bạn muốn xóa hình ảnh này không?')){
                    $.ajax({
                        url: "{{url('/delete-gallery')}}",
                        method: "post",
                        data: {gal_id:gal_id, _token:_token},
                        success:function(data){
                            load_gallery();
                            $('#error_gallery').html('<div class="alert alert-success">Xóa hình ảnh thành công</div>').delay(3000).slideUp();
                        }
                    });
                }
            });

            // $(document).on('change', '.file_image', function(){
            //     var gal_id = $(this).data('gal_id');
            //     var image = document.getElementById('file-' + gal_id).files[0];
            //     // var _token = $('input[name="_token"]').val();
                
            //     var form_data = new FormData();
            //     form_data.append("file", document.getElementById('file-' + gal_id).files[0]);   //name="file"
            //     form_data.append("gal_id", gal_id);

            //     if (confirm('Bạn muốn xóa hình ảnh này không?')){
            //         $.ajax({
            //             url: "{{url('/delete-gallery')}}",
            //             method: "post",
            //             data: {gal_id:gal_id, _token:_token},
            //             success:function(data){
            //                 load_gallery();
            //                 $('#error_gallery').html('<div class="alert alert-success">Xóa hình ảnh thành công</div>').delay(3000).slideUp();
            //             }
            //         });
            //     }
            // });
        });
    </script>
    <!-- //Gallery -->

	<!-- Alert -->
	<script>
		$('div.alert').delay(3000).slideUp();
	</script>
    
    <!-- Search -->
    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }   
            }
        }
    </script>

	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="{{asset('public/backend/js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
    <!-- CKEditor -->
    <script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>
    <!-- //CKEditor -->
    
    <!-- Validator -->
    <script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
    <script type="text/javascript">
        $.validate({
            
        });
        
        //pass: data-validation="length" data-validation-length="min9"
        //data-validation="confirmation" 
        //data-validation="strength" data-validation-strength="2"

        //name="user-email" data-validation = "email"
        //repeat: data-validation="confirmation" data-validation-confirm="user-email"
    </script>
    <!-- Validator -->
	<!--scrolling js-->
	<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('public/backend/js/scripts.js')}}"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src="{{asset('public/backend/js/SidebarNav.min.js')}}" type='text/javascript'></script>
	<script>
        $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('public/backend/js/bootstrap.js')}}"> </script>
	<!-- //Bootstrap Core JavaScript -->
	
</body>
</html>