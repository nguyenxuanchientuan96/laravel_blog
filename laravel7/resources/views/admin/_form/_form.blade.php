    <div class="form-group">
        {!!Form::label('Ten', 'Ten The Loai')!!}
        {!!Form::text('Ten', null, array('id'=>'Ten', 'name'=>'Ten', 'placeholder'=>'Moi ban nhap ten the loai') )!!}
    </div>

    {!!Form::submit($button_name, array('class'=>'btn btn-success'))!!}
    
    <button type="reset" class="btn btn-default">Reset</button>

