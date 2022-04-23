@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Order <br>
                    {{-- create order --}}
                    <a href="{{ route('order.index') }}" class="btn btn-warning btn-sm float-right">
                        <i class="fas fa-chevron-right"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- form --}}
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        {{-- select food or beverage --}}
                        <div class="form-group">
                            <label for="item">Item</label>
                            <select class="form-control" id="item" name="item">
                                <option value="">Pilih</option>
                                <option value="food">Food</option>
                                <option value="beverage">Beverage</option>
                            </select>
                        </div>
                        
                        {{-- select food --}}
                        <div class="form-group" id="select-food" style="display: none">
                            <label for="food">Food</label>
                            <select class="form-control" name="food">
                                @foreach ($foods as $food)
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- select beverage --}}
                        <div class="form-group" id="select-beverage" style="display: none">
                            <label for="beverage">Beverage</label>
                            <select class="form-control" name="beverage">
                                @foreach ($beverages as $beverage)
                                    <option value="{{ $beverage->id }}">{{ $beverage->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- include jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#item').change(function() {
            var item = $(this).val();
            if (item == 'food') {
                $('#select-food').show();
                $('#select-beverage').hide();
            } else if (item == 'beverage') {
                $('#select-food').hide();
                $('#select-beverage').show();
            } else {
                $('#select-food').hide();
                $('#select-beverage').hide();
            }
        });
    });
</script>
@endsection