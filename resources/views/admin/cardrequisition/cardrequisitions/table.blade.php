<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="cardrequisitions-table" width="100%">
    <thead>
     <tr>
        <th>Cardrequisition No</th>
        <th>Cardrequisition Date</th>
        <th>Created By</th>
        <th>Vendor Name</th>
        <th>Card Quantity</th>
        <th>Next Handler</th>
        <th>Cardrequisition Status</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($cardrequisitions as $cardrequisition)
        <tr>
            <td>{!! $cardrequisition->cardrequisition_no !!}</td>
            <td>{!! $cardrequisition->cardrequisition_date !!}</td>
            <td>{!! $cardrequisition->created_by !!}</td>
            <td>{!! $cardrequisition->vendor_no !!}</td>
            <td>{!! $cardrequisition->card_quantity !!}</td>
            <td>{!! $cardrequisition->next_handler !!}</td>
            <td>
            
            @if ($cardrequisition->cardrequisition_status === 'Requested')
                <span class="label label-sm bg-warning text-white">{!! $cardrequisition->cardrequisition_status !!}</span>
            
            @elseif ($cardrequisition->cardrequisition_status === 'verified')
                <span class="label label-sm bg-warning text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
            
            @elseif ($cardrequisition->cardrequisition_status === 'approved')
                <span class="label label-sm bg-success text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
            
            @elseif ($cardrequisition->cardrequisition_status === 'issued')
                <span class="label label-sm bg-success text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
            
            @elseif ($cardrequisition->cardrequisition_status === 'delivered')
                <span class="label label-sm bg-primary text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
            
            @elseif ($cardrequisition->cardrequisition_status === 'canceled')
                <span class="label label-sm bg-danger text-white   ">{!! $cardrequisition->cardrequisition_status !!}</span>
            @endif
            
            </td>
            <td>
                 <a href="{{ route('admin.cardrequisition.cardrequisitions.show', collect($cardrequisition)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view cardrequisition"></i>
                 </a>
                 <a href="{{ route('admin.cardrequisition.cardrequisitions.edit', collect($cardrequisition)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit cardrequisition"></i>
                 </a>
                 <a href="{{ route('admin.cardrequisition.cardrequisitions.confirm-delete', collect($cardrequisition)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.cardrequisition.cardrequisitions.delete', collect($cardrequisition)->first() ) }}">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete cardrequisition"></i>

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
        $('#cardrequisitions-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#cardrequisitions-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#cardrequisitions-table').on( 'length.dt', function ( e, settings, len ) {
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
