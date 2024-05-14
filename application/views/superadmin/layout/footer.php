<!-- end::main content -->
<script>
	var base_url = "<?php echo base_url(); ?>";
</script>
<!-- begin::global scripts -->
<script src="<?php echo base_url() ?>adminassets/vendors/bundle.js"></script>
<!-- end::global scripts -->
<!--<link rel="stylesheet" href="--><?php //echo base_url() ?><!--adminassets/css/jquery.min.css">-->
<!--<script src="--><?php //echo base_url(); ?><!--adminassets/js/jquery-ui.min.js"></script>-->

<!-- begin::clockpicker -->
<script src="<?php echo base_url() ?>/adminassets/vendors/clockpicker/bootstrap-clockpicker.min.js"></script>
<!-- end::clockpicker -->
<!-- begin::chart -->
<script src="<?php echo base_url() ?>adminassets/vendors/charts/chartjs/chart.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/vendors/charts/sparkline/sparkline.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/vendors/circle-progress/circle-progress.min.js"></script>
<!--<script src="--><?php //echo base_url()?><!--assets/js/examples/charts.js"></script>-->
<!-- end::chart -->
<script src="<?php echo base_url() ?>adminassets/vendors/datepicker/daterangepicker.js"></script>
<!-- begin::vamp -->
<script src="<?php echo base_url() ?>adminassets/vendors/vmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/vendors/vmap/maps/jquery.vmap.usa.js"></script>
<!-- end::vamp -->
<!-- begin::dataTable -->
<script src="<?php echo base_url() ?>adminassets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/vendors/dataTable/dataTables.responsive.min.js"></script>
<!-- end::dataTable -->
<!-- begin::input mask -->
<script src="<?php echo base_url() ?>adminassets/vendors/tagsinput/bootstrap-tagsinput.js"></script>
<!-- end::input mask -->
<!-- begin::input mask -->
<script src="<?php echo base_url() ?>adminassets/vendors/input-mask/jquery.mask.js"></script>
<!-- end::input mask -->
<!-- begin::Slider -->
<script src="<?php echo base_url() ?>adminassets/vendors/slick/slick.min.js"></script>
<!-- end::Slider -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script type="text/javascript"
		src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<!-- begin::custom scripts -->
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<!-- begin::select2 -->
<script src="<?php echo base_url() ?>adminassets/vendors/select2/js/select2.min.js"></script>
<!-- end::select2 -->
<script src="<?php echo base_url() ?>adminassets/js/custom.js"></script>
<script src="<?php echo base_url() ?>adminassets/js/borderless.min.js"></script>
<script src="<?php echo base_url() ?>adminassets/js/main.min.js"></script>
<!-- begin::lightbox -->
<script src="<?php echo base_url() ?>adminassets/vendors/lightbox/jquery.magnific-popup.min.js"></script>
<!-- end::lightbox -->
<!-- begin::datepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/trumbowyg.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/plugins/table/ui/trumbowyg.table.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/ui/trumbowyg.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/plugins/pasteimage/trumbowyg.pasteimage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/plugins/table/trumbowyg.table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/plugins/base64/trumbowyg.base64.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		if ($('#editor').length) {
			$('#editor').trumbowyg({
				btnsDef: {
					// Create a new dropdown
					image: {
						dropdown: ['insertImage', 'base64', 'table'],
						ico: 'insertImage'
					}
				},
				btns: [
					['viewHTML'],
					['formatting'],
					['strong', 'em', 'del'],
					['superscript', 'subscript'],
					['link'],
					['image'], // Our fresh created dropdown
					['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
					['unorderedList', 'orderedList'],
					['horizontalRule'],
					['removeformat'],
					['fullscreen'],
					['table']
				]
			})
		}

		var datatable_id = $('#data_table')
		if (datatable_id.length) {
			var table_url = datatable_id.data('function')
			var datatables = $(datatable_id).DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": base_url + 'superadmin/ajax/' + table_url,
					"type": "POST"
				}
			});
		}
		$('#is_button').click(function () {
			if ($(this).prop("checked") == true) {
				$('#routing').show(), $('#routing input').prop('required', true)
			} else if ($(this).prop("checked") == false) {
				$('#routing').hide(), $('#routing input').prop('required', false)
			}
		})
		$('#is_url_route').click(function () {
			if ($(this).prop("checked") == true) {
				$('#url_route').removeClass('d-none'), $('#url_route input').prop('required', true)
				$('#content').hide(), $('#content textarea').prop('required', false)
			} else if ($(this).prop("checked") == false) {
				$('#url_route').addClass('d-none'), $('#url_route input').prop('required', false)
				$('#content').show(), $('#content textarea').prop('required', true)
			}
		})


		$('#is_video').click(function () {
			if ($(this).prop("checked") === true) {
				$('#video').show();
				$('#video input').prop('required', true)
				$('.banner').hide();
				$('.banner input[type=file]').prop('required', false)
			} else if ($(this).prop("checked") === false) {
				$('#video').hide();
				$('#video input').prop('required', false)
				$('.banner').show();
				if ($('.banner-img').length === 0) {
					$('.banner input').prop('required', true)
				}
			}
		})
		$('.speakers,.clientele').select2({
			placeholder: {
				id: '-1', // the value of the option
				text: 'Select an option'
			}
		})

		if ($('#cites').length) {
			$('#cites').select2({
				placeholder: "Select city",
				allowClear: true
			})
			var data = $.getJSON("<?php echo base_url('assets/js/cities.JSON');?>", function () {
			}).done(function (data) {
				$.each(data, function (key, item) {
					$('#cites').append($('<option>', {
						value: item.name+', '+item.state,
						text: item.name+', '+item.state
					}));
				});
				var selected = $('input[name=selectedcity').data('value')
				if (selected !== '' && selected.length){
					var selectcity = [];
					$.each(selected, function (key, item) {
						selectcity.push(item.city_name)
					});
					$('#cites').val(selectcity)
				}
			});
		}

		$('#addRecord').click(function(){
			$('#recordModal').modal('show');
			$('#recordForm')[0].reset();
			$('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
			$('#action').val('addRecord');
			$('#save').val('Add');
		});
		$("#data_table").on('click', '.update', function(){
			var id = $(this).attr("id");
			var action = 'getRecord';
			$.ajax({
				url:'<?= base_url("superadmin/administrator/manageformdropdown")?>',
				method:"POST",
				data:{id:id, action:action},
				dataType:"json",
				success:function(data){
					$('#recordModal').modal('show');
					$('#id').val(data.id);
					$('input[name=name]').val(data.title);
					$('input[name=order_no]').val(data.order_no);
					if (data.status == 1){
						$('input[name=status]').prop('checked',true);
					}else {
						$('input[name=status]').prop('checked',false);
					}
					$('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
					$('#action').val('updateRecord');
					$('#save').val('Save');
				}
			})
		});
		$("#recordModal").on('submit','#recordForm', function(event){
			event.preventDefault();
			$('#save').attr('disabled','disabled');
			var formData = $(this).serialize();
			$.ajax({
				url:"<?= base_url("superadmin/administrator/manageformdropdown")?>",
				method:"POST",
				data:formData,
				success:function(data){
					$('#recordForm')[0].reset();
					$('#recordModal').modal('hide');
					$('#save').attr('disabled', false);
					datatables.ajax.reload();
				}
			})
		});
	})
</script>
</body>
</html>
