 <!-- Begin Li's Breadcrumb Area -->
 @extends('layouts.home_layout')
 @section('content')
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Danh sách đơn hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page pt-60 pb-55">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-12 order-lg-1 order-1">
                <div class="row li-main-content">
                    @if($list_order->count() > 0)
                    @foreach ($list_order as $order)
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 v-wrapper">
                        <div class="li-blog-single-item">
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="li-blog-banner">
                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/2.jpg" alt=""></a>
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h4 class="v-donhang pt-xs-25 pt-sm-25"><a href="#">Mã đơn hàng: {{ $order->SoHDB }}</a></h4>
                                            <div class="li-blog-meta d-flex flex-column gap-3">
                                                @if($order->TrangThai == 1)
                                                <span class="text-success"><i class="fa fa-check-circle"></i> Hoàn tất</span>
                                                @elseif($order->TrangThai == 0)
                                                <span class="text-warning"><i class="fa fa-question-circle"></i> Đang chờ xử lý</span>
                                                @elseif($order->TrangThai == -1)
                                                <span class="text-danger"><i class="fa fa-times"></i> Đã hủy</span>
                                                @endif
                                                {{-- <a class="comment" style="color:black" href="#"><i class="fa fa-mobile"></i>{{ $order->orderdetail->sum('SoLuong') }} sản phẩm</a> --}}
                                                <a class="post-time" style="color:black" href="#"><i class="fa fa-calendar"></i>{{ date('d-m-Y H:i:s', strtotime($order->NgayDatHang)); }}</a>
                                            </div>
                                            <div class="v-flex-list">
                                                @foreach ($order->orderdetail as $detail)
                                                    <span  style="color:black font-size: 16px">
                                                         {{ $detail->product->TenDT }} - {{ $detail->Mau }}
                                                    </span>
                                                    <span>x{{ $detail->SoLuong }}</span>
                                                    <span style="font-weight: 500">{{ number_format($detail->DonGiaBan) }}₫</span>
                                                @endforeach
                                            </div>
                                            <p class="font-weight-bold v-total-list">Tổng tiền: {{ number_format($order->TongTien) }}₫</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                    @endforeach
                    @else
                    <h1>Bạn chưa có đơn hàng nào</h1>
                    @endif
                    <!-- Begin Li's Pagination Area -->
                    <div class="col-lg-12">
                        {{-- <div class="li-paginatoin-area text-center pt-25"> --}}
                        <div class="paginatoin-area">
                            <div class="row">
                                {{ $list_order->appends(request()->except('page'))->links('vendor.pagination.custom_pagination_order') }}
                            </div>
                        </div>
                    </div>
                    <!-- Li's Pagination End Here Area -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Li's Main Blog Page Area End Here -->
@endsection
