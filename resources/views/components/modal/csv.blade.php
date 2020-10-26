<div class="modal modal-csv fade" id="CSVModal" tabindex="-1" aria-labelledby="CSVModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CSVModalLabel">CSV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body" action="{{ preg_replace("/panel/", '', Request::path()) }}/create/csv">
                <input id="csv"
                    class="form-input input-maked"
                    accept=".csv"
                    type="file"
                    name="csv"
                    data-text="csv"
                    data-notfound="CSV not choose." title="Required">
            </form>
        </div>
    </div>
</div>