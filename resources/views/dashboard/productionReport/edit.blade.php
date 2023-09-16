 <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Production Report</h4>
    </div>
    <div class="modal-body">
        <form class="" action="{{ route('production.update', $production->id) }}" id="myForm" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Production Date</label>
                        <input type="date" value="{{ $production->production_date }}" class="form-control" name="production_date" id="name" value="{{ old('production_date') }}">
                        @error('production_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">Cane Crushed(M.T)</label>
                        <input type="text" value="{{ $production->cane_crushed }}" class="form-control" step="0.01" name="cane_crushed" id="phone" value="{{ old('cane_crushed') }}">
                            @error('cane_crushed')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Sugar Produced(M.T)</label>
                        <input type="text" value="{{ $production->sugar_production }}" class="form-control" step="0.01" name="sugar_production" id="field-2" value="{{ old('sugar_production') }}">
                        @error('sugar_production')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Sugar Recovery(%)</label>
                        <input type="text" value="{{ $production->sugar_recovery }}" class="form-control" step="0.01" name="sugar_recovery" id="field-2" value="{{ old('sugar_recovery') }}">
                            @error('sugar_recovery')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Available Sugar</label>
                        <input type="text" value="{{ $production->available_sugar }}" class="form-control" step="0.01" name="available_sugar" id="field-2" value="{{ old('available_sugar') }}">
                            @error('available_sugar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Molasses(M.T)</label>
                        <input type="text" value="{{ $production->molasses }}" class="form-control" step="0.01" name="molasses" id="field-2" value="{{ old('molasses') }}">
                            @error('molasses')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Bagasse(M.T)</label>
                        <input type="text" value="{{ $production->bagasse }}" class="form-control" step="0.01" name="bagasse" id="field-2" value="{{ old('bagasse') }}">
                            @error('bagasse')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Press Mud(M.T)</label>
                        <input type="text" value="{{ $production->press_mud }}" class="form-control" step="0.01" name="press_mud" id="field-2" value="{{ old('press_mud') }}">
                        @error('press_mud')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Average Of Crushing Including Stoppage(M.T)</label>
                        <input type="text" value="{{ $production->crush_stoppage }}" class="form-control" step="0.01" name="crush_stoppage" id="field-2" value="{{ old('crush_stoppage') }}">
                            @error('crush_stoppage')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Mill Stoppage(Hr)</label>
                        <input type="text" value="{{ $production->mill_stoppage }}" class="form-control" step="0.01" name="mill_stoppage" id="field-2" value="{{ old('mill_stoppage') }}">
                        @error('mill_stoppage')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Remark</label>
                        <input type="text" value="{{ $production->remark }}" class="form-control" name="remark" id="field-2" value="{{ old('remark') }}">
                        @error('remark')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("myForm").reset();
    $(document).ready(function(){

    });
</script>
