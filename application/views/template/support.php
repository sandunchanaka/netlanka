
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js');?>"></script>

    <!-- validator -->
    <script src="<?php echo base_url('assets/vendors/validator/validator.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js');?>"></script>

    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js');?>"></script>



<!-- me -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.min.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker3.min.css');?>" />
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/formValidation.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script>
$(document).ready(function() {
    // Initialize the date picker for the original due date field
    $('#dueDatePicker')
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(evt) {
            // Revalidate the date field
            $('#taskForm').formValidation('revalidateField', $('#dueDatePicker').find('[name="dueDate[]"]'));
        });

    $('#dueDatePicker2')
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(evt) {
            // Revalidate the date field
            $('#taskForm').formValidation('revalidateField', $('#dueDatePicker').find('[name="dueDate2[]"]'));
        });

    $('#taskForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'task[]': {
                    // The task is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'The task is required'
                        }
                    }
                },
                'dueDate[]': {
                    // The due date is placed inside a .col-xs-4 element
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The due date is required'
                        }
                    }
                },
				'dueDate2[]': {
                    // The due date is placed inside a .col-xs-4 element
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The due date is required'
                        }
                    }
                }


            }
        })

        .on('added.field.fv', function(e, data) {
            if (data.field === 'dueDate[]') {
                // The new due date field is just added
                // Create a new date picker
                data.element
                    .parent()
                    .datepicker({
                        format: 'yyyy-mm-dd'
                    })
                    .on('changeDate', function(evt) {
                        // Revalidate the date field
                        $('#taskForm').formValidation('revalidateField', data.element);
                    });
            }
        })

        .on('added.field.fv', function(e, data) {
            if (data.field === 'dueDate2[]') {
                // The new due date field is just added
                // Create a new date picker
                data.element
                    .parent()
                    .datepicker({
                        format: 'yyyy-mm-dd'
                    })
                    .on('changeDate', function(evt) {
                        // Revalidate the date field
                        $('#taskForm').formValidation('revalidateField', data.element);
                    });
            }
        })

        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#taskTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);

            // Add new fields
            // Note that we DO NOT need to pass the set of validators
            // because the new field has the same name with the original one
            // which its validators are already set
            $('#taskForm')
                .formValidation('addField', $clone.find('[name="task[]"]'))
                .formValidation('addField', $clone.find('[name="dueDate[]"]'))
				.formValidation('addField', $clone.find('[name="dueDate2[]"]'))
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row = $(this).closest('.form-group');

            // Remove fields
            $('#taskForm')
                .formValidation('removeField', $row.find('[name="task[]"]'))
                .formValidation('removeField', $row.find('[name="dueDate[]"]'))
				.formValidation('removeField', $row.find('[name="dueDate2[]"]'));

            // Remove element containing the fields
            $row.remove();
        });
});
</script>
<!--/me -->


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });

	  $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');

	/* var str_array = myBookId.split('-');
	 for(var i = 0; i < str_array.length; i++) {
   		alert(str_array[1]);
	}
	 	*/
	 $(".modal-body #hdnuseridId").val(myBookId);

});

 $(document).on("click", ".open-AddBookDialogNew", function () {
     var myBookId = $(this).data('id');

	 var str_array = myBookId.split('-');
	/* for(var i = 0; i < str_array.length; i++) {

	}*/

	 $(".modal-body #hdnsoldierId").val(str_array[0]);
	 $(".modal-body #hdnrelationId").val(str_array[1]);
	 $(".modal-body #hdnsustype").val(str_array[1]);
});

    </script>
    <!-- /validator -->

    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js');?>"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/jquery.hotkeys/jquery.hotkeys.js');?>"></script>
    <script src="<?php echo base_url('assets/vendors/google-code-prettify/src/prettify.js');?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js');?>"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url('assets/vendors/switchery/dist/switchery.min.js');?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/vendors/select2/dist/js/select2.full.min.js');?>"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url('assets/vendors/parsleyjs/dist/parsley.min.js');?>"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url('assets/vendors/autosize/dist/autosize.min.js');?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js');?>"></script>
    <!-- starrr -->
    <script src="<?php echo base_url('assets/vendors/starrr/dist/starrr.js');?>"></script>


    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/js/moment/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datepicker/daterangepicker.js');?>"></script>

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

		$('#single_cal1')
        .datepicker({
            format: 'yyyy-mm-dd'
        });


		$('#single_cal2')
        .datepicker({
            format: 'yyyy-mm-dd'
        });


		$('#single_cal3')
        .datepicker({
            format: 'yyyy-mm-dd'
        });

		$('#single_cal4')
        .datepicker({
            format: 'yyyy-mm-dd'
        });

		$('#single_cal5')
        .datepicker({
            format: 'yyyy-mm-dd'
        });

		$('#single_cal6')
        .datepicker({
            format: 'yyyy-mm-dd'
        });

      });
    </script>

    <script>
      $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
