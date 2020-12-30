@extends('templates.adminmitra')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Data Ruang Meting</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        data-mdl-for="panel-button2">
                        <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                        </li>
                        <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                        </li>
                        <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                            here</li>
                    </ul>
                </div>
                <div class="card-body" id="bar-parent2">
                    <form action="{{ route('ruangmeeting.promo', $room->id) }}" method="POST"
                    class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row  margin-top-20">
                                <label class="control-label col-md-3">Harga Normal</label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control" id="normal_price"
                                               name="price" type="text" value="{{ $room->harga_sewa }}" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row  margin-top-20">
                                <label class="control-label col-md-3">Promo (%)</label>
                                <div class="col-md-4">
                                    <select name="percent" id="select-percent" class="form-control">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach ($percents as $perc)
                                            <option value="{{ $perc }}">{{ $perc }}</option>
                                        @endforeach
                                    </select>
                                    @error('percent')
                                        <p class="text-alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  margin-top-20">
                                <label class="control-label col-md-3">Harga Promo</label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control" id="promo_price"
                                               name="promo_price" type="text" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="offset-md-3 col-md-9">
                                <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                <a href="{{route('ruangmeeting.index')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    const normalPrice = document.querySelector('#normal_price')    
    const percent = document.querySelector('#select-percent')
    const promoPrice = document.querySelector('#promo_price')

    
    percent.addEventListener('change', function(){
        const price = normalPrice.value
        const perc = this.value
        const total = price * (perc/100)
        promoPrice.value = price - total
        promoPrice.textContent = price - total
        console.log(promoPrice.value);

    })
</script>

@endsection
