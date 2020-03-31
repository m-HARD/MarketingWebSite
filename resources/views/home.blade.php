@extends('layouts.app')

@section('header')
<style>
.flex { display:flex }
.flex.flex-column { flex-direction: column; }
.flex.flex-row { flex-direction: row; }
.flex.justify-center { justify-content: center; }
.flex.justify-left { justify-content: flex-start; }
.flex.justify-right { justify-content: flex-end; }
.flex.align-center { align-items: center; }
.flex.align-left { align-items: flex-start; }
.flex.align-right { align-items: flex-end; }

/*logo*/
.logo{
    margin: 4px 0 10px 0;
    padding: 2px;
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.logo > span{
    border: 1px solid rgb(195, 230, 203);
    padding: 5px;
    margin: 2 0 5px 0 ;
    color: chocolate;

}
/* Navigation */
#top-navigation a,
#top-navigation .cart-info {
    width: 100%;
    color: #000;
    
}

#top-navigation .cart-info .stats { margin-right: 5px; }

/* Products */
#products .item img { background-color: #000; }
#products .item p.lead { margin-bottom: 0; }
#products .item .number-in-stock { margin-right: 10px; }
#products .item .number-in-stock.few { color: #E0A14F; }
#products .item .number-in-stock.none { color: rgb(165, 35, 35); }
footer{
    margin-bottom: 3px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 14;
}
</style>

@endsection

@section('content')
    <div>
        <home-page-show-item :products="{{ $products }}"></home-page-show-item>
    </div>
@endsection