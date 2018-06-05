@section('display')
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#favoritesModal"><i class="fas fa-eye"></i> Services</button>

<div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h4 class="modal-title" id="favoritesModalLabel">Services Availed</h4>
                </button>
            </div>
        <div class="modal-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Service</th>
                    <th scope="col">Type</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <span class="pull-right">
            </span>
        </div>
        </div>
    </div>
</div>
@endsection