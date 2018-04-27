@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            {!! Form::open(['id' => 'image-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="m-b-22 text-center text-bold">上傳大頭照</h3>
                </div>
                <div class="panel-body">
                    <div class="profile-img-box fxs">
                        <div class="me-img">
                            <span class="img-bg-set" style="background-image: url(&quot;{{ asset('images/default-user.png') }}&quot;);"></span>
                            {{--  https://cdn.hiskio.com/users/9988/avatar/t3utUmvJkI17bSK  --}}
                        </div>
                        <div class="profile-img-upload">
                            <div class="img-upload fxm">
                                <div class="img-upload-box">
                                    <span><i class="fa fa-pencil"></i>&nbsp;&nbsp;更換照片</span>
                                    {!! Form::file('avatar', ['class' => 'img-file', 'title' => '選取要上傳的檔案。', 'accept' => implode(',', config('image.valid_image_mimetypes'))]) !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="upload-text">使用.jpg、.jpeg、.png或.svg、.gif圖檔。避免顯示品質不佳。建議您的圖片最低至少為200x200像素。</div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
<script>
$(function() {
    $('input[name=avatar]').on('change', function () {
        // ajax 基本做法
        /* var fd = new FormData(document.getElementById("image-form")); 
        fd.append("avatar", $('input[name=avatar]').val());
        $.ajax({ 
            url: "{{ route('avatar.store') }}", 
            type: "POST", 
            data: fd, 
            enctype: 'multipart/form-data', 
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            processData: false, // tell jQuery not to process the data 
            contentType: false, // tell jQuery not to set contentType 
        }).done(function( response ) { 
            $('.img-bg-set').attr('style', 'background-image: url(' + response + ');');
        }); */

        // use jquery-form pag
        $('#image-form').ajaxSubmit({
            success: function(data, statusText, xhr, wrapper){ 
                if (statusText == 'success') {
                    $('.img-bg-set').attr('style', 'background-image: url(' + data + ');');
                }
            },
            error: function(xhr) {
                let html;
                errors = JSON.parse(xhr.responseText);
                html += '<div class="alert alert-danger">';
                html +=     '<ul>';
                for (items in errors) {
                    html +=     '<li>' + errors.items + '</li>';
                }
                html +=     '</ul>';
                html += '</div>';

                $('.panel-body').prepend(html);
            }
        });
    });
});
</script>
@endsection