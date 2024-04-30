<form action="{{route('locphim')}}" method="GET">
    <div class="row">
        <div class="col-md-2" style="padding:5px 10px 10px 0px">
            <div class="form-group">
                <select class="form-control custom-input" name="order" id="exampleFormControlSelect1">
                    <option value="">Sắp xếp theo</option>
                    <option value="name_a_z">Tên phim</option>
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding:5px 10px 10px 0px">
            <div class="form-group">
                <select class="form-control custom-input" name='genre' id="exampleFormControlSelect1">
                    <option value="">Thể loại</option>
                    @foreach($genre as $key => $value)
                        <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding:5px 10px 10px 0px">
            <div class="form-group">
                <select class="form-control custom-input" name="country" id="exampleFormControlSelect1">
                    <option value="">Quốc gia</option>
                    @foreach($country as $key => $value)
                        <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-md-2" style="padding:5px 10px 10px 0px">
            <div class="form-group">
                {!! Form::selectYear('year_filter', 1995, 2025 , null, ['class' => 'select-year form-control custom-input','placeholder'=>'Năm']) !!}
            </div>
        </div>
        <div class="col-md-4" style="padding:5px 0px 10px 0px">
            
            <input type="submit" class="btn bt-sm custom-btn" value="Lọc phim">
        </div>
    </div>
</form>