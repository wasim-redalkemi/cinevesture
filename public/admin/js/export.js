    var export_table = $('.order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 20, 50, 100, -1],
        [5, 10, 20, 50, 100, "All"]
      ],
      "bPaginate": false,
      
      "iDisplayLength": 10,
      // "language": {
      //   search: "Search"
      // },
      bPaginate:false,
      bInfo : false,
      paging:false,
      searching:false,
      dom: 'Bfrtip',
      buttons: [
        
        {
                extend: 'csv',
                exportOptions: {
                    columns: ':not(.notForPrint)'
                }
            },
      ],
      
      
     
      initComplete: function () 
      {
        var btns = $('.dt-button');
        btns.addClass('btn btn-primary btn-sm mb-2');
        btns.removeClass('dt-button');
      }
    });
