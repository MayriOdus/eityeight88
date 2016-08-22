
var ee = {
	module : 'product',
	version : '1.0'
};

(function() {
	
	$.extend( ee, {
	
		init : function()
		{
			var self = this;
			
			self.bindingEvent();

			if( mode == 'edit' )
			{
				self.setProdDetail();
			}
		},

		bindingEvent : function()
		{
			var self = this;

			if( $("#sdataTables").length )
			{
				$('#sdataTables').DataTable({
					responsive: true
				});
			}
			
			if( $("#fileInput").length )
			{
				if( typeof pdata.files != 'undefined' && pdata.files != null )
				{
					var img = pdata.files.split(","), im, pre = [];
					for( im in img )
					{
						pre.push('<img src="../../images/upload/'+img[im]+'" class="file-preview-image" alt="The Moon" title="The Moon">')
					}

					$("#fileInput").fileinput({
						initialPreview: pre,
						overwriteInitial: true,
						initialCaption: "browse image....",
						previewFileIcon: "<i class='fa fa-folder-open-o'></i>"
					});
				}
				else
				{
					$("#fileInput").fileinput({
						overwriteInitial: true,
						initialCaption: "browse image....",
						previewFileIcon: "<i class='fa fa-folder-open-o'></i>"
					});
				}
			}

			if( $("button[name=del-rec]").length )
			{
				$("button[name=del-rec]").click(function() {

					var $this = $(this);
					
					if( confirm('do you want to delete this record?') )
					{
						self.deleteProduct($this.attr('c'));
					}
				});
			}

			if( $("button[name=view-rec]").length )
			{
				$("button[name=view-rec]").click(function() {

					var $this = $(this);

					window.location = URL + 'product/edit?p='+$this.attr('c');

				});
			}

			if( $("#btn-gencode").length )
			{
				$("#btn-gencode").click(function() {

					var $this = $(this);

					window.open( URL + 'product/gencode?m=gen&p='+$this.attr('c') , "_blank" );

				});
			}

			if( $("#btn-cleargen").length )
			{
				$("#btn-cleargen").click(function() {

					var $this = $(this);

					$.post( URL+"product/clrgen", { id : $this.attr('c') }, function( data ) {
				
						if( data.SUCCESS )
						{
							alert("Success");
							window.location = '';
						}

					}, 'json');

				});
			}

			if( $("#btn-viewcode").length )
			{
				$("#btn-viewcode").click(function() {

					var $this = $(this);

					window.open( URL + 'product/gencode?m=view&p='+$this.attr('c') , "_blank" );

				});
			}

			if( $("input[name=btn-print]").length )
			{
				$("input[name=btn-print]").click(function() {
					var c = $(this).parents(".row");

					self.printTextArea(c[0]);

				});
			}

			if( $("input[name=btn-excel]").length )
			{
				
				$("#btn-group").html(function(){
					var albtn = '', sname='';
					$("input[name=btn-excel]").each(function() {
						
						sname = $(this).attr('n');
						albtn += "<div class='col-sm-3' style='padding: 5px;'>" + this.outerHTML.replace('value="PDF"', 'value="'+sname+'"').replace('btn-primary','btn-primary btn-xs') + "</div>";
					   
					});
					return albtn;
				});

				$("input[name=btn-excel]").click(function() {

					//self.fnExcelReport();
					var $this = $(this);
						
					self.toPDF($this.attr('for'), $this.attr('n'));
					/*
					$("#"+$this.attr('for')).table2excel({
						name: $this.attr('n'),
						filename: $this.attr('n')
					});
					*/


					
				});

			}

			if( $('#form1').length )
			{
				if( mode == 'edit' )
				{
					var vUrl = URL+"product/updateproduct";
				}
				else
				{
					var vUrl = URL+"product/newproduct";
				}

				$('#form1').ajaxForm({
					url: vUrl,
					data: { code : c },

					beforeSend: function() {
						var pg = $("#progress-bar");
						var percentVal = '0%';
						var minwidth = '0em';
						var min = '0';
						pg.css({"width":percentVal, "min-width":minwidth});
						pg.attr("aria-valuenow", min);
						pg.val(percentVal);

						self.showPleaseWait();
					},
					uploadProgress: function(event, position, total, percentComplete) {

						var pg = $("#progress-bar");
						var percentVal = percentComplete+'%';
						var minwidth = percentComplete+'em';
						var min = percentComplete;

						pg.css({"width":percentVal, "min-width":minwidth});
						pg.attr("aria-valuenow", min);
						pg.val(percentVal);

						pg.css({"width":percentVal, "min-width":minwidth});
						pg.attr("aria-valuenow", min);
						pg.val(percentVal);
					},

					complete: function(xhr) {
						
						var data = $.parseJSON(xhr.responseText);
						
						self.hidePleaseWait();

						if( data.SUCCESS )
						{
							window.location = URL + 'product/edit?p=' + data.code;
						}
					}
				}); 
			}

		},

		setProdDetail : function()
		{
			var self = this, i;

			for( i in pdata )
			{
				if( $("#txt"+i).length )
				{
					$("#txt"+i).val(pdata[i]);
				}
			}
		},

		deleteProduct : function(prod)
		{
			$.post( URL+"product/deleteproduct", { id : prod }, function( data ) {
				
				if( data.SUCCESS )
				{
					window.location = URL + 'product';
				}

			}, 'json');
		},

		printTextArea : function(elem)
		{
			childWindow = window.open('','childWindow','width=800, height=700, location=yes, menubar=yes, toolbar=yes');
			childWindow.document.open();
			childWindow.document.write('<html><head></head><body>');
			childWindow.document.write(elem.innerHTML);
			childWindow.document.write('</body></html>');
			childWindow.print();
			childWindow.document.close();
			childWindow.close();
		},

		showPleaseWait: function() 
		{
			$("#pleaseWaitDialog").modal();
		},

		hidePleaseWait: function () 
		{
			$("#pleaseWaitDialog").modal('hide');
		},

		fnExcelReport : function()
		{
			var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
			var textRange; 
			var j=0;
			var tab = document.getElementById('table2excel'); // id of table

			for(j = 0 ; j < tab.rows.length ; j++) 
			{     
				tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
				//tab_text=tab_text+"</tr>";
			}

			tab_text = tab_text + "</table>";

			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE "); 

			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
			{
				txtArea1.document.open("txt/html","replace");
				txtArea1.document.write(tab_text);
				txtArea1.document.close();
				txtArea1.focus(); 
				sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
			}  
			else                 //other browser not tested on IE 11
				sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

			return (sa);
		},

		toPDF : function( table, filename ) 
		{
			var pdf = new jsPDF('p', 'pt', 'letter');
			// source can be HTML-formatted string, or a reference
			// to an actual DOM element from which the text will be scraped.
			source = $("#"+table).parent(".row")[0];

			// we support special element handlers. Register them with jQuery-style 
			// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
			// There is no support for any other type of selectors 
			// (class, of compound) at this time.
			specialElementHandlers = {
				// element with id of "bypass" - jQuery style selector
				'#bypassme': function (element, renderer) {
					// true = "handled elsewhere, bypass text extraction"
					return true
				}
			};
			margins = {
				top: 80,
				bottom: 60,
				left: 40,
				width: 522
			};
			// all coords and widths are in jsPDF instance's declared units
			// 'inches' in this case
			pdf.fromHTML(
			source, // HTML string or DOM elem ref.
			margins.left, // x coord
			margins.top, { // y coord
				'width': margins.width, // max width of content on PDF
				'elementHandlers': specialElementHandlers
			},

			function (dispose) 
			{
				// dispose: object with X, Y of the last line add to the PDF 
				//          this allow the insertion of new lines after html
				pdf.save(filename+'.pdf');
			}, margins);
		}




	});


	$(function() {

		ee.init();
		
	});


})(jQuery);