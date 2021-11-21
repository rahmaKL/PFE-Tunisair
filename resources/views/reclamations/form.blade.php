<div class="form-group">
    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">e-Mail</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="email" type="email" class="form-control" name="email" value="{{ $data->item->email }}" required placeholder="Adresse électronique">
    </div>
</div>
<div class="form-group">
    <label for="sujet" class="control-label col-md-3 col-sm-3 col-xs-12">Sujet</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="sujet" type="text" class="form-control" name="sujet" value="{{ $data->item->sujet }}" required placeholder="Sujet">
    </div>
</div>
<div class="form-group">
    <label for="de" class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="msg"  name="msg" placeholder="Ecrivez votre reclamation" class="form-control" rows="5" cols="33" required>{{ $data->item->msg }}</textarea>        
    </div>
</div>