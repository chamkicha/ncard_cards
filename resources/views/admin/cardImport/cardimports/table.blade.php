<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="cardimports-table" width="100%">
    <thead>
     <tr>
        <th>Card Number</th>
        <th>Card U I D</th>
        <th>Order Number</th>
        <th>Batch No</th>
        <th>Status</th>
        <th>Receive Date</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($cardimports as $cardimport)
        <tr>
            <td>{!! $cardimport->card_number !!}</td>
            <td>{!! $cardimport->card_u_i_d !!}</td>
            <td>{!! $cardimport->order_number !!}</td>
            <td>{!! $cardimport->batch_no !!}</td>
            <td>
            
            
            @if ($cardimport->status === 'New')
                <span class="label label-sm bg-warning text-white">{!! $cardimport->status !!}</span>
            
            @elseif ($cardimport->status === 'Assigned')
                <span class="label label-sm bg-warning text-white   ">{!! $cardimport->status !!}</span>
            
            @elseif ($cardimport->status === 'Active')
                <span class="label label-sm bg-success text-white   ">{!! $cardimport->status !!}</span>
            
            @elseif ($cardimport->status === 'Deactivated')
                <span class="label label-sm bg-success text-white   ">{!! $cardimport->status !!}</span>
            
            @elseif ($cardimport->status === 'Processing')
                <span class="label label-sm bg-danger text-white   ">{!! $cardimport->status !!}</span>
            @endif
            
            </td>
            <td>{!! $cardimport->receive_date !!}</td>
            <td>
                 <a href="{{ route('admin.cardImport.cardimports.show', collect($cardimport)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view cardimport"></i>
                 </a>
                 <a href="{{ route('admin.cardImport.cardimports.edit', collect($cardimport)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit cardimport"></i>
                 </a>
                 <a href="{{ route('admin.cardImport.cardimports.confirm-delete', collect($cardimport)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.cardImport.cardimports.delete', collect($cardimport)->first() ) }}">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete cardimport"></i>

                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this Item? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#cardimports-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#cardimports-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#cardimports-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop
