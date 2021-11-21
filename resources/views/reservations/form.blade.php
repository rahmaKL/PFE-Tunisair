<div class="form-group">
    <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select required class="form-control" id="type" name="type">
            @foreach ($data->g_type as $id=>$name)
            <option @if ($id==$data->item->type)
                selected="selected"
                @endif
                value="{{$id}}">
                {{$name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="depart" class="control-label col-md-3 col-sm-3 col-xs-12">Depart</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="depart" type="date" class="form-control" name="depart" value="{{ $data->item->depart }}" required placeholder="0">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="retour" class="control-label col-md-3 col-sm-3 col-xs-12">Retour</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <input id="retour" type="date" class="form-control" name="retour" value="{{ $data->item->retour }}" required placeholder="0">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="de" class="control-label col-md-3 col-sm-3 col-xs-12">De</label>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <select required class="form-control" id="de" name="de">
                @foreach ($data->pays as $pays)
                <option @if ($pays->id==$data->item->de)
                    selected="selected"
                    @endif
                    value="{{$pays->id}}">
                    {{$pays->cityName}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <label for="a" class="control-label col-md-3 col-sm-3 col-xs-12">A</label>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <select required class="form-control" id="a" name="a">
                @foreach ($data->pays as $pays)
                <option @if ($pays->id==$data->item->a)
                    selected="selected"
                    @endif
                    value="{{$pays->id}}">
                    {{$pays->cityName}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>