<!-- /bootstrap-daterangepicker -->

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';

          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "",
          allowClear: true
        });
		$(".select4_single").select2({
          placeholder: "Select a Branch",
          allowClear: true
        });
		 $(".select5_single").select2({
          placeholder: "Select a GN Division",
          allowClear: true
        });
		$(".select6_single").select2({
          placeholder: "Select a Bank",
          allowClear: true
        });
		$(".select7_single").select2({
          placeholder: "Select a Branch",
          allowClear: true
        });
		$(".select8_single").select2({
          placeholder: "Select a Service Type",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->



    <!-- Starrr -->
    <script>
      $(document).ready(function() {
        $(".stars").starrr();

        $('.stars-existing').starrr({
          rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
          $('.stars-count').html(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
          $('.stars-count-existing').html(value);
        });
      });
    </script>
    <!-- /Starrr -->



  <!-- get city details -->
<script type="text/javascript">

	$(document).ready(function(){
		$('#org').on('change',function(){
			var BASE_URL = "<?php echo base_url('Organization/get_office');?>";
			var orgID = $(this).val();
      //alert(orgID);
			if(orgID){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'orgID': orgID},
					success:function(html){
						//alert(html);
						$('#branch').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#branch').html('<option value="0">Select Organization first</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});


	<!-- get Grama Niladari Division -- >
	$(document).ready(function(){
		$('#branch').on('change',function(){
			var BASE_URL = "<?php echo base_url('Organization/get_depot');?>";
			var branchID = $(this).val();
    	if(branchID){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'branchID': branchID},
					success:function(html){
						//alert(html);
						$('#depot').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#depot').html('<option value="">Select Branch</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});


	$(document).ready(function(){
		$('#bank_account').on('change',function(){
			var BASE_URL = "<?php echo base_url('Members/get_branches');?>";
			var bankID = $(this).val();
			if(bankID){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'bankID': bankID},
					success:function(html){
						//alert(html);
						$('#m_acc_branch').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#m_acc_branch').html('<option value="">Select Branch first</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});


	$(document).ready(function(){
		$('#service_type').on('change',function(){
			var BASE_URL = "<?php echo base_url('Members/get_ranks');?>";
			var serviceTypeID = $(this).val();
			if(serviceTypeID){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'serviceTypeID': serviceTypeID},
					success:function(html){
						//alert(html);
						$('#rank').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#rank').html('<option value="">Select Service Type first</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});

	$(document).ready(function(){
		$('#service_type').on('change',function(){
			var BASE_URL = "<?php echo base_url('Members/get_all_regiments');?>";
			var serviceTypeID = $(this).val();
			//alert(serviceTypeID);
			if(serviceTypeID == 1){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'serviceTypeID': serviceTypeID},
					success:function(html){
						//alert(html);
						$('#regiment_name').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#regiment_name').html('<option value="">Select Service Type first</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});


		$(document).ready(function(){
		$('#regiment_name').on('change',function(){
			var BASE_URL = "<?php echo base_url('Members/get_all_units');?>";
			var regimentID = $(this).val();
			//alert(regimentID);
			if(regimentID){
				$.ajax({
					type:'POST',
					url:BASE_URL,
					ContentType : 'application/json',
					data:{'regimentID': regimentID},
					success:function(html){
						//alert(html);
						$('#unit').html(html);
						//$('#city').html('<option value="">Select state first</option>');
					}
				});
			}else{
				$('#unit').html('<option value="">Select Regiment first</option>');
				//$('#city').html('<option value="">Select state first</option>');
			}
		});

	});

</script>
   <!-- /get city details -->


 <!-- tabele check all func -->
 <script>
$(document).ready(function(){
    $("#selectAll").click(function(){
        $(".chk").prop("checked",$("#selectAll").prop("checked"))
    })



});

function goBack() {
    window.history.back();
}
 </script>
 <!-- /tabele check all func -->



  </body>
</html>
