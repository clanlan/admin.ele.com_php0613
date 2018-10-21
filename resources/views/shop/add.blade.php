@extends('common.default')
@section('contents')
<div class="modal-header">
    <h2 class="text-center">新增店铺</h2>
</div>
<div class="modal-body">
    <form action="{{route('shop.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺分类：</label>
            <div class="col-sm-8">
                <select name="shop_category_id" class="form-control">
                    <option value="">请选择店铺分类</option>
                    @foreach($cates as $cate)
                        <option value="{{$cate->id}}"
                                @if(old('shop_category_id') == $cate->id) selected @endif>{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
            <span class="text-danger col-sm-2">*{{$errors->first('shop_category_id')}}</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺名称：</label>
            <div class="col-sm-8"><input type="text" name="shop_name" class="form-control" value="{{old('shop_name')}}"/></div>
            <span class="text-danger col-sm-2">*{{$errors->first('shop_name')}}</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺优势：</label>
            <div class="col-sm-9">
                @foreach($advantages as $advantage)
                <label class="col-md-2"><input type="checkbox" name="advantage[]" value="{{$advantage->value}}"/> {{$advantage->name}}</label>
                 @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">起送金额：</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-addon">￥</div>
                    <input type="text" name="start_send" class="form-control" id="exampleInputAmount" placeholder="金额">
                    <div class="input-group-addon">元</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">配 送 费：</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-addon">￥</div>
                    <input type="text" name="send_cost" class="form-control" id="exampleInputAmount" placeholder="金额">
                    <div class="input-group-addon">元</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺状态：</label>
            <div class="col-sm-8">
                <div class="col-md-2">
                    <label><input type="radio" name="status" value="1" checked/> 正常 </label></div>
                <div class="col-md-2">
                <label><input type="radio" name="status" value="0"/> 待审核 </label>
                </div>
                <div class="col-md-2">
                <label><input type="radio" name="status" value="-1"/> 禁用 </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺公告：</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="notice">{{old('shop_name')}}</textarea></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">优惠信息：</label>
            <div class="col-sm-8"><input type="text" name="discount" class="form-control" value="{{old('shop_name')}}"/></div>
        </div>
        <div class="clearfix form-group">
            <label class="control-label col-sm-2">分类图片：</label>
            <div class="col-sm-2"><img id="face" src="/images/a.png" alt="图片上传" width="100" style="cursor: pointer" onclick="test()" /></div>
            <div class="col-sm-8">
                <input type="file" name="img" id="file" onchange="preview(this)"/>
                <h6>图片格式:jpg、jpeg、png、gif，图片大小不能超过2M</h6>
                <h5 id="err" class="text-danger"></h5>
            </div>
        </div>

        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2"></label>
            <div class="col-sm-8">
            <button type="submit" class="btn-success btn-lg btn-block"> 提交分类</button>
            </div>
        </div>
    </form>
</div>
@endsection
@include('common._img_js')