<div class="form-group">
    <label for="sujet" class="control-label col-md-3 col-sm-3 col-xs-12">Sujet</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="sujet" type="sujet" class="form-control" name="sujet" value="{{ $data->item->sujet }}" required placeholder="Sujet">
    </div>
</div>
<div class="form-group">
    <label for="fichier" class="control-label col-md-3 col-sm-3 col-xs-12">Fichier</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" class="form-control" id="fichier" name="fichier" placeholder="Telecharger le fichier" value="{{ $data->item->fichier }}">
        <input type="hidden" id="fichiername" name="fichiername" value="{{ $data->item->fichier }}">
    </div>
</div>