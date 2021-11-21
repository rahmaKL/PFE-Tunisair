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

<div class="form-group">
    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="nombre" type="number" class="form-control" name="nombre" value="{{ $data->item->nombre }}" required placeholder="0">
    </div>
</div>
<div class="form-group">
    <label for="justificatif1" class="control-label col-md-3 col-sm-3 col-xs-12">Justificatif N° 1</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" class="form-control" id="justificatif1" name="justificatif1" placeholder="Telecharger le fichier" value="">
    </div>
</div>
<div class="form-group">
    <label for="justificatif2" class="control-label col-md-3 col-sm-3 col-xs-12">Justificatif N° 2</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" class="form-control" id="justificatif2" name="justificatif2" placeholder="Telecharger le fichier" value="">
    </div>
</div>
<div class="form-group">
    <label for="justificatif3" class="control-label col-md-3 col-sm-3 col-xs-12">Justificatif N° 3</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" class="form-control" id="justificatif3" name="justificatif3" placeholder="Telecharger le fichier" value="">
    </div>
</div>