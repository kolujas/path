<div class="modal modal-csv fade" id="CSVModal" tabindex="-1" aria-labelledby="CSVModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CSVModalLabel">CSV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="csv-form" class="modal-body" action="{{ preg_replace("/panel/", '', Request::path()) }}/create/csv" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input id="csv"
                    class="form-input input-maked"
                    accept=".csv"
                    type="file"
                    name="csv"
                    data-text="csv"
                    data-notfound="Please attach a CSV file." title="Required">
                    @if($errors->has("csv"))
                        <span class="support support-box support-csv hidden">{{ $errors->first("csv") }}</span>
                    @else
                        <span class="support support-box support-csv hidden"></span>
                    @endif
                <div class="d-flex justify-content-end col-12 mt-3">
                    <button type="submit" class="form-submit csv-form btn btn-one">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>