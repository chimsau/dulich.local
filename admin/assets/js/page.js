var functions = {
	remove_story: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoacauchuyen.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_tintuc: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoatintuc.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_user: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoauser.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_danhmuc: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoadanhmuc.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_diadiem: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoadiadiem.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_baivietdiadiem: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoabaivietdiadiem.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	},
	remove_binhluan: function(){
		$('.remove').on('click', function(){
			var result = confirm("Bạn muốn xóa");
			if (result) {
				var container = $(this).closest("tr");
				var id = $(this).attr('id');
				var string = 'id='+ id;

				$.ajax({
					type: "POST",
					url: "xoabinhluan.php",
					data: string,
					success: function(){
						container.slideUp('slow', function() {container.remove();});
					}
				});
			}
		});
	}
} 
