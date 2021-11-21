<div class="form-group">
    <label for="fonction_id" class="control-label col-md-3 col-sm-3 col-xs-12">Fonction</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select @if ($data->item->id > 0) disabled @endif
            required class="form-control" id="fonction_id" name="fonction_id">
            @foreach ($data->fonctions as $val)
            <option @if ($val->id==$data->item->fonction_id)
                selected="selected"
                @endif
                value="{{$val->id}}">
                {{$val->nom}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="quota_id" class="control-label col-md-3 col-sm-3 col-xs-12">Type de billet</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select @if ($data->item->id > 0) disabled @endif
            required class="form-control" id="quota_id" name="quota_id">
            @foreach ($data->g_type as $id=>$name)
            <option @if ($id==$data->item->quota_id)
                selected="selected"
                @endif
                value="{{$id}}">
                {{$name}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="nombre" type="number" class="form-control" name="nombre" value="{{ $data->item->nombre }}" required placeholder="0">
    </div>
</div>