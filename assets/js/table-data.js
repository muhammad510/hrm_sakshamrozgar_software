$(function () {
   'use strict'

   //Data table example
   var table = $('#exportexample').DataTable({
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
   });
   table.buttons().container()
      .appendTo('#exportexample_wrapper .col-md-6:eq(0)');


   $('#example1').DataTable({
      language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_ items/page',
      }
   });
   $('#example2').DataTable({
      responsive: true,
      language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_ items/page',
      }
   });
   $('#example3').DataTable({
      responsive: {
         details: {
            display: $.fn.dataTable.Responsive.display.modal({
               header: function (row) {
                  var data = row.data();
                  return 'Details for ' + data[0] + ' ' + data[1];
               }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
               tableClass: 'table'
            })
         }
      }
   });

   /*Input Datatable*/
   var table = $('#example-input').DataTable({
      'columnDefs': [
         {
            'targets': [1, 2, 3, 4, 5],
            'render': function (data, type, row, meta) {
               if (type === 'display') {
                  var api = new $.fn.dataTable.Api(meta.settings);

                  var $el = $('input, select, textarea', api.cell({ row: meta.row, column: meta.col }).node());

                  var $html = $(data).wrap('<div/>').parent();

                  if ($el.prop('tagName') === 'INPUT') {
                     $('input', $html).attr('value', $el.val());
                     if ($el.prop('checked')) {
                        $('input', $html).attr('checked', 'checked');
                     }
                  } else if ($el.prop('tagName') === 'TEXTAREA') {
                     $('textarea', $html).html($el.val());

                  } else if ($el.prop('tagName') === 'SELECT') {
                     $('option:selected', $html).removeAttr('selected');
                     $('option', $html).filter(function () {
                        return ($(this).attr('value') === $el.val());
                     }).attr('selected', 'selected');
                  }

                  data = $html.html();
               }

               return data;
            }
         }
      ],
      'responsive': true
   });
   $('#example-input tbody').on('keyup change', '.child input, .child select, .child textarea', function (e) {
      var $el = $(this);
      var rowIdx = $el.closest('ul').data('dtr-index');
      var colIdx = $el.closest('li').data('dtr-index');
      var cell = table.cell({ row: rowIdx, column: colIdx }).node();
      $('input, select, textarea', cell).val($el.val());
      if ($el.is(':checked')) {
         $('input', cell).prop('checked', true);
      } else {
         $('input', cell).removeProp('checked');
      }
   });
   $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search',
      minimumResultsForSearch: Infinity,
      width: '100%'
   });

});

/******************************************For Pagination @misingh Start************************************************/
function get_search(tbactn, frmId, tbstorage)
{
    $(frmId).submit(function(e){e.preventDefault();$(tbstorage).DataTable().clear().destroy();let search = $(frmId).serializeArray();
        let searchObj = {};$.each(search, function(i, row) { searchObj[row.name] = row.value; });
        tbactn.printTable(searchObj);$('html,body').animate({ scrollTop: $(tbstorage).offset().top }, 'slow');
    });

}
function getpaginate(search_data, id, page, plchldr) //id,page,placehldr
{

    var base_url = $('#base_url').val(); //"responsive": true,
    $(id).DataTable({"processing":true,"serverSide":true,"order":[],"bDestroy":true,'columnDefs':[{'targets':[1, 2, 3],'orderable':true}],
        "ajax":{"url":base_url+page,"type":"POST","dataSrc":"data","data":search_data},language: { searchPlaceholder: plchldr },
        // dom: 'Bfrtip',
        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],"buttons": []/*"excel", "pdf", "print"*/
    });

}

/******************************************For Pagination @misingh END************************************************